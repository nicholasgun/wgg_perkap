<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class DaftarBarang extends BaseController
{
    public function index()
    {
        $barangModel = new BarangModel();
        $daftarbarang = $barangModel->getAllDaftar();
        $data = [
            'daftarBarang' => $daftarbarang,
            'filter' => 'semua'
        ];
        // dd($daftarbarang);
        return view('DaftarBarang/daftarBarang',$data);
    }
    public function delete($id){
        $barangModel = new BarangModel();
        $barangModel->delete($id);

        return redirect()->to("/daftarBarang");
    }
    public function filter(){
        $barangModel = new BarangModel();
        $filter = $this->request->getPost('filter');
        $daftarBarang = $barangModel->getByFilter($filter);
        $data = [
            'daftarBarang' => $daftarBarang,
            'filter' => $filter
        ];
        return view('DaftarBarang/daftarBarang',$data);
    }
}
