<?php

namespace App\Controllers;

use \App\Models\AdapusModel;

class Adapus extends BaseController
{
    protected $adapusModel;
    public function __construct()
    {
        $this->adapusModel = new AdapusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Angota UKM Dapur Musik',
            'anggotadapus' => $this->adapusModel->getAnggota()
        ];

        return view('back/dapus/anggota/index', $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Form Anggota UKM',
            'validation' => \Config\Services::validation()
        ];

        return view('back/dapus/anggota/create', $data);
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
            'npm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} npm harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/adapus/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->adapusModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/adapus');
    }

    public function delete($id)
    {
        $this->adapusModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/adapus');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Anggota Dapur Musik',
            'validation' => \Config\Services::validation(),
            'anggotadapus' => $this->adapusModel->getAnggota($slug)
        ];

        return view('back/dapus/anggota/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $anggotaLama = $this->adapusModel->getAnggota($this->request->getVar('slug'));
        if ($anggotaLama['nama'] == $this->request->getVar('nama')) {
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
            return redirect()->to('/adapus/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->adapusModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/adapus');
    }
}
