<?php

namespace App\Controllers\tugasTemplate;

use App\Controllers\BaseController;

class C_login extends BaseController
{
    /**
     ** display_login
     * TODO: Menampilkan halaman Login
     */
    public function display_login()
    {
        $data['style']  = STYLE;
        $data[CONTENT]  = "tugasTemplate/V_login";
        echo view(TEMPLATE_2, $data);
    }
}
