<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;

class Log extends BaseController
{
    public function index()
    {
        //
        $historyModel = new HistoryModel();

        $data = [
            'log' => $historyModel->orderBy('waktu_pinjam', 'DESC')->orderBy('waktu_kembali', 'DESC')->findAll()
        ];
        return view('log/log', $data);
    }
}
