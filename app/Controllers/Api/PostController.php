<?php

namespace App\Controllers\Api;

use App\Models\PostModel;
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
        $model = new PostModel();
        return $this->respond($model->getPost($id));
    }
    public function storePost($id)
    {
        $model = new PostModel();
        return $this->respond($model->storePost($id));
    }

    public function deletePost($id)
    {
        $model = new PostModel();
        return $this->respond($model->deletePost($id));
    }

    public function updatePost($id)
    {
        $model = new PostModel();
        $request_content  = $this->request->body->all();
        return $this->respond($model->updatePost($request_content, $id));
    }


    // public function getMostViews($amount)
    // {
    //     $model = new PostModel();
    //     return $this->respond($model->getMostViews($amount));
    // }

    // public function getMostViews($amount)
    // {
    //     $model = new PostModel();
    //     return $this->respond($model->getMostViews($amount));
    // }

    public function getMostViews($amount)
    {
        $model = new PostModel();
        return $this->respond($model->getMostViews($amount));
    }

    public function getMostRecent($amount)
    {
        $model = new PostModel();
        return $this->respond($model->getMostViews($amount));
    }

    public function getRandom()
    {
        $model = new PostModel();
        return $this->respond($model->getRandom());
    }
}
