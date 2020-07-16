<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		$this->returnMyJson();
	}
	public function returnMyJson() { 

		header('Content-Type: application/json');
	  
		$myArray = ['id'=>12, 'name'=>'Topi'];
	  
		echo json_encode($myArray);
	  
	  } 

}
