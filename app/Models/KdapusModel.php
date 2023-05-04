<?php

namespace App\Models;

use CodeIgniter\Model;

class KdapusModel extends Model
{
    protected $table = 'dapus_kegiatan';
    // protected $useTimestamps = true;
    protected $allowedFields = ['namakegiatan', 'slug', 'deskripsi', 'tempat_kegiatan', 'waktu_kegiatan', 'waktu_dibuat', 'dokumentasi'];

    public function getKdapus($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
