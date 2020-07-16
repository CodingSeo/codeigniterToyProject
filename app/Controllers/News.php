<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    
    public function index()
    {
        $model = new NewsModel();

        dd($model->getNews());
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        return $data['news'] = $model->getNews($slug);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }
    }
}
