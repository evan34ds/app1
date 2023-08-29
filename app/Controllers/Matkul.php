<?php

namespace App\Controllers;

use App\Models\ModelMatkul;
use App\Models\ModelProdi;


class Matkul extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
    }

    public function index()
    {
        $data = array(
            'title' =>    'Mata Kuliah',
            'prodi'  => $this->ModelProdi->allData(),
            'isi'    =>    'admin/matkul/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function detail($id_prodi)
    {
        $data = array(
            'title' =>    'Mata Kuliah',
            'prodi'  => $this->ModelProdi->detail_Data($id_prodi),
            'matkul'  => $this->ModelMatkul->allDataMatkul($id_prodi),
            'isi'    =>    'admin/matkul/v_detail'
        );
        return view('layout/v_wrapper', $data);
    }
    public function add($id_prodi)
    {
        if ($this->validate([

            'kode_matkul' => [
                'label' => 'Kode Mata Kuliah',
                'rules' => 'required|is_unique[tbl_matkul.kode_matkul]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} suda ada, Input Kode Lain !!!'

                ]
            ],

            'matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'a' => '{field}',
                ]
            ],
            'sks' => [
                'label' => 'SKS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],


        ])) {
            //jika valid
            $smt = $this->request->getPost('smt');
            if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
                $semester = 'Ganjil';
            } else {
                $semester = 'Genap';
            }

            $data = [
                'kode_matkul' => $this->request->getPost('kode_matkul'),
                'matkul' => $this->request->getPost('matkul'),
                'sks' => $this->request->getPost('sks'),
                'smt' => $this->request->getPost('smt'),
                'semester' => $semester,
                'kategori' => $this->request->getPost('kategori'),
                'id_prodi' => $id_prodi,
               
            ];

            $matkul = $this->request->getPost('matkul');

            $this->ModelMatkul->add($data);
          // cek agar mata kuliah bisa didefinisikan
            session()->setFlashdata('pesan', 'Mata Kuliah '.$matkul.' Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('matkul/detail/' . $id_prodi));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('matkul/detail/' . $id_prodi));
        }
    }


    public function edit($id_matkul)
    {
        $data = [
            'id_matkul' => $id_matkul,
            'matkul' => $this->request->getPost('matkul'),
        ];
        $this->Modelmatkul->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to('/matkul');
    }

    public function delete($id_prodi, $id_matkul)
    {
        $data = [
            'id_matkul' => $id_matkul,
        ];
        $nama_matkul = $this->ModelMatkul->findNameById($id_matkul); // cek agar mata kuliah bisa didefinisikan
        $this->ModelMatkul->delete_data($data);
        session()->setFlashdata('pesan', 'Mata Kuliah ' . $nama_matkul . ' Berhasil Di Hapus !!!');
        return redirect()->to(base_url('matkul/detail/' . $id_prodi));
    }

    public function gagal_delete($id_prodi, $id_matkul)
    {
        $data = [
            'id_matkul' => $id_matkul,
        ];

        $nama_matkul = $this->ModelMatkul->findNameById($id_matkul); // cek agar mata kuliah bisa didefinisikan

        session()->setFlashdata('gagal', '' . $nama_matkul . ' Telah Tertaut dengan data lain!!!');
        return redirect()->to(base_url('matkul/detail/' . $id_prodi));
    }


    //--------------------------------------------------------------------

}
