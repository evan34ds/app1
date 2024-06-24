<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelberita extends Model
{
    protected $table      = 'tbl_berita';
    protected $primaryKey = 'berita_id';
    protected $allowedFields = ['judul_berita', 'slug_berita', 'isi', 'gambar', 'tgl_berita', 'status', 'kategori_id', 'user_id'];


    public function kontak_simpan($data)
    {
        $this->db->table('tbl_kontak')->insert($data);
    }

    public function cariData($cari)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('tgl_berita', 'desc')
            ->like('judul_berita', $cari)
            ->orLike('isi', $cari);
    }

    public function listBerita()
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('tgl_berita', 'desc')
            ->limit(4)
            ->get()->getResultArray();
    }

    public function listBeritaKategori($kategori_id)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->where('tbl_berita.kategori_id', $kategori_id)
            ->orderBy('tgl_berita', 'desc')
            ->get()->getResultArray();
    }

    //backend
    public function list()
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->orderBy('tgl_berita', 'ASC')
            ->get()->getResultArray();
    }

    public function slider()
    {
        return $this->db->table('tbl_berita')
            ->get()->getResultArray();
    }
    //frontend
    public function published()
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->limit(4)
            ->orderBy('tgl_berita', 'desc')
            ->like('kategori.nama_kategori', 'berita')
            ->get()->getResultArray();
    }



    public function semua_berita($num)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('tgl_berita', 'desc')
            ->paginate($num);
    }
    public function getPaginated($num)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('tgl_berita', 'desc');
        return [
            'berita' => $this->paginate($num),
        ];
    }
    public function detail_berita($slug_berita)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('slug_berita', $slug_berita)
            ->get()->getRow();
    }

    public function add_berita($data)
    {
        $this->db->table('tbl_berita')->insert($data);
    }


    public function user_aktif()
    {
        return $this->db->table('tbl_user')
            ->orderBy('id_user', 'DESC')
            ->where('id_user', session()->get('username')) //contohnya d ambil dari session mahasiswa Auth
            ->get()->getRowArray();
    }

    public function detail_data($berita_id)
    {
        return $this->db->table('tbl_berita')
            ->where('berita_id', $berita_id)
            ->get()->getRowArray();
    }


    public function edit($data)
    {
        $this->db->table('tbl_berita')
            ->where('berita_id', $data['berita_id'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_berita')
            ->where('berita_id', $data['berita_id'])
            ->delete($data);
    }
}
