<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\JenisBarangModel;

class TambahBarang extends BaseController
{

    public function index()
    {
        return view('TambahBarang/tambahBarang');
    }
    public function insert(){
        $jenisModel = new JenisBarangModel();
        $barangModel = new BarangModel();
        if($this->request->getPost('submit') == 'insert'){
            $error = null;  
            if($this->request->getPost('inputBarang')){
                $rules = [
                    'inputBarang' => [
                        'rules' => 'required|min_length[5]|max_length[11]|is_unique[barang.id]|regex_match[/^([A-Z]{2,5}-[0-9]{3,5})$/]',
                        'errors' => [
                            'required' => 'Belom insert ID',
                            'max_length' => 'ID tidak valid',
                            'min_length' => 'ID tidak valid',
                            'is_unique' => 'ID ini sudah pernah diinput!',
                            'regex_match' => 'ID tidak valid'
                        ]
                    ]
                ];

                if(!$this->validate($rules)){
                    $error = 1;
                    $err_val = $this->validator->getErrors();
                }

                $idJenisBarang = explode('-', $this->request->getPost('inputBarang'))[0];
                if(!$jenisModel->validateId($idJenisBarang)){
                    $error = 1;
                    $err_val['inputBarang'] = "Jenis Barang belum terdaftar";
                }
                // dd($insertData);
                if($error && $error == 1){
                    return redirect()->to(site_url('/tambahBarang'))->with('error',$err_val)->withInput();
                }

                try {
                    $insertData = $barangModel->insert([
                        'id' => $this->request->getPost('inputBarang'),
                        'id_jenis_barang' => $idJenisBarang,
                    ]);
                    if($insertData)
                    return redirect()->to(site_url('/tambahBarang'))->with('success','Item '.$this->request->getVar('inputBarang').' sukses terdaftar');
                    else{
                        $error = 1;
                        $err_val['inputBarang'] = "Item gagal terdaftar";
                        return redirect()->to(site_url('/tambahBarang'))->with('error',$err_val)->withInput();
                    }

                } catch (\Exception $e) {
                    exit($e->getMessage());
                }
            }
        }
        return redirect()->to(site_url('/tambahBarang'));
    }
}
