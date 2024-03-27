<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model

{
    public function DataDosen()
    {
        return $this->db->table('tbl_dosen')
            ->where('nidn', session()->get('username'))
            ->get()->getRowArray();
    }
    public function JadwalDosen($id_dosen)

    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum','left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            // ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->where('tbl_jadwal.id_dosen', $id_dosen)
            // ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)

    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum','left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas = tbl_prodi.id_fakultas', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            // ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getRowArray();
    }
    public function mhs($id_jadwal)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs', 'left')
            ->join('tbl_range_nilai', 'tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum', 'left')
            ->select('tbl_krs.id_mhs, tbl_krs.id_krs, tbl_mhs.nim, tbl_mhs.nama_mhs, tbl_krs.nilai, tbl_range_nilai.nilai_huruf, 
            tbl_krs.p1, tbl_krs.p2, tbl_krs.p3, tbl_krs.p4, tbl_krs.p5, tbl_krs.p6, tbl_krs.p7, tbl_krs.p8, tbl_krs.p9, tbl_krs.p10,
            tbl_krs.p11, tbl_krs.p12, tbl_krs.p13, tbl_krs.p14, tbl_krs.p15, tbl_krs.p16')
            ->where('id_jadwal', $id_jadwal)
            // ->orderBy('tbl_matkul.smt', 'ASC')
            ->groupBy('tbl_krs.id_krs')
            ->get()->getResultArray();
    }
    public function SimpanAbsen($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }
    public function SimpanNilai($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }

    public function allData()
    {
        return $this->db->table('tbl_range_nilai')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_range_nilai.id_prodi', 'left')
            ->get()->getResultArray();
    }
}
