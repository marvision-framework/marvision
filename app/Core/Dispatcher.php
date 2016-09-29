<?php

namespace App;

use App\Debug;
use App\Request;
use App\Route;
use App\Controller;

	class Dispatcher
	{
		var $request;

		public function __construct()
		{
			$this->session = new Session();
			$this->request = new Request();
			$routeur = Route::find($this->request);
			if (!empty($routeur->controller)) { 
				$app = new Controller();
				$app->load($routeur,$this->request);  
			}else{
				$debug = new Debug();
				return $debug->e404("Trying to get property of non-object");
			} 
		} 

	}