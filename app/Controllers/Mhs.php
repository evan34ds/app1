<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelMahasiswa;
use App\Models\ModelTa;
use App\Models\ModelKrs;

class Mhs extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelTa = new ModelTa();
		$this->ModelKrs = new ModelKrs();
	}
	public function index()
	{
		$data = [
			'title' =>    'Dashboard',
			'mhs' => $this->ModelKrs->DataMhs(),
			'ta' => $this->ModelTa->ta_aktif(), //sesuiakan dengan tahun akademik krs
			'isi'    =>    'mhs/v_dasboard_mhs'
		];

		return view('layout/v_wrapper', $data);
	}
	public function absensi()
	{

		$mhs = $this->ModelKrs->DataMhs();
		$ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik krs
		$data = array(
			'title' =>    'Absensi',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'mhs'       => $this->ModelKrs->DataMhs(),
			'data_matkul'    => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
			'isi'    =>    'admin/mahasiswa/absensi/v_absensi'
		);
		return view('layout/v_wrapper', $data);
	}

	

	//-----------------------duplikate---------------------------------------------
	public function index2()
	{

		$data = [
			'title' =>    'Dashboard',
			'mhs' => $this->ModelKrs->DataMhs(),
			'ta' => $this->ModelTa->ta_aktif(), //sesuiakan dengan tahun akademik krs
			'isi'    =>    'mhs/v_dasboard_mhs'
		];

		return view('layout/v_wrapper', $data);
	}
}
