<?php

namespace App\Models;

use CodeIgniter\Model;

class PenukaranModel extends Model
{
    protected $table = 'barang';
    protected $allowedFields = ['peminjam'];


    public function check_barang($id)
    {
        return $this->where('id', $id)->countAllResults();
    }

    public function fetch_barang($id)
    {
        return $this
            ->db
            ->table($this->table.' b')
            ->select('b.id, b.peminjam, jb.nama nama_barang, p.nama nama_peminjam')
            ->join('jenis_barang jb', 'jb.id = b.id_jenis_barang', 'inner')
            ->join('panitia p', 'p.nrp = b.peminjam', 'left')
            ->where('b.id', $id)
            ->get()
            ->getRow();   
    }

    public function mulai_tukar($barang_lama, $barang_baru)
    {
        // Barang lama
        $this->where('id', $barang_lama['id'])
            ->set('peminjam', null)
            ->update();


        if ($this->db->affectedRows() > 0)
        {
            $get_last = $this->db
                ->table('history')
                ->select('id')
                ->where('id_barang', $barang_lama['id'])
                ->where([
                    'admin_kembali' => null,
                    'waktu_kembali' => null,
                ])
                ->orderBy('id', 'DESC')
                ->limit(1)
                ->get()
                ->getRow();


            $this->db
                ->table('history')
                ->where('id', $get_last->id)
                ->where([
                    'admin_kembali' => null,
                    'waktu_kembali' => null,
                ])
                ->update([
                    'admin_kembali' => $barang_lama['admin_kembali'],
                    'waktu_kembali' => $barang_lama['waktu_kembali']
                ]);

            

            // Barang baru
            if ($this->db->affectedRows() > 0)
            {
                $this->where('id', $barang_baru['id'])
                    ->set('peminjam', $barang_baru['peminjam'])
                    ->update();


                if ($this->db->affectedRows() > 0)
                {
                    $this->db
                        ->table('history')
                        ->insert([
                            'id_barang' => $barang_baru['id'],
                            'peminjam' => $barang_baru['peminjam'],
                            'admin_pinjam' => $barang_baru['admin_pinjam']
                        ]);

                    return $this->db->affectedRows() > 0;
                }
            }
        }

        return false;
    }
}
