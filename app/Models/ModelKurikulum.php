<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKurikulum extends Model

{
    protected $table = 'tbl_kurikulum';
    protected $primaryKey = 'id_kurikulum'; // Ganti dengan primary key yang sesuai
    protected $allowedFields = ['nama_kurikulum', 'id_ta', 'id_prodi', 'id_matkul', 'matkul']; // Ganti dengan kolom yang sesuai


    public function allData_kurikulum($id_prodi)
    {
        return $this->db->table('tbl_kurikulum')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kurikulum.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kurikulum.id_ta', 'left')
            ->where('tbl_kurikulum.id_prodi', $id_prodi) //jika tahun akademik di rubah maka isi krs berubah
            ->where('tbl_kurikulum.id_matkul', null) // menampilkan data yang null sehingga data banyak menjadi satu
            ->orderBy('tbl_ta.ta', 'ASC')
            ->get()->getResultArray();
    }

    public function allData_kurikulum_matakuliah($nama_kurikulum)
    {
        return $this->db->table('tbl_kurikulum')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kurikulum.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kurikulum.id_ta', 'left')
            ->where('tbl_kurikulum.nama_kurikulum', $nama_kurikulum) //jika tahun akademik di rubah maka isi krs berubah
            ->where('tbl_kurikulum.id_matkul IS NOT NULL') //data nul di tabel kurikulum tidak di tampilkan
            ->orderBy('tbl_ta.ta', 'ASC')
            ->get()->getResultArray();
    }
    public function allData_kurikulum_prodi_matkul($id_prodi)
    {
        return $this->db->table('tbl_matkul')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_matkul.id_prodi', 'left')
            ->where('tbl_matkul.id_prodi', $id_prodi) //jika tahun akademik di rubah maka isi krs berubah
            ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_kurikulum')->insert($data);
    }

    public function add_kurikulum_matkul($data)
    {
        $this->db->table('tbl_kurikulum')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kurikulum')
            ->where('id_kurikulum', $data['id_kurikulum'])
            ->delete($data);
    }

    public function findNameById($id_matkul)
    {
        $query = $this->db->table('tbl_matkul')
            ->select('matkul')
            ->where('id_matkul', $id_matkul)
            ->get();

        $result = $query->getRow();

        if ($result !== null) {
            return $result->matkul;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }
    public function nama_kurikulum($nama_kurikulum)
    {
        return $this->db->table('tbl_kurikulum')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kurikulum.id_ta', 'id_kurikulum')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_matkul.id_matkul', 'id_matkul')
            ->where('tbl_kurikulum.nama_kurikulum', $nama_kurikulum)
            ->get()->getRowArray();
    }
    public function totalsks_nama_kurikulum($nama_kurikulum)
    {
        return $this->db->table('tbl_kurikulum')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->selectSum('sks')
            ->where('tbl_kurikulum.nama_kurikulum', $nama_kurikulum)
            ->get()->getRowArray();
    }
}
