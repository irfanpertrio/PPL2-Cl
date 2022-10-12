<?php

namespace App\Controllers\tugasMahasiswa;

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
        $data[CONTENT]      = "tugasMahasiswa/V_mahasiswa_table";
        $data['mahasiswa']  = $this->mahasiswa_model->get_mahasiswa();
        echo view(TEMPLATE_1, $data);
    }

    /**
     ** display_one_mahasiswa
     * @param   var         $id
     * @return  function    view table of detail Mahasiswa
     * TODO: Menampilkan tabel detail Mahasiswa
     */
    public function display_detail($id)
    {
        $data['mahasiswa'] = $this->mahasiswa_model->find($id);
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }

        $data[CONTENT] = "tugasMahasiswa/v_mahasiswa_detail";
        echo view(TEMPLATE_1, $data);
    }

    /**
     ** display_input
     * @return  function    view form input Mahasiswa
     * TODO: Menampilkan form input Mahasiswa
     */
    public function display_input()
    {
        $data[CONTENT] = "tugasMahasiswa/v_mahasiswa_input";
        echo view(TEMPLATE_1, $data);
    }

    /**
     ** display_update
     * @param   var         $id
     * @return  function    view form update Mahasiswa
     * TODO: Menampilkan form update Mahasiswa
     */
    function display_update($id)
    {
        $data['mahasiswa']  = $this->mahasiswa_model->find($id);
        $data[CONTENT]      = "tugasMahasiswa/v_mahasiswa_update";
        return view(TEMPLATE_1, $data);
    }

    /**
     ** input
     * @return  function    redirect to page table of list Mahasiswa
     * TODO: Menyimpan data baru Mahasiswa
     */
    public function input()
    {
        $data =
            [
                'NIM'   => $this->request->getVar('nim'),
                'Nama'  => $this->request->getVar('nama'),
                'Umur'  => $this->request->getVar('umur'),
            ];

        $result = $this->mahasiswa_model->input_mahasiswa($data);
        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to('mahasiswa/temp');
        }
    }

    /**
     ** search
     * @return  function    redirect to page table of list Mahasiswa
     * TODO: Mencari data Mahasiswa
     */
    public function search()
    {

        $data['nama']       = $this->request->getVar('nama');
        $data['mahasiswa']  = $this->mahasiswa_model->search_mahasiswa($data);
        $data[CONTENT]      = "tugasMahasiswa/v_mahasiswa_table";
        return view(TEMPLATE_1, $data);
    }

    /**
     ** update
     * @param   var         $id
     * @return  function    view table list of Mahasiswa
     * TODO: Memperbarui data Mahasiswa
     */
    public function update($id)
    {
        $data =
            [
                'id'    => $id,
                'nim'   => $this->request->getVar('nim'),
                'nama'  => $this->request->getVar('nama'),
                'umur'  => $this->request->getVar('umur'),
            ];

        $result = $this->mahasiswa_model->update_mahasiswa($data);
        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->route('mahasiswa/temp');
        }
    }

    /**
     ** delete
     * @param   var         $id
     * @return  function    view table list of Mahasiswa
     * TODO: Menghapus data Mahasiswa
     */
    public function delete($id)
    {
        $data['mahasiswa'] = $this->mahasiswa_model->delete($id);
        if ($data) {
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('mahasiswa/temp');
        }
    }
}
