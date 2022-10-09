<?php

namespace App\Controllers\tugasTemplate;

use App\Models\m_mahasiswa;
use App\Controllers\BaseController;

class C_mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->mahasiswa_model = new M_mahasiswa();
    }

    /** 
     ** display
     * @return  function    view table list of Mahasiswa
     * TODO: Menampilkan tabel list semua Mahasiswa
     */
    public function display()
    {
        $data['style']      = STYLE;
        $data['navbar']     = NAVBAR;
        $data['footer']     = FOOTER;
        $data['mahasiswa']  = $this->mahasiswa_model->get_mahasiswa();
        $data[CONTENT]      = "tugasTemplate/V_table";
        echo view(TEMPLATE_2, $data);
    }

    /**
     ** display_detail
     * @param   var         $id
     * @return  function    view table of detail Mahasiswa
     * TODO: Menampilkan tabel detail Mahasiswa
     */
    public function display_detail($id)
    {
        $data['style']      = STYLE;
        $data['navbar']     = NAVBAR;
        $data['footer']     = FOOTER;
        $data['mahasiswa'] = $this->mahasiswa_model->find($id);
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }

        $data[CONTENT] = "tugasTemplate/v_table_detail";
        echo view(TEMPLATE_2, $data);
    }

    /**
     ** display_update
     * @param   var         $id
     * @return  function    view form update Mahasiswa
     * TODO: Menampilkan form update Mahasiswa
     */
    public function display_update($id)
    {
        $data['style']      = STYLE;
        $data['navbar']     = NAVBAR;
        $data['footer']     = FOOTER;
        $data['mahasiswa']  = $this->mahasiswa_model->find($id);
        $data[CONTENT]      = "tugasTemplate/v_update";
        echo view(TEMPLATE_2, $data);
    }
    
    /**
     ** search
     * @return  function    redirect to page table of list Mahasiswa
     * TODO: Mencari data Mahasiswa
     */
    public function search()
    {
        $data['style']      = STYLE;
        $data['navbar']     = NAVBAR;
        $data['footer']     = FOOTER;
        $data['nama']       = $this->request->getVar('nama');
        $data['mahasiswa']  = $this->mahasiswa_model->search_mahasiswa($data);
        $data[CONTENT]      = "tugasTemplate/v_table";
        return view(TEMPLATE_2, $data);
    }
}
