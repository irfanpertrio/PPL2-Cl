<?php

namespace App\Controllers\tugasTemplate;

use App\Controllers\BaseController;

class C_login extends BaseController
{
    /**
     ** display
     * TODO: Menampilkan halaman Login
     */
    public function display()
    {
        $data['style']  = STYLE;
        $data[CONTENT]  = "tugasTemplate/v_login";
        echo view(TEMPLATE_2, $data);
    }
}
