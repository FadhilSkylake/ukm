<?php

namespace App\Controllers;

use \App\Models\KldkModel;

class Kldk extends BaseController
{
    protected $kldkModel;
    public function __construct()
    {
        $this->kldkModel = new KldkModel();
    }
    public function index()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'ldkkegiatan' => $this->kldkModel->getKldk()
        ];
        return view('back/ldk/kegiatan/index', $data);
        // return view('template/index');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'ldkkegiatan' => $this->kldkModel->getKldk($slug)
        ];

        //jika data enggak ada
        if (empty($data['ldkkegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kegiatan'   . $slug .  ' tidak ditemukan.');
        }

        return view('back/ldk/kegiatan/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation()
        ];
        return view('back/ldk/kegiatan/create', $data);
        // return view('template/index');
    }

    public function save()
    {
        // validasi input
        // if (!$this->validate([
        //     'logo' => [
        //         'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             // 'max_size' => 'ukuran nya kegedean',
        //             'is_image' => 'yang kamu pilih bukan gambar',
        //             'mime_in' => 'yang kamu pilih bukan gambar'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/kldk/create')->withInput();
        // }

        //ambil gambar
        $fileDokumentasi = $this->request->getFile('dokumentasi');

        //jika gaada gambar yang di upload
        if ($fileDokumentasi->getError() == 4) {
            $namaDokumentasi = 'default.jpg';
        } else {

            //generate nama sampul random
            $namaDokumentasi = $fileDokumentasi->getRandomName();

            //pindahkan file gem img
            $fileDokumentasi->move('img', $namaDokumentasi);
        }



        $slug = url_title($this->request->getVar('namakegiatan'), '-', true);
        $this->kldkModel->save([
            'namakegiatan' => $this->request->getVar('namakegiatan'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tempat_kegiatan' => $this->request->getVar('tempat_kegiatan'),
            'waktu_kegiatan' => $this->request->getVar('waktu_kegiatan'),
            'waktu_dibuat' => $this->request->getVar('waktu_dibuat'),
            'dokumentasi' => $namaDokumentasi
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kldk');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $ldkkegiatan = $this->kldkModel->find($id);

        //jika gambar default
        if ($ldkkegiatan['dokumentasi'] != 'default.jpg') {

            //hapus gambar
            unlink('img/' . $ldkkegiatan['dokumentasi']);
        }

        $this->kldkModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/kldk');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'validation' => \Config\Services::validation(),
            'ldkkegiatan' => $this->kldkModel->getKldk($slug)
        ];
        return view('back/ldk/kegiatan/edit', $data);
        // return view('template/index');
    }

    public function update($id)
    {
        $kegiatanLama = $this->kldkModel->getKldk($this->request->getVar('slug'));
        if ($kegiatanLama['namakegiatan'] == $this->request->getVar('namakegiatan')) {
            $rule_kegiatan = 'required';
        } else {
            $rule_kegiatan = 'required';
        }

        if (!$this->validate([
            'namakegiatan' => [
                'rules' => $rule_kegiatan,
                'errors' => [
                    'required' => '{field} nama harus di isi.',
                ]
            ],
            'dokumentasi' => [
                'rules' => 'is_image[dokumentasi]|mime_in[dokumentasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'yang kamu pilih bukan gambar',
                    'mime_in' => 'yang kamu pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/kldk/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileDokumentasi = $this->request->getFile('dokumentasi');

        //cek gambar, apakah tetap gambar lama
        if ($fileDokumentasi->getError() == 4) {
            $namaDokumentasi = $this->request->getVar('dokumentasiLama');
        } else {
            //generate nama file random
            $namaDokumentasi = $fileDokumentasi->getRandomName();
            //pindahkan gambar
            $fileDokumentasi->move('img', $namaDokumentasi);
            //hapus file lama
            unlink('img/' . $this->request->getVar('dokumentasiLama'));
        }

        $slug = url_title($this->request->getVar('namakegiatan'), '-', true);
        $this->kldkModel->save([
            'id' => $id,
            'namakegiatan' => $this->request->getVar('namakegiatan'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tempat_kegiatan' => $this->request->getVar('tempat_kegiatan'),
            'waktu_kegiatan' => $this->request->getVar('waktu_kegiatan'),
            'waktu_dibuat' => $this->request->getVar('waktu_dibuat'),
            'dokumentasi' => $namaDokumentasi
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/kldk');
    }
}
