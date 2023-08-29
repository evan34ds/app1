<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKrs;
use App\Models\ModelJadwalKuliah;


class Krs extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
        $this->ModelJadwalKuliah = new ModelJadwalKuliah();
    }
    public function index()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik krs
        $data = array(
            'title' =>    'Kartu Rencana Studi (KRS)',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'mhs'       => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan'  => $this->ModelKrs->matkulditawarkan($ta['id_ta'], $mhs['id_prodi'], $mhs['id_mhs']), //sesuiakan dengan tahun akademik krs // $mhs['id_prodi'] filter berdasarkan id_prodi
            'data_matkul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
            'isi'    =>    'mhs/krs/v_krs'
        );
        return view('layout/v_wrapper', $data);
    }
    public function tambah_matkul($id_jadwal)

    // TERUSKAN VIDEO 21 SIAKAD CI 4 MENIT 16:19
    {

        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            $id_ta       = $ta['id_ta'],
            $id_mhs       = $mhs['id_mhs']
        ];

        $existingData = $this->ModelKrs->where('id_jadwal', $id_jadwal)
            ->where('id_ta', $id_ta)
            ->where('id_mhs', $id_mhs)
            ->first();

            $nama_matkul = $this->ModelKrs->findNameById($id_jadwal); // cek agar mata kuliah bisa didefinisikan

            if ($existingData) {
            session()->setFlashdata('gagal_krs',''. $nama_matkul.' Telah tersedia 01!!!');
            return redirect()->to(base_url('krs'));
        } else {

            $mhs = $this->ModelKrs->DataMhs();
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'id_jadwal' => $id_jadwal,
                'id_ta'       => $ta['id_ta'],
                'id_mhs'       => $mhs['id_mhs']
            ];
            $this->ModelKrs->TambahMatkul($data);
            session()->setFlashdata('pesan',''. $nama_matkul.' Mata Kuliah Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('krs'));
            return view('layout/v_wrapper', $data);
        }
    }


    public function delete($id_krs)
    {
        $data = [
            'id_krs' => $id_krs,
        ];
        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'Data KRS Berhasil Di Hapus !!!');
        return redirect()->to('/krs');
    }

    public function batalsimpan()
    {
        session()->setFlashdata('gagal', 'Gagal Menambah Mata Kuliah Karena KRS Telah Mencapai Batas 24 SKS!!!');
        return redirect()->back();
    }

    public function print()
    {
        $mhs = $this->ModelKrs->DataMhs(); // Data Di Cetak
        $ta = $this->ModelTa->ta_aktif(); // Data Di Cetak
        $data = [
            'title' => 'Print Krs', // Data Di Cetak
            'title' =>    'Kartu Rencana Studi (KRS)', // Data Di Cetak
            'ta_aktif' => $this->ModelTa->ta_aktif(), // Data Di Cetak
            'mhs'       => $this->ModelKrs->DataMhs(), // Data Di Cetak
            'data_matkul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']), // Data Di Cetak
        ];
        return view('mhs/krs/v_print_krs', $data);
    }

    public function percobaan($id_jadwal)
    // TERUSKAN VIDEO 21 SIAKAD CI 4 MENIT 16:19
    {
        $id_jadwal = $id_jadwal;
        $id_ta =  $this->request->getPost('id_ta');
        $id_mhs =  $this->request->getPost('id_mhs');

        $existingData = $this->ModelKrs->where('id_jadwal', $id_jadwal)
            ->where('id_ta', $id_ta)
            ->where('id_mhs', $id_mhs)
            ->first();

        if ($existingData) {

            session()->setFlashdata('gagal_krs', '' . berhasil . ' Telah tersedia!!!');
            return redirect()->to(base_url('krs'));
        } else {
            $mhs = $this->ModelKrs->DataMhs();
            $ta = $this->ModelTa->ta_aktif();
            $data = [
                'id_jadwal' => $id_jadwal,
                'id_ta'       => $ta['id_ta'],
                'id_mhs'       => $mhs['id_mhs']
            ];
            $this->ModelKrs->TambahMatkul($data);
            session()->setFlashdata('pesan', 'Mata Kuliah Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('krs'));
            return view('layout/v_wrapper', $data);
        }
    }

    //--------------------------------------------------------------------

}
