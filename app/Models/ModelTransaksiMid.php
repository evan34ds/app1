<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksiMid extends Model
{
    protected $table            = 'tbl_transaksi_mid';
    protected $primaryKey       = 'id_transaksi_mid';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
