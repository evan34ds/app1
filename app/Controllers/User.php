<?php

namespace App\Controllers;

use App\Models\ModelUser;



class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'title' =>    'User',
            'user'  => $this->ModelUser->allData(),
            'isi'    =>    'admin/user/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }


    public function add()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/png, image/ico]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'min_in' => 'Format {field} Wajib PNG, JPG, ICO !!!'
                ]
            ],

        ])) {

            //mengambil nama foto
            $foto = $this->request->getFile('foto'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            //merubah nama foto
            $nama_file = $foto->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
            //jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            //memindahkan file foto dari form input ke  direktori
            $foto->move('foto', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to('/user');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/ico]', //documentasi Codeigniter Upload validasi "Rules for File Uploads"
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'min_in' => 'Format {field} Wajib PNG, jpg, ICO !!!'
                ]
            ],

        ])) {
            //mengambil nama foto
            $foto = $this->request->getFile('foto'); //documentasi Codeigniter =>Working with Uploaded Files=>Simplest usage ""
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->ModelUser->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                //merename nama file
                $nama_file = $foto->getRandomName(); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files"
                //jika valid
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                //memindahkan file foto dari form input ke  direktori
                $foto->move('foto', $nama_file); //documentasi Codeigniter =>Working with Uploaded Files=>Moving Files
                $this->ModelUser->edit($data);
            }
            //merubah nama foto

            session()->setFlashdata('pesan', 'Data Berhasil Di Ganti !!!');
            return redirect()->to('/user');
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }
    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->ModelUser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to('/user');
    }
}
