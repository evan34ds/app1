<?php

namespace App\Controllers;

use App\Models\ModelTa;

class Ta extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
	}

	public function index()
	{
		$data = array(
			'title' =>	'Data Tahun Akademik',
			'ta'	=> $this->ModelTa->alldata(),
			'isi'	=>	'admin/ta/v_index'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = [
			'ta' => $this->request->getPost('ta'),
			'semester' => $this->request->getPost('semester'),
		];
		$this->ModelTa->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to('/Ta');
	}

	public function edit($id_ta)
	{
		session()->set('semester', $ta_aktif['semester']);
		session()->set('ta', $ta_aktif['ta']);
		$data = [
			'id_ta' => $id_ta,
			'semester' => $this->request->getPost('semester'),
		];
		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to('/ta');
	}

	public function delete($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
		];
		$this->ModelTa->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to('/ta');
	}
	//Setting Tahun Akademik
	public function setting()
	{
		$ta_aktif = $this->ModelTa->ta_aktif();
		$data = array(
			'title' =>	'Data Tahun Akademik',
			'ta'	=> $this->ModelTa->alldata(),
			'isi'	=>	'admin/ta/v_set_ta'
		);
		session()->set('semester', $ta_aktif['semester']);
		session()->set('ta', $ta_aktif['ta']);
		return view('layout/v_wrapper', $data);
	}
	public function set_status_ta($id_ta)
	{
		//reset status ta
		$this->ModelTa->reset_status_ta();
		//set status ta
		$data = [
			'id_ta' =>	$id_ta,
			'status'	=> 1
		];

		$this->ModelTa->edit($data);
		session()->setFlashdata('pesan', 'Status Tahun Akademik Berhasil DiGanti !!!');
		return redirect()->to(base_url('ta/setting'));
	}


	//--------------------------------------------------------------------

}
