<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisBarangModel;

class JenisBarang extends BaseController
{
    
    public function index()
    {
        $jenisBarangModel = new JenisBarangModel;
        $jenisBarang = $jenisBarangModel->findAll();

        $data = [
            'jenisBarang' => $jenisBarang,
            'validasi' => \Config\Services::validation()->getErrors()
        ];

        return view('/JenisBarang/JenisBarang', $data);
    }

    public function add()
    {
        if($this->request->getPost('submit') == "tambah"){
            $rules = [
                'kodeBarang' => 'required|min_length[2]|max_length[5]|is_unique[jenis_barang.id]|alpha',
                'namaBarang' => 'required|alpha_numeric_space',
            ];
    
            //kalo validasinya gagal  
            if(!$this->validate($rules)){
                return redirect()->back()->withInput();
            }

            //kalo berhasil
            $jenisBarangModel = new JenisBarangModel;
            $result = $jenisBarangModel->save([
                'id' => strtoupper($this->request->getPost('kodeBarang')),
                'nama' => $this->request->getPost('namaBarang')
            ]);

            if($result){
                return redirect()->back()->with('success', "Kode barang berhasil ditambahkan");
            }else{
                return redirect()->back()->withInput()->with('error', "Kode barang gagal ditambahkan");
            }
        }

        return redirect()->back()->withInput();
    }

    public function update($id){
        $jenisBarangModel = new JenisBarangModel;
       
        $result = [
            'success' => true,
            'new_hash' => csrf_hash(),
            'param' => $this->request->getPost()
        ];

        //update kode barang
        if($this->request->getPost('newKode')){
            $rules = [
                'value' => 'required|min_length[2]|max_length[5]|is_unique[jenis_barang.id]|alpha',
            ];
    
            //kalo validasinya gagal  
            if(!$this->validate($rules)){
                $result['success'] = false;
                $result['msg'] = $this->validator->getErrors();

                return json_encode($result);
            }

            //validasi berhasil
            $query = $jenisBarangModel->update($id, [
                'id' => strtoupper($this->request->getPost('value'))
            ]);

            //error query
            if(!$query){
                $result['success'] = false;
                $result['msg'] = $jenisBarangModel->errors();
            }

        }
        //update nama barang
        else if($this->request->getPost('newNama')){
            $rules = [
                'value' => 'required|alpha_numeric_space',
            ];
    
            //kalo validasinya gagal  
            if(!$this->validate($rules)){
                $result['success'] = false;
                $result['msg'] = $this->validator->getErrors();

                return json_encode($result);
            }

            //validasi berhasil update nama
            $query = $jenisBarangModel->update($id, [
                'nama' => $this->request->getPost('value')
            ]);

            //error query
            if(!$query){
                $result['success'] = false;
                $result['msg'] = $jenisBarangModel->errors();
            }

        }

        return json_encode($result);
    }
    
    public function delete($id){
        $jenisBarangModel = new JenisBarangModel;
        $jenisBarangModel->delete($id);

        return redirect()->to("/jenisBarang");
    }
}
