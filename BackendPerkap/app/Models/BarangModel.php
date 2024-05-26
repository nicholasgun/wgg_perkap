<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';

    protected $allowedFields    = ['id','id_jenis_barang','peminjam'];
    protected $returnType       = 'array';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    
    public function getBarang($kodeBarang)
    {
        return $this->where(["id" => $kodeBarang])->first();
    }

    public function getAllDaftar()
    {
        $builder = $this->db->table('barang');
        $builder->select('barang.id as id,jenis_barang.nama as nama,barang.peminjam as peminjam');
        $builder->join('jenis_barang','barang.id_jenis_barang = jenis_barang.id');
        return $builder->get()->getResult('array');
    }
    public function getByFilter($filt)
    {
        if($filt == "semua"){
            return $this->getAllDaftar();
        }else if($filt == "pinjam"){
            $builder = $this->db->table('barang');
            $builder->select('barang.id as id,jenis_barang.nama as nama,barang.peminjam as peminjam');
            $builder->join('jenis_barang','barang.id_jenis_barang = jenis_barang.id');
            $builder->where('barang.peminjam !=',null);
            return $builder->get()->getResult('array');
        }else if($filt == 'tidak'){
            $builder = $this->db->table('barang');
            $builder->select('barang.id as id,jenis_barang.nama as nama,barang.peminjam as peminjam');
            $builder->join('jenis_barang','barang.id_jenis_barang = jenis_barang.id');
            $builder->where('barang.peminjam IS NULL');
            return $builder->get()->getResult('array');
        }
    }
}

