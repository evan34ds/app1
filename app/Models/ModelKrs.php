<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{
    protected $table = 'tbl_krs';
    protected $primaryKey = 'id_krs'; // Ganti dengan primary key yang sesuai
    protected $allowedFields = ['id_jadwal', 'id_ta', 'id_mhs']; // Ganti dengan kolom yang sesuai

    public function DataMhs()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_akses_fitur', 'tbl_akses_fitur.id_mhs=tbl_mhs.id_mhs', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_akses_fitur.id_ta', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->where('status', 1)
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->where('nim', session()->get('username')) //contohnya d ambil dari session mahasiswa Auth
            ->get()->getRowArray();
    }

    public function findNameById($id_jadwal)
    {
        $query = $this->db->table('tbl_jadwal')
            ->select('matkul')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan=tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get();
        $result = $query->getRow();

        if ($result !== null) {
            return $result->matkul;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }


    public function Matkulditawarkan($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->select('tbl_jadwal.id_jadwal,tbl_jadwal.id_ta,tbl_matkul.kode_matkul,tbl_matkul.matkul,tbl_matkul.sks,tbl_matkul.smt,tbl_prodi.kode_prodi, tbl_kelas_perkuliahan.nama_kelas_perkuliahan,tbl_ruangan.ruangan,tbl_dosen.nama_dosen,tbl_jadwal.waktu,tbl_jadwal.hari,tbl_jadwal.quota')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi', 'left') //menampilkan pembimbing akaademik
            ->where('tbl_jadwal.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            ->where('tbl_jadwal.id_prodi', $id_prodi) //Filter Bedarsarkan id Prodi
            ->get()->getResultArray();
    }
    public function TambahMatkul($data)
    {
        return $this->db->table('tbl_krs')->insert($data);
    }

    public function DataKrs($id_mhs, $id_ta) // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left') //menampilkan fakultas 
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->where('tbl_krs.id_mhs', $id_mhs) //mata kulia tampil krs sesuai nim 
            ->where('tbl_krs.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan fakultas
            ->get()->getResultArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_krs')
            ->where('id_krs', $data['id_krs'])
            ->delete($data);
    }
}
