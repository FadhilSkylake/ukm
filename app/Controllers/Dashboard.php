<?php

namespace App\Controllers;

use \App\Models\AdapusModel;
use \App\Models\KdapusModel;
use \App\Models\AldkModel;
use \App\Models\KldkModel;

class Dashboard extends BaseController
{
    protected $adapusModel;
    protected $kdapusModel;
    protected $aldkModel;
    protected $kldkModel;
    public function __construct()
    {
        $this->adapusModel = new AdapusModel();
        $this->kdapusModel = new KdapusModel();
        $this->aldkModel = new AldkModel();
        $this->kldkModel = new KldkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'anggotadapus' => $this->adapusModel->countAll(),
            'kegiatandapus' => $this->kdapusModel->getKdapus(),
            'anggotaldk' => $this->aldkModel->countAll(),
            'kegiatanldk' => $this->kldkModel->getKldk()
        ];
        return view('back/dashboard', $data);
    }
}
