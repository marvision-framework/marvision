<?php

	class PagesController extends Controller
	{
		function test(){ 
			$this->layout = 'home';
			$d['pg_title'] = 'Marwen Hlaoui';
			$d['name'] = 'Marwen Hlaoui';

			$this->view($d);
			//die(debug($result_yml));  
		} 


		function home(){
			//$this->layout = 'home';
			$d['thisongl'] = 'home';   

			$this->view($d);
		}
 
		 


	}
?>