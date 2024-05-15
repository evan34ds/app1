<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBobotNilai extends Model

{
    public function allData($id_prodi)
    {
        return $this->db->table('tbl_range_nilai')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_range_nilai.id_prodi', 'left')
            ->where('tbl_range_nilai.id_prodi', $id_prodi)
            ->where('tbl_range_nilai.nilai_huruf IS null')
            ->orderBy('tbl_range_nilai.nilai_huruf', 'ASC')
            ->get()->getResultArray();
    }
    public function detail_bobot_nilai($kode_range_nilai)
    {
        return $this->db->table('tbl_range_nilai')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_range_nilai.id_prodi', 'left')
            ->where('tbl_range_nilai.kode_range_nilai', $kode_range_nilai)
            ->where('tbl_range_nilai.nilai_huruf IS not null')
            ->orderBy('tbl_range_nilai.nilai_huruf', 'ASC')
            ->get()->getResultArray();
    }

    public function delete_daftar_bobot_nilai($data)
    {
        $this->db->table('tbl_range_nilai')
            ->where('id_range_nilai', $data['id_range_nilai'])
            ->delete($data);
    }
    public function edit_detail_bobot_nilai($data)
    {
        $this->db->table('tbl_range_nilai')
            ->where('id_range_nilai', $data['id_range_nilai'])
            ->update($data);
    }

    public function findProdi($kode_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->select('id_prodi')
            ->where('kode_range_nilai', $kode_range_nilai)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_prodi;
        }

    }

    public function findTanggalMulai($kode_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->select('tanggal_mulai')
            ->where('kode_range_nilai', $kode_range_nilai)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->tanggal_mulai;
        }

    }

    public function findTanggalAkhir($kode_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->select('tanggal_akhir')
            ->where('kode_range_nilai', $kode_range_nilai)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->tanggal_akhir;
        }

    }

    public function findProdiid($id_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->select('id_prodi')
            ->where('id_range_nilai', $id_range_nilai)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_prodi;
        }

    }

    public function findRangeid($kode_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->selectCount('tbl_range_nilai.kode_range_nilai')
            ->where('kode_range_nilai', $kode_range_nilai)
            ->where('tbl_range_nilai.nilai_huruf IS not NULL')
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->kode_range_nilai;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findKode($id_range_nilai)
    {
        $query = $this->db->table('tbl_range_nilai')
            ->select('kode_range_nilai')
            ->where('id_range_nilai', $id_range_nilai)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->kode_range_nilai;
        }

    }

    public function simpan_bobot_nilai($data)
    {
        $this->db->table('tbl_range_nilai')->insert($data);
    }


}
