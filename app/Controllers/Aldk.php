<?php

namespace App\Controllers;

use \App\Models\AldkModel;

class Aldk extends BaseController
{
    protected $aldkModel;

    public function __construct()
    {
        $this->aldkModel = new AldkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'anggotaldk' => $this->aldkModel->getAnggota()

        ];
        return view('back/ldk/anggota/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation()
        ];
        return view('back/ldk/anggota/create', $data);
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
            return redirect()->to('/aldk/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->aldkModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/aldk');
    }

    public function delete($id)
    {

        $this->aldkModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/aldk');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation(),
            'anggotaldk' => $this->aldkModel->getAnggota($slug)
        ];
        return view('back/ldk/anggota/edit', $data);
    }

    public function update($id)
    {
        $anggotaLama = $this->aldkModel->getAnggota($this->request->getVar('slug'));
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
            return redirect()->to('/aldk/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->aldkModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'npm' => $this->request->getVar('npm')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/aldk');
    }
}
