<?php

namespace App\Controllers;

use \App\Models\PdapusModel;

class Pdapus extends BaseController
{
    protected $pdapusModel;
    public function __construct()
    {
        $this->pdapusModel = new PdapusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dapur Musik',
            'damus' => $this->pdapusModel->getPdapus()
        ];
        return view('back/dapus/profil/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dapur Musik',
            'validation' => \Config\Services::validation()
        ];
        return view('back/dapus/profil/create', $data);
        // return view('template/index');
    }

    public function save()
    {
        // validasi input
        // if (!$this->validate([
        //     'logo' => [
        //         'rules' => 'is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png,image/PNG]',
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
        $fileLogo = $this->request->getFile('logo');

        //jika gaada gambar yang di upload
        if ($fileLogo->getError() == 4) {
            $namaLogo = 'default.jpg';
        } else {

            //generate nama sampul random
            $namaLogo = $fileLogo->getRandomName();

            //pindahkan file gem img
            $fileLogo->move('img', $namaLogo);
        }



        $slug = url_title($this->request->getVar('namaukm'), '-', true);
        $this->pdapusModel->save([
            'namaukm' => $this->request->getVar('namaukm'),
            'logo' => $namaLogo,
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tahundibuat' => $this->request->getVar('tahundibuat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/pdapus');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Profil Dapur Musik',
            'validation' => \Config\Services::validation(),
            'damus' => $this->pdapusModel->getPdapus($slug)
        ];

        return view('back/dapus/profil/edit', $data);
    }

    public function update($id)
    {

        $profilLama = $this->pdapusModel->getPdapus($this->request->getVar('slug'));
        if ($profilLama['namaukm'] == $this->request->getVar('namaukm')) {
            $rule_namaukm = 'required';
        } else {
            $rule_namaukm = 'required';
        }

        if (!$this->validate([
            'namaukm' => [
                'rules' => $rule_namaukm,
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ],
            'logo' => [
                'rules' => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran nya kegedean',
                    'is_image' => 'yang kamu pilih bukan gambar',
                    'mime_in' => 'yang kamu pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/pdapus/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileLogo = $this->request->getFile('logo');

        //cek gambar, apakah tetap gambar lama
        if ($fileLogo->getError() == 4) {
            $namaLogo = $this->request->getVar('logoLama');
        } else {
            //generate nama file random
            $namaLogo = $fileLogo->getRandomName();
            //pindahkan gambar
            $fileLogo->move('img', $namaLogo);
            //hapus file lama
            unlink('img/' . $this->request->getVar('logoLama'));
        }

        $slug = url_title($this->request->getVar('namaukm'), '-', true);
        $this->pdapusModel->save([
            'id' => $id,
            'namaukm' => $this->request->getVar('namaukm'),
            'logo' => $namaLogo,
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tahundibuat' => $this->request->getVar('tahundibuat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/pdapus');
    }
}
