<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class HomeController extends ResourceController
{
	protected $modelName = 'App\Models\Photos';
    protected $format    = 'json';
	public function index()
	{
		return $this->respond('home');
	}
}
