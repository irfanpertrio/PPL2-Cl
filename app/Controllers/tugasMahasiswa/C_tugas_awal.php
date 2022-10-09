<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;

class c_tugas_awal extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new m_mahasiswa();
    }

    public function display()
    {
        // echo 'Hello World';
        // return view('/mahasiswa');
        // return view('/table');
        // return view('/tableLooping');
        // return view('/tableDb');
    }
}
