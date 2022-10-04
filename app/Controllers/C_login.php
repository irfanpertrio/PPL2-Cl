<?php

namespace App\Controllers;

use App\Models\M_admin;

class C_login extends BaseController
{
    public function __construct()
    {
        $this->admin_model = new M_admin();
        $this->session = session();
        $this->session->start();
    }

    /**
     ** display
     * @return  function  view Login page
     * TODO: Menampilkan form Login
     */
    public function display()
    {
        helper(['form']);
        echo view('V_mahasiswa_login');
    }

    /**
     ** auth
     * @return  void
     * TODO: Melakukan authentication untuk User ketika login
     */
    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->admin_model->where('username', $username)->first();
        if ($data) 
        {
            $pass = $data['password'];
            $verify_pass = (MD5($password) === $pass);
            if ($verify_pass) 
            {
                $session_data =
                    [
                        'id'            => $data['id'],
                        'username'      => $data['username'],
                        'password'      => $data['password'],
                        'logged_in'     => TRUE
                    ];
                $this->session->set($session_data);
                return redirect()->to('dashboard');
            } 
            else 
            {
                $this->session->setFlashdata('pesan', 'Wrong Password');
                return redirect()->to('');
            }
        } 
        else 
        {
            $this->session->setFlashdata('pesan', 'Username not Found');
            return redirect()->to('');
        }
    }

    /**
     ** logout
     * @retun  void
     * TODO: Mengakhiri session untuk semua halaman
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('');
    }
}
