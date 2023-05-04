<?php

namespace App\Controllers;

use App\Models\SdapusModel;

class Sdapus extends BaseController
{
    protected $sdapusModel;
    public function __construct()
    {
        $this->sdapusModel = new SdapusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Struktur UKM Dapur Musik',
            'struktur' => $this->sdapusModel->getStruktur()
        ];

        return view('back/dapus/struktur/index', $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Form Struktur UKM',
            'validation' => \Config\Services::validation()
        ];

        return view('back/dapus/struktur/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} jabatan harus di isi.'
                ]
            ],
            'npm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} npm harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/sdapus/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->sdapusModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jabatan' => $this->request->getVar('jabatan'),
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/sdapus');
    }

    public function delete($id)
    {

        $this->sdapusModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/sdapus');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Struktur Dapur Musik',
            'validation' => \Config\Services::validation(),
            'struktur' => $this->sdapusModel->getStruktur($slug)
        ];

        return view('back/dapus/struktur/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $strukturLama = $this->sdapusModel->getStruktur($this->request->getVar('slug'));
        if ($strukturLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/sdapus/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->sdapusModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jabatan' => $this->request->getVar('jabatan'),
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/sdapus');
    }
}
