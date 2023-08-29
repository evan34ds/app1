<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKhs extends Model
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
    public function Matkulditawarkan($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi', 'left') //menampilkan pembimbing akaademik
            ->where('tbl_jadwal.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            ->where('tbl_jadwal.id_prodi', $id_prodi) //Filter Bedarsarkan id Prodi
            ->get()->getResultArray();
    }

    public function DataKhs($id_mhs, $id_ta) // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    {
        $builder = $this->db->table('tbl_krs');
        $builder->select('tbl_matkul.kode_matkul,tbl_matkul.sks, tbl_matkul.smt,tbl_matkul.matkul,tbl_kelas_perkuliahan.nama_kelas_perkuliahan, tbl_krs.nilai,tbl_dosen.nama_dosen,tbl_ruangan.ruangan, tbl_range_nilai.nilai_huruf, tbl_range_nilai.nilai_index');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs','left');
        $builder->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_krs.id_jadwal', 'left');
        $builder->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left');
       $builder->join('tbl_kurikulum','tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum','left');
        $builder->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left');
        $builder->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan','left');
        $builder->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen','left');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi','left');
        $builder->join('tbl_range_nilai', 'tbl_range_nilai.id_prodi =tbl_mhs.id_prodi','left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta =tbl_krs.id_ta','inner');
        $builder->where('tbl_mhs.id_mhs', $id_mhs);
        $builder->where('tbl_ta.id_ta', $id_ta);
        $builder->WHERE ('tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum');
        $query = $builder->get();
        return $query;
    }
    public function DataKhs1() // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    {
 
        $query= $this->db->query("SELECT
        h.nama_mhs,
        t.status,
        k.id_mhs,
        h.nim,
        i.jenjang,
        i.prodi,
        u.matkul,
        k.nilai,
        u.sks,
        CASE WHEN k.nilai > 89 THEN 'A' WHEN k.nilai > 79 THEN 'AB' WHEN k.nilai > 69 THEN 'B' WHEN k.nilai > 59 THEN 'BC' WHEN k.nilai > 49 THEN 'BC' WHEN k.nilai >= 70 THEN 'C'
    END AS Huruf,   CASE WHEN k.nilai > 89 THEN '4.0' WHEN k.nilai > 79 THEN '3.5' WHEN k.nilai > 69 THEN '3' WHEN k.nilai > 59 THEN '2.5' WHEN k.nilai > 49 THEN '2' WHEN k.nilai >= 70 THEN '1'
    END AS index_prestasi
    
    FROM
        tbl_krs AS k
    INNER JOIN tbl_mhs AS h
    ON
        k.id_mhs = h.id_mhs
    INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi
    INNER JOIN tbl_jadwal AS j
    ON
        k.id_jadwal = j.id_jadwal
    INNER JOIN tbl_matkul AS u
    ON
        j.id_matkul = u.id_matkul
    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
        
        WHERE k.id_mhs AND t.status='1';");
          
      //menghitung jumlah sks berdasrakan hari
        return $query;

    }

    
}