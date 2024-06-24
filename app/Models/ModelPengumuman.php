<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table      = 'tbl_pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $allowedFields = ['judul_pengumuman', 'isi_pengumuman', 'tgl_pengumuman', 'status_pengumuman', 'pdf', 'user_id'];



    public function add_pengumuman($data)
    {
        $this->db->table('tbl_pengumuman')->insert($data);
    }

    public function cariData($caripengumuman)
    {
        return $this->table('tbl_pengumuman')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user')
            ->where('status_pengumuman', 'published')
            ->orderBy('tgl_pengumuman', 'desc')
            ->like('judul_pengumuman', $caripengumuman)
            ->orLike('judul_pengumuman', $caripengumuman);
    }

    public function listPengumuman()
    {
        return $this->table('tbl_pengumuman')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user')
            ->where('status_pengumuman', 'published')
            ->orderBy('tgl_pengumuman', 'desc')
            ->limit(5)
            ->get()->getResultArray();
 
    }

    public function PengumumanSelengkapnya()
    {
        return $this->table('tbl_pengumuman')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user')
            ->where('status_pengumuman', 'published')
            ->orderBy('tgl_pengumuman', 'desc')
            ->get()->getResultArray();
 
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_pengumuman')
            ->where('id_pengumuman', $data['id_pengumuman'])
            ->delete($data);
    }

    public function detail_berita($slug_berita)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('slug_berita', $slug_berita)
            ->get()->getRow();
    }

    public function detail_data($id_pengumuman)
    {
        return $this->db->table('tbl_pengumuman')
            ->where('id_pengumuman', $id_pengumuman)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('tbl_pengumuman')
            ->where('id_pengumuman', $data['id_pengumuman'])
            ->update($data);
    }

    public function find_pdf($id_pengumuman)
    {
        return $this->db->table('tbl_pengumuman')
            ->select('pdf')
            ->where('id_pengumuman', $id_pengumuman)
            ->get()->getRowArray();
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

    //backend
    public function list()
    {
        return $this->table('tbl_pengumuman')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user')
            ->orderBy('tgl_pengumuman', 'ASC')
            ->get()->getResultArray();
    }

    public function published()
    {
        return $this->table('tbl_pengumuman')
            ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user')
            ->where('status_pengumuman', 'published')
            ->limit(4)
            ->orderBy('tgl_pengumuman', 'desc')
            ->get()->getResultArray();
    }

    public function slider()
    {
        return $this->db->table('tbl_berita')
            ->get()->getResultArray();
    }
    //frontend

    public function semua_berita($num)
    {
        return $this->table('tbl_berita')
            ->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
            ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id')
            ->where('status', 'published')
            ->orderBy('tgl_berita', 'desc')
            ->paginate($num);
    }
 
    public function user_aktif()
    {
        return $this->db->table('tbl_user')
            ->orderBy('id_user', 'DESC')
            ->where('id_user', session()->get('username')) //contohnya d ambil dari session mahasiswa Auth
            ->get()->getRowArray();
    }
   
}
