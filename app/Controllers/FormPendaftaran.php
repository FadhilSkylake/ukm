<?php

namespace App\Controllers;

use \App\Models\PendaftaranModel;

class FormPendaftaran extends BaseController
{
    protected $pendaftaranModel;
    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Form Tambah Data Pendaftaran',
            'validation' => \Config\Services::validation()
        ];

        return view('front/formpendaftaran', $data);
    }

    public function save()
    {
        // validasi input
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} nama harus di isi.'
        //         ]
        //     ],
        //     'npm' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} npm harus di isi.'
        //         ]
        //     ],
        //     'fakulas' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} fakultas harus di isi.'
        //         ]
        //     ],
        //     'no_telepon' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} no telepon harus di isi.'
        //         ]
        //     ],
        //     'alasan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => '{field} alasan harus di isi.'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('formpendaftaran')->withInput();
        // }


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

        session()->setFlashdata('pesan', 'Berhasil Daftar');

        return redirect()->to('/formpendaftaran');
    }
}
