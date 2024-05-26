<?php

namespace App\Models;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'barang';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_jenis_barang', 'peminjam'];

    public function is_item_exist($item_code)
    {
        $rowCount = $this->db
            ->table($this->table)
            ->select('id')
            ->where('id', $item_code)
            ->countAllResults();
        return $rowCount > 0;
    }

    public function get_peminjam($item_code)
    {
        return $this->db
            ->table($this->table)
            ->select('peminjam')
            ->where('id', $item_code)
            ->get()
            ->getRow()
            ->peminjam;
    }

    public function update_peminjam_barang($peminjam, $codes)
    {
        $data = [];
        foreach ($codes as $code) {
            $data[] = [
                'id' => $code,
                'peminjam' => $peminjam
            ];
        }
        return $this->db
            ->table($this->table)
            ->updateBatch($data, 'id');
    }

    public function insert_history_barang($peminjam, $codes, $admin_pinjam) {
        $data = [];
        $admin_pinjam = strtoupper($admin_pinjam);
        foreach ($codes as $code) {
            $data[] = [
                'id_barang' => strtoupper($code),
                'peminjam' => $peminjam,
                'admin_pinjam' => $admin_pinjam
            ];
        }
        return $this->db
            ->table('history')
            ->insertBatch($data);
    }
}
