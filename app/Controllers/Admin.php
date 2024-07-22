<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;
use App\Models\ModelKrs;
use App\Models\ModelAdmin;
use App\Models\ModelDsn;
use App\Models\ModelMahasiswa;
use App\Models\ModelStatus;
use App\Models\ModelTutorial;

class Admin extends BaseController
{

	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
		$this->ModelProdi = new ModelProdi();
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
		$this->ModelKrs = new ModelKrs();
		$this->ModelDsn = new ModelDsn();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelStatus = new ModelStatus();
	}
	public function index()
	{

		$data = array(
			'title' =>    'Login',
			'jml_gedung' => $this->ModelAdmin->jml_gedung(),
			'jml_ruangan' => $this->ModelAdmin->jml_ruangan(),
			'jml_fakultas' => $this->ModelAdmin->jml_fakultas(),
			'jml_prodi' => $this->ModelAdmin->jml_prodi(),
			'jml_dosen' => $this->ModelAdmin->jml_dosen(),
			'jml_mhs' => $this->ModelAdmin->jml_mhs(),
			'jml_matkul' => $this->ModelAdmin->jml_matkul(),
			'jml_user' => $this->ModelAdmin->jml_user(),
			'jml_user' => $this->ModelAdmin->jml_user(),
			'grafik' => $this->ModelAdmin->grafik(),
			'data' => $this->ModelAdmin->jumlah_prodi(),
			'aktif_mhs' => $this->ModelAdmin->aktif_mhs(),
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'ta_aktif_dasboard' => $this->ModelTa->ta_aktif_dasboard(),
			'aktif_mhs_prodi' => $this->ModelAdmin->aktif_mhs_prodi(),
			'isi'    =>    'admin/login/v_admin'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add_mhs_akses()
	{
		$ModelMahasiswa = new ModelMahasiswa();
		$data = [];

		// Ambil data mahasiswa_id dan pembimbing_id dari formulir
		$mahasiswaIds = $this->request->getPost('mahasiswa_ids');
		$ta = $this->ModelTa->ta_aktif();

		if (is_array($mahasiswaIds)) {

			// Loop melalui semua mahasiswa yang dipilih
			foreach ($mahasiswaIds as $mahasiswaId) {
				$data[] = [
					'id_mhs' => $mahasiswaId,
					'id_ta'       => $ta['id_ta'],
				];
			}


			$ModelMahasiswa->Tambah_mhs_status($data);

			// Redirect ke halaman sebelumnya atau tampilkan pesan berhasil jika diperlukan
			return redirect()->back()->with('pesan', 'Data berhasil disimpan ke tabel status.');
		} else {

			return redirect()->back()->with('error', 'Tidak Ada data yang di Pilih.');
		}
	}

	public function admin_khs_mhs($id_mhs)
	{
		$ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik krs
		$data = array(
			'title' => 'Kartu Hasil Studi Mahasiswa',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'mhs'       => $this->ModelAdmin->Data_mahasiswa_transkip($id_mhs),
			'khs'   => $this->ModelAdmin->admin_khs($id_mhs, $ta['id_ta']),
			'isi'   => 'admin/admin_khs/v_admin_khs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function admin_prodi_krs()
	{
		$data = array(
			'title' =>    'PRODI',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'prodi' => $this->ModelAdmin->prodi_fakultas(),
			'isi'    =>    'admin/admin_krs/admin_krs_prodi'
		);
		return view('layout/v_wrapper', $data);
	}

	public function admin_krs_daftar_matkul($id_prodi)
	{
		$prodi = $this->ModelAdmin->DataProdi($id_prodi); // Menampilkan data prodi => data 1
		$ta = $this->ModelTa->ta_aktif(); // menampilkan data prodi => data 2
		$data = array(
			'title' =>    'Kartu Rencana Studi (KRS)',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'prodi' 	=> 	$this->ModelProdi->detail_Data($id_prodi), //($id_prodi) ->menampilkan data berdasarkan prodi
			'matkul_ditawarkan'  => $this->ModelAdmin->jumlah_mata_kuliah_kontrak($ta['id_ta'], $prodi['id_prodi']), //menampilkan data ($ta['id_ta'], $prodi['id_prodi']) di sesuaikan data 1 dan 2
			'isi'    =>    'admin/admin_krs/v_daftar_mata_kuliah'
		);
		return view('layout/v_wrapper', $data);
	}

	public function admin_aktivitas_mhs()
	{

		$data = array(
			'title' => 'Daftar Mahasiswa',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'sks' => $this->ModelAdmin->hitung_aktivitas_mhs1(),
			'sks_keseluruhan' => $this->ModelAdmin->hitung_aktivitas_mhs2(),
			'sks_semester' => $this->ModelAdmin->hitung_aktivitas_mhs4(),
			'unionsks' => $this->ModelAdmin->hitung_aktivitas_mhs3(),
			'mhs'       => $this->ModelKrs->DataMhs(),
			'isi'    =>    'admin/admin_krs/admin_aktivitas_mhs1'
		);


		return view('layout/v_wrapper1', $data);
	}

	

	public function admin_aktivitas_mhs1()
	{
		$mhs = $this->ModelKrs->DataMhs();
		$ta = $this->ModelTa->ta_aktif(); //sesuiakan dengan tahun akademik 
		$data = array(
			'title' => 'Daftar Mahasiswa',
			'ta_aktif' => $this->ModelTa->ta_aktif(),
			'mhs'   => $this->ModelAdmin->datamhs_hitug_aktivitas(),
			'data_sks'   => $this->ModelAdmin->DataKrsAktivitas($ta['id_ta'], $mhs['id_mhs']),
			'isi'    =>    'admin/admin_krs/admin_aktivitas_mhs'
		);

		return view('layout/v_wrapper', $data);
	}

	public function admin_krs_daftar_mahasiswa($id_jadwal)
	{

		$dosen = $this->ModelDsn->DataDosen();
		$data = array(
			'title' =>    'DAFTAR MAHASISWA',
			'jadwal' =>    $this->ModelAdmin->DetailJadwal($id_jadwal), //disesuaikan dengan jadwal ->modelAdmin->detailJadwal
			'mhs' =>    $this->ModelAdmin->mhs($id_jadwal), //disesuaikan dengan krs ->modelAdmin->mhs
			'isi'    =>    'admin/admin_krs/v_admin_krs_daftar_mahasiswa'
		);
		return view('layout/v_wrapper', $data);
	}
	public function daftar_mhs_khs()

	{
		$data = array(
			'title' => 'Kartu Hasil Studi Mahasiswa',
			'mhs'   => $this->ModelMahasiswa->allData(),
			'isi'   => 'admin/mahasiswa/v_admin_khs_mhs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function delete($id_krs, $id_jadwal)
	{
		$data = [
			'id_krs' => $id_krs,
		];
		$this->ModelKrs->delete_data($data);
		session()->setFlashdata('pesan', ' Berhasil Di Hapus !!!');
		return redirect()->to(base_url('/admin/admin_krs_daftar_mahasiswa/' . $id_jadwal));
	}

	public function daftar_mhs_transkip()
	{
		$data = array(
			'title' => 'Transkip Nilai Mahasiswa',
			'mhs'   => $this->ModelMahasiswa->allData(),
			'isi'   => 'admin/mahasiswa/v_daftar_mahasiswa_transkip'
		);
		return view('layout/v_wrapper', $data);
	}

	public function institusi()
	{
		$data = array(
			'title' => 'Data Institusi',
			'data_institusi'   => $this->ModelAdmin->DataInstitusi_kontak(),
			'dosen' =>$this->ModelDosen->allData(),
			'isi'    =>    'admin/institusi/v_index_institusi'
		);

		return view('layout/v_wrapper', $data);
	}
	

	public function transkrip_print($id_mhs)
    {
		$mhs = $this->ModelAdmin->Data_mahasiswa_transkip($id_mhs);
        $data = [
			'title' =>    'Transkip Nilai Mahasiswa',
			'mhs'       => $this->ModelAdmin->Data_mahasiswa_khs($id_mhs),
			'matkul_ditawarkan'  => $this->ModelAdmin->matkulditawarkan($mhs['id_prodi']), //sesuiakan dengan tahun akademik krs // $mhs['id_prodi'] filter berdasarkan id_prodi
			'data_matkul'    => $this->ModelAdmin->DataMatkul($mhs['id_mhs']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
			'data_matkul_aktif'    => $this->ModelAdmin->DataMatkul_aktif($mhs['id_mhs']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
        ];
        return view('admin/mahasiswa/v_transkrip_print', $data);
    }

	public function transkip_simpan()
	{
		$mhs = $this->ModelAdmin->data_transkrip();
		foreach ($mhs as $key => $value) {
			$data = [
				'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
				'ceklis_transkrip' => $this->request->getPost($value['id_krs'] . 'ceklis_transkrip'),
			];
			$this->ModelAdmin->Simpan_update_transkrip($data);
		}

		return redirect()->back()->with('pesan', 'Data Transkip tersimpan');
	}

	
	public function tambah_status($id_prodi)

	// TERUSKAN VIDEO 21 SIAKAD CI 4 MENIT 16:19
	{
		$mhs = $this->ModelKrs->DataMhs();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'id_jadwal' => $id_prodi,
			'id_ta'       => $ta['id_ta'],
			'id_mhs'       => $mhs['id_mhs']
		];
		$this->ModelAdmin->Tambah_status($data);
		session()->setFlashdata('pesan', 'Mata Kuliah Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('krs'));
		return view('layout/v_wrapper', $data);
	}
	public function transkip($id_mhs)
	{
		$mhs = $this->ModelAdmin->Data_mahasiswa_transkip($id_mhs);
		$data = array(
			'title' =>    'Transkip Nilai Mahasiswa',
			'mhs'       => $this->ModelAdmin->Data_mahasiswa_khs($id_mhs),
			'matkul_ditawarkan'  => $this->ModelAdmin->matkulditawarkan($mhs['id_prodi']), //sesuiakan dengan tahun akademik krs // $mhs['id_prodi'] filter berdasarkan id_prodi
			'data_matkul'    => $this->ModelAdmin->DataMatkul($mhs['id_mhs']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
			'data_matkul_aktif'    => $this->ModelAdmin->DataMatkul_aktif($mhs['id_mhs']), // tambahan , $ta['id_ta'] sesuiakan dengan tahun akademik krs
			'isi'   => 'admin/mahasiswa/v_transkip_nilai'
		);
		return view('layout/v_wrapper', $data);
	}

	public function update_institusi($id_institusi)
    {
        if ($this->validate([
            'nama_institusi' => [
                'label' => 'nama_institusi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
			'id_dosen' => [
                'kepalah' => 'Kepalah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

			'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

			'kontak' => [
                'label' => 'Kontak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
			'lokasi_maps' => [
                'label' => 'Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

			'visi_misi' => [
                'label' => 'Visi dan Misi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

			'sambutan' => [
                'label' => 'Sambutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

        ])) {
            //jika valid
            $data = [
                'id_institusi' => $id_institusi,
                'nama_institusi' => $this->request->getPost('nama_institusi'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'alamat' => $this->request->getPost('alamat'),
                'kontak' => $this->request->getPost('kontak'),
                'lokasi_maps' => $this->request->getPost('lokasi_maps'),
                'visi_misi' => $this->request->getPost('visi_misi'),
                'sambutan' => $this->request->getPost('sambutan'),
            ];
            $this->ModelAdmin->update_data_institusi($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
            return redirect()->to('/admin/institusi/');
        } else {
            //jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/admin/institusi/'));
        }
    }


	


	//--------------------------------------------------------------------

}
