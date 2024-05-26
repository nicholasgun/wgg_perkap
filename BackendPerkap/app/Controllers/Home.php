<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //
        return redirect()->to("/login");
        echo '<h1>Ini Halaman Perkap</h1>';

        // Tiap anchor wajib pakai function site_url(), kyk contoh:
        echo '<a href="' . site_url('test') . '">Halaman Test Edited</a>';
        echo session()->getFlashdata('error');
        // Biar nanti otomatis jadi /perkap/test
    }

    public function test(){
        echo 'ini test';
        echo '<a href="' . site_url('') . '">Halaman utama</a>';
    }

    public function home(){
        return view("home");
    }
}
