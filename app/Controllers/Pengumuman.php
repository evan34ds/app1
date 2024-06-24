<?php

namespace App\Controllers;

use App\Models\ModelPengumuman;
use App\Models\ModelUser;

class Pengumuman extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelPengumuman = new ModelPengumuman;
        $this->ModelUser = new ModelUser;
    }

    public function index()
    {

        $data = [
            'title' =>    'Pengumuman',
            'daftar_pengumuman'  => $this->ModelPengumuman->list(),
            'isi'    =>    'admin/admin_pengumuman/v_index_pengumuman'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'judul_pengumuman' => [
                'label' => 'Judul Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'status_pengumuman' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'pdf' => [
                'label' => 'pdf',
                'rules' => 'uploaded[pdf]|max_size[pdf,2048]|ext_in[pdf,pdf]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => '{field} Max 5000 KB !!!',
                    'ext_in' => 'Format {field} Wajib, !!!'
                ]
            ],

        ])) {

            //mengambil nama foto
            $pdf = $this->request->getFile('pdf'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            //merubah nama foto
            $nama_file = $pdf->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
            $tgl = date('Y-m-d'); //cara menentukan tanggal sekarang
            $user = session()->get('id'); //di ambil dari AUTH Nomor 59
            //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
            //jika valid
            $data = array(
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'status_pengumuman' => $this->request->getPost('status_pengumuman'),
                'tgl_pengumuman' =>  $tgl,
                'id_user' =>   $user,
                'pdf' => $nama_file,
            );
            //memindahkan file foto dari form input ke  direktori
            $pdf->move('pdf/pengumuman', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
            $this->ModelPengumuman->add_pengumuman($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to('/pengumuman');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengumuman'));
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

    public function edit($id_pengumuman)
    {
        if ($this->validate([
            'judul_pengumuman' => [
                'label' => 'judul pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'status_pengumuman' => [
                'label' => 'Status pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'pdf' => [
                'label' => 'pdf',
                'rules' => 'max_size[pdf,2048]|ext_in[pdf,pdf]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'max_size' => '{field} Max 5000 KB !!!',
                    'ext_in' => 'Format {field} Wajib, !!!'
                ]
            ],

        ])) {

            //mengambil nama foto
            $tgl = date('Y-m-d'); //cara menentukan tanggal sekarang
            $pdf = $this->request->getFile('pdf'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            $user = session()->get('id'); //di ambil dari AUTH Nomor 59
            if ($pdf->getError() == 4) {

                $data = array(
                    'id_pengumuman' => $id_pengumuman,
                    'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                    'status_pengumuman' => $this->request->getPost('status_pengumuman'),
                    'tgl_pengumuman' =>   $this->request->getPost('tgl_pengumuman'),
                    'id_user' =>   $user,
                );
                $this->ModelPengumuman->edit($data);
            } else {
                //menghapus foto lama
                $home = $this->ModelPengumuman->detail_data($id_pengumuman);
                if ($home['pdf'] != "") {
                    unlink('pdf/pengumuman/' . $home['pdf']);
                }
                //merename nama file
                $nama_file = $pdf->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
                //jika valid
                $data = array(
                    'id_pengumuman' => $id_pengumuman,
                    'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                    'status_pengumuman' => $this->request->getPost('status_pengumuman'),
                    'tgl_pengumuman' =>  $tgl,
                    'id_user' =>   $user,
                    'pdf' => $nama_file,
                );
                //memindahkan file foto dari form input ke  direktori
                $pdf->move('pdf/pengumuman', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
                $this->ModelPengumuman->edit($data);
            }
            //merubah nama foto

            session()->setFlashdata('pesan', 'Data Berhasil Di Ganti !!!');
            return redirect()->to('/pengumuman');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengumuman'));
        }
    }

    public function delete($id_pengumuman)
    {
        //menghapus foto lama
        $home = $this->ModelPengumuman->detail_data($id_pengumuman);
        if ($home['pdf'] != "") {
            unlink('pdf/pengumuman/' . $home['pdf']);
        }
        $data = [
            'id_pengumuman' => $id_pengumuman,
        ];
        $this->ModelPengumuman->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to('/pengumuman');
    }
}
