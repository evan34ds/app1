<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\Database\BaseBuilder;
use CodeIgniter\Database\MySQLi\Builder;

class ModelAdmin extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function aktif_mhs_prodi()
    {
        $query = $this->db->query("SELECT
        h.id_mhs,
         h.nama_mhs,
         h.nim,
         i.jenjang,
         i.prodi,
         t.status,
         COUNT(DISTINCT h.id_mhs) as hitung_aktif
    
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
    INNER JOIN tbl_kelas_perkuliahan AS o
    ON
        j.id_kelas_perkuliahan = o.id_kelas_perkuliahan   

        INNER JOIN tbl_kurikulum AS kur
    ON
        kur.id_kurikulum = o.id_kurikulum   
    INNER JOIN tbl_matkul AS u
    ON
        kur.id_matkul = u.id_matkul
     INNER JOIN tbl_ta AS t
     ON
         k.id_ta = t.id_ta
         
         WHERE t.status= '1'
         
         GROUP BY
         
         i.id_prodi;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function jml_gedung()
    {
        return $this->db->table('tbl_gedung')
            ->countAll();
    }

    public function jml_ruangan()
    {
        return $this->db->table('tbl_ruangan')
            ->countAll();
    }
    public function jml_fakultas()
    {
        return $this->db->table('tbl_fakultas')
            ->countAll(); // Menghitung jumlah keseluruhan tabel codeignter =>> Working With Databases >> Query Builder Class >> $builder->countAll
    }
    public function jml_prodi()
    {
        return $this->db->table('tbl_prodi')
            ->countAll();
    }
    public function jml_dosen()
    {
        return $this->db->table('tbl_dosen')
            ->countAll();
    }
    public function jml_mhs()
    {
        return $this->db->table('tbl_mhs')
            ->countAll();
    }
    public function jml_matkul()
    {
        return $this->db->table('tbl_matkul')
            ->countAll();
    }
    public function jml_user()
    {
        return $this->db->table('tbl_user')
            ->countAll();
    }

    public function slider()
    {
        return $this->db->table('tbl_slider')
            ->get()->getResultArray();
    }

    public function grafik()
    {
        return $this->db->table('tbl_grafik')
            ->get()->getResultArray();
    }

    public function prodi_fakultas()
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas = tbl_prodi.id_fakultas', 'left')
            ->orderBy('tbl_fakultas.id_fakultas', 'ASC')
            ->get()->getResultArray();
    }
    public function allData($id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->where('tbl_jadwal.id_prodi', $id_prodi)
            ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getResultArray();
    }
    public function matkul($id_prodi)
    {
        return $this->db->table('tbl_matkul')
            ->where('id_prodi', $id_prodi)
            //  ->orderBy('smt', 'ASC') //pengurutan data tabel
            ->get()->getResultArray();
    }
    public function kelas($id_prodi)
    {
        return $this->db->table('tbl_kelas')
            ->where('id_prodi', $id_prodi)
            ->orderBy('nama_kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function jumlah_mata_kuliah_kontrak($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->select('tbl_matkul.kode_matkul,tbl_matkul.sks, tbl_matkul.smt,tbl_matkul.matkul, tbl_dosen.nama_dosen, tbl_jadwal.id_prodi, tbl_jadwal.id_jadwal, tbl_prodi.kode_prodi, tbl_kelas_perkuliahan.nama_kelas_perkuliahan, tbl_ruangan.ruangan, tbl_jadwal.hari,tbl_jadwal.waktu, tbl_jadwal.quota')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan=tbl_jadwal.id_kelas_perkuliahan', 'left') //menampilkan kelas
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi', 'left') //menampilkan pembimbing akaademik
            // ->orderBy('id_mhs', 'DESC')
            ->where('tbl_jadwal.id_ta', $id_ta) //sesuaikan dengan id_ta di tabel jadwal
            ->where('tbl_jadwal.id_prodi', $id_prodi) //sesuaikan dengan id_prodi di tabel jadwal
            ->get()->getResultArray();
    }


    public function DataMhs($id_prodi)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_prodi.id_prodi', $id_prodi) //Filter Bedarsarkan id Prodi
            ->get()->getRowArray();
    }
    public function DataKrs($id_jadwal, $id_ta) // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    {
        return $this->db->table('tbl_krs')

            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left') //menampilkan fakultas
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left') //menampilkan matkul
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left') //menampilkan fakultas
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->where('id_jadwal', $id_jadwal) //mata kulia tampil krs sesuai nim 
            ->where('tbl_krs.id_ta', $id_ta) //jika tahun akademik di rubah maka isi krs berubah
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan fakultas

            ->get()->getResultArray();
    }
    public function DataProdi($id_prodi)
    {
        return $this->db->table('tbl_prodi')
            ->join('tbl_mhs', 'tbl_mhs.id_prodi=tbl_prodi.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_prodi.id_prodi', $id_prodi) //Filter Bedarsarkan id Prodi
            ->get()->getRowArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left') //menampilkan fakultas
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left')
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_prodi ', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->where('tbl_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }



    public function Data_mahasiswa_transkip($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_mhs.id_mhs', $id_mhs) //Filter Bedarsarkan id Prodi
            ->get()->getRowArray();
    }

    public function Matkulditawarkan($id_prodi)
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan=tbl_jadwal.id_kelas_perkuliahan', 'left') //menampilkan fakultas
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left') //menampilkan matkul
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_jadwal.id_dosen', 'left') //menampilkan pembimbing akaademik
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_jadwal.id_prodi', 'left') //menampilkan pembimbing akaademik
            ->where('tbl_jadwal.id_prodi', $id_prodi) //Filter Bedarsarkan id Prodi
            ->get()->getResultArray();
    }

    public function Datamatkul($id_mhs) // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    {
        return $this->db->table('tbl_krs')
            ->select('tbl_matkul.kode_matkul, tbl_matkul.matkul,tbl_matkul.sks,tbl_matkul.smt,tbl_kelas_perkuliahan.nama_kelas_perkuliahan,tbl_dosen.nama_dosen,tbl_krs.nilai,tbl_range_nilai.nilai_huruf,tbl_range_nilai.nilai_index,tbl_mhs.id_mhs, tbl_jadwal.id_jadwal, tbl_ta.ta,tbl_ta.semester')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left') //menampilkan fakultas
            ->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan=tbl_jadwal.id_kelas_perkuliahan', 'left') //menampilkan fakultas
            ->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_kurikulum.id_matkul', 'left') //menampilkan matkul
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left') //menampilkan fakultas
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_krs.id_ta', 'left')
            ->join('tbl_mhs','tbl_mhs.id_mhs=tbl_krs.id_mhs','left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_range_nilai', 'tbl_range_nilai.id_prodi=tbl_prodi.id_prodi', 'left')
            ->WHERE('tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum')
            ->where('tbl_mhs.id_mhs', $id_mhs) //mata kulia tampil krs sesuai nim 
            ->orderBy('ta', 'ASC')
            ->get()->getResultArray();
    }

    public function Datamhs_hitug_aktivitas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }
    public function hitung_aktivitas_mhs($id_ta, $id_prodi)
    {
        return $this->db->table('tbl_krs')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_krs.id_ta', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left') //menampilkan matkul
            //->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_krs.id_mhs', 'left') //menampilkan kela
            // ->orderBy('id_mhs', 'DESC')
            ->where('tbl_jadwal.id_ta', $id_ta) //sesuaikan dengan id_ta di tabel jadwal
            ->where('tbl_jadwal.id_prodi', $id_prodi) //sesuaikan dengan id_prodi di tabel jadwal
            ->get()->getResultArray();
    }

    public function hitung_aktivitas_mhs1()

    {
        $query = $this->db->query("SELECT
        i.id_mhs,
        i.nim,
        i.nama_mhs,
        a.prodi,
        a.jenjang,
        SUM(mat.sks) sks
    FROM
        tbl_krs AS u
    INNER JOIN tbl_ta USING(id_ta)
    INNER JOIN tbl_jadwal USING(id_jadwal)
    INNER JOIN tbl_mhs USING(id_mhs)
    INNER JOIN tbl_mhs AS i
    ON
        u.id_mhs = i.id_mhs
    INNER JOIN tbl_prodi AS a
    ON
        i.id_prodi = a.id_prodi
    INNER JOIN tbl_jadwal AS jad
    ON 
        jad.id_jadwal = u.id_jadwal
    
    INNER JOIN tbl_kelas_perkuliahan AS m
    ON	
        jad.id_kelas_perkuliahan = m.id_kelas_perkuliahan

        INNER JOIN tbl_kurikulum AS kur
    ON	
        m.id_kurikulum = kur.id_kurikulum 
       
        INNER JOIN tbl_matkul AS mat
    ON 
        mat.id_matkul =  kur.id_matkul
    
    WHERE
    STATUS
        = '1'
    GROUP BY
        id_mhs;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function hitung_aktivitas_mhs2()
    {
        $query = $this->db->query("SELECT h.nama_mhs, h.nim, i.jenjang, i.prodi, SUM(ma.sks) ce
        
        FROM
            tbl_krs AS k
        INNER JOIN tbl_mhs AS h
        ON
            k.id_mhs = h.id_mhs
        INNER JOIN tbl_prodi AS i
        ON
            i.id_prodi = h.id_prodi
        INNER JOIN tbl_jadwal AS jadw
        ON
            k.id_jadwal = jadw.id_jadwal
           
            INNER JOIN tbl_kelas_perkuliahan AS per
        ON
            per.id_kelas_perkuliahan = jadw.id_kelas_perkuliahan

            INNER JOIN tbl_kurikulum AS kuri
        ON
            kuri.id_kurikulum = per.id_kurikulum

        INNER JOIN tbl_matkul AS ma
        ON
            kuri.id_matkul = ma.id_matkul
        INNER JOIN tbl_ta AS t
        ON
            k.id_ta = t.id_ta
        
        GROUP BY
            h.id_mhs
        ORDER BY
            h.id_mhs;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function hitung_aktivitas_mhs4()
    {
        $query = $this->db->query("SELECT
        h.id_mhs,
        h.nama_mhs,
        h.nim,
        i.jenjang,
        i.prodi,
        t.status,
        SUM(u.sks) ba,
        SUM(IF(
    STATUS LIKE 1,
        u.sks,
        0
    )) Total
    FROM
        tbl_krs AS k
    INNER JOIN tbl_mhs AS h
    ON
        k.id_mhs = h.id_mhs
    INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi
   
        INNER JOIN tbl_jadwal AS jadwa
    ON
        k.id_jadwal = jadwa.id_jadwal

        
    INNER JOIN tbl_kelas_perkuliahan AS perk
    ON
    jadwa.id_kelas_perkuliahan = perk.id_kelas_perkuliahan
   
    INNER JOIN tbl_kurikulum AS kuriku
    ON
    kuriku.id_kurikulum = perk.id_kurikulum


    INNER JOIN tbl_matkul AS u
    ON
        kuriku.id_matkul = u.id_matkul

    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
    GROUP BY
        k.id_mhs
        
        UNION ALL
        
        SELECT
        h.id_mhs,
        h.nama_mhs,
        h.nim,
        i.jenjang Jenjang,
        i.prodi prodi,
         SUM(0) AS status,
        SUM(0) ba,
        SUM(0) Total
    FROM
        tbl_mhs AS h
        
        INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi
        
     WHERE NOT EXISTS (SELECT * FROM tbl_krs as k WHERE h.id_mhs = k.id_mhs)
    
     
    GROUP BY
        h.id_mhs;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function hitung_aktivitas_mhs3()
    {
        $query = $this->db->query("SELECT h.nama_mhs,h.nim, i.jenjang, i.prodi,
        SUM(m.sks) sks
    FROM
        tbl_krs AS k
    INNER JOIN tbl_mhs AS h
    ON
        k.id_mhs = h.id_mhs
    INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi

    INNER JOIN tbl_jadwal AS jadwa
    ON
        k.id_jadwal = jadwa.id_jadwal

        INNER JOIN tbl_kelas_perkuliahan AS per
    ON
        jadwa.id_kelas_perkuliahan = per.id_kelas_perkuliahan

        INNER JOIN tbl_kurikulum AS kurikul
    ON
        kurikul.id_kurikulum = per.id_kurikulum

    INNER JOIN tbl_matkul AS m
    ON
    kurikul.id_matkul = m.id_matkul
    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
    GROUP BY
        h.id_mhs
        
    UNION ALL
    
    SELECT h.nama_mhs, h.nim, i.jenjang, i.prodi,
        SUM(m.sks) jml_sks
    FROM
        tbl_krs AS k
    INNER JOIN tbl_mhs AS h
    ON
        k.id_mhs = h.id_mhs
    INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi
    INNER JOIN tbl_jadwal AS wal
    ON
        k.id_jadwal = wal.id_jadwal
        INNER JOIN tbl_kelas_perkuliahan AS per
    ON
        wal.id_kelas_perkuliahan = per.id_kelas_perkuliahan
        
        INNER JOIN tbl_kurikulum AS kurikul
    ON
        kurikul.id_kurikulum = per.id_kurikulum


        INNER JOIN tbl_matkul AS m
    ON
    kurikul.id_matkul = m.id_matkul
    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
    WHERE
    STATUS
        = '1'
    GROUP BY
        h.id_mhs;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function aktif_mhs()
    {
        $query = $this->db->query("SELECT
        h.id_mhs,
        h.nama_mhs,
        h.nim,
        i.jenjang,
        i.prodi,
        t.status,
        SUM(u.sks) ba,
        SUM(IF(
    STATUS LIKE 1,
        u.sks,
        0
    )) Total, COUNT(IF(
    STATUS LIKE 1,
        k.id_mhs,
        0
    )) Total,
  IF(t.status =0,'AKTIF',IF(t.status=1,'AKTIF','AKTIF')) AS nilai_huruf
   
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
    INNER JOIN tbl_kelas_perkuliahan AS o
    ON
        j.id_kelas_perkuliahan = o.id_kelas_perkuliahan 

         INNER JOIN tbl_kurikulum AS kur
    ON
        kur.id_kurikulum = o.id_kurikulum   
    INNER JOIN tbl_matkul AS u
    ON
        kur.id_matkul = u.id_matkul
    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
        
        WHERE t.status= '1'
        
        GROUP BY
        
        id_mhs;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }




    public function DataKrsAktivitas($id_ta) // tmbahan $id_tajika tahun akademik di rubah maka isi krs berubah
    // cara relasi tabel ke tiga tabel 
    {

        return $this->db->table('tbl_krs')

            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_krs.id_jadwal', 'left',) //menampilkan fakultas
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_krs.id_mhs', 'left') //menampilkan fakultas
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_krs.id_ta', 'left') //menampilkan fakultas
            ->join('tbl_matkul', 'tbl_matkul.id_matkul=tbl_jadwal.id_matkul', 'left') //menampilkan matkul
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_jadwal.id_kelas', 'left') //menampilkan fakultas
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan fakultas
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan=tbl_jadwal.id_ruangan', 'left') //menampilkan fakultas
            ->groupBy('tbl_krs.id_mhs') //jika tahun akademik di rubah maka isi krs berubah   
            ->get()->getResultArray();
    }

    public function admin_khs($id_mhs, $id_ta)
    {
        $builder = $this->db->table('tbl_krs');
        $builder->select('tbl_matkul.kode_matkul,tbl_matkul.sks, tbl_matkul.smt,tbl_matkul.matkul,tbl_kelas_perkuliahan.nama_kelas_perkuliahan, tbl_krs.nilai,tbl_dosen.nama_dosen, tbl_range_nilai.nilai_huruf, tbl_range_nilai.nilai_index');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs', 'left');
        $builder->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_krs.id_jadwal', 'left');
        $builder->join('tbl_kelas_perkuliahan', 'tbl_kelas_perkuliahan.id_kelas_perkuliahan = tbl_jadwal.id_kelas_perkuliahan', 'left');
        $builder->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum=tbl_kelas_perkuliahan.id_kurikulum', 'left');
        $builder->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_kurikulum.id_matkul', 'left');
        $builder->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi', 'left');
        $builder->join('tbl_range_nilai', 'tbl_range_nilai.id_prodi =tbl_mhs.id_prodi', 'left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta =tbl_krs.id_ta', 'inner');
        $builder->where('tbl_mhs.id_mhs', $id_mhs);
        $builder->where('tbl_ta.id_ta', $id_ta);
        $builder->WHERE('tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum');
        $query = $builder->get();
        return $query;
    }

    public function Data_mahasiswa_khs($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_mhs.id_mhs', $id_mhs) //Filter Bedarsarkan id Prodi
            ->get()->getRowArray();
    }

    public function daftar_slider()
    {
        return $this->db->table('tbl_slider')
            ->orderBy('id', 'DESC')
            ->get()->getResultArray();
    }

    public function add_slider($data)
    {
        $this->db->table('tbl_slider')->insert($data);
    }

    public function detail_data($id)
    {
        return $this->db->table('tbl_slider')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_slider')
            ->where('id', $data['id'])
            ->delete($data);
    }
    public function data_dosen()
    {
        return $this->db->table('tbl_dosen')
            ->orderBy('id_dosen', 'DESC')
            ->get()->getResultArray();
    }

    public function DataJadwal()
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
            ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
            ->orderBy('tbl_matkul.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function edit($data)
    {
        $this->db->table('tbl_slider')
            ->where('id', $data['id'])
            ->update($data);
    }



    public function jumlah_prodi()
    {
        $builder = $this->db->table('tbl_mhs');
        //  $builder->select('tgl_masuk, COUNT("tgl_masuk") AS jumlah');    
        $builder->select('tbl_prodi.prodi, COUNT("id_prodi") AS jumlah');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left');
        $builder->groupBy('tbl_prodi.id_prodi');
        $query = $builder->get();
        return $query;
    }

    public function tampilkan_mhs_tidak_aktif()
    {
        $query = $this->db->query("SELECT * FROM tbl_mhs WHERE NOT EXISTS (SELECT * FROM tbl_krs WHERE tbl_mhs.id_mhs = tbl_krs.id_mhs)
        ;");
        //menghitung jumlah sks berdasrakan hari
        return $query;
    }
}
