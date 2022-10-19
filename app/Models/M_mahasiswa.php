<?php

namespace App\Models;

use CodeIgniter\Model;

class M_mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['NIM', 'Nama', 'Umur', 'Foto'];

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
     * TODO: Mencari dan menampilkan data semua Mahasiswa
     */
    public function get_mahasiswa()
    {
        $data = $this->db->query(MAHASISWA)->getResultArray();
        return $data;
    }

    /**
     ** search_mahasiswa
     * @param  array $data
     * TODO: Mencari data mahasiswa 
     */
    public function search_mahasiswa($data)
    {
        $search = $data['nama'];
        $data   = $this->db->query("SELECT * FROM mahasiswa 
                                        WHERE Nama 
                                        LIKE '%$search%'
                                        ORDER BY Nama")->getResultArray();
        return $data;
    }

    /**
     ** input_mahasiswa
     * @param  array $data
     * TODO: Menginputkan data Mahasiswa
     */
    public function input_mahasiswa($data)
    {
        $nim    = $data['NIM'];
        $nama   = $data['Nama'];
        $umur   = $data['Umur'];
        $foto   = $data['Foto'];
        $query  = $this->db->prepare(static function ($db) {
            return $db->table('mahasiswa')->insert([
                'Nama'  => '',
                'NIM'   => '',
                'Umur'  => '',
                'Foto'  => '',
            ]);
        });

        $result = $query->execute($nama, $nim, $umur, $foto);
        return $result;
    }

    /**
     ** update_mahasiswa
     * @param  array $data
     * TODO: Memperbarui data mahasiswa 
     */
    public function update_mahasiswa($data)
    {
        $id     = $data['id'];
        $nim    = $data['nim'];
        $nama   = $data['nama'];
        $umur   = $data['umur'];
        $foto   = $data['foto'];
        $sql    = 'UPDATE mahasiswa 
                        SET Nama=:nama:, Umur=:umur:, NIM=:nim:, Foto=:foto:
                        WHERE id =:id:';
        $result = $this->db->query(
            $sql,
            [
                'id'    => $id,
                'nama'  => $nama,
                'nim'   => $nim,
                'umur'  => $umur,
                'foto'  => $foto,
            ]
        );

        return $result;
    }
}
