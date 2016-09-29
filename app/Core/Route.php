<?php

namespace App;

Class Route
{
		 
	/*
		file route.php

		Route::get('url','controller@home','home_path');
	 
	*/

	public static function find($req){ 
		$listRoutes = self::all(); 
		if (!empty($req)) {
			foreach ($listRoutes as $key => $data) {
				if ($req->url == $data->url) {
					$route = $data;
				}
			}
		}
		return (!empty($route)) ? $route : false ; 
	}

	public static function all(){    
		$Route_list = [];
		$content= file_get_contents(MVC.'/Route.php');  
		preg_match_all("/^(.*Route::.*)$/mi", $content, $results);  
		$data= $results[1]; 
		foreach ($data as $key => $value) { 
			$method = explode('::', explode('(', $value)[0])[1];  
			$cont_func = explode(',', str_replace(["Route::".$method."(",");","'",'"'], '', $value)); 
			$url = $cont_func[0];
			$controller = explode('@', $cont_func[1])[0];
			$function = explode('@', $cont_func[1])[1];
			$name_path = $cont_func[2]; 

			$Route_list[$key]['method'] = $method;
			$Route_list[$key]['url'] = $url;
			$Route_list[$key]['controller'] = $controller;
			$Route_list[$key]['function'] = $function;
			$Route_list[$key]['name_path'] = $name_path;
		} 
		$debug = json_encode($Route_list);
		return (Object) json_decode($debug);
	}

	 

}
