<?php

namespace App\Controllers;

class C_home extends BaseController
{
    /**
     ** display
     * TODO: Menampilkan halaman Dashboard
     */
    public function display()
    {
        $data[CONTENT] = "v_mahasiswa_home";
        echo view(TEMPLATE, $data);
    }
}
