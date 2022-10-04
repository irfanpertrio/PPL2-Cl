<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    /**
     ** define
     * @return var  $db
     */
    public function define()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     ** get_mahasiswa
     * TODO: Login
     */
    public function get_admin($username, $password)
    {
        $data = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1")->getResultArray();
        return $data;
    }
}
