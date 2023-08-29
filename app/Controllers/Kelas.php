<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\Matkul;
use App\Models\ModelDosen;
use App\Models\ModelProdi;
use App\Models\ModelMahasiswa;
use App\Models\ModelMatkul;
use App\Models\ModelTa;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelRuangan;


class Kelas extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelKelas = new ModelKelas();
		$this->ModelMatkul = new ModelMatkul();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelTa = new ModelTa();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
		$this->ModelRuangan = new ModelRuangan();

	}

	public function index()
	{
		$data = array(
			'title' =>    'Rombongan Kelas',
			'kelas' => $this->ModelKelas->allData(),
			'dosen' => $this->ModelDosen->allData(),
			'matkul' => $this->ModelDosen->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'isi'    =>    'admin/kelas/v_kelas'
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		if ($this->validate([
			'nama_kelas' => [
				'label' => 'Nama Kelas',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'id_prodi' => [
				'label' => 'Progaram Studi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'id_dosen' => [
				'label' => 'Nama Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'tahun_angkatan' => [
				'label' => 'Tahun tgl_masuk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],


		])) {
			//jika valid
			$data = [
				'nama_kelas' => $this->request->getPost('nama_kelas'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'id_dosen' => $this->request->getPost('id_dosen'),
				'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
			];
			$this->ModelKelas->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
			return redirect()->to(base_url('/kelas'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kelas'));
		}
	}

	public function add_kelas_perkuliahan()
	{
		if ($this->validate([
			'kode_kelas_perkuliahan' => [
				'label' => 'Kode Kelas Perkuliahan',
				'rules' => 'required|is_unique[tbl_kelas_perkuliahan.kode_kelas_perkuliahan]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!',
					'is_unique' => '{field} suda ada, Input Kode Lain !!!'
				]
			],
			'nama_kelas_perkuliahan' => [
				'label' => 'Nama Kelas Perkuliahan',
				'rules' => 'required|is_unique[tbl_kelas_perkuliahan.nama_kelas_perkuliahan]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!',
					'is_unique' => '{field} suda ada, nama Kode Lain !!!'
				]
			],

			'id_kurikulum' => [
				'label' => 'Mata Kuliah',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'id_prodi' => [
				'label' => 'Program Studi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'id_dosen' => [
				'label' => 'Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'tanggal_mulai' => [
				'label' => 'Tanggal Mulai Kuliah',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'tanggal_akhir' => [
				'label' => 'Tanggal Akhir',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],

		])) {
			//jika valid
			$ta = $this->ModelTa->ta_aktif();
			$data = [
				'kode_kelas_perkuliahan' => $this->request->getPost('kode_kelas_perkuliahan'),
				'id_kurikulum' => $this->request->getPost('id_kurikulum'),
				'nama_kelas_perkuliahan' => $this->request->getPost('nama_kelas_perkuliahan'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'id_dosen' => $this->request->getPost('id_dosen'),
				'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
				'tanggal_akhir' => $this->request->getPost('tanggal_akhir'),
				'id_ta' => $ta['id_ta'],
			];
			$this->ModelKelas->add_kelas_perkuliahan($data);
			session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
			return redirect()->to(base_url('kelas/kelas_perkuliahan'));
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kelas/kelas_perkuliahan'));
		}
	}
	public function add_anggota_kelas_perkuliahan($id_mhs, $kode_kelas_perkuliahan)
	{
		if ($this->validate([
			'id_kelas_perkuliahan' => [
				'label' => 'Mata Kuliah',
				'rules' => 'is_unique[tbl_krs.id_jadwal]',
				'errors' => [
					'is_unique' => '{field} suda ada, Input Mata Kuliah Lain !!!'
				]
				],
		])) {

			  //jika valid

			  $kelas = $this->ModelKelas->detail_kelas_perkuliahan($kode_kelas_perkuliahan);
			  $ta = $this->ModelTa->ta_aktif();
		$data = [
			'kode_kelas_perkuliahan' => $kode_kelas_perkuliahan,
			'id_dosen'       => $kelas['id_dosen'],
			'id_prodi'       => $kelas['id_prodi'],
			'nama_kelas_perkuliahan'       => $kelas['nama_kelas_perkuliahan'],
			'id_matkul'       => $kelas['id_matkul'],
			'tanggal_mulai'       => $kelas['tanggal_mulai'],
			'tanggal_akhir'       => $kelas['tanggal_akhir'],
			'id_mhs' => $id_mhs,
			'id_ta' => $ta['id_ta'],

		];
		$this->ModelKelas->tambah_mahasiswa_kelas_perkuliahan($data);
		session()->setFlashdata('pesan', 'Mata Kuliah Berhasil Di Tambahkan !!!');
		return redirect()->to('/kelas/rincian_kelas_perkuliahan/' . $kode_kelas_perkuliahan);
		return view('layout/v_wrapper', $data);

		} else {
			//jika tidak valid

			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kelas/rincian_kelas_perkuliahan/' . $kode_kelas_perkuliahan));
		}
	}

	public function add_anggota_kelas($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => $id_kelas

		];
		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil di Tambahkan ke Kelas !!!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
		return view('layout/v_wrapper', $data);
	}
	public function delete($id_kelas)
	{
		$data = [
			'id_kelas' => $id_kelas,
		];
		$this->ModelKelas->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to('/kelas');
	}

	public function delete_perkuliahan($id_kelas)
	{
		$data = [
			'id_kelas' => $id_kelas,
		];
		$this->ModelKelas->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to('/kelas');
	}

	public function delete_kelas_perkuliahan($id_kelas_perkuliahan)
	{
		$data = [
			'id_kelas_perkuliahan' => $id_kelas_perkuliahan,
		];
		$this->ModelKelas->delete_data_perkuliahan($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
		return redirect()->to('/kelas/kelas_perkuliahan');
	}

	public function rincian_kelas($id_kelas)
	{
		$data = [
			'title' =>    'Rombongan Kelas',
			'kelas' => $this->ModelKelas->detail($id_kelas),
			'mhs'	=> $this->ModelKelas->mahasiswa($id_kelas),
			'jml'   => $this->ModelKelas->jml_mhs($id_kelas), // mengambil jumlah
			'mhs_tpk' => $this->ModelKelas->mhs_mempunyai_kelas(),
			'isi'    =>    'admin/kelas/v_rincian_kelas'
		];
		return view('layout/v_wrapper', $data);
	}

	public function remove_anggota_kelas($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => null

		];
		$this->ModelKelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil  di Hapus dari Kelas !!!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
		return view('layout/v_wrapper', $data);
	}

	public function gagal_hapus($id_kelas)
	{
		$data = [
			'title' =>    'Rombongan Kelas',
			'kelas' => $this->ModelKelas->detail($id_kelas),
			'mhs'	=> $this->ModelKelas->mahasiswa($id_kelas),
			'jml'   => $this->ModelKelas->jml_mhs($id_kelas), // mengambil jumlah
			'mhs_tpk' => $this->ModelKelas->mhs_tidak_ada_kelas(),
			'isi'    =>    'admin/kelas/v_rincian_kelas'
			
			
		];
		session()->setFlashdata('gagal', 'Hapus terlebih dulu mahasiswa !!!');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
		return view('layout/v_wrapper', $data);
	}

	public function gagal_hapus_perkuliahan($id_prodi)
	{
		session()->setFlashdata('gagal', 'Hapus terlebih dulu Mata Kuliah di Jadwal !!!');
		return redirect()->to(base_url('kelas/kelas_perkuliahan/'));
		return view('layout/v_wrapper', $data);
	}
	public function kelas_perkuliahan()
	{
		
		$data = array(
			'title' =>    'Kelas Perkuliahan',
			'ta_aktif' 	=> 	$this->ModelTa->ta_aktif(),
			'kelas_perkuliahan' => $this->ModelKelas->allData_kelas_perkuliahan(),
			'matkul' => $this->ModelKelas->allData_MatkulKurikulum(),
			'dosen' => $this->ModelDosen->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'isi'    =>    'admin/kelas/v_kelas_perkuliahan'
		);
		return view('layout/v_wrapper', $data);
	}

	public function rincian_kelas_perkuliahan($Kode_Kelas_Perkuliahan)
	{
		$data = [
			'title' =>    'Rombongan Kelas Perkuliahan',
			'kelas' => $this->ModelKelas->detail_kelas_perkuliahan($Kode_Kelas_Perkuliahan),
			'jml'   => $this->ModelKelas->jml_mhs_kelas_perkuliahan($Kode_Kelas_Perkuliahan), // mengambil jumlah
			'mhs_hapus'	=> $this->ModelKelas->hapus_mahasiswa_kelas_perkuliahan($Kode_Kelas_Perkuliahan),
			'mhs_tpk' => $this->ModelKelas->mhs_kelas_perkuliahan(),
			'kelas_perkuliahan' => $this->ModelKelas->allData_kelas_perkuliahan(),
			'ta_aktif' 	=> 	$this->ModelTa->ta_aktif(),
			'isi'    =>    'admin/kelas/v_rincian_kelas_perkuliahan'
		];
		return view('layout/v_wrapper', $data);
	}

	public function remove_anggota_kelas_perkuliahan($id_kelas_perkuliahan, $Kode_Kelas_Perkuliahan)
	{
        $data = [
            'id_kelas_perkuliahan' => $id_kelas_perkuliahan,
            'kode_kelas_perkuliahan' => $Kode_Kelas_Perkuliahan,
        ];
        $this->ModelKelas->hapus_update_mhs_kelas_perkuliahan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('/kelas/rincian_kelas_perkuliahan/' . $Kode_Kelas_Perkuliahan));
    }




	//--------------------------------------------------------------------

}
