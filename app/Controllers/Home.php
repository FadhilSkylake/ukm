<?php

namespace App\Controllers;

use App\Models\UkmlistModel;
use \App\Models\AdapusModel;
use \App\Models\PdapusModel;
use \App\Models\PldkModel;
use \App\Models\AldkModel;
use \App\Models\KdapusModel;
use \App\Models\KldkModel;

class Home extends BaseController
{
    protected $ukmlistModel;
    protected $pdapusModel;
    protected $pldkModel;
    protected $aldkModel;
    protected $adapusModel;
    protected $kdapusModel;
    protected $kldkModel;

    public function __construct()
    {
        $this->ukmlistModel = new UkmlistModel();
        $this->adapusModel = new AdapusModel();
        $this->pdapusModel = new PdapusModel();
        $this->pldkModel = new PldkModel();
        $this->aldkModel = new AldkModel();
        $this->kdapusModel = new KdapusModel();
        $this->kldkModel = new KldkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Unit Kegiatan Mahasiswa',
            'list' => $this->ukmlistModel->getList(),
            'kegiatandapus' => $this->kdapusModel->getKdapus(),
            'kegiatanldk' => $this->kldkModel->getKldk()
        ];

        return view('front/home', $data);
        // return view('template/index');
    }

    public function damus()
    {
        $data = [
            'title' => 'Dapur Musik',
            'anggotadapus' => $this->adapusModel->countAll(),
            'damus' => $this->pdapusModel->getPdapus()
        ];

        return view('front/profildamus', $data);
    }

    public function ldk()
    {
        $data = [
            'title' => 'LDK Subulussalam',
            'anggotaldk' => $this->aldkModel->countAll(),
            'pldk' => $this->pldkModel->getPldk()
        ];

        return view('front/profilldk', $data);
    }
}
