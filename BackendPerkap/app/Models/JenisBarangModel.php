<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBarangModel extends Model
{
    protected $table            = 'jenis_barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    // protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function validateId($idJenis){
        if(!$this->where('id',$idJenis)->first()){
            return false;
        }else{
            return true;
        }
    }
}
