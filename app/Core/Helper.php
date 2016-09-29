<?php


/**
* dd (die && debug)
*/
if(!function_exists('dd')){
	function dd($var){
		return array_map(function($x) { var_dump($x); }, func_get_args()); die;
	}
}
/**
* view get view in controller methods
*/
if(!function_exists('view')){
	function view($view,$data=null){
		$app = new App\Controller();
		return $app->view($view,$data);
	}
} 

/**
* find all files in this dir
*/

if(!function_exists('findDir')){
	function findDir($dir,$type=null){ 
		$data = [];
		if ($handle = opendir($dir)) {

		    while (false !== ($entry = readdir($handle))) {

		        if ($entry != "." && $entry != "..") {
		        	if (!empty($type)) {
		        		$val = explode('.', $entry); 
		        		if (!empty($val[1])&&($val[1] == $type)) {
		        			$data[] = $entry;
		        		}
		        	}else{
		        		$data[] = $entry;
		        	} 
		        }
		    }

		    closedir($handle);
		}

		return (object)$data;
	}
} 


/**
* Route
*/
if(!function_exists('route')){
	function route($val){ 
		dd($val);
	}
} 


/**
* include all files in this path with cond
*/
if(!function_exists('make')){
	function make($data=array()){
		foreach ($data as $key => $item) {
			/*
			*	make models 
			*/
			if ($key == "Model") {
				$dir = MVC.'/Models';
				foreach (findDir($dir,'php') as $file) {
					require_once $dir.'/'.$file;
				}
			}

		}
	}
} 

/**
* csrf_token
*/
if (! function_exists('csr_token')) {
       
      function csr_token()
     { 
     	if (null !== App\Session::getToken()) {
     		App\Session::getToken('set'); 
		    $input = "<input type='hidden' name='csr_token' value='".App\Session::getToken()."'>";
            return $input;
		} 
   
      }
 }