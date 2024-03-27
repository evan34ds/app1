<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKhs;
use App\Models\ModelKrs;


class Khs extends BaseController
{
    public function __construct()

    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelKhs = new ModelKhs();
        $this->ModelKrs = new ModelKrs();
    }
    public function index()
    {
        $mhs = $this->ModelKhs->DataMhs();
        $ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik krs
        $data = array(
            'title' =>    'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs'       => $this->ModelKrs->DataMhs(),
            'khs'   => $this->ModelKhs->DataKHS($mhs['id_mhs'], $ta['id_ta']),
            'isi'   => 'mhs/khs/v_khs'
        );

        $jumlahmatakuliah = 1;
        ?>
                <?php
                if ($data['mhs']['id_krs'] == $jumlahmatakuliah && $data['ta_aktif']['id_ta'] == $data['mhs']['id_ta'] && $data['mhs']['id_khs'] == $jumlahmatakuliah) { ?>
                    <?php
                    // Tempatkan return view('layout/v_wrapper', $data); di sini jika perlu
                    return view('layout/v_wrapper', $data);
                    ?>
                <?php } else { ?>
                    <?php
                    session()->setFlashdata('gagal_status_khs', 'Anda Tidak Aktif');
                    return redirect()->to(base_url('mhs'));
                    ?>
        <?php };

        return view('layout/v_wrapper', $data);
    }

    public function print()
    {
        $mhs = $this->ModelKrs->DataMhs(); // Data Di Cetak
        $ta = $this->ModelTa->ta_aktif(); // Data Di Cetak
        $data = [
            'title' =>    'Kartu Hasil Studi (KHS)', // Data Di Cetak
            'ta_aktif' => $this->ModelTa->ta_aktif(), // Data Di Cetak
            'mhs'       => $this->ModelKrs->DataMhs(), // Data Di Cetak
            'khs'   => $this->ModelKhs->DataKHS($mhs['id_mhs'], $ta['id_ta']),
        ];
        return view('mhs/khs/v_print_khs', $data);
    }
}