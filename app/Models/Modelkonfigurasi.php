<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkonfigurasi extends Model
{
    protected $table      = 'tbl_konfigurasi';
    protected $primaryKey = 'konfigurasi_id';
    protected $allowedFields = ['nama_web', 'deskripsi', 'visi', 'misi', 'instagram', 'facebook', 'whatsapp', 'email', 'alamat', 'logo', 'icon'];

    //backend
    public function list()
    {
        return $this->table('tbl_konfigurasi')
            ->orderBy('konfigurasi_id', 'ASC')
            ->get()->getResultArray();
    }
}
