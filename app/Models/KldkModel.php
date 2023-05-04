<?php

namespace App\Models;

use CodeIgniter\Model;

class KldkModel extends Model
{
    protected $table = 'ldk_kegiatan';
    // protected $useTimestamps = true;
    protected $allowedFields = ['namakegiatan', 'slug', 'deskripsi', 'tempat_kegiatan', 'waktu_kegiatan', 'waktu_dibuat', 'dokumentasi'];

    public function getKldk($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
