<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKhs;


class Khs extends BaseController
{
    public function __construct()

    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelKhs = new ModelKhs();
    }
    public function index()
    {
        $mhs = $this->ModelKhs->DataMhs();
        $ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik krs
        $data = array(
            'title' =>    'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs'       => $this->ModelKhs->DataMhs(),
            'khs'   => $this->ModelKhs->DataKHS($mhs['id_mhs'], $ta['id_ta']),
            'isi'   => 'mhs/khs/v_khs'
          
        );
        return view('layout/v_wrapper', $data);
    }
}