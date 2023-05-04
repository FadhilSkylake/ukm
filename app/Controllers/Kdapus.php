<?php

namespace App\Controllers;

use \App\Models\KdapusModel;

class kdapus extends BaseController
{
    protected $kdapusModel;
    public function __construct()
    {
        $this->kdapusModel = new KdapusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dapur Musik',
            'kdamus' => $this->kdapusModel->getKdapus()
        ];
        return view('back/dapus/kegiatan/index', $data);
        // return view('template/index');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'kdamus' => $this->kdapusModel->getKdapus($slug)
        ];

        //jika data enggak ada
        if (empty($data['kdamus'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kegiatan'   . $slug .  ' tidak ditemukan.');
        }

        return view('back/dapus/kegiatan/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dapur Musik',
            'validation' => \Config\Services::validation()
        ];
        return view('back/dapus/kegiatan/create', $data);
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
        //     return redirect()->to('/pdapus/create')->withInput();
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
        $this->kdapusModel->save([
            'namakegiatan' => $this->request->getVar('namakegiatan'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tempat_kegiatan' => $this->request->getVar('tempat_kegiatan'),
            'waktu_kegiatan' => $this->request->getVar('waktu_kegiatan'),
            'waktu_dibuat' => $this->request->getVar('waktu_dibuat'),
            'dokumentasi' => $namaDokumentasi
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kdapus');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        $kdamus = $this->kdapusModel->find($id);

        //jika gambar default
        if ($kdamus['dokumentasi'] != 'default.jpg') {

            //hapus gambar
            unlink('img/' . $kdamus['dokumentasi']);
        }

        $this->kdapusModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/kdapus');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Dapur Musik',
            'validation' => \Config\Services::validation(),
            'kdamus' => $this->kdapusModel->getKdapus($slug)
        ];
        return view('back/dapus/kegiatan/edit', $data);
        // return view('template/index');
    }

    public function update($id)
    {
        $kegiatanLama = $this->kdapusModel->getKdapus($this->request->getVar('slug'));
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
            return redirect()->to('/kdapus/edit/' . $this->request->getVar('slug'))->withInput();
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
        $this->kdapusModel->save([
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

        return redirect()->to('/kdapus');
    }
}
