<?php

namespace App\Controllers\tugasTemplate;

use App\Controllers\BaseController;

class C_home extends BaseController
{
    /**
     ** welcome
     * TODO: Menampilkan halaman Selamat Datang
     */
    public function welcome()
    {
        $data['style']  = STYLE;
        $data['navbar'] = NAVBAR;
        $data['footer'] = FOOTER;
        $data[CONTENT]  = "tugasTemplate/v_selamat_datang";
        echo view(TEMPLATE_2, $data);
    }

    /**
     ** display
     * TODO: Menampilkan halaman Dashboard
     */
    public function dashboard()
    {
        $data['style']  = STYLE;
        $data['navbar'] = NAVBAR;
        $data[CONTENT]  = "tugasTemplate/v_home";
        echo view(TEMPLATE_2, $data);
    }
}
