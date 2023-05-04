<?php

namespace App\Controllers;

use App\Models\SldkModel;

class Sldk extends BaseController
{
    protected $sldkModel;
    public function __construct()
    {
        $this->sldkModel = new SldkModel();
    }


    public function index()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'struktur' => $this->sldkModel->getStruktur()
        ];
        return view('back/ldk/struktur/index', $data);
        // return view('template/index');
    }

    public function create()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation()
        ];
        return view('back/ldk/struktur/create', $data);
        // return view('template/index');
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
            return redirect()->to('/sldk/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->sldkModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jabatan' => $this->request->getVar('jabatan'),
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/sldk');
    }

    public function delete($id)
    {

        $this->sldkModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/sldk');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation(),
            'struktur' => $this->sldkModel->getStruktur($slug)
        ];
        return view('back/ldk/struktur/edit', $data);
        // return view('template/index');
    }

    public function update($id)
    {
        // cek judul
        $strukturLama = $this->sldkModel->getStruktur($this->request->getVar('slug'));
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
            return redirect()->to('/sldk/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->sldkModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'jabatan' => $this->request->getVar('jabatan'),
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/sldk');
    }
}
