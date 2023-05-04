<?php

namespace App\Models;

use CodeIgniter\Model;

class PldkModel extends Model
{
    protected $table = 'ldk_profil';
    // protected $useTimestamps = true;
    protected $allowedFields = ['namaukm', 'slug', 'logo', 'deskripsi', 'tahundibuat'];

    public function getPldk($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
