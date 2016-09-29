<?php

namespace App;

	class Request
	{
		public $url;

		function __construct()
		{
			$this->url = isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO'] : '/';
			/*if(isset($_GET['page'])){
				if (is_numeric($_GET['page'])) {
					if($_GET['page'] > 0){
						$this->page = round($_GET['page']);
					}
				}
			}
			if (!empty($_POST)) {
				$this->data = new stdClass(); //un objet
				foreach ($_POST as $k => $v ) {
					$this->data->$k=$v;
				}
				  //debug($this->data);
			}*/
			if (!empty($_POST)) {
				$this->data = new \stdClass(); //un objet
				foreach ($_POST as $k => $v ) {
					$this->data->$k=$v;
				}
				if (!empty($this->data->csr_token)&&(Session::getToken() == $this->data->csr_token)) {
					//dd($this->data);
				}else{
					dd('error...');
				} 
			}
		}

		public function all(){
			return $this->data;
		}

		public function url(){
			return $this->url;
		}

	}