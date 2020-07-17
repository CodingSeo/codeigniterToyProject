<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{

    protected $table = 'posts';

    public function getPost($id)
    {
        return $this->find($id);
    }

    public function detetePost($id)
    {
        return $this->delete($id);
    }
    
    public function updatePost($id)
    {
        return $this->find($id);
    }
    
    public function storePost($id)
    {
        return $this->find($id);
    }

    public function getMostViews($amount)
    {
        return $this->where('active', 1)
            ->orderBy('view_count', 'desc')
            ->findAll($amount);
    }

    public function getMostRecent($amount)
    {
        return $this->where('active', 1)
            ->orderBy('create_at', 'desc')
            ->findAll($amount);
    }

    public function getRandom()
    {
        $result = $this->db->table('posts')
            ->select('*')
            ->join('contents', 'contents.post_id = posts.id', 'left')
            ->orderBy('rand()')
            ->get(1)
            ->getResult()[0];
        // foreach($result-> as )

        $images = (object)[
            // 'images'=>
        ];
        $result->content = (object)[
            'body' => $result->body,
            'images' => $images
        ];
        return $result;
    }
}
