<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBobotNilai extends Model

{
    public function allData($id_prodi)
    {
        return $this->db->table('tbl_range_nilai')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_range_nilai.id_prodi', 'left')
            ->where('tbl_range_nilai.id_prodi', $id_prodi)
            ->orderBy('tbl_range_nilai.nilai_huruf', 'ASC')
            ->get()->getResultArray();
    }


}
