<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table            = 'history';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['admin_kembali', 'waktu_kembali'];


    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';


    public function getId($kodeBarcode)
    {
        return $this->where(["id_barang" => $kodeBarcode, "admin_kembali" =>  null, "waktu_kembali" => null])->first();
    }
}
