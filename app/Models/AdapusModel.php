<?php

namespace App\Models;

use CodeIgniter\Model;

class AdapusModel extends Model
{
    protected $table = 'dapus_anggota';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug',  'npm'];

    public function getAnggota($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
