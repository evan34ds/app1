<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\Modelmatkul;
use App\Models\ModelKurikulum;
use App\Models\ModelAdmin;



class Kurikulum extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
		$this->ModelProdi = new ModelProdi();
		$this->ModelMatkul = new ModelMatkul();
		$this->ModelKurikulum = new ModelKurikulum();
		$this->ModelAdmin = new ModelAdmin();
	}

	public function index()
	{
		$data = array(
			'title' =>    'Kurikulum',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'prodi' => $this->ModelProdi->allData(),
			'isi'    =>    'admin/kurikulum/v_index_kurikulum'
		);
		return view('layout/v_wrapper', $data);
	}

	public function Detail_Kurikulum($id_prodi)
	{
		$data = [
			'title'     =>  'Kurikulum',
			'prodi'     =>  $this->ModelProdi->detail_Data($id_prodi),
			'kurikulum'    =>  $this->ModelKurikulum->allData_kurikulum($id_prodi), // filter berdasarkan prodis
			'ta'  =>  $this->ModelTa->allData(),
			'isi'       => 'admin/kurikulum/v_detail_kurikulum'
		];
		return view('layout/v_wrapper', $data);
	}


	public function add_kurikulum($id_prodi)
	{
		if ($this->validate([
			'nama_kurikulum' => [
				'label' => 'Nama Kurikulum',
				'rules' => 'required|is_unique[tbl_kurikulum.nama_kurikulum]',
				'errors' => [
					'required' => '{field} Wajib Dipilih !!!',
					'is_unique' => '{field} suda ada, Masukan Nama Kurikulum Lain !!!'
				]
			],
			'id_ta' => [
				'label' => 'Tahun Akademik',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !!!',
					'is_unique' => '{field} suda ada, Tahun Akademik lain !!!'
				]
			],
		])) {

			$nama_kurikulum = $this->request->getPost('nama_kurikulum');
			$idTa = $this->request->getPost('id_ta');

			$data = [
				'id_prodi' => $id_prodi,
				'nama_kurikulum' => $nama_kurikulum,
				'id_ta' => $idTa,
			];
			$this->ModelKurikulum->add($data);
			session()->setFlashdata('pesan', 'Kurikulum berhasil dibuat silahkan Tambah data Mata Kuliah !!!');
			return redirect()->to(base_url('kurikulum/detail_kurikulum_matakuliah/' . $id_prodi . '/' . $nama_kurikulum));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kurikulum/detail_kurikulum/' . $id_prodi));
		}
	}

	public function delete($id_kurikulum, $id_prodi)
	{
		$data = [
			'id_kurikulum' => $id_kurikulum,
		];
		$this->ModelKurikulum->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('kurikulum/detail_kurikulum/' . $id_prodi));
	}

	public function delete_kurikulum_matkul($id_kurikulum, $id_prodi, $nama_kurikulum)
	{
		$data = [
			'id_kurikulum' => $id_kurikulum,
		];
		$this->ModelKurikulum->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('kurikulum/detail_kurikulum_matakuliah/' . $id_prodi . '/' . $nama_kurikulum));
	}

	public function detail_kurikulum_matakuliah($id_prodi, $nama_kurikulum)
	{

		$data = [
			'title'     =>  'Kurikulum Daftar Mata Kuliah',
			'prodi' 	=> 	$this->ModelProdi->detail_Data($id_prodi), //($id_prodi) ->menampilkan data berdasarkan prodi
			'nama_kurikulum' 	=> 	$this->ModelKurikulum->nama_kurikulum($nama_kurikulum), //($id_prodi) ->menampilkan data berdasarkan prodi
			'totalsks_nama_kurikulum' 	=> 	$this->ModelKurikulum->totalsks_nama_kurikulum($nama_kurikulum), //($id_prodi) ->menampilkan data berdasarkan prodi
			'kurikulum'    =>  $this->ModelKurikulum->allData_kurikulum_matakuliah($nama_kurikulum), // filter berdasarkan prodis
			'kurikulum_prodi_matkul' => $this->ModelKurikulum->allData_kurikulum_prodi_matkul($id_prodi),
			'ta'  =>  $this->ModelTa->allData(),
			'isi'       => 'admin/kurikulum/v_detail_kurikulum_matakuliah'
		];
		return view('layout/v_wrapper', $data);
	}

	public function gagal_hapus_kurikulum($id_kurikulum, $id_prodi)
	{
		$data = [
			'title'     =>  'Kurikulum',
			'prodi'     =>  $this->ModelProdi->detail_Data($id_prodi),
			'kurikulum'    =>  $this->ModelKurikulum->allData_kurikulum($id_prodi), // filter berdasarkan prodis
			'ta'  =>  $this->ModelTa->allData(),
			'isi'       => 'admin/kurikulum/v_detail_kurikulum'
		];
		session()->setFlashdata('gagal', 'Hapus terlebih dahulu Mata Kuliah di Kurikulum !!!');
		return redirect()->to(base_url('/kurikulum/detail_Kurikulum/' . $id_prodi));
		return view('layout/v_wrapper', $data);
	}

	public function add_kurikulum_matakuliah($id_prodi, $nama_kurikulum)
	{

		// Mengambil nilai input dari form
		$id_prodi = $id_prodi;
		$nama_kurikulum = $nama_kurikulum;
		$id_matkul = $this->request->getPost('id_matkul');
		$smstr = $this->request->getPost('smstr');
		$id_ta = $this->request->getPost('id_ta');

		// Cek apakah kombinasi sudah ada
		$existingData = $this->ModelKurikulum->where('nama_kurikulum', $nama_kurikulum)
			->where('id_matkul', $id_matkul)
			->first();

		$nama_matkul = $this->ModelKurikulum->findNameById($id_matkul); // cek agar mata kuliah bisa didefinisikan
		// Periksa apakah ada hasil yang ditemukan
		if ($existingData) {
			session()->setFlashdata('gagal_matkul', '' . $nama_matkul . ' Telah tersedia!!!');
			return redirect()->to(base_url('kurikulum/detail_kurikulum_matakuliah/' . $id_prodi . '/' . $nama_kurikulum));
		} else {
			// Lanjutkan dengan penyimpanan data baru
			//jika tidak valid  

			$data = [
				'id_prodi' => $id_prodi,
				'nama_kurikulum' => $nama_kurikulum,
				'id_matkul' => $this->request->getPost('id_matkul'),
				'smstr' => $this->request->getPost('smstr'),
				'id_ta' => $this->request->getPost('id_ta'),
			];
			$this->ModelKurikulum->add_kurikulum_matkul($data);
			session()->setFlashdata('pesan', 'Mata Kuliah ' . $nama_matkul . '  Berhasil Di Tambahkan !!!');
			return redirect()->to(base_url('kurikulum/detail_kurikulum_matakuliah/' . $id_prodi . '/' . $nama_kurikulum));
		}
	}
}
