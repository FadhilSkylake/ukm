<?php

namespace App\Controllers;

use \App\Models\PendaftaranModel;

class Pendaftaran extends BaseController
{
    protected $pendaftaranModel;
    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftaran Anggota Baru UKM',
            'daftar' => $this->pendaftaranModel->getDaftar()
        ];

        return view('back/pendaftaran/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Pendaftar',
            'daftar' => $this->pendaftaranModel->getDaftar($slug)
        ];

        //jika data enggak ada
        if (empty($data['daftar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pendaftar'   . $slug .  ' tidak ditemukan.');
        }

        return view('back/pendaftaran/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Pendaftaran',
            'validation' => \Config\Services::validation()
        ];

        return view('back/pendaftaran/create', $data);
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
            ],
            'fakulas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} fakultas harus di isi.'
                ]
            ],
            'no_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} no telepon harus di isi.'
                ]
            ],
            'alasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} alasan harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/front/pendaftaran/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pendaftaranModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'npm' => $this->request->getVar('npm'),
            'fakultas' => $this->request->getVar('fakultas'),
            'telepon' => $this->request->getVar('telepon'),
            'ukm' => $this->request->getVar('ukm'),
            'alasan' => $this->request->getVar('alasan')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/pendaftaran');
    }

    public function delete($id)
    {

        $this->pendaftaranModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/pendaftaran');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Pendaftar',
            'validation' => \Config\Services::validation(),
            'daftar' => $this->pendaftaranModel->getDaftar($slug)
        ];

        return view('back/pendaftaran/edit', $data);
    }

    public function update($id)
    {
        $daftarLama = $this->pendaftaranModel->getDaftar($this->request->getVar('slug'));
        if ($daftarLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama ukm harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/pendaftaran/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getPost('nama'), '-', true);
        $this->pendaftaranModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'slug' => $slug,
            'npm' => $this->request->getPost('npm'),
            'fakultas' => $this->request->getPost('fakultas'),
            'telepon' => $this->request->getPost('telepon'),
            'ukm' => $this->request->getPost('ukm'),
            'alasan' => $this->request->getPost('alasan')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/pendaftaran');
    }
}
