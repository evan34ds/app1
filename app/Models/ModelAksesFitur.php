<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAksesFitur extends Model
{
    protected $table = 'tbl_akses_fitur';
    protected $primaryKey = 'id_akses_fitur_mhs';
    protected $allowedFields = ['id_mhs', 'id_prodi', 'id_ta'];
    // tambahkan field lainnya yang diperlukan


    public function findBy($id_mhs)
    {
        return $this->find($id_mhs);
    }

    public function TambahStatus($data)
    {
        return $this->db->table('tbl_status_mhs')->insert($data);
    }

    public function Tambah_mhs_status($data)
    {
        return $this->db->table('tbl_akses_fitur')->insert($data);
    }
}
