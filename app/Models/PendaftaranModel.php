<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'npm', 'fakultas', 'telepon', 'ukm', 'alasan'];

    public function getDaftar($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
