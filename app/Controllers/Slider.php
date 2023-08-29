<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Slider extends BaseController
{

                    public function __construct()
                    {
                        helper('form');
                        $this->ModelAdmin = new ModelAdmin();
                    }
                public function index()

                {
                    $data = [
                        'title' =>    'Slider',
                        'slider'  => $this->ModelAdmin->daftar_slider(),
                        'isi'    =>    'admin/slider/v_index_slider'
                        
                    ];
                    return view('layout/v_wrapper', $data);
                }



                //--------------------------------------------------------------------


            public function add()
            {
                if ($this->validate([
                    'judul' => [
                        'label' => 'judul',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Wajib Diisi !!!'
                        ]
                    ],
                    'isi' => [
                        'label' => 'isi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Wajib Diisi !!!'
                        ]
                    ],
                    'foto' => [
                        'label' => 'foto',
                        'rules' => 'uploaded[foto]|max_size[foto,5000]|mime_in[foto,image/png,image/jpg,image/jpeg,image/ico]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                        'errors' => [
                            'uploaded' => '{field} Wajib Diisi !!!',
                            'max_size' => '{field} Max 5000 KB !!!',
                            'min_in' => 'Format {field} Wajib PNG, JPG, !!!'
                        ]
                    ],

                ])) {

                    //mengambil nama foto
                    $foto = $this->request->getFile('foto'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
                    //merubah nama foto
                    $nama_file = $foto->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
                    //jika valid
                    $data = array(
                        'judul' => $this->request->getPost('judul'),
                        'isi' => $this->request->getPost('isi'),
                        'foto' => $nama_file,
                    );
                    //memindahkan file foto dari form input ke  direktori
                    $foto->move('corousel', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
                    $this->ModelAdmin->add_slider($data);
                    session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
                    return redirect()->to('/slider');
                } else {
                    //jika tidak valid
                    session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('slider'));
                }
            }

         public function edit($id)
            {
                if ($this->validate([
                    'judul' => [
                        'label' => 'judul',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Wajib Diisi !!!'
                        ]
                    ],
                    'isi' => [
                        'label' => 'isi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Wajib Diisi !!!'
                            ]
                        ],
                        'foto' => [
                            'label' => 'foto',
                            'rules' => 'max_size[foto,5000]|mime_in[foto,image/png,image/jpg,image/jpeg,image/ico]',//documentasi Codeigniter Upload validasi "Rules for File Uploads"
                            'errors' => [
                                'max_size' => '{field} Max 5000 KB !!!',
                                'min_in' => 'Format {field} Wajib PNG, jpg, ICO !!!'
                        ]
                    ],
        
                ])) {
                    //mengambil nama foto
                    $foto = $this->request->getFile('foto'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
                    if ($foto->getError() == 4) {
                        $data = array(
                            'id' => $id,
                            'judul' => $this->request->getPost('judul'),
                            'isi' => $this->request->getPost('isi'),
                        );
                        $this->ModelAdmin->edit($data);
                    } else {
                        //menghapus foto lama
                        $home = $this->ModelAdmin->detail_data($id);
                        if ($home['foto'] != "") {
                            unlink('corousel/' . $home['foto']);
                        }
                        //merename nama file
                        $nama_file = $foto->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
                        //jika valid
                        $data = array(
                            'id' => $id,
                            'judul' => $this->request->getPost('judul'),
                            'isi' => $this->request->getPost('isi'),
                            'foto' => $nama_file,
                        );
                        //memindahkan file foto dari form input ke  direktori
                        $foto->move('corousel', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
                        $this->ModelAdmin->edit($data);
                    }
                    //merubah nama foto
        
                    session()->setFlashdata('pesan', 'Data Berhasil Di Ganti !!!');
                    return redirect()->to('/slider');
                } else {
                    //jika tidak valid
                    session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('slider'));
                }
            }

            public function delete($id)
            { 
                //menghapus foto lama
                $home = $this->ModelAdmin->detail_data($id);
                if ($home['foto'] != "") {
                    unlink('corousel/' . $home['foto']);
                }
                $data = [
                    'id' => $id,
                ];
                $this->ModelAdmin->delete_data($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
                return redirect()->to('/slider');
            }
        


}

