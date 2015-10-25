<?php 

	$this_url = trim($request->url,'/');
	$this_params = explode('/', $this_url);	
	/*var_dump($_SESSION);
	print_r("<br>");
	var_dump($this_params);
	die();*/
	if($this_params["0"] == 'admin'){
		//die($_SESSION['User']->nom);
		//$this->layout = 'admin'; 
		if ((!isset($_SESSION['User'])) OR $_SESSION['User']->role == "0") {
			$this->redirect('login');
		}
	}

	// ReadMe

	/*Les Roles 
		#0:User
		#0:kids
		#0:parent
		#0:kotch
		#1:Admin cellule
		#2:Admin web

	*/
?>