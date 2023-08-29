<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalKuliah extends Model

{
    public function allData($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum','left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->where('tbl_jadwal.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function kelas($id_prodi)
    {
        return $this->db->table('tbl_kelas_perkuliahan')
            ->where('Kode_Kelas_Perkuliahan', $id_prodi)
            ->orderBy('nama_kelas_perkuliahan', 'ASC')
            ->get()->getResultArray();
    }
    public function matkul($id_prodi)
    {
        return $this->db->table('tbl_matkul')
            ->where('id_prodi', $id_prodi)
            //  ->orderBy('smt', 'ASC') //pengurutan data tabel
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }
    //menampilkan mahasiswa berdasakan kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_mhs.id_jadwal', 'left')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    //menampilkan mahasiswa belum mempunyai kelas
    public function mhs_tidak_ada_kelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_mhs.id_jadwal', 'left')
            ->where('id_kelas', null)
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    //menentukan jumlah mahasiswa
    public function jml_mhs($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }
    //menentukan jumlah mahasiswa
    public function update_mhs($data)
    {
        $this->db->table('tbl_mhs')
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }
    public function allData_kelas_perkuliahan($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_kelas_perkuliahan')
        ->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum','ledt')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_kelas_perkuliahan.id_ta', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_perkuliahan.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas_perkuliahan.id_dosen', 'left')
            //   ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_perkuliahan.id_mhs', 'left')
            ->orderBy('tbl_kelas_perkuliahan.kode_kelas_perkuliahan', 'ASC')
            ->where('tbl_kelas_perkuliahan.id_prodi', $id_prodi)
            ->where('tbl_kelas_perkuliahan.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            //   ->where('tbl_kelas_perkuliahan.id_mhs IS NULL') //yang di tampilkan yang id_mhs null sehingga kode_kelas_perkuliahan lain tidak muncul 
            ->get()->getResultArray();
    }
}
