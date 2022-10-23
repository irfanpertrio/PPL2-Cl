<?php

namespace App\Controllers\tugasMahasiswa;

use App\Controllers\BaseController;

class C_home extends BaseController
{
    /**
     ** display
     * TODO: Menampilkan halaman Dashboard
     */
    public function display()
    {
        $data[CONTENT] = "tugasMahasiswa/V_mahasiswa_home";
        echo view(TEMPLATE_1, $data);
    }
}
