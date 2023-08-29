<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model

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


    public function allData()
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
            ->orderBy('tbl_kelas.id_prodi ', 'ASC')
            ->get()->getResultArray();
    }

    public function allData_MatkulKurikulum()
    {
        return $this->db->table('tbl_kurikulum')
            ->select('tbl_kurikulum.id_kurikulum,tbl_kurikulum.id_matkul,tbl_kurikulum.nama_kurikulum, tbl_matkul.matkul, tbl_prodi.prodi')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_matkul.id_prodi', 'left')
            ->where('tbl_kurikulum.id_matkul IS NOT NULL') //data nul di tabel kurikulum tidak di tampilkan
            ->orderBy('tbl_kurikulum.id_matkul', 'DESC')
            ->get()->getResultArray();
    }
    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }
    public function edit($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }

    public function delete_data_perkuliahan($data)
    {
        $this->db->table('tbl_kelas_perkuliahan')
            ->where('id_kelas_perkuliahan', $data['id_kelas_perkuliahan'])
            ->delete($data);
    }
    //menampilkan mahasiswa berdasakan kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->where('id_kelas', $id_kelas)
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    //menampilkan mahasiswa suda mempunyai kelas
    public function mhs_tidak_ada_kelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    //filter menampilkan mahasiswa belum mempunyai kelas (persiapan untuk dosen pa)
    public function mhs_mempunyai_kelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
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

    //menentukan jumlah mahasiswa
    public function update_mhs1($data)
    {
        $this->db->table('tbl_mhs')
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }

    public function allData_kelas_perkuliahan()
    {
        return $this->db->table('tbl_kelas_perkuliahan')
            ->select('tbl_kelas_perkuliahan.id_kelas_perkuliahan, tbl_kelas_perkuliahan.Kode_Kelas_Perkuliahan, tbl_matkul.matkul, tbl_kelas_perkuliahan.nama_kelas_perkuliahan,
             tbl_prodi.id_prodi, tbl_prodi.prodi,tbl_dosen.nama_dosen,tbl_kelas_perkuliahan.tanggal_mulai,tbl_kelas_perkuliahan.
             tanggal_akhir,tbl_ta.ta, tbl_ta.semester') // Menyebutkan 'id_prodi' dalam select
            ->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_jadwal', 'tbl_jadwal.id_kelas_perkuliahan = tbl_kelas_perkuliahan.id_kelas_perkuliahan', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_kelas_perkuliahan.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas_perkuliahan.id_dosen', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta= tbl_kelas_perkuliahan.id_ta', 'left')
            //   ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_perkuliahan.id_mhs', 'left')
            ->orderBy('tbl_kelas_perkuliahan.kode_kelas_perkuliahan', 'ASC')
            ->groupBy('tbl_kelas_perkuliahan.kode_kelas_perkuliahan')
            ->get()->getResultArray();
    }

    public function add_kelas_perkuliahan($data)
    {
        $this->db->table('tbl_kelas_perkuliahan')->insert($data);
    }
    public function detail_kelas_perkuliahan($Kode_Kelas_Perkuliahan)
    {
        return $this->db->table('tbl_kelas_perkuliahan')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_perkuliahan.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas_perkuliahan.id_dosen', 'left')
            ->where('Kode_Kelas_Perkuliahan', $Kode_Kelas_Perkuliahan)
            ->get()->getRowArray();
    }

    public function jml_mhs_kelas_perkuliahan($kode_kelas_perkuliahan)
    {
        return $this->db->table('tbl_kelas_perkuliahan')
            ->where('kode_kelas_perkuliahan', $kode_kelas_perkuliahan)
            ->countAllResults();
    }

    public function hapus_mahasiswa_kelas_perkuliahan($kode_kelas_perkuliahan)
    {
        return $this->db->table('tbl_kelas_perkuliahan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_perkuliahan.id_mhs', 'left')
            ->where('kode_kelas_perkuliahan', $kode_kelas_perkuliahan)
            ->where('tbl_kelas_perkuliahan.id_mhs IS NOT NULL') //tidak menampilkan data null
            ->orderBy('nim', 'DESC')
            ->get()->getResultArray();
    }

    public function mhs_kelas_perkuliahan()
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_mhs', 'tbl_mhs.id_prodi=tbl_prodi.id_prodi', 'left')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_prodi=tbl_prodi.id_prodi', 'left')
            ->select('tbl_mhs.id_mhs,tbl_mhs.nim, tbl_prodi.id_prodi, tbl_prodi.prodi, tbl_mhs.nama_mhs, tbl_kelas_perkuliahan.Kode_Kelas_Perkuliahan')
            ->orderBy('nim', 'DESC')
            ->groupBy('tbl_mhs.id_mhs')
            ->get()->getResultArray();
    }
    public function tambah_mahasiswa_kelas_perkuliahan($data)
    {
        return $this->db->table('tbl_kelas_perkuliahan')->insert($data);
    }

    public function hapus_update_mhs_kelas_perkuliahan($data)
    {
        $this->db->table('tbl_kelas_perkuliahan')
            ->where('id_kelas_perkuliahan', $data['id_kelas_perkuliahan'])
            ->delete($data);
    }
}
