<?php

namespace App\Models;

use CodeIgniter\Model;

class UkmlistModel extends Model
{
    protected $table = 'ukm_list';
    // protected $useTimestamps = true;
    protected $allowedFields = ['namaukm', 'slug', 'logo', 'pembimbing',  'namaketua'];

    public function getList($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
