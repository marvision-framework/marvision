<?php


/***************  Base *****************************************/

	Router::connect('','pages/home');//home page 
	Router::connect('test','pages/test');//home page      

/***************  login *****************************************/

	Router::connect('login','users/login');//login page  
	Router::connect('logout','users/logout');//logout   

/***************  Admin *****************************************/

	Router::connect('admin','cms/dashbord');//dashbord page  
	Router::connect('admin/delete/:id','cms/deleteData/id:([0-9]+)');//delete page   
	###### users
	Router::connect('admin/users','cms/users');//users page  
	Router::connect('admin/user','cms/users');//users page 
	Router::connect('admin/user/add','cms/adduser');//add new user page  
	Router::connect('admin/user/edit/:id','cms/edituser/id:([0-9]+)');//edit user page  
	###### Inbox
	Router::connect('admin/inbox','cms/inbox');//users page       
	

/***************  web *****************************************/
	  
