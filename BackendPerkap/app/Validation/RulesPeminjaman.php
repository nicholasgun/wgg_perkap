<?php

namespace App\Validation;

use App\Models\PeminjamanModel;

class RulesPeminjaman 
{
    public function is_code_valid($str): bool
    {
        return preg_match('/^([A-Z]{2,5}-[0-9]{3,5})$/i', $str);
    }
    
    public function is_item_exist($str): bool
    {
        $model = new PeminjamanModel();
        return $model->is_item_exist($str);
    }
    
    public function is_item_available($str): bool
    {
        $model = new PeminjamanModel();
        $peminjam = $model->get_peminjam($str);
        return $peminjam == null or $peminjam == '';
    }
}
