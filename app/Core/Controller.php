<?php 

namespace App;

use App\Debug;
use App\View; 
use App\Model;

Class Controller
{
	 
	public function load($route,$request){ 
		$controller = $this->loadControllers($route->controller,$request); 
		return $this->loadFunctions($controller,$route,$request); 
	}

	/* load controller file */
	public function loadControllers($controller,$request){ 
		 
		$file = MVC.'/Controllers/'.$controller.'.php';
		if (!file_exists($file)) {

			$debug = new Debug();
			return $debug->e404('The Controller '.$controller.' not found !');
		}else{
			require_once $file; 
			$name =  'App\Controllers\\'.$controller;
			$app = new $name();
			return $app;
		}
		
	}

	/* load controller function or method */
	public function loadFunctions($controller,$route,$request){ 
		$methods = array_diff(get_class_methods($controller) , get_class_methods(self::class));
		if (in_array($route->function, $methods)) {
			$request = (array)$request;
			return call_user_func_array(array($controller, $route->function), $request);
		}else{

			$debug = new Debug();
			return $debug->e404('The controller '.$route->controller.' has no method '.$route->function);
		} 
	}

 	public function view($view,$data=null){ 
 		$data = (!empty($data)) ? $data : array() ;
 		$renderViews = new View();
 		return $renderViews->run($view,$data);
 	}
	 


}