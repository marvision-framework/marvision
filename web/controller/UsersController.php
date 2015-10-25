<?php

	class UsersController extends Controller
	{
		
		
		/** login **/
  		function login(){ 
			if (isset($_SESSION['User'])) { $this->redirect('');}
			$this->layout = 'default';  
			$d['title_for_layout'] = 'home';   

			if (isset($_POST['login'])) {
				$email = protect($this->request->data->email);
				$password = protect($this->request->data->pass);
				if (!empty($email)&& !empty($password)) {
					if (usedb("email",$email,"User") == true) {
						$password = crypte($password); 
						$this->loadModel('User'); 
						$this_user = $this->User->findFirst(array(
								'conditions' => array('email' => $email)));
						if (!empty($this_user)&&($this_user->password == $password)&&($this_user->active != 0)) {
						
								$this->User->update($this_user->id, array(
														'connect' => 1,
														'last_login' => date("Y-m-j h:i:s"),
													));
								 
								$this->Session->write('User',userdata($this_user)); 
								if ($_SESSION['User']->role == "2") {
									 $this->redirect('admin'); 
								}else{ 
									 $this->redirect('');
								}
							}else{ $this->Session->setFlash(translater("remp_false","danger"));$this->redirect('login');  } 
					}else{ $this->Session->setFlash(translater("remp_false","danger"));$this->redirect('login');  } 

				}else{ $this->Session->setFlash(translater("remp_all","danger"));$this->redirect('login');  } 
			}

			$this->set($d);

  		}  

		/** logout ***/
		function logout(){ 
			if (isset($_SESSION['User'])) {
				$this->loadModel('User');
				$this->User->update($_SESSION['User']->id, array(
					'connect' => 0 ,
					'last_logout' => date("Y-m-j h:i:s")
				));
				
				unset($_SESSION['User']); 
				//session_destroy(); 
			}
				$this->redirect('login');
			
		}



	} 
?>