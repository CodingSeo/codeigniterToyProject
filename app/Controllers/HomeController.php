<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class HomeController extends ResourceController
{

    protected $format    = 'json';
	
	public function index()
	{
		return $this->respond('home');
	}

}
