<?php

namespace App\Controllers;

use App\Models\UkmlistModel;

class Ukmlist extends BaseController
{
    protected $ukmlistModel;
    public function __construct()
    {
        $this->ukmlistModel = new UkmlistModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Unit Kegiatan Mahasiswa',
            'list' => $this->ukmlistModel->getList()
        ];

        return view('back/ukmlist/index', $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Form Tambah UKM',
            'validation' => \Config\Services::validation()
        ];

        return view('back/ukmlist/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'namaukm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama ukm harus di isi.'
                ]
            ],
            'pembimbing' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} pembimbing harus di isi.'
                ]
            ],
            'namaketua' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama ketua harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/ukmlist/create')->withInput();
        }

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
        $this->ukmlistModel->save([
            'namaukm' => $this->request->getVar('namaukm'),
            'slug' => $slug,
            'logo' => $namaLogo,
            'pembimbing' => $this->request->getVar('pembimbing'),
            'namaketua' => $this->request->getVar('namaketua')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/ukmlist');
    }

    public function delete($id)
    {

        $this->ukmlistModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/ukmlist');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data UKM',
            'validation' => \Config\Services::validation(),
            'list' => $this->ukmlistModel->getList($slug)
        ];

        return view('/back/ukmlist/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $listLama = $this->ukmlistModel->getList($this->request->getVar('slug'));
        if ($listLama['namaukm'] == $this->request->getVar('namaukm')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'namaukm' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama ukm harus di isi.'
                ]
            ],
            'pembimbing' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} pembimbing harus di isi.'
                ]
            ], 'namaketua' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama ketua harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/ukmlist/edit/' . $this->request->getVar('slug'))->withInput();
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
        $this->ukmlistModel->save([
            'id' => $id,
            'namaukm' => $this->request->getVar('namaukm'),
            'slug' => $slug,
            'logo' => $namaLogo,
            'pembimbing' => $this->request->getVar('pembimbing'),
            'namaketua' => $this->request->getVar('namaketua')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/ukmlist');
    }
}
