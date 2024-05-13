<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ModelPembayaran extends Model
{

    protected $table = 'tbl_kelas_pembayaran';


    public function allData()
    {
        return $this->db->table('tbl_pembayaran')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_pembayaran.id_ta', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_pembayaran.id_prodi', 'left')
            ->join('tbl_kategori_pembayaran', 'tbl_kategori_pembayaran.id_kategori_pembayaran=tbl_pembayaran.id_kategori_pembayaran', 'left')
            ->get()->getResultArray();
    }



    public function allData_kategori_pembayaran()
    {
        return $this->db->table('tbl_kategori_pembayaran')
            ->get()->getResultArray();
    }

    public function allData_mhs_pembayaran()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_mhs.id_ta', 'left')
            ->orderBy('id_mhs', 'DESC')

            ->get()->getResultArray();
    }

    public function akses_fitur_mhs($kode_kelas_pembayaran) // satu
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi', 'left')
            ->groupBy('tbl_kelas_pembayaran.id_kelas_pembayaran')
            ->where('tbl_kelas_pembayaran.kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get()->getResultArray();
    }

    public function allData_kelas_pembayaran()
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->get()->getResultArray();
    }

    public function allData_kelas_pembayaran_id($id_kelas_pembayaran)
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get()->getResultArray();
    }


    public function add($data)
    {
        $this->db->table('tbl_pembayaran')->insert($data);
    }

    public function add_kelas_pembayaran($data)
    {
        $this->db->table('tbl_kelas_pembayaran')->insert($data);
    }
    public function add_kategori_pembayaran($data)
    {
        $this->db->table('tbl_kategori_pembayaran')->insert($data);
    }

    public function allDataMatkul($id_prodi)
    {
        return $this->db->table('tbl_matkul')
            ->where('id_prodi', $id_prodi)
            ->orderBy('smt', 'ASC')
            ->get()->getResultArray();
    }

    public function delete_kategori_pembayaran($data)
    {
        $this->db->table('tbl_kategori_pembayaran')
            ->where('id_kategori_pembayaran', $data['id_kategori_pembayaran'])
            ->delete($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_pembayaran')
            ->where('id_pembayaran', $data['id_pembayaran'])
            ->delete($data);
    }


    public function delete_data_kelas_pembayaran($data)
    {
        $this->db->table('tbl_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $data['id_kelas_pembayaran'])
            ->delete($data);
    }

    public function detail_kelas_pembayaran($kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get()->getRowArray();
    }

    public function deta_kelas_pembayaran($kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->where('tbl_kelas_pembayaran.id_mhs IS not null')
            ->where('tbl_kelas_pembayaran.pelunasan IS null')
            ->get()->getResultArray();
    }

    public function data_mhs_tambah($id_prodi, $id_ta) // dua
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_mhs.id_ta', 'left')
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->where('tbl_mhs.id_prodi', $id_prodi)
            ->where('tbl_mhs.id_ta', $id_ta)
            ->get()->getResultArray();
    }

    public function data_pembayaran($id_mhs, $kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_mhs')
            ->select('tbl_kelas_pembayaran.kode_kelas_pembayaran, SUM(tbl_kelas_pembayaran.pelunasan) as total_pelunasan')
            ->join('tbl_kelas_pembayaran', 'tbl_kelas_pembayaran.id_mhs=tbl_mhs.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('tbl_mhs.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->where('tbl_kelas_pembayaran.id_mhs IS NOT NULL')
            ->groupBy('tbl_kelas_pembayaran.kode_kelas_pembayaran') // Group by kode_kelas_pembayaran
            ->get()->getRowArray();
    }



    public function data_pembayaran_pelunasan($id_mhs)
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->join('tbl_pembayaran', 'tbl_pembayaran.id_pembayaran=tbl_kelas_pembayaran.id_pembayaran', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_pembayaran.id_ta', 'left')
            ->where('tbl_mhs.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.pelunasan IS not null')
            ->get()->getResultArray();
    }

    public function daftar_pembayaran_pelunasan($id_mhs, $kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('tbl_kelas_pembayaran.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get()->getRowArray();
    }

    public function detail_pembayaran_mhs($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_mhs.id_mhs', $id_mhs) //Filter Bedarsarkan id mhs

            ->get()->getRowArray();
    }

    public function Data_mahasiswa_pembayaran($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left') //menampilkan pembimbing Prodi
            ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas=tbl_prodi.id_fakultas', 'left') //menampilkan fakultas
            ->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_mhs.id_kelas', 'left') //menampilkan kelas
            ->join('tbl_dosen', 'tbl_dosen.id_dosen=tbl_kelas.id_dosen', 'left') //menampilkan pembimbing 
            ->where('tbl_mhs.id_mhs', $id_mhs) //Filter Bedarsarkan id Prodi
            ->get()->getRowArray();
    }


    public function edit($data)
    {
        $this->db->table('tbl_pembayaran')
            ->where('id_pembayaran', $data['id_pembayaran'])
            ->update($data);
    }

    public function edit_kategori($data)
    {
        $this->db->table('tbl_kategori_pembayaran')
            ->where('id_kategori_pembayaran', $data['id_kategori_pembayaran'])
            ->update($data);
    }

    public function edit_pelunasan($data)
    {
        $this->db->table('tbl_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $data['id_kelas_pembayaran'])
            ->update($data);
    }


    public function findNameByPembayaran($id_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->selectCount('id_pembayaran')
            ->where('id_pembayaran', $id_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function  findJumlahKelasPembayaran($id_mhs, $kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->selectCount('kode_kelas_pembayaran')
            ->where('id_mhs', $id_mhs)
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->kode_kelas_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }


    public function findNameByKategoriPembayaran($id_kategori_pembayaran)
    {
        $query = $this->db->table('tbl_pembayaran')
            ->selectCount('id_kategori_pembayaran')
            ->where('id_kategori_pembayaran', $id_kategori_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_kategori_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findNameById($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->selectCount('id_mhs')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_mhs;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findjmlpelunasan($id_mhs, $kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_mhs')
            ->selectSum('tbl_kelas_pembayaran.pelunasan')
            ->join('tbl_kelas_pembayaran', 'tbl_kelas_pembayaran.id_mhs=tbl_mhs.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('tbl_mhs.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->where('tbl_kelas_pembayaran.pelunasan IS NULL')
            ->groupBy('tbl_kelas_pembayaran.kode_kelas_pembayaran') // Group by kode_kelas_pembayaran
            ->get()
            ->getResultArray();
    }

    public function findProdi($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_prodi')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_prodi;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findProdi_ko($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_prodi')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_prodi;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findKodeKelasPembayaran($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('kode_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->kode_kelas_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findKodeKelasPembayaranId_mhs($id_mhs)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('kode_kelas_pembayaran')
            ->where('id_mhs', $id_mhs)
            ->get();
        $results = $query->getResult(); // Corrected variable name from $result to $results
        if (!empty($results)) {
            $kode_kelas_pembayaran = array_column($results, 'kode_kelas_pembayaran');

            //Menampilkan array di browser
            //    echo '<pre>';
            //    print_r($kode_kelas_pembayaran);
            //    echo '</pre>';

            // Atau, jika Anda ingin menggunakan var_dump
            // var_dump($kode_kelas_pembayaran);

            return $kode_kelas_pembayaran;
        }

        return null;
    }

    public function findmhs($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_mhs')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_mhs;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }



    public function findidKelasPembayaranId_mhs($id_mhs)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_mhs')
            ->where('id_mhs', $id_mhs)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_mhs;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }


    public function findidKelasPembayaranId_kelas($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_mhs')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_mhs;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }



    public function findNamaKelas($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('nama_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->nama_kelas_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findNamaKelas_ko($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('nama_kelas_pembayaran')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->nama_kelas_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }



    public function findIdPembayaran($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_pembayaran')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findIdPembayaran_ko($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_pembayaran')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findIdPembayaran_id($kode_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_kelas_pembayaran')
            ->where('kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->where('tbl_kelas_pembayaran.id_mhs IS not null')
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_kelas_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }


    public function findIdTa($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_ta')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_ta;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }
    public function findbiaya($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('biaya')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->biaya;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }

    public function findkategori_pembayaran($id_kelas_pembayaran)
    {
        $query = $this->db->table('tbl_kelas_pembayaran')
            ->select('id_kategori_pembayaran')
            ->where('id_kelas_pembayaran', $id_kelas_pembayaran)
            ->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->id_kategori_pembayaran;
        }

        return null; // Jika id_matkul tidak ditemukan, mengembalikan nilai null
    }


    public function kelas_pembayaran()
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->groupBy('tbl_kelas_pembayaran.kode_kelas_pembayaran')
            ->where('tbl_kelas_pembayaran.id_mhs IS null')
            ->get()->getResultArray();
    }

    public function mhs_tidak_ada_kelas()
    {
        return $this->db->table('tbl_mhs')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function mhs($id_prodi) // dua
    {
        return $this->db->table('tbl_mhs')
            ->select('tbl_mhs.id_mhs, tbl_kelas_pembayaran.kode_kelas_pembayaran')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_kelas_pembayaran', 'tbl_kelas_pembayaran.id_mhs=tbl_mhs.id_mhs', 'right')
            ->orderBy('tbl_mhs.id_mhs', 'DESC')
            ->where('tbl_mhs.id_prodi', $id_prodi)
            ->get()->getResultArray();
    }

    public function pembayaran($id_mhs)
    {
        return $this->db->table('tbl_mhs')
            ->select('tbl_kelas_pembayaran.biaya, tbl_kelas_pembayaran.kode_kelas_pembayaran, nama_kelas_pembayaran, tbl_mhs.id_mhs, SUM(tbl_kelas_pembayaran.pelunasan) as total_pelunasan')
            ->join('tbl_kelas_pembayaran', 'tbl_kelas_pembayaran.id_mhs=tbl_mhs.id_mhs', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi=tbl_mhs.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('tbl_mhs.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.id_mhs IS NOT NULL')
            ->groupBy('tbl_kelas_pembayaran.kode_kelas_pembayaran') // Group by kode_kelas_pembayaran
            ->get()
            ->getResultArray();
    }

    public function pembayaran_mhs($data)
    {
        $this->db->table('tbl_kelas_pembayaran')->insert($data);
    }

    public function pembayaran_keuangan($id_mhs, $kode_kelas_pembayaran)
    {
        return $this->db->table('tbl_kelas_pembayaran')

            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_kelas_pembayaran.id_user', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('tbl_kelas_pembayaran.id_mhs', $id_mhs)
            ->where('tbl_kelas_pembayaran.kode_kelas_pembayaran', $kode_kelas_pembayaran)
            ->where('tbl_kelas_pembayaran.waktu_pembayaran_mhs IS not null')
            ->get()->getResultArray();
    }
    public function tambah_mhs_kelas_pembayaran($data)
    {
        return $this->db->table('tbl_kelas_pembayaran')->insertBatch($data);
    }
    public function update_mhs($data)
    {
        $this->db->table('tbl_kelas_pembayaran')
            ->where('id_kelas_pembayaran', $data['id_kelas_pembayaran'])
            ->update($data);
    }

    public function pencarian_pembayaran_harian($start_date, $end_date)
    {
        // Query data dari database berdasarkan rentang tanggal
        return $this->db->table('tbl_kelas_pembayaran')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_kelas_pembayaran.id_user', 'left')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas_pembayaran.id_prodi', 'left')
            ->join('tbl_kategori_pembayaran', 'tbl_kategori_pembayaran.id_kategori_pembayaran=tbl_kelas_pembayaran.id_kategori_pembayaran', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta=tbl_kelas_pembayaran.id_ta', 'left')
            ->where('waktu_pembayaran_mhs >=', $start_date . ' 00:00:00')
            ->where('waktu_pembayaran_mhs <=', $end_date . ' 23:59:59')
            ->where('waktu_pembayaran_mhs IS not null')
            ->get()->getResultArray();
    }

    public function getGroupedData()
    {

        $builder = $this->select('kode_kelas_pembayaran, tbl_mhs.nama_mhs, SUM(pelunasan) as total_pelunasan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs=tbl_kelas_pembayaran.id_mhs', 'left')
            ->groupBy('kode_kelas_pembayaran')
            ->groupBy('tbl_kelas_pembayaran.id_mhs')
            ->where('pelunasan IS not null')
            ->findAll();

        return $builder;
    }

    public function getNamaMhsList()
    {
        // Ambil daftar nama mahasiswa dari tabel
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->distinct()->select('tbl_mhs.nama_mhs, tbl_ta.ta, tbl_mhs.id_mhs, tbl_kelas_pembayaran.pelunasan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta= tbl_mhs.id_ta', 'left')
            ->where('tbl_kelas_pembayaran.id_mhs IS not null')
            ->groupBy('tbl_mhs.nama_mhs, tbl_ta.ta'); // Mengelompokkan berdasarkan nama_mhs dan ta
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getNamaMhsList3()
    {
        // Ambil daftar nama mahasiswa dari tabel
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->distinct()->select('tbl_mhs.id_mhs, tbl_ta.ta, tbl_kelas_pembayaran.pelunasan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_mhs.id_ta', 'left')
            ->where('tbl_kelas_pembayaran.id_mhs IS NOT NULL')
            ->groupBy('tbl_mhs.id_mhs, tbl_ta.ta'); // Mengelompokkan berdasarkan id_mhs dan ta
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getKodeKelasPembayaranList()
    {
        // Ambil daftar kode kelas pembayaran dari tabel
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->distinct()->select('kode_kelas_pembayaran');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs', 'left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta= tbl_mhs.id_ta', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function get_mhs_jumlah_pelunasan()
    {
        // Ambil daftar kode kelas pembayaran dari tabel
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->distinct()->select('kode_kelas_pembayaran');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs', 'left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta= tbl_mhs.id_ta', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPelunasanData()
    {
        // Ambil data pelunasan dari tabel
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->select('tbl_mhs.nama_mhs, tbl_kelas_pembayaran.kode_kelas_pembayaran, tbl_kelas_pembayaran.pelunasan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs');
        $query = $builder->get();

        // Bentuk array asosiatif dari hasil query
        $pelunasanData = array();
        foreach ($query->getResult() as $row) {
            $nama_mhs = $row->nama_mhs;
            $kode_kelas_pembayaran = $row->kode_kelas_pembayaran;
            $pelunasan = $row->pelunasan;

            // Atur nilai pelunasan menjadi 3 jika null
            $pelunasan = ($pelunasan !== null) ? $pelunasan : 0;


            // Jika sudah ada entri untuk mahasiswa dan kode pembayaran, tambahkan nilai pelunasan
            if (isset($pelunasanData[$nama_mhs][$kode_kelas_pembayaran])) {
                $pelunasanData[$nama_mhs][$kode_kelas_pembayaran] += $pelunasan;
            } else {
                $pelunasanData[$nama_mhs][$kode_kelas_pembayaran] = $pelunasan;
            }
        }

        // print_r($pelunasanData[$nama_mhs]);
        return $pelunasanData;
    }


    public function  getJumlahpelunasan()
    {
        $builder = $this->db->table('tbl_kelas_pembayaran');
        $builder->select('tbl_mhs.nama_mhs, tbl_kelas_pembayaran.kode_kelas_pembayaran, tbl_kelas_pembayaran.pelunasan')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_kelas_pembayaran.id_mhs');
        $query = $builder->get();

        // Bentuk array asosiatif dari hasil query
        $JumlahpelunasanData = array();
        foreach ($query->getResult() as $row) {
            $nama_mhs = $row->nama_mhs;
            $kode_kelas_pembayaran = $row->kode_kelas_pembayaran;
            $pelunasan = $row->pelunasan;

            // Atur nilai pelunasan menjadi 3 jika null
            $Jumlahpelunasan = ($pelunasan !== null) ? $pelunasan : 0;

            // Jika sudah ada entri untuk mahasiswa dan kode pembayaran, tambahkan nilai pelunasan
            if (isset($JumlahpelunasanData[$nama_mhs][$kode_kelas_pembayaran])) {
                $JumlahpelunasanData[$nama_mhs][$kode_kelas_pembayaran] +=  $Jumlahpelunasan;
            } else {
                $JumlahpelunasanData[$nama_mhs][$kode_kelas_pembayaran] = $Jumlahpelunasan;
            }

            // Tambahkan jumlah pelunasan ke dalam kolom baru
            if (isset($JumlahpelunasanData[$nama_mhs]['total_pelunasan'])) {
                $JumlahpelunasanData[$nama_mhs]['total_pelunasan'] += $Jumlahpelunasan;
            } else {
                $JumlahpelunasanData[$nama_mhs]['total_pelunasan'] = $Jumlahpelunasan;
            }

            
        }
       // echo '<pre>';
       // print_r($JumlahpelunasanData);
       // echo '</pre>';
        return $JumlahpelunasanData;
    }
    public function statistik_total_pelunasan()
    {
        return $this->db->table('tbl_kelas_pembayaran')
            ->select('SUM(tbl_kelas_pembayaran.pelunasan) as to_pelunasan')
            ->get()->getRowArray();
    }
}
