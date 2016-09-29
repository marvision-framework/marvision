<?php
namespace App;

Class Debug
{

	public function __construct() { 
		if (($_ENV['APP_DEBUG'] == "false")OR($_ENV['APP_ENV'] == "host")) { 
			return $this->DefaultErrorPage();
		}
	}

	public function e404($msg){
		die($msg);
	}

	public function DefaultErrorPage(){
		die("Sorry ...");
	}


}