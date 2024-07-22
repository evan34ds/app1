<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\Modelberita;
use App\Models\Modelkategori;
use App\Models\Modelkonfigurasi;
use App\Models\ModelUser;

class Berita extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
        $this->Modelberita = new Modelberita;
        $this->Modelkategori = new Modelkategori;
        $this->Modelkonfigurasi = new Modelkonfigurasi;
        $this->ModelUser = new ModelUser;
    }

    public function index()
    {

        $data = [
            'title' =>    'Berita',
            'daftar_berita'  => $this->Modelberita->list(),
            'kategori' => $this->Modelkategori->orderBy('nama_kategori', 'ASC')->findAll(),
            'isi'    =>    'admin/admin_berita/v_index_berita'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kategori_id' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'isi' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'gambar' => [
                'label' => 'gambar',
                'rules' => 'uploaded[gambar]|max_size[gambar,5000]|mime_in[gambar,image/png,image/jpg,image/jpeg,image/ico]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => '{field} Max 5000 KB !!!',
                    'min_in' => 'Format {field} Wajib PNG, JPG, !!!'
                ]
            ],

        ])) {

            //mengambil nama foto
            $gambar = $this->request->getFile('gambar'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            //merubah nama foto
            $nama_file = $gambar->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
            $tgl = date('Y-m-d'); //cara menentukan tanggal sekarang
            $user = session()->get('id'); //di ambil dari AUTH Nomor 59
            //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
            //jika valid
            $data = array(
                'judul_berita' => $this->request->getPost('judul_berita'),
                'kategori_id' => $this->request->getPost('kategori_id'),
                'isi' => $this->request->getPost('isi'),
                'status' => $this->request->getPost('status'),
                'slug_berita' => slug($this->request->getPost('judul_berita')),
                'tgl_berita' =>  $tgl,
                'id_user' =>   $user,
                'gambar' => $nama_file,
            );
            //memindahkan file foto dari form input ke  direktori
            $gambar->move('img/berita/thumb', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
            $this->Modelberita->add_berita($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to('/berita');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('berita'));
        }
    }

    public function delete($berita_id)
    {
        //menghapus foto lama
        $home = $this->ModelAdmin->detail_data($berita_id);
        if ($home['gambar'] != "") {
            unlink('img/berita/thumb/' . $home['gambar']);
        }
        $data = [
            'berita_id' => $berita_id,
        ];
        $this->Modelberita->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to('/berita');
    }


    public function edit($berita_id)
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kategori_id' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'isi' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'gambar' => [
                'label' => 'gambar',
                'rules' => 'max_size[gambar,5000]|mime_in[gambar,image/png,image/jpg,image/jpeg,image/ico]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'max_size' => '{field} Max 5000 KB !!!',
                    'min_in' => 'Format {field} Wajib PNG, JPG, !!!'
                ]
            ],

        ])) {
            //mengambil nama foto
            $gambar = $this->request->getFile('gambar'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            if ($gambar->getError() == 4) {

                $data = array(
                    'berita_id' => $berita_id,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'kategori_id' => $this->request->getPost('kategori_id'),
                    'isi' => $this->request->getPost('isi'),
                    'status' => $this->request->getPost('status'),
                    'slug_berita' => slug($this->request->getPost('judul_berita')),
                    'tgl_berita' =>  $this->request->getPost('tgl_berita'),
                );
                $this->Modelberita->edit($data);
            } else {
                //menghapus foto lama
                $home = $this->Modelberita->detail_data($berita_id);
                if ($home['gambar'] != "") {
                    unlink('img/berita/thumb/' . $home['gambar']);
                }
                //merename nama file
                $nama_file = $gambar->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
                //jika valid
                $data = array(
                    'berita_id' => $berita_id,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'kategori_id' => $this->request->getPost('kategori_id'),
                    'isi' => $this->request->getPost('isi'),
                    'status' => $this->request->getPost('status'),
                    'slug_berita' => slug($this->request->getPost('judul_berita')),
                    'tgl_berita' =>  $this->request->getPost('tgl_berita'),
                    'gambar' => $nama_file,
                );
                //memindahkan file foto dari form input ke  direktori
                $gambar->move('img/berita/thumb', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
                $this->Modelberita->edit($data);
            }
            //merubah nama foto

            session()->setFlashdata('pesan', 'Data Berhasil Di Ganti !!!');
            return redirect()->to('/berita');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('berita'));
        }
    }

    public function formupload()
    {
        if ($this->request->isAJAX()) {
            $berita_id = $this->request->getVar('berita_id');
            $list =  $this->berita->find($berita_id);
            $data = [
                'title' => 'Upload Sampul Berita',
                'list'  => $list,
                'berita_id' => $berita_id
            ];
            $msg = [
                'sukses' => view('admin/admin_berita/upload', $data)
            ];
            echo json_encode($msg);
        }
    }


    public function pesan()
    {

        $data = [
            'title' =>    'Pesan',
            'daftar_pesan'  => $this->Modelberita->listPesan(),
            'isi'    =>    'admin/admin_berita/v_pesan'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function delete_pesan($id_message)
    {
        $data = [
            'id_message' => $id_message,
        ];
        $this->Modelberita->hapus_pesan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to('/berita/pesan');
    }
}
