<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model

{
    protected $table = 'tbl_mhs';
    protected $primaryKey = 'id_mhs';
    protected $allowedFields = ['id_mhs', 'nama_mhs', 'id_prodi'];


    // tambahkan field lainnya yang diperlukan

    public function DataMhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->get()->getRowArray();
    }
    public function allData()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_mhs.id_ta', 'left')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function akses_fitur_mhs() // satu
    {
        return $this->db->table('tbl_akses_fitur')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_akses_fitur.id_mhs', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta =tbl_akses_fitur.id_ta', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi', 'left')
            ->where('tbl_ta.status', 1)
            ->groupBy('tbl_akses_fitur.id_akses_fitur_mhs')
            ->get()->getResultArray();
    }

    public function akses_fitur_mhs1()
    {
        return $this->db->table('tbl_akses_fitur')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_akses_fitur.id_mhs', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta =tbl_akses_fitur.id_ta', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi', 'left')
            ->where('tbl_ta.status', 1)
            ->get()->getResultArray();
    }

    public function detailData($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_mhs.id_ta', 'left')
            ->where('id_mhs', $id_mhs)
            ->get()->getRowArray();
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_mhs')
            ->where('id_mhs', $data['id_mhs'])
            ->delete($data);
    }
    public function add($data)
    {
        $this->db->table('tbl_mhs')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_mhs')
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }
    public function delete_data_akses_fitur($data)
    {
        $this->db->table('tbl_akses_fitur')
            ->where('id_akses_fitur_mhs', $data['id_akses_fitur_mhs'])
            ->delete($data);
    }

    public function data_mhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_akses_fitur', 'tbl_akses_fitur.id_mhs=tbl_mhs.id_mhs', 'left')
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function data_mhs_tambah() // dua
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function findNim($id_mhs)
    {
        $query = $this->db->table('tbl_mhs')
            ->select('nim')
            ->where('id_mhs', $id_mhs)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->nim;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }
    public function getMahasiswaById($id_mhs)
    {
        return $this->find($id_mhs);
    }

    public function mhs($id_ta)
    {
        return $this->db->table('tbl_akses_fitur')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_akses_fitur.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta =tbl_akses_fitur.id_ta', 'left')
            ->select('tbl_akses_fitur.id_mhs, tbl_akses_fitur.id_akses_fitur_mhs, tbl_akses_fitur.khs, tbl_akses_fitur.id_krs')
            ->where('tbl_akses_fitur.id_ta', $id_ta)
            ->groupBy('tbl_akses_fitur.id_akses_fitur_mhs')
            ->get()->getResultArray();
    }


    public function Simpan_fitur_Data_Mhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->get()->getRowArray();
    }

    public function Simpan_akses_fitur($data)
    {
        $this->db->table('tbl_akses_fitur')
            ->where('id_akses_fitur_mhs', $data['id_akses_fitur_mhs'])
            ->update($data);
    }

    public function Tambah_mhs_status($data)
    {
        return $this->db->table('tbl_akses_fitur')->insertBatch($data);
    }

    public function Tambah_mhs_status1($data)
    {
        return $this->db->table('tbl_kelas_pembayaran')->insertBatch($data);
    }
}
