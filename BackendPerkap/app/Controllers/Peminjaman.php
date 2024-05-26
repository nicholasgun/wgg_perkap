<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use Config\Services;

class Peminjaman extends BaseController
{
    public function index()
    {
        return view('peminjaman');
    }

    public function pinjam()
    {
        $rules = [
            'nrp' => [
                'rules' => 'required|regex_match[/^[a-z]\d{8}$/i]|is_not_unique[panitia.nrp]',
                'errors' => [
                    'required' => 'Silahkan scan KTM peminjam!',
                    'regex_match' => 'NRP {value} tidak valid',
                    'is_not_unique' => 'NRP {value} tidak terdaftar sebagai panitia',
                ]
            ],
            'codes' => [
                'rules' => 'required',
                'errors' => ['required' => 'Silahkan scan barcode barang yang ingin dipinjam!']
            ],
            'codes.*' => [
                'rules' => 'required|is_code_valid|is_item_exist|is_item_available',
                'errors' => [
                    'required' => 'Silahkan scan barcode!',
                    'is_code_valid' => 'Kode {value} tidak valid',
                    'is_item_exist' => 'Barang dengan kode {value} tidak ditemukan di database',
                    'is_item_available' => 'Barang dengan kode {value} sedang dipinjam'
                ]
            ]
        ];
        $this->validate($rules);

        if ($this->validator->hasError('nrp') || $this->validator->hasError('codes'))
            return redirect()->back()->with('errorMessage', [
                'nrp' => $this->validator->getError('nrp'),
                'codes' => $this->validator->getError('codes')
            ]);

        $peminjam = $this->request->getPost('nrp');
        $peminjam = strtoupper($peminjam);
        $codes = $this->request->getPost('codes');
        $filteredCodes = array_filter($codes, function ($key) {
            return !$this->validator->hasError("codes.$key");
        }, ARRAY_FILTER_USE_KEY);
        $adminPinjam = strtoupper(session()->get('nrp'));

        $model = new PeminjamanModel();
        $numAffectedRows = 0;
        $numFailed = 0;
        $codesFailed = $codes;
        if (count($filteredCodes) > 0) {
            $model->update_peminjam_barang($peminjam, $filteredCodes);
            $numAffectedRows = $model->insert_history_barang($peminjam, $filteredCodes, $adminPinjam);
            $numFailed = count($codes) - count($filteredCodes);
            $codesFailed = array_diff($codes, $filteredCodes);
        }

        return redirect()->back()->with('success', [
            'peminjam' => $peminjam,
            'banyak_barang_dipinjam' => $numAffectedRows,
            'banyak_barang_gagal_dipinjam' => $numFailed,
            'barang_gagal_dipinjam' => $codesFailed
        ]);
    }

    public function checkItemAvailability()
    {
        $rules = [
            'code' => [
                'rules' => 'required|is_code_valid|is_item_exist|is_item_available',
                'errors' => [
                    'required' => 'Silahkan scan barcode!',
                    'is_code_valid' => 'Kode {value} tidak valid',
                    'is_item_exist' => 'Barang dengan kode {value} tidak ditemukan di database',
                    'is_item_available' => 'Barang dengan kode {value} sedang dipinjam'
                ]
            ]
        ];
        $success = $this->validate($rules);
        $hasError = $this->validator->hasError('code');
        $responseBody = [
            'is_available' => !$hasError,
            'error_message' => $this->validator->getError('code')
        ];

        $this->response->setContentType('application/json');
        if ($hasError)
            $this->response->setStatusCode(400);
        else
            $this->response->setStatusCode(200);

        return $this->response->setJSON($responseBody);
    }
}
