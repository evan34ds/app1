<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelDsn;

class Dsn extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelDsn = new ModelDsn();
	}
	public function index()
	{

		$data = array(
			'title' =>    'Dosen',
			'isi'    =>    'dsn/v_dasboard_dsn'
		);
		return view('layout/v_wrapper', $data);
	}
	public function jadwal()
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Jadwal Mengajar',
			'jadwal' =>    $this->ModelDsn->JadwalDosen($dosen['id_dosen']),
			'isi'    =>    'admin/dosen/v_jadwal_dsn'
		);
		return view('layout/v_wrapper', $data);
	}
	public function Nilai()
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' => 	'Nilai Mahasiswa',
			'nilai' =>	 $this->ModelDsn->JadwalDosen($dosen['id_dosen']),
			'isi'    =>    'admin/dosen/nilai/v_nilai'
		);
			return view('layout/v_wrapper', $data);
	}
	public function nilai_mhs($id_jadwal)
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Nilai Mahasiswa',
			'jadwal' =>    $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs' =>    $this->ModelDsn->mhs($id_jadwal),
			'range_nilai' =>    $this->ModelDsn->allData(),
			'isi'    =>    'admin/dosen/nilai/v_nilai_mhs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function ubah_nilai($id_jadwal)
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Nilai Mahasiswa',
			'jadwal' =>    $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs' =>    $this->ModelDsn->mhs($id_jadwal),
			'range_nilai' =>    $this->ModelDsn->allData(),
			'isi'    =>    'admin/dosen/nilai/v_ubah_nilai'
		);
		return view('layout/v_wrapper', $data);
	}
	public function SimpanNilai($id_jadwal)
	{

		$mhs =    $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$data = [
				'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
				'nilai' => $this->request->getPost($value['id_krs'] . 'nilai'),
			];
			$this->ModelDsn->SimpanNilai($data);
		}
		session()->setFlashdata('pesan', 'Nilai Berhasil di Simpan !!!');
		return redirect()->to(base_url('dsn/nilai_mhs/' . $id_jadwal));
	}
	public function AbsenKelas()
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Absen Kelas',
			'absen' =>    $this->ModelDsn->JadwalDosen($dosen['id_dosen']),
			'isi'    =>    'admin/dosen/absenkelas/v_absenKelas'
		);
		return view('layout/v_wrapper', $data);
	}
	public function absensi($id_jadwal)
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Absensi',
			'jadwal' =>    $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs' =>    $this->ModelDsn->mhs($id_jadwal),
			'isi'    =>    'admin/dosen/absenkelas/v_absensi'
		);
		return view('layout/v_wrapper', $data);
	}
	public function SimpanAbsen($id_jadwal)
	{

		$mhs =    $this->ModelDsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$data = [
				'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
				'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
				'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
				'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
				'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
				'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
				'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
				'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
				'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
				'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
				'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
				'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
				'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
				'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
				'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
				'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
				'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
			];
			$this->ModelDsn->SimpanAbsen($data);
		}
		session()->setFlashdata('pesan', 'Absensi Berhasil Di Update !!!');
		return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
	}

	public function Print_absensi($id_jadwal)
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Print Absensi',
			'jadwal' =>    $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs' =>    $this->ModelDsn->mhs($id_jadwal),
		);
		return view('admin/dosen/absenkelas/v_print_absensi', $data);
	}

	public function print_nilai_mhs($id_jadwal)
	{
		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'Daftar Nilai Mahasiswa',
			'jadwal' =>    $this->ModelDsn->DetailJadwal($id_jadwal),
			'mhs' =>    $this->ModelDsn->mhs($id_jadwal),
			'range_nilai' =>    $this->ModelDsn->allData(),
		);
		return view('admin/dosen/nilai/v_print_nilai', $data);
	}

	//--------------------------------------------------------------------

}
