<?php
	class User extends Model
	{
		 
	}
	
$model = array( 
######################################################################################
# 	type Exemple : INT,VARCHAR,TEXT,DATE,TIME,DATETIME,BOOLEAN,...
######################################################################################
# @ users.id is default 
# @ users.email
#########################
	"email" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.password
#########################
	"password" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.nom
#########################
	"nom" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.prenom
#########################
	"prenom" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.username
#########################
	"username" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.img
#########################
	"img" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "255"
	),
# @ users.last_login
#########################
	"last_login" 	=> array(
		"type" 	=> "DATETIME"
	),
# @ users.last_logout
#########################
	"last_logout" 	=> array(
		"type" 	=> "DATETIME"
	),
# @ users.role
#########################
	"role" 	=> array(
		"type" 	=> "INT",
		"size"	=> "1"
	),
# @ users.connect
#########################
	"connect" 	=> array(
		"type" 	=> "BOOLEAN"
	),
# @ users.active
#########################
	"active" 	=> array(
		"type" 	=> "INT",
		"size"	=> "1"
	),  
# @ users.ip
#########################
	"ip" 	=> array(
		"type" 	=> "VARCHAR",
		"size" 	=> "50"
	),
# @ users.ref
#########################
	"ref" 	=> array(
		"type" 	=> "BOOLEAN"
	),
# @ users.birthday
#########################
	"birthday" 	=> array(
		"type" 	=> "DATE"
	),
# @ users.sex
#########################
	"sexe" 	=> array(
		"type" 	=> "BOOLEAN"
	),
# @ users.description
#########################
	"description" 	=> array(
		"type" 	=> "TEXT"
	),
# @ users.inscription
#########################
	"inscription" 	=> array(
		"type" 	=> "DATETIME"
	),
);
 
