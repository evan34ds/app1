<?php

namespace App\Controllers;

use App\Models\ModelBobotNilai;
use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;


class BobotNilai extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
		$this->ModelProdi = new ModelProdi();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
		$this->ModelBobotNilai = new ModelBobotNilai();
	}

	public function index()
	{
		$data = array(
			'title' =>    'Bobot Nilai',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'prodi' => $this->ModelProdi->allData(),
			'isi'    =>    'admin/bobot_nilai/v_index_nilai'
		);
		return view('layout/v_wrapper', $data);
	}

	public function detailbobotnilai($id_prodi)
	{
		$data = [
			'title' 	=>  'Jadwal Kuliah',
			'ta_aktif' 	=> 	$this->ModelTa->ta_aktif(),
			'prodi' 	=> 	$this->ModelProdi->detail_Data($id_prodi),
			'bobot' 	=> 	$this->ModelBobotNilai->allData($id_prodi),
			'dosen' 	=> 	$this->ModelDosen->allData($id_prodi),
			'ruangan' 	=> 	$this->ModelRuangan->allData(),
			'matkul' 	=> 	$this->ModelJadwalKuliah->matkul($id_prodi),
			'kelas' 	=> 	$this->ModelJadwalKuliah->kelas($id_prodi), // filter berdasarkan prodis
			'isi' 		=> 'admin/bobot_nilai/v_detail_nilai'
		];
		return view('layout/v_wrapper', $data);
	}

}
