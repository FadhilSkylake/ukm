<?php

namespace App\Models;

use CodeIgniter\Model;

class PdapusModel extends Model
{
    protected $table = 'dapus_profil';
    // protected $useTimestamps = true;
    protected $allowedFields = ['namaukm', 'slug', 'logo', 'deskripsi', 'tahundibuat'];

    public function getPdapus($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
