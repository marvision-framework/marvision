<?php

namespace App;

use App\Debug;
use Windwalker\Renderer\BladeRenderer;

Class View
{
	public $viewsType = ['blade','twig'];

	public function run($view,$data){ 
		if (in_array($_ENV['APP_VIEWS'], $this->viewsType)) {
			$loader = $_ENV['APP_VIEWS'].'Loader';
			return $this->$loader($view,$data);
		}else{
			$debug = new Debug();
			return $debug->e404('Template engine '.$_ENV['APP_VIEWS'].' not found ..!');
		}
		//return $this->bladeLoader($view,$data);
		//return $this->twigLoader($view,$data);
	}

	public function twigLoader($viewName,$data){
		$view = $this->findView($viewName,'twig');
		$loader = new \Twig_Loader_Array([$viewName=>$view]); 
		$twig = new \Twig_Environment($loader);
		echo $twig->render($viewName,$data);
	}

	public function bladeLoader($viewName,$data)
	{  
		$view = $this->findView($viewName,'blade');
		echo $view->render($viewName, $data);  
	}

	public function findView($viewName,$type){
		$exist = false;
		if ($type == "twig") {
			$view = MVC.'/Views/'.$viewName.'.html';
			if (file_exists($view)) {
				$exist = true;
				return file_get_contents($view);
			}
		}elseif ($type == "blade") {
			$paths = array(MVC.'/Views'); 
			$cache = array('cache_path' => CACHE);
			$file = MVC.'/Views/'.$viewName;
			if ((file_exists($file.'.blade.php'))OR(file_exists($file.'.php'))) {
				$renderer = new BladeRenderer($paths, $cache);
				return $renderer;
			} 
		}

		if ($exist == false) { 
			$debug = new Debug();	
			return $debug->e404('This view '.$viewName.' not found ..!');
		}
	}



}