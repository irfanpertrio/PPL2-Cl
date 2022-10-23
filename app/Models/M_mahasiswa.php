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
     ** get_nama_depan_mahasiswa
     * TODO: Menampilkan data nama depan semua Mahasiswa
     */
    public function get_nama_depan_mahasiswa()
    {
        $data = $this->db->query("SELECT substring_index(Nama,' ',1)
                                        AS Nama
                                        FROM mahasiswa
                                        ORDER BY Nama")->getResultArray();
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
        $nim            = $data['NIM'];
        $nama           = $data['Nama'];
        $umur           = $data['Umur'];
        $foto           = $data['Foto'];

        $berkasFoto     = $foto;
        $namaFileFoto   = $berkasFoto->getRandomName();
        $query          = $this->db->prepare(static function ($db) {
            return $db->table('mahasiswa')->insert([
                'Nama'  => '',
                'NIM'   => '',
                'Umur'  => '',
                'Foto'  => '',
            ]);
        });

        $result = $query->execute($nama, $nim, $umur, $namaFileFoto);
        if ($result) {
            $berkasFoto->move('images/mahasiswa/', $namaFileFoto);
        }

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

        $berkasFoto = $foto;
        $namaFileFoto = $berkasFoto->getRandomName();
        if ($foto->getName() !== "") {
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
                    'foto'  => $namaFileFoto,
                ]
            );
            if ($result) {
                $berkasFoto->move('images/mahasiswa/', $namaFileFoto);
                if ($data['foto_lama'] !== "") {
                    unlink('./images/mahasiswa/' . $data['foto_lama']);
                }
            }
        } else {
            $sql    = 'UPDATE mahasiswa 
                            SET Nama=:nama:, Umur=:umur:, NIM=:nim:
                            WHERE id =:id:';
            $result = $this->db->query(
                $sql,
                [
                    'id'    => $id,
                    'nama'  => $nama,
                    'nim'   => $nim,
                    'umur'  => $umur,
                ]
            );
        }

        return $result;
    }

    /**
     ** delete_mahasiswa
     * @param  array $mahasiswa
     * TODO: Menghapus data mahasiswa 
     */
    function deleteMahasiswa($mahasiswa)
    {
        if ($mahasiswa['Foto'] !== null) {
            unlink('./images/mahasiswa/' . $mahasiswa['Foto']);
        }

        $id = $mahasiswa['id'];
        $result = $this->db->query("DELETE FROM mahasiswa 
                                        WHERE id = '$id'");

        return $result;
    }
}
