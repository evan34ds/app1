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

	public function add_daftar_bobot_nilai($id_prodi)
	{
		$data = [
			'kode_range_nilai' => $this->request->getPost('kode_range_nilai'),
			'id_prodi' => $id_prodi,
			'tanggal_mulai' =>  $this->request->getPost('tanggal_mulai'),
			'tanggal_akhir' => $this->request->getPost('tanggal_akhir'),
		];
		$this->ModelBobotNilai->simpan_bobot_nilai($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to('/BobotNilai/daftar_bobot_nilai/' . $id_prodi);
	}
	public function daftar_bobot_nilai($id_prodi)
	{
		$data = [
			'title' 	=>  'Daftar Bobot Nilai',
			'ta_aktif' 	=> 	$this->ModelTa->ta_aktif(),
			'prodi' 	=> 	$this->ModelProdi->detail_Data($id_prodi),
			'bobot' 	=> 	$this->ModelBobotNilai->allData($id_prodi),
			'dosen' 	=> 	$this->ModelDosen->allData($id_prodi),
			'ruangan' 	=> 	$this->ModelRuangan->allData(),
			'matkul' 	=> 	$this->ModelJadwalKuliah->matkul($id_prodi),
			'kelas' 	=> 	$this->ModelJadwalKuliah->kelas($id_prodi), // filter berdasarkan prodis
			'isi' 		=> 'admin/bobot_nilai/v_daftar_bobot_nilai'
		];
		return view('layout/v_wrapper', $data);
	}
	public function detail_bobot_nilai($kode_range_nilai)
	{
		$id_prodi = $this->ModelBobotNilai->findProdi($kode_range_nilai); // cek agar mata kuliah bisa didefinis
		$data = [
			'title' 	=>  'Jadwal Kuliah',
			'ta_aktif' 	=> 	$this->ModelTa->ta_aktif(),
			'prodi' 	=> 	$this->ModelProdi->detail_Data($id_prodi),
			'detail_bobot' 	=> 	$this->ModelBobotNilai->detail_bobot_nilai($kode_range_nilai),
			'kode_bobot_nilai' => $kode_range_nilai,
			'isi' 		=> 'admin/bobot_nilai/v_detail_bobot_nilai'
		];
		return view('layout/v_wrapper', $data);
	}

	public function delete_daftar_bobot_nilai($id_range_nilai)
	{
		
		$kode_range_nilai = $this->ModelBobotNilai->findKode($id_range_nilai); // cek agar mata kuliah bisa didefinis
		$id_prodi = $this->ModelBobotNilai->findProdiid($id_range_nilai); // cek agar mata kuliah bisa didefinis
		$jumlah_kelas = $this->ModelBobotNilai->findRangeid($kode_range_nilai); // cek agar mata kuliah bisa didefinis
				
		print_r($kode_range_nilai);
		if ($jumlah_kelas == 0) {
			// Menyiapkan data untuk penghapusan
			$data = [
				'id_range_nilai' => $id_range_nilai,
			];

			// Menghapus data kelas pembayaran menggunakan model
			$this->ModelBobotNilai->delete_daftar_bobot_nilai($data);

			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu
			session()->setFlashdata('pesan', 'Data Kelas ' . $kode_range_nilai . 'Jumlah Kelas' . $jumlah_kelas . ' Berhasil dihapus');
			return redirect()->to('/BobotNilai/daftar_bobot_nilai/' . $id_prodi);
		} else {
			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu jika kondisi tidak terpenuhi
			session()->setFlashdata('gagal', 'Hapus terlebih dahulu Mahasiswa di Kode Kelas ' . $kode_range_nilai . 'Jumlah Kelas ' . $jumlah_kelas);
			return redirect()->to(base_url('/BobotNilai/daftar_bobot_nilai/' . $id_prodi));
		}
	}

}
