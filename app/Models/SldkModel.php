<?php

namespace App\Models;

use CodeIgniter\Model;

class SldkModel extends Model
{
    protected $table = 'ldk_struktur';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'jabatan', 'npm'];

    public function getStruktur($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
