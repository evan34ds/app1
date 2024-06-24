<?php

namespace App\Controllers;

$pager = \Config\Services::pager();



use App\Models\ModelAdmin;
use App\Models\Modelberita;
use App\Models\Modelkategori;
use App\Models\Modelkonfigurasi;
use App\Models\ModelPengumuman;
use phpDocumentor\Reflection\Types\This;

class Home extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
        $this->berita = new Modelberita;
        $this->kategori = new Modelkategori;
        $this->konfigurasi = new Modelkonfigurasi;
        $this->pengumuman = new ModelPengumuman;
    }

    public function index()

    {   
        $tombolCari = $this->request->getPost('tombolcariberita');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('cariberita');
            session()->set('cariberita', $cari);
            redirect()->to('/home/beranda');
        } else {
            $cari = session()->get('cariberita');
        }

        $dataBerita = $cari ? $this->berita->cariData($cari) : $this->berita->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
        ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id');
        $noHalaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'dosen'  => $this->ModelAdmin->data_dosen(),
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $dataBerita->paginate(3, 'berita'),
            'pager'   => $this->berita->pager,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'noHalaman' => $noHalaman,
            'cari'  => $cari,
            'isi'    =>    'layout1/beranda/v_beranda1'
        ];
        return view('layout1/v_wrapper', $data);
    }

    public function berita_selengkapnya()

    {
        $tombolCari = $this->request->getPost('tombolcariberita');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('cariberita');
            session()->set('cariberita', $cari);
            redirect()->to('/home/berita_selengkapnya');
        } else {
            $cari = session()->get('cariberita');
        }

        $dataBerita = $cari ? $this->berita->cariData($cari) : $this->berita->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
        ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id');

        $noHalaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Berita',
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $dataBerita->paginate(3, 'berita'),
            'listBerita' => $this->berita->listBerita(),
            'pager'   => $this->berita->pager,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'noHalaman' => $noHalaman,
            'cari'  => $cari,
            'isi'    =>    'beranda/v_berita_selengkapnya'
        ];
        return view('layout_profil/v_wrapper', $data);
    }

    public function berita_kategori($kategori_id)

    {
        $tombolCari = $this->request->getPost('tombolcariberita');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('cariberita');
            session()->set('cariberita', $cari);
            redirect()->to('/home/berita_selengkapnya');
        } else {
            $cari = session()->get('cariberita');
        }

        $dataBerita = $cari ? $this->berita->cariData($cari) : $this->berita->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
        ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id');

        $noHalaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Berita',
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $dataBerita->paginate(3, 'berita'),
            'listBeritaKategori' => $this->berita->listBeritaKategori($kategori_id),
            'listBerita' => $this->berita->listBerita(),
            'pager'   => $this->berita->pager,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'noHalaman' => $noHalaman,
            'cari'  => $cari,
            'isi'    =>    'beranda/v_berita_kategori'
        ];
        return view('layout_profil/v_wrapper', $data);
    }

    public function beranda()

    {
        $kategori = $this->kategori->list();
        $berita = $this->berita->published();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $berita,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'isi'    =>    'layout1/v_home'
        ];
        return view('layout1/v_wrapper', $data);
    }

    public function profil()

    {
        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
   // dd($datapengumuman);

        $data = [
            'title' =>    'STAK-LUWUK BANGGAI',
            'slider'  => $this->ModelAdmin->slider(),
            'listberita' => $this->berita->listBerita(),
            'pengumuman'  => $this->pengumuman->listPengumuman(),
            'kategori' => $kategori,
            'pager'   => $this->berita->pager,
            'konfigurasi' => $konfigurasi,
            'jml_prodi' => $this->ModelAdmin->jml_prodi(),
			'jml_dosen' => $this->ModelAdmin->jml_dosen(),
			'jml_mhs' => $this->ModelAdmin->jml_mhs(),
            'isi'    =>    'beranda/v_profil'
        ];
        return view('layout_profil/v_wrapper', $data);
      
    }

    public function pengumuman_selengkapnya()

    {
        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
   // dd($datapengumuman);

        $data = [
            'title' =>    'Pengumuman',
            'pengumumanSelengkapnya'  => $this->pengumuman->pengumumanSelengkapnya(),
            'kategori' => $kategori,
            'pager'   => $this->berita->pager,
            'konfigurasi' => $konfigurasi,
            'isi'    =>    'beranda/v_pengumuman_selengkapnya'
        ];
        return view('layout_profil/v_wrapper', $data);
      
    }


    public function  pagination()
    {
        return view('pagination/pagination');
    }

    public function  welcome()
    {
        return view('welcome_message');
    }

    public function cari()
    {

        $kategori = $this->kategori->list();
        $cari = $this->request->getGet('cari');
        $data = $this->berita->cari($cari);
        $data = [
            'title' =>    'Pencarian data',
            'cari'      => $cari,
            'data'      => $data,
            'kategori' => $kategori,
            'isi'    =>    'frontend/hasil_pencarian'
        ];
        return view('layout/v_wrapper', $data);
    }



    // public function cari()
    // {
    //     $data = [
    //         'users' => $this->Modelberita->paginate(5),
    //         'pager' => $this->Modelberita->pager,
    //     ];
    //     return view('frontend/hasil_pencarian', $data);
    // }
    public function beranda2()

    {
        $kategori = $this->kategori->list();
        $berita = $this->berita->published();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'dosen'  => $this->ModelAdmin->data_dosen(),
            'berita' => $berita,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'isi'    =>    'layout1/beranda/v_beranda'
        ];
        return view('layout1/v_wrapper', $data);
    }


    public function semua_berita()

    {
        $tombolCari = $this->request->getPost('tombolcariberita');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('cariberita');
            session()->set('cariberita', $cari);
            redirect()->to('/home/semua_berita');
        } else {
            $cari = session()->get('cariberita');
        }

        $dataBerita = $cari ? $this->berita->cariData($cari) : $this->berita->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
        ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id');

        $noHalaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $dataBerita->paginate(3, 'berita'),
            'pager'   => $this->berita->pager,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'noHalaman' => $noHalaman,
            'cari'  => $cari,
            'isi'    =>    'layout/v_home_semua_berita'
            
        ];
        return view('layout1/v_wrapper', $data);
    }

    public function kategori($id_kategori)

    {
        $tombolCari = $this->request->getPost('tombolcariberita');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('cariberita');
            session()->set('cariberita', $cari);
            redirect()->to('/home/semua_berita');
        } else {
            $cari = session()->get('cariberita');
        }

        $dataBerita = $cari ? $this->berita->cariData($cari) : $this->berita->join('tbl_user', 'tbl_user.id_user = tbl_berita.id_user')
        ->join('kategori', 'kategori.kategori_id = tbl_berita.kategori_id');

        $noHalaman = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        $kategori = $this->kategori->list();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'berita' => $dataBerita->paginate(3, 'berita'),
            'pager'   => $this->berita->pager,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'noHalaman' => $noHalaman,
            'cari'  => $cari,
            'isi'    =>    'layout/v_home_semua_berita'
            
        ];
        return view('layout1/v_wrapper', $data);
    }

    public function  kontak()
    {
        $kategori = $this->kategori->list();
        $berita = $this->berita->published();
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' =>    'Login',
            'slider'  => $this->ModelAdmin->slider(),
            'dosen'  => $this->ModelAdmin->data_dosen(),
            'berita' => $berita,
            'kategori' => $kategori,
            'konfigurasi' => $konfigurasi,
            'isi'    =>    'layout_profil/v_kontak'
        ];

        return view('layout_profil/v_wrapper', $data);
    }

    public function  kontak_simpan()
    {
        $tipe_komentar = 'kontak';
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'hp' => $this->request->getPost('hp'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'tipe_komentar' => $tipe_komentar,
        ];
        $this->berita->kontak_simpan($data);
        session()->setFlashdata('pesan', 'Pesan berhasil terkirim');
        return redirect()->to('/home/kontak');
    }
    






    // public function index()

    // {
    //     $data = array(
    //         'title' =>    'Login',
    //         'slider'  => $this->ModelAdmin->slider(),
    //         'isi'    =>    'layout/v_home'
    //     );
    //     return view('layout/v_wrapper', $data);
    // }

    // public function berita()
    //         {
    // $staf = $this->staf->selectCount('staf_id')->first();
    // $guru = $this->guru->selectCount('guru_id')->first();
    // $siswa = $this->siswa->selectCount('siswa_id')->first();
    // $kelas = $this->kelas->selectCount('kelas_id')->first();
    // $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
    // $berita = $this->berita->published();
    // $list_staf = $this->staf->orderBy('staf_id')->get()->getResultArray();
    // $gallery = $this->gallery->list();
    // $kategori = $this->kategori->list();
    // $data = [
    //     'title' => 'Selamat Datang!',
    // 'staf' => $staf,
    // 'guru' => $guru,
    // 'siswa' => $siswa,
    // 'kelas' => $kelas,
    // 'konfigurasi' => $konfigurasi,
    // 'berita' => $berita,
    // 'list_staf' => $list_staf,
    // 'gallery' => $gallery,
    //         'kategori' => $kategori,
    //         'isi'       =>  'layout/v_home_berita'
    //     ];
    //     return view('layout/v_wrapper', $data);
    // }

    public function uraian_berita($slug_berita = null)
    {
        $cari = $this->request->getPost('cariberita');
        if (!isset($slug_berita)) return redirect()->to('/home#berita');
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $berita = $this->berita->detail_berita($slug_berita);
        $kategori = $this->kategori->list();
        if ($berita) {
            $data = [
                'title'  => 'Berita',
                'slider'  => $this->ModelAdmin->slider(),
                'konfigurasi' => $konfigurasi,
                'listberita' => $this->berita->listBerita(),
                'berita' => $berita,
                'kategori' => $kategori,
                'cari'  => $cari,
                'isi'    =>    'beranda/v_uraian_berita'
            ];
            return view('layout_profil/v_wrapper', $data);
        }
    }

    public function detail_berita($slug_berita = null)
    {
        if (!isset($slug_berita)) return redirect()->to('/home#berita');
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $berita = $this->berita->detail_berita($slug_berita);
        $kategori = $this->kategori->list();
        if ($berita) {
            $data = [
                'title'  => 'Berita - ' . $berita->judul_berita,
                'slider'  => $this->ModelAdmin->slider(),
                'konfigurasi' => $konfigurasi,
                'berita' => $berita,
                'kategori' => $kategori,
                'isi'    =>    'layout/v_berita'
            ];
            return view('layout/v_wrapper', $data);
        }
    }
    public function viewPdf($pdf)
    {

        // Path ke file PDF
        $filePath = 'pdf/pengumuman/' . $pdf;

        // Periksa apakah file ada
        if (!file_exists($filePath)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File PDF tidak ditemukan');
        }

        // Set header untuk menampilkan file PDF
        return $this->response->setHeader('Content-Type', 'application/pdf')
            ->setBody(file_get_contents($filePath));
    }

    
}
