<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PanitiaModel;
use App\Models\PenukaranModel;
use CodeIgniter\Model;

class Penukaran extends BaseController
{
    private Model $model, $panitiaModel;
    private $admin_kembali;
    private $admin_pinjam;


    public function __construct()
    {
        $this->panitiaModel = new PanitiaModel();
        $this->model = new PenukaranModel();
        $this->admin_kembali = strtoupper(session()->get('nrp'));
        $this->admin_pinjam = strtoupper(session()->get('nrp'));
    }

    public function index()
    {
        $data = [];
        $data['title'] = 'Penukaran Barang';


        if ($this->request->getPost('submit') == 'lihat')
        {
            $validasi = [
                'nrp_penukar' => [
                    'rules' => 'required|min_length[9]|max_length[9]|is_not_unique[panitia.nrp]',
                    'errors' => [
                        'required' => 'NRP penukar wajib diisi.',
                        'min_length' => 'NRP penukar wajib 9 karaker.',
                        'max_length' => 'NRP penukar wajib 9 karakter.',
                        'is_not_unique' => 'NRP penukar tidak ditemukan.',
                    ]
                ],
                'barang_lama' => [
                    'rules' => 'required|regex_match[/^([A-Z]{2,5}-[0-9]{3,5})$/]',
                    'errors' => [
                        'required' => 'ID barang lama wajib diisi.',
                        'regex_match' => 'Format id barang lama salah.'
                    ]
                ],
                'barang_baru' => [
                    'rules' => 'required|regex_match[/^([A-Z]{2,5}-[0-9]{3,5})$/]|differs[barang_lama]',
                    'errors' => [
                        'required' => 'ID barang baru wajib diisi.',
                        'regex_match' => 'Format id barang baru salah.',
                        'differs' => 'Pastikan id barang baru berbeda.'
                    ]
                ],
                
            ];

            // Kalau gagal
            if (!$this->validate($validasi))
            {
                return redirect()
                    ->to(site_url('/penukaran'))
                    ->withInput();
            }   
            
            if ($this->model->check_barang($this->request->getVar('barang_lama')) == 0)
                return redirect()
                    ->to(site_url('/penukaran'))
                    ->with('error', 'ID barang lama tidak ditemukan.')
                    ->withInput();


            if ($this->model->check_barang($this->request->getVar('barang_baru')) == 0)
                return redirect()
                    ->to(site_url('/penukaran'))
                    ->with('error', 'ID barang baru tidak ditemukan.')
                    ->withInput();
            
            
            return redirect()
                ->to(site_url('/penukaran'))
                ->with('kirim_data', [
                    'cek_ketersediaan' => true,
                    'barang_lama' => $this->request->getVar('barang_lama'),
                    'barang_baru' => $this->request->getVar('barang_baru')
                ])
                ->withInput();
        }
        
        
        $data['validasi'] = \Config\Services::validation()->getErrors();

        if (session()->has('kirim_data'))
        {
            $get_kirimData = session()->get('kirim_data');

            if ($get_kirimData['cek_ketersediaan'])
            {
                $data['barang_lama_rows'] = $this->model->check_barang($get_kirimData['barang_lama']);
                $data['barang_baru_rows'] = $this->model->check_barang($get_kirimData['barang_baru']);

                if ($data['barang_lama_rows'] > 0)
                    $data['fetch_baranglama'] = $this->model->fetch_barang($get_kirimData['barang_lama']);

                if ($data['barang_baru_rows'] > 0)
                    $data['fetch_barangbaru'] = $this->model->fetch_barang($get_kirimData['barang_baru']);
                    $namaPenukar = $this->panitiaModel->getNamaByNrp(old('nrp_penukar'));
                    if ($namaPenukar === null) $namaPenukar = 'Tidak ditemukan';
                    $data['nama_penukar'] = $namaPenukar;
            }
        }



        if ($this->request->getPost('submit') == 'tukar')
        {
            $barang_baru_rows = $this->model->check_barang($this->request->getVar('barang_baru'));

            if ($barang_baru_rows == 0)
            {
                return redirect()
                    ->to(site_url('/penukaran'))
                    ->with('error', 'Barang yang ingin ditukar nampaknya tidak tersedia.')
                    ->with('kirim_data', [
                        'cek_ketersediaan' => true,
                        'barang_lama' => $this->request->getVar('barang_lama'),
                        'barang_baru' => $this->request->getVar('barang_baru')
                    ])
                    ->withInput();
            }
            else
            {
                $fetch_barang = $this->model->fetch_barang($this->request->getVar('barang_baru'));

                if ($fetch_barang->peminjam != '')
                {
                    return redirect()
                        ->to(site_url('/penukaran'))
                        ->with('error', 'Barang yang ingin ditukar nampaknya sudah dipinjam.')
                        ->with('kirim_data', [
                            'cek_ketersediaan' => true,
                            'barang_lama' => $this->request->getVar('barang_lama'),
                            'barang_baru' => $this->request->getVar('barang_baru')
                        ])
                        ->withInput();
                }
                else
                {
                    $mulai_tukar = $this->model->mulai_tukar(
                    // Barang Lama    
                    [
                        'id' => $this->request->getVar('barang_lama'),
                        'admin_kembali' => $this->admin_kembali,
                        'waktu_kembali' => date('Y-m-d H:i:s')
                    ], 
                    // Barang baru
                    [
                        'id' => $this->request->getVar('barang_baru'),
                        'peminjam' => strtoupper($this->request->getVar('nrp_penukar')),
                        'admin_pinjam' => $this->admin_pinjam
                    ]);


                    if ($mulai_tukar)
                    {
                        return redirect()
                            ->to(site_url('/penukaran'))
                            ->with('success', 'Barang berhasil ditukar.');
                    }
                    else
                    {
                        return redirect()
                            ->to(site_url('/penukaran'))
                            ->with('error', 'Terjadi kesalahan yang tidak diketahui. Gagal menukar barang!')
                            ->with('kirim_data', [
                                'cek_ketersediaan' => true,
                                'barang_lama' => $this->request->getVar('barang_lama'),
                                'barang_baru' => $this->request->getVar('barang_baru')
                            ])
                            ->withInput();
                    }
                }
            }

        }

        return view('penukaran/tambah', $data);
    }
}
