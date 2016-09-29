<?php 

namespace App; 

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
  
Class Model 
{
 

 	public function __construct() {
 		$isDevMode = true;
		$config = Setup::createAnnotationMetadataConfiguration(array(MVC."/Models"), $isDevMode);  
		if ($_ENV['DB_CONNECTION'] == "mysql") {
			$conn = ['driver'=>'pdo_mysql','host'=>$_ENV['DB_HOST'],'dbname'=>$_ENV['DB_DATABASE'],'user'=>$_ENV['DB_USERNAME'],'password'=>$_ENV['DB_PASSWORD']];
		} 

		$this->entityManager = EntityManager::create($conn, $config);

 	}


 	public function load($table)
 	{
        return $this->entityManager->getRepository($table); 
 	}


 	public static function all()
 	{
 		 
	 	$table = new Model();
	    return $table->load(get_called_class())->findAll(); 
 	} 
 	
 	public static function find($k,$v=null)
 	{
 		$table = new Model();
 		if (!empty($v)) {
	    	return $table->load(get_called_class())->findBy(array($k => $v));
 		}else{
 			if (is_array($k)) {
	    		return $table->load(get_called_class())->findBy($k);
 			}else{
	    		return $table->load(get_called_class())->findOneBy(array("id" => $k));
 			}
 		}
 	}

 	public static function where($k)
 	{
 		$table = new Model();
 		return $table->load(get_called_class())->findBy($k);
 	}



 	

	
}