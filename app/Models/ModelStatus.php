<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStatus extends Model
{
    public function DataMhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->orderBy('id_mhs', 'DESC')
            ->where('nim', session()->get('username')) //contohnya d ambil dari session mahasiswa Auth
            ->get()->getRowArray();
    }

    public function TambahStatus($data)
    {
        return $this->db->table('tbl_status_mhs')->insert($data);
    }

}