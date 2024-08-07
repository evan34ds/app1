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
use App\Models\ModelPembayaran;
use App\Models\ModelRuangan;
use App\Models\ModelTransaksiMid;



class Pembayaran extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelKelas = new ModelKelas();
		$this->ModelPembayaran = new ModelPembayaran();
		$this->ModelMatkul = new ModelMatkul();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelTa = new ModelTa();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
		$this->ModelRuangan = new ModelRuangan();
		$this->ModelTransaksiMid = new ModelTransaksiMid();
	}

	public function index()
	{
		$data = array(
			'title' =>    'Pembayaran',
			'ta'	=> $this->ModelTa->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'kategori_pembayaran' => $this->ModelPembayaran->allData_kategori_pembayaran(),
			'pembayaran' => $this->ModelPembayaran->allData(),
			'isi'    =>    'admin/pembayaran/v_pembayaran'
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$ta = $this->ModelTa->ta_aktif();

		$data = [
			'id_prodi' => $this->request->getPost('id_prodi'),
			'nama_pembayaran' => $this->request->getPost('nama_pembayaran'),
			'id_ta' => $ta['id_ta'],
			'biaya' => $this->request->getPost('biaya'),
			'id_kategori_pembayaran' => $this->request->getPost('id_kategori_pembayaran'),
		];
		$this->ModelPembayaran->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to('/Pembayaran');
	}
	public function add_pembayaran_mhs($id_kelas_pembayaran, $id_mhs)
	{
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$nama_kelas_pembayaran = $this->ModelPembayaran->findNamaKelas($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_prodi = $this->ModelPembayaran->findProdi($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis

		$waktu_pembayaran_mhs = $this->request->getPost('waktu_pembayaran_mhs');
		$waktu_pembayaran_mysql = date('Y-m-d H:i', strtotime($waktu_pembayaran_mhs));

		$user = session()->get('id'); //ambil data admin

		$data = [
			'pelunasan' => $this->request->getPost('pelunasan'),
			'kode_pembayaran_mhs' => $this->request->getPost('kode_pembayaran_mhs'),
			'waktu_pembayaran_mhs' => $waktu_pembayaran_mysql,
			'id_mhs' => $id_mhs,
			'kode_kelas_pembayaran' => $kode_kelas_pembayaran,
			'nama_kelas_pembayaran' => $nama_kelas_pembayaran,
			'id_prodi' => $id_prodi,
			'id_user' => $user,
		];
		$this->ModelPembayaran->pembayaran_mhs($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to('/pembayaran/daftar_peluanasan_mhs/' . $id_mhs . '/' . $kode_kelas_pembayaran);
	}

	public function add_anggota_kelas_pembayaran($id_mhs, $id_kelas_pembayaran)
	{
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas_pembayaran' => $id_kelas_pembayaran

		];
		$this->ModelPembayaran->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil di Tambahkan ke Kelas !!!');
		return redirect()->to(base_url('pembayaran/rincian_kelas_pembayaran/' . $id_kelas_pembayaran));
		return view('layout/v_wrapper', $data);
	}

	public function add_mhs_kelas_pembayaran_0($id_kelas_pembayaran)
	{
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$nama_kelas_pembayaran = $this->ModelPembayaran->findNamaKelas($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_prodi = $this->ModelPembayaran->findProdi($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_Ta = $this->ModelPembayaran->findIdTa($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$biaya = $this->ModelPembayaran->findbiaya($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$kategori_pembayaran = $this->ModelPembayaran->findkategori_pembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis


		$ModelMahasiswa = new ModelMahasiswa();
		$data = [];

		// Ambil data mahasiswa_id dan pembimbing_id dari formulir
		$mahasiswaIds = $this->request->getPost('mhs_ids');


		if (is_array($mahasiswaIds)) {

			// Loop melalui semua mahasiswa yang dipilih
			foreach ($mahasiswaIds as $mahasiswaId) {
				$data[] = [
					'id_mhs' => $mahasiswaId,
					'kode_kelas_pembayaran' => $kode_kelas_pembayaran,
					'nama_kelas_pembayaran' => $nama_kelas_pembayaran,
					'id_prodi' => $id_prodi,
					'id_ta' => $id_Ta,
					'biaya' => $biaya,
					'id_kategori_pembayaran' => $kategori_pembayaran,
				];
			}


			$ModelMahasiswa->Tambah_mhs_status1($data);

			// Redirect ke halaman sebelumnya atau tampilkan pesan berhasil jika diperlukan
			return redirect()->back()->with('pesan', 'Data berhasil disimpan ke tabel Kelas Pembyaran');
		} else {

			return redirect()->back()->with('error', 'Tidak Ada data yang di Pilih.');
		}
	}

	public function add_mhs_kelas_pembayaran($id_kelas_pembayaran)
	{
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$nama_kelas_pembayaran = $this->ModelPembayaran->findNamaKelas($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_prodi = $this->ModelPembayaran->findProdi($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_Ta = $this->ModelPembayaran->findIdTa($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$biaya = $this->ModelPembayaran->findbiaya($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$kategori_pembayaran = $this->ModelPembayaran->findkategori_pembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		

		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'SB-Mid-server-EBgU9ji51TZg0QtIqTFcABgw';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		$ModelMahasiswa = new ModelMahasiswa();
		$data = [];

		// Ambil data mahasiswa_id dan pembimbing_id dari formulir
		$mahasiswaIds = $this->request->getPost('mhs_ids');

		if (is_array($mahasiswaIds)) {
			// Loop melalui semua mahasiswa yang dipilih
			foreach ($mahasiswaIds as $mahasiswaId) {
				$kode = bin2hex(random_bytes(16)); // Menghasilkan token unik
				$unik=$nama_kelas_pembayaran. '-' . $kode;
				// Buat parameter untuk Midtrans
				$params = [
					'transaction_details' => [
						'order_id' => $unik, // Pastikan order_id unik
						'gross_amount' => $biaya, // Pastikan ini diisi dengan nilai yang sesuai
					],
					// Parameter lainnya yang diperlukan oleh Midtrans
				];

				// Dapatkan token untuk mahasiswa ini
				$snapToken = \Midtrans\Snap::getSnapToken($params);
				$token = $snapToken;

				// Tambahkan data ke array
				$data[] = [
					'id_mhs' => $mahasiswaId,
					'kode_kelas_pembayaran' => $kode_kelas_pembayaran,
					'nama_kelas_pembayaran' => $nama_kelas_pembayaran,
					'id_prodi' => $id_prodi,
					'id_ta' => $id_Ta,
					'biaya' => $biaya,
					'id_kategori_pembayaran' => $kategori_pembayaran,
					'midtrans_token' => $token, // Tambahkan token Midtrans ke data
					'order_id' => $unik // Tambahkan token Midtrans ke data
				];
			}

			// Simpan data ke database
			$ModelMahasiswa->Tambah_mhs_status1($data);

			// Redirect ke halaman sebelumnya atau tampilkan pesan berhasil jika diperlukan
			return redirect()->back()->with('pesan', 'Data berhasil disimpan ke tabel Kelas Pembayaran');
		} else {
			return redirect()->back()->with('error', 'Tidak Ada data yang dipilih.');
		}
	}

	public function add_kelas_pembayaran()
	{


		if ($this->validate([
			'kode_kelas_pembayaran' => [
				'label' => 'Kode Kelas Pembayaran',
				'rules' => 'required|is_unique[tbl_kelas_pembayaran.kode_kelas_pembayaran]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!',
					'is_unique' => '{field} suda ada, Silahkan Input Kode Lain !!!'
				]
			],
			'nama_kelas_pembayaran' => [
				'label' => 'Kelas Pembayaran',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'id_kategori_pembayaran' => [
				'label' => 'Kategori Pembayaran',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
		])) {
			$data = [
				'id_kelas_pembayaran' => $this->request->getPost('id_kelas_pembayaran'),
				'kode_kelas_pembayaran' => $this->request->getPost('kode_kelas_pembayaran'),
				'nama_kelas_pembayaran' => $this->request->getPost('nama_kelas_pembayaran'),
				'id_prodi' => $this->request->getPost('id_prodi'),
				'id_ta' =>  $this->request->getPost('id_ta'),
				'biaya' => $this->request->getPost('biaya'),
				'id_kategori_pembayaran' => $this->request->getPost('id_kategori_pembayaran'),
			];
			$this->ModelPembayaran->add_kelas_pembayaran($data);
			session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
			return redirect()->to('/Pembayaran/kelas_pembayaran');
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/Pembayaran/kelas_pembayaran'));
		}
	}


	public function add_kategori_pembayaran()
	{
		if ($this->validate([
			'kode_kategori_pembayaran' => [
				'label' => 'Kode kategori Pembayaran',
				'rules' => 'required|is_unique[tbl_kategori_pembayaran.kode_kategori_pembayaran]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!',
					'is_unique' => '{field} suda ada, Silahkan Input Kode Lain !!!'
				]
			],
			'nama_kategori_pembayaran' => [
				'label' => 'Nama Kategori Pembayaran',
				'rules' => 'required|is_unique[tbl_kategori_pembayaran.nama_kategori_pembayaran]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
			'singkatan_kategori_pembayaran' => [
				'label' => 'Singkatan Kategori Pembayaran',
				'rules' => 'required|is_unique[tbl_kategori_pembayaran.singkatan_kategori_pembayaran]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!!'
				]
			],
		])) {
			$data = [
				'kode_kategori_pembayaran' => $this->request->getPost('kode_kategori_pembayaran'),
				'nama_kategori_pembayaran' => $this->request->getPost('nama_kategori_pembayaran'),
				'singkatan_kategori_pembayaran' => $this->request->getPost('singkatan_kategori_pembayaran'),
			];
			$this->ModelPembayaran->add_kategori_pembayaran($data);
			session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
			return redirect()->to('/Pembayaran/kategori_pembayaran');
		} else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/Pembayaran/kategori_pembayaran'));
		}
	}

	public function delete_pembayaran($id_pembayaran)
	{
		$jumlah_kelas = $this->ModelPembayaran->findNameByPembayaran($id_pembayaran); // cek agar mata kuliah bisa didefinis


		if ($jumlah_kelas == 0) {
			// Menyiapkan data untuk penghapusan
			$data = [
				'id_pembayaran' => $id_pembayaran,
			];

			// Menghapus data kelas pembayaran menggunakan model
			$this->ModelPembayaran->delete_data($data);

			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu
			session()->setFlashdata('pesan', ' Data Berhasil dihapus');
			return redirect()->to('/pembayaran');
		} else {
			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu jika kondisi tidak terpenuhi
			session()->setFlashdata('gagal', 'Hapus terlebih dahulu data yang berkaitan di data kelas pembayaran');
			return redirect()->to(base_url('/pembayaran'));
		}
	}

	public function delete_kelas_pembayaran($id_kelas_pembayaran, $kode_kelas_pembayaran)
	{
		$jumlah_kelas = $this->ModelPembayaran->findNameById($kode_kelas_pembayaran); // cek agar mata kuliah bisa didefinis



		if ($jumlah_kelas == 0) {
			// Menyiapkan data untuk penghapusan
			$data = [
				'id_kelas_pembayaran' => $id_kelas_pembayaran,
			];

			// Menghapus data kelas pembayaran menggunakan model
			$this->ModelPembayaran->delete_data_kelas_pembayaran($data);

			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu
			session()->setFlashdata('pesan', 'Data Kelas ' . $kode_kelas_pembayaran . 'koso' . $jumlah_kelas . ' Berhasil dihapus');
			return redirect()->to('/pembayaran/kelas_pembayaran');
		} else {
			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu jika kondisi tidak terpenuhi
			session()->setFlashdata('gagal', 'Hapus terlebih dahulu Mahasiswa di Kode Kelas ' . $kode_kelas_pembayaran . 'Jumlah Kelas' . $jumlah_kelas);
			return redirect()->to(base_url('/pembayaran/kelas_pembayaran'));
		}
	}

	public function delete_kategori_pembayaran($id_kategori_pembayaran)
	{
		$jumlah_kelas = $this->ModelPembayaran->findNameByKategoriPembayaran($id_kategori_pembayaran); // cek agar mata kuliah bisa didefinis


		if ($jumlah_kelas == 0) {
			// Menyiapkan data untuk penghapusan
			$data = [
				'id_kategori_pembayaran' => $id_kategori_pembayaran,
			];

			// Menghapus data kelas pembayaran menggunakan model
			$this->ModelPembayaran->delete_kategori_pembayaran($data);

			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu
			session()->setFlashdata('pesan', ' Data Berhasil dihapus');
			return redirect()->to('/pembayaran/kategori_pembayaran');
		} else {
			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu jika kondisi tidak terpenuhi
			session()->setFlashdata('gagal', 'Hapus terlebih dahulu data yang berkaitan di data pembayaran');
			return redirect()->to(base_url('/pembayaran/kategori_pembayaran'));
		}
	}
	public function delete_pelunasan_mhs($id_kelas_pembayaran, $id_mhs)
	{
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$nama_kelas_pembayaran = $this->ModelPembayaran->findNamaKelas($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis


		$data = [
			'id_kelas_pembayaran' => $id_kelas_pembayaran,
		];

		// Menghapus data kelas pembayaran menggunakan model
		$this->ModelPembayaran->delete_data_kelas_pembayaran($data);

		// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu
		session()->setFlashdata('pesan', 'Data Kelas ' . $nama_kelas_pembayaran . ' Berhasil dihapus');
		return redirect()->to('/pembayaran/daftar_peluanasan_mhs/' . $id_mhs . '/' . $kode_kelas_pembayaran);
	}

	public function daftar_mhs_pembayaran()
	{
		$data = array(
			'title' => 'Daftar Mahasiswa',
			'mhs'   => $this->ModelPembayaran->allData_mhs_pembayaran(),
			'isi'   => 'admin/pembayaran/v_daftar_mahasiswa_pembayaran'
		);
		return view('layout/v_wrapper', $data);
	}

	public function daftar_peluanasan_mhs($id_mhs, $kode_kelas_pembayaran)
	{
		$jml_pelunasan = $this->ModelPembayaran->findjmlpelunasan($id_mhs, $kode_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		// cek agar mata kuliah bisa
		//	print_r($jml_pelunasan);
		//	$angka_pelunasan = $jml_pelunasan[0]['pelunasan'];
		//	 echo $angka_pelunasan;
		$data = array(
			'title' =>    'Pembayaran Mahaiswa',
			'daftar_pelunasan'  => $this->ModelPembayaran->daftar_pembayaran_pelunasan($id_mhs, $kode_kelas_pembayaran),
			'pembayaran_keuangan' => $this->ModelPembayaran->pembayaran_keuangan($id_mhs, $kode_kelas_pembayaran),
			'pembayaran' => $this->ModelPembayaran->data_pembayaran($id_mhs, $kode_kelas_pembayaran),
			'isi'   => 'admin/pembayaran/v_daftar_pelunasan_mhs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function delete_anggota_kelas_pembayara($id_kelas_pembayaran)
	{
		$id_mhs = $this->ModelPembayaran->findidKelasPembayaranId_kelas($id_kelas_pembayaran);
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran);
		$jumlah_kelas = $this->ModelPembayaran->findJumlahKelasPembayaran($id_mhs, $kode_kelas_pembayaran); // cek agar mata kuliah bisa didefinis

		if ($jumlah_kelas == 1) {
			$data = [
				'id_kelas_pembayaran' => $id_kelas_pembayaran,
			];
			$this->ModelPembayaran->delete_data_kelas_pembayaran($data);
			session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
			return redirect()->back()->with('pesan', 'Data berhasil dihapus');
		} else {
			// Menetapkan pesan flash dan mengarahkan kembali ke halaman tertentu jika kondisi tidak terpenuhi
			session()->setFlashdata('gagal', 'Hapus terlebih dahulu data yang berkaitan di proses pembayaran');
			return redirect()->back();
		}
	}

	public function detail_pembayaran_mhs($id_mhs)
	{
		$data = array(
			'title' =>    'Pembayaran Mahaiswa',
			'mhs'   => $this->ModelPembayaran->detail_pembayaran_mhs($id_mhs),
			'pembayaran' => $this->ModelPembayaran->pembayaran($id_mhs),
			'isi'   => 'admin/pembayaran/v_detail_pembayaran_mhs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function edit($id_pembayaran)
	{
		$data = [
			'id_pembayaran' => $id_pembayaran,
			'nama_pembayaran' => $this->request->getPost('nama_pembayaran'),
			'id_ta' => $this->request->getPost('id_ta'),
			'id_prodi' => $this->request->getPost('id_prodi'),
			'biaya' => $this->request->getPost('biaya'),
			'id_kategori_pembayaran' => $this->request->getPost('id_kategori_pembayaran'),
		];
		$this->ModelPembayaran->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to('/pembayaran');
	}

	public function edit_kategori($id_kategori_pembayaran)
	{
		$data = [
			'id_kategori_pembayaran' => $id_kategori_pembayaran,
			'nama_kategori_pembayaran' => $this->request->getPost('nama_kategori_pembayaran'),
			'singkatan_kategori_pembayaran' => $this->request->getPost('singkatan_kategori_pembayaran'),
		];
		$this->ModelPembayaran->edit_kategori($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to('/pembayaran/kategori_pembayaran');
	}

	public function edit_pelunasan($id_kelas_pembayaran, $id_mhs)
	{
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$data = [
			'id_kelas_pembayaran' => $id_kelas_pembayaran,
			'id_mhs' => $id_mhs,
			'pelunasan' => $this->request->getPost('pelunasan'),
		];
		$this->ModelPembayaran->edit_pelunasan($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to('/pembayaran/daftar_peluanasan_mhs/' . $id_mhs . '/' . $kode_kelas_pembayaran);
	}

	public function kategori_pembayaran()
	{
		$data = array(
			'title' =>    'Kelas Pembayaran',
			'kategori_pembayaran' => $this->ModelPembayaran->allData_kategori_pembayaran(),
			'isi'    =>    'admin/pembayaran/v_kategori_pembayaran'
		);
		return view('layout/v_wrapper', $data);
	}



	public function kelas_pembayaran()
	{
		$data = array(
			'title' =>    'Kelas Pembayaran',
			'kelas_pembayaran' => $this->ModelPembayaran->kelas_pembayaran(),
			'prodi' => $this->ModelProdi->allData(),
			'ta'	=> $this->ModelTa->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'kategori_pembayaran' => $this->ModelPembayaran->allData_kategori_pembayaran(),
			'isi'    =>    'admin/pembayaran/v_kelas_pembayaran'
		);
		return view('layout/v_wrapper', $data);
	}

	public function laporan_pembayaran()
	{
		$request = service('request');
		$today = date('Y-m-d');

		// Mendapatkan tanggal awal dan tanggal akhir dari form jika tersedia, atau menggunakan tanggal hari ini secara default
		$start_date = $request->getPost('start_date') ? $request->getPost('start_date') : $today;
		$end_date = $request->getPost('end_date') ? $request->getPost('end_date') : $today;
		$data = array(
			'title' =>    'Laporan Pembayaran',
			'start_date' => $start_date,
			'end_date' => $end_date,
			'results' => $this->ModelPembayaran->pencarian_pembayaran_harian($start_date, $end_date),
			'statistik_total_pelunasan' => $this->ModelPembayaran->statistik_total_pelunasan(),
			'isi'    =>    'admin/pembayaran/v_laporan_pembayaran'
		);
		return view('layout/v_wrapper', $data);
	}

	public function laporan_harian()
	{

		$request = service('request');

		// Mendapatkan tanggal hari ini
		$today = date('Y-m-d');

		// Mendapatkan tanggal awal dan tanggal akhir dari form jika tersedia, atau menggunakan tanggal hari ini secara default
		$start_date = $request->getPost('start_date') ? $request->getPost('start_date') : $today;
		$end_date = $request->getPost('end_date') ? $request->getPost('end_date') : $today;

		$data = array(
			'title' =>    'Laporan Pembayaran',
			'start_date' => $start_date,
			'end_date' => $end_date,
			'results' => $this->ModelPembayaran->pencarian_pembayaran_harian($start_date, $end_date),
			'isi'    =>    'admin/pembayaran/laporan/v_laporan_harian'
		);
		return view('layout/v_wrapper', $data);
	}

	public function laporan_statistik()
	{

		$data = [
			'title' =>    'Laporan Statistik Pembayaran',
			'nama_mhs_list' => $this->ModelPembayaran->getNamaMhsList(),
			'nama_mhs_list_tiga' => $this->ModelPembayaran->getNamaMhsList3(),
			'kode_kelas_pembayaran_list' => $this->ModelPembayaran->getKodeKelasPembayaranList(),
			'get_mhs_jumlah_pelunasan' => $this->ModelPembayaran->get_mhs_jumlah_pelunasan(),
			'pelunasan_data' => $this->ModelPembayaran->getPelunasanData(),
			'jumlah_pelunasan_data' => $this->ModelPembayaran->getJumlahpelunasan(),
			'groupedData' => $this->ModelPembayaran->getGroupedData(),
			'tahun_akademik_list' => $this->ModelTa->alldata(),
			'isi'    =>    'admin/pembayaran/laporan/v_laporan_statistik'

		];

		return view('layout/v_wrapper', $data);
	}

	public function input_pem_mitrans()
	{

		$data = [
			'title' =>    'Pembuatan Tagihan',
			'tagihan' => $this->ModelTransaksiMid->findAll(),
			'isi'    =>    'admin/pembayaran/mitrans/input_pem_mid'

		];

		return view('layout/v_wrapper', $data);
	}



	public function pem_mitrans()
	{
		$depan = $this->request->getVar('depan');
		$belakang = $this->request->getVar('belakang');
		$email = $this->request->getVar('email');
		$ponsel = $this->request->getVar('ponsel');
		$nominal = $this->request->getVar('nominal');
		$pembayaran =  $this->request->getVar('nama_pembayaran');
		$id_order = time();

		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'SB-Mid-server-EBgU9ji51TZg0QtIqTFcABgw';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		$item = array(
			array(
				'id' => 'A02',
				'price' => $nominal,
				'quantity' => 1,
				'name' => $pembayaran,
			)
		);

		$params = array(
			'transaction_details' => array(
				'order_id' => $id_order,
				'gross_amount' => $nominal,
			),
			'customer_details' => array(
				'first_name' => $depan,
				'last_name' => $belakang,
				'email' => $email,
				'phone' => $ponsel,
			),
			'item_details' => $item,
		);

		$snapToken = \Midtrans\Snap::getSnapToken($params);
		$token = $snapToken;

		$data = [
			'id_transaksi_mid' => $id_order,
			'nama_depan' => $depan,
			'nama_belakang' => $belakang,
			'email' => $email,
			'ponsel' => $ponsel,
			'nominal' => $nominal,
			'token' => $token,
			'nama_pembayaran' => $pembayaran,
		];

		$this->ModelTransaksiMid->save($data);

		return redirect()->to('/pembayaran/input_pem_mitrans');
	}



	public function rincian_kelas_pembayaran($id_kelas_pembayaran)
	{
		$prodi = $this->ModelPembayaran->findProdi($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$kode_kelas_pembayaran = $this->ModelPembayaran->findKodeKelasPembayaran($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis
		$id_ta = $this->ModelPembayaran->findIdTa($id_kelas_pembayaran); // cek agar mata kuliah bisa didefinis


		$data = [
			'title' =>    'Rombongan Kelas Pembayaran',
			'rincian_kelas_pembayaran' => $this->ModelPembayaran->detail_kelas_pembayaran($kode_kelas_pembayaran),
			'kelas_pembayaran' => $this->ModelPembayaran->deta_kelas_pembayaran($kode_kelas_pembayaran),
			'data_mhs_tambah' => $this->ModelPembayaran->data_mhs_tambah($prodi, $id_ta), //
			'akses_fitur_mhs' => $this->ModelPembayaran->akses_fitur_mhs($kode_kelas_pembayaran),
			'mhs' => $this->ModelPembayaran->mhs($prodi),
			'isi'    =>    'admin/pembayaran/v_rincian_kelas_pembayaran'
		];
		return view('layout/v_wrapper', $data);
	}
}
