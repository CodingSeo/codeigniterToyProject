<?php

namespace App\Controllers\Api;

use App\Models\Posts;
use CodeIgniter\RESTful\ResourceController;

interface PostControllerInterface
{
    public function getPost($id);
}

class PostController extends ResourceController
{
    // protected $modelName = 'App\Models\Posts';
    protected $format    = 'json';

    public function getPost($id)
    {
        $model = new Posts();
        return $this->respond($model->getPost($id));
    }
    public function storePost($id)
    {
        $model = new Posts();
        return $this->respond($model->storePost($id));
    }

    public function deletePost($id)
    {
        $model = new Posts();
        return $this->respond($model->deletePost($id));
    }

    public function updatePost($id)
    {
        $model = new Posts();
        $request_content  = $this->request->body->all();
        return $this->respond($model->updatePost($request_content, $id));
    }


    // public function getMostViews($amount)
    // {
    //     $model = new Posts();
    //     return $this->respond($model->getMostViews($amount));
    // }

    // public function getMostViews($amount)
    // {
    //     $model = new Posts();
    //     return $this->respond($model->getMostViews($amount));
    // }

    public function getMostViews($amount)
    {
        $model = new Posts();
        return $this->respond($model->getMostViews($amount));
    }

    public function getMostRecent($amount)
    {
        $model = new Posts();
        return $this->respond($model->getMostViews($amount));
    }

    public function getRandom()
    {
        $model = new Posts();
        return $this->respond($model->getRandom());
    }
}
