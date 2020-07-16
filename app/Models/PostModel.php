<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{

    protected $table = 'posts';

    public function getAll()
    {
        return $this->findAll();
    }
}
