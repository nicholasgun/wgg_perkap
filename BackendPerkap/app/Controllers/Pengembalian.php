<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\HistoryModel;
use App\Models\PanitiaModel;
use CodeIgniter\HTTP\Message;
use CodeIgniter\Model;

class Pengembalian extends BaseController
{
    private $barang;
    private $history;
    private Model $panitiaModel;

    public function __construct()
    {
        $this->barang = new BarangModel();
        $this->history = new HistoryModel();
        $this->panitiaModel = new PanitiaModel();
    }

    public function index()
    {
        $data =  [
            "title" => "Pengembalian Barang",
        ];

        return view('pengembalian/index', $data);
    }

    public function kembali()
    {
        if ($this->request->isAJAX()) {
            $idBarang = $this->request->getPost("idBarang");
            $idHistory = $this->history->getId($idBarang);

            $result = [
                "success" => true,
                "message" => "Barang berhasil dikembalikan",
                "new_hash" => csrf_hash(),
                "validation" => false,
            ];

            // validasi input
            if (!$this->validate([
                "idBarang" => [
                    "rules" => "required|min_length[5]|max_length[11]",
                    "errors" => [
                        "required" => "Barcode barang harus diisi",
                        "min_length" => "Kode barang minimal 5 karakter!",
                        'max_length' => 'Kode barang maksimal 11 karakter!',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                $result["success"] = false;
                $result["validation"] = true;
                $result["message"] = $validation->getError('idBarang');

                return $this->response->setJSON($result);
            }

            //cek barang apakah ada
            if (!$this->barang->getBarang($idBarang)) {
                $result["success"] = false;
                $result["message"] = "Barang Tidak Ada Di Database";

                return $this->response->setJSON($result);
            }

            //jika barang tidak dipinjam
            if (!$idHistory) {
                $result["success"] = false;
                $result["message"] = "Barang Sedang Tidak Dipinjam";

                return $this->response->setJSON($result);
            }

            // update Barang
            $resultBarang = $this->barang->db->table('barang')->update([
                'peminjam' => null  //set value
            ],[
                'id' => $this->request->getPost("idBarang") //where
            ]);

            // update history
            $admin_kembali = strtoupper(session()->get('nrp'));
            $resultHistory = $this->history->db->table('history')->update([
                'admin_kembali' => $admin_kembali,
                'waktu_kembali' => date("Y-m-d H:i:s"),
            ], $idHistory);


            // cek apakah berhasil
            if ($resultBarang && $resultHistory) {
                return $this->response->setJSON($result);
            } else {
                $result["success"] = false;
                $result["message"] = "Barang Gagal Dikembalikan";

                return $this->response->setJSON($result);
            }
        }
    }

    public function ajaxTabel()
    {
        if ($this->request->isAJAX()) {
            $result = [
                "success" => true,
                "new_hash" => csrf_hash(),
                "id" => null,
                "peminjam" => null,
                "nama_peminjam" => null,
                "divisi" => null
            ];

            $idBarang = service('request')->getPost('idBarang');

            $hasil = $this->barang->getBarang($idBarang);

            if (!$hasil) {
                $result["success"] = false;
                $result["msg"] = $this->barang->errors();
            } else {
                $result["id"] = $hasil["id"];
                $result["peminjam"] = $hasil["peminjam"];
            }

            // jika barang gaada di db
            if (($result["id"] == null && $result["peminjam"] == null)) {
                $result["id"] = "Barang tidak ada di database";
                return $this->response->setJSON($result);
            }
            // jika barang belum dipinjam
            elseif ($result["peminjam"] == null) {
                $result["peminjam"] = "Barang tidak sedang dipinjam";
                return $this->response->setJSON($result);
            }

            //get nama & divisi
            $panitia = $this->panitiaModel
                ->where('nrp', $result["peminjam"])
                ->first();
            $result["nama_peminjam"] = $panitia["nama"];
            $result["divisi"] = $panitia["divisi"];

            return $this->response->setJSON($result);
        }
    }
}
