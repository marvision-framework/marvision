<?php

	class Model
	{
		static $connections = array();

		public $conf = 'default';
		public $table = false;
		public $db;
		public $primaryKey = 'id';
		public $id;
		public $errors = array();
		public $form;

###################################################################################################
########## fonction prinsipale
##################################################################################################
		

		public function __construct()
		{

			//j'inisialise ques variable
			if ($this->table === false) {
				$this->table = strtolower(get_class($this)).'s';
			}
			//jme connecte àla base
 
			$app_yml = new AppClassYML(); 
			$db = $app_yml->load("parameters","conf");
			$parameters = (HOST == "local") ? 'parameters_local' : 'parameters_host' ;
			$conf = $db[$parameters];
			//var_dump($conf);
			if (isset(Model::$connections[$this->conf])) {
				$this->db = Model::$connections[$this->conf];
				return true ;
			}
			try{

				$pdo = new PDO(
					'mysql:host='.$conf['db_host'].';
					dbname='.$conf['db_name'].';',
					$conf['db_user'],
					$conf['db_password'],
					array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
					);
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
				
				Model::$connections[$this->conf] = $pdo;
				$this->db = $pdo;

			}catch(PDOException $e){
				if (Conf::$debug >= 1) {
					//die('hhh'.$e->getMessage());
					MFVNoDatabase($e->getMessage());
				}else{
					MFVNoDatabase();
				}
				
			}
			
			
		}




		/**
		** fonction findTab (find TABLE )
		**/
		
		public function findTab(){ 
			$ymlfile = new AppClassYML(); 
			$db = $ymlfile->load("parameters","conf");
			$parameters = (HOST == "local") ? 'parameters_local' : 'parameters_host' ; 
			$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$db[$parameters]['db_name']."'";

			$pre = $this->db->prepare($sql);
			$pre->execute();
			$data =  $pre->fetchAll(PDO::FETCH_OBJ); 
			return $data;
		}

		/**
		** fonction CreatTab (CREATE TABLE )
		**/
		
		public function CreatTab($tab,$data=array()){
			// sql to create table
			$sql = "CREATE TABLE IF NOT EXISTS ".$tab." (
			id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,";
			foreach ($data as $name => $array) {
				if (!empty($array['type'])) {
					if ($array['type'] == "INT") {
						if (empty($array['size'])) {
							$sql .= $name." INT(11) ,";
						}else{
							$sql .= $name." INT(".$array['size'].") ,";
						}
					}elseif ($array['type'] == "VARCHAR") {
						if(empty($array['size'])){
							$sql .= $name." VARCHAR(255) ,";
						}else{
							$sql .= $name." VARCHAR(".$array['size'].") ,";
						}  
					}else{
						if (!empty($array['size'])) {
							$sql .= $name." ".$array['type']."(".$array['size'].") ,";
						}else{
							$sql .= $name." ".$array['type']." ,";
						}
					}
				}
			}
			$sql .= "PRIMARY KEY ( id ));";  

			if ($this->db->query($sql) == TRUE) {
			    $result = true;
			} else {
			    $result = false;
			}
			return $result;
		}


		/**
		** fonction find
		**/
		
		public function find($req = array()){
			$sql = 'SELECT ';
			if(isset($req['fields'])){
				if(is_array($req['fields'])){
					$sql .= implode(', ', $$req['fields']);
				}else{
					$sql .= $req['fields'];
				}
			}else{
				$sql .= '*';
			}
			$sql .= ' FROM '.$this->table.' as '.get_class($this).' ';
			//construction de la condition
			if(isset($req['conditions'])){
				$sql .= 'WHERE ';//.$req['conditions'];
				if (!is_array($req['conditions'])) {
					$sql .= $req['conditions'];
				}else{
					$cond = array();
					foreach ($req['conditions'] as $k => $v) {
						if (!is_numeric($v)) {
							$v = '"'.($v).'"';
						}
						$cond[] = "$k = $v";
					}
					$sql .= implode(' AND ', $cond);
				}
			}

			if(isset($req['sp'])){

							$sql .= $req['sp'];	//
						}
			if(isset($req['order'])){

							$sql .= ' ORDER BY '.$req['order'];//.$req['order'];	
						}
			if(isset($req['ordersens'])){
					$sql .= ' '.$req['ordersens'];//.$req['ordersens'];	
				}
			if(isset($req['limit'])){

							$sql .= ' LIMIT '.$req['limit'];//.$req['limit'];	
						}
			 //die($sql);  

			$pre = $this->db->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_OBJ);
		}
		/**
		** fonction find DISTINCT
		**/
		
		public function findD($req = array()){
			$sql = 'SELECT DISTINCT ';
			if(isset($req['fields'])){
				if(is_array($req['fields'])){
					$sql .= implode(', ', $$req['fields']);
				}else{
					$sql .= $req['fields'];
				}
			}else{
				$sql .= '*';
			}
			$sql .= ' FROM '.$this->table.' as '.get_class($this).' ';
			//construction de la condition
			if(isset($req['conditions'])){
				$sql .= 'WHERE ';//.$req['conditions'];
				if (!is_array($req['conditions'])) {
					$sql .= $req['conditions'];
				}else{
					$cond = array();
					foreach ($req['conditions'] as $k => $v) {
						if (!is_numeric($v)) {
							$v = '"'.($v).'"';
						}
						$cond[] = "$k = $v";
					}
					$sql .= implode(' AND ', $cond);
				}
			}

			if(isset($req['sp'])){

							$sql .= $req['sp'];	//
						}
			if(isset($req['order'])){

							$sql .= ' ORDER BY '.$req['order'];//.$req['order'];	
						}
			if(isset($req['ordersens'])){
					$sql .= ' '.$req['ordersens'];//.$req['ordersens'];	
				}
			if(isset($req['limit'])){

							$sql .= ' LIMIT '.$req['limit'];//.$req['limit'];	
						}
			 //die($sql); 
			$pre = $this->db->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_OBJ);
		}

		/**
		** fonction find  Join DISTINCT
		**/
		
		public function findjoinD($req = array()){
			$sql = 'SELECT DISTINCT ';
			if(isset($req['fields'])){
				$sql .= $req['fields'];
			}
			$sql .= ' FROM ';
			if(isset($req['tables'])){
				$sql .= $req['tables'];
			}else{
				$sql .= $this->table.' ';
			}
			if(isset($req['conditions'])){
			$sql.= ' WHERE ';

				if (!is_array($req['conditions'])) {
					$sql .= $req['conditions'];
				}else{
					$cond = array();
					foreach ($req['conditions'] as $k => $v) {
						if (!is_numeric($v)) {
							$v = '"'.($v).'"';
						}
						$cond[] = "$k LIKE $v";
					}
					$sql .= implode(' AND ', $cond);
				}
			}
			if(isset($req['bascond'])){
						$sql .= ' AND '.$req['bascond'];//.$req['bascond'];	
				}
			if(isset($req['order'])){
					$sql .= ' ORDER BY '.$req['order'];//.$req['order'];	
				}
			if(isset($req['ordersens'])){
					$sql .= ' '.$req['ordersens'];//.$req['ordersens'];	 ASC ou DESC,
				}
			if(isset($req['limit'])){

							$sql .= ' LIMIT '.$req['limit'];//.$req['limit'];	
					}
			//die($sql);
			$pre = $this->db->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_OBJ);
		}
		/**
		** fonction find  Join 
		**/
		
		public function findjoin($req = array()){
			$sql = 'SELECT * FROM ';
			if(isset($req['tables'])){
				$sql .= $req['tables'];
			}
			$sql.= ' WHERE ';
			if(isset($req['conditions'])){

				if (!is_array($req['conditions'])) {
					$sql .= $req['conditions'];
				}else{
					$cond = array();
					foreach ($req['conditions'] as $k => $v) {
						if (!is_numeric($v)) {
							$v = '"'.($v).'"';
						}
						$cond[] = "$k LIKE $v";
					}
					$sql .= implode(' AND ', $cond);
				}
			}
			if(isset($req['bascond'])){
						$sql .= ' AND '.$req['bascond'];//.$req['bascond'];	
				}
			if(isset($req['order'])){
					$sql .= ' ORDER BY '.$req['order'];//.$req['order'];	
				}
			if(isset($req['ordersens'])){
					$sql .= ' '.$req['ordersens'];//.$req['ordersens'];	
				}
			if(isset($req['limit'])){

							$sql .= ' LIMIT '.$req['limit'];//.$req['limit'];	
					}
			die($sql);
			$pre = $this->db->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_OBJ);
		}

		/**
		** fonction findFirst
		**/
		
		public function findjoinFirst($req){
			return current($this->findjoin($req));
		}

		/**
		** fonction findFirst
		**/
		
		public function findFirst($req){
			return current($this->find($req));
		}

		/**
		** fonction findCount
		**/
		
		public function findCount($conditions){
			$primaryKey = 'id'; 
			$res = $this->findFirst(array(
					'fields' => 'COUNT(*) as count',
					'conditions' => $conditions
				));
			//die($res->count);
			return $res->count;

		}
		/**
		** fonction findSum
		**/
		
		public function findSum($var){
			$primaryKey = 'id';
			$res = $this->findFirst(array(
					'fields' => 'SUM('.$var.') as sum'
				));
			//die($res->sum);
			return $res->sum;

		}
		
		


		/**
		** fonction delete
		**/
		
		public function delete($id,$key=null){
			$primaryKey = (empty($key)) ? "id" : $key ;
			$sql = "DELETE FROM {$this->table} WHERE {$primaryKey} = $id";
			$this->db->query($sql);
		}
		/**
		** fonction delete all
		**/
		
		public function suppthis($req = array()){
			
			$sql = "DELETE FROM {$this->table} WHERE ";
			if(isset($req['conditions'])){

				if (!is_array($req['conditions'])) {
					$sql .= $req['conditions'];
				}else{
					$cond = array();
					foreach ($req['conditions'] as $k => $v) {
						if (!is_numeric($v)) {
							$v = '"'.($v).'"';
						}
						$cond[] = "$k LIKE $v";
					}
					$sql .= implode(' AND ', $cond);
				}
			}
			//die($sql);
			$this->db->query($sql);
		}

		/**
		** fonction add (insert )
		**/
		
		public function add($data){
			    $set = array();
			    $fields = array();
			    $d = array();

			    foreach($data as $name => $value) {
			    	$value = $this->db->quote($value); 
			        $fields[] .= $name ;
			        $set[] .= "{$value}";
			        
			    }
			    	$fields = implode(' , ', $fields);
			    	$set = implode(' , ', $set);

			$sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$set});";
					   // die($sql);
			 

			        $pre = $this->db->prepare($sql);
					$pre->execute($d);
		}

		/**
		** fonction edit (update )
		**/
		
		public function edit($id,$data){
			$primaryKey = 'id';
			$key = $primaryKey;
			$fields = array();
			$d = array();
			
			//if(isset($data->$key)) unset($data->$key);//supprimer
			foreach($data as $k=>$v){
	            if($k!=$this->primaryKey){
	                $fields[] = "$k = '$v'";
	            	$p["$v"] = $v;
	            }elseif(!empty($v)){
	                $p["$v"] = $v;
	            }
			}
			if (isset($data->$key) && !empty($data->$key)) {
				$fields = implode(', ', $fields);
				$sql = "UPDATE {$this->table} SET {$fields} WHERE {$primaryKey} = ".$id.";";
				$sql = str_replace(", modif = 'Envoyer'", ' ', $sql);
				//$this->id = $data->$key;
				//die($sql);
			}
			$pre = $this->db->prepare($sql);
			$pre->execute($d);
			
		}
 
		/**
		** fonction update par 
		**/
		
		public function update($id, $fields,$cond=null) {
			$primaryKey = 'id';
				//$key = $this->primaryKey;
			    $set = '';
			    $x = 1;
			    $d = array();

			    foreach($fields as $name => $value) {
			    	$value = $this->db->quote($value); 
			        $set .= " {$name} = {$value} ";
			        if($x < count($fields)) {
			            $set .= ' , ';
			        }
			        $x++;
			    }
			    if (empty($cond)) {
			    	$sql = "UPDATE {$this->table} SET {$set} WHERE  {$primaryKey} = {$id}";
			    }else{ 
			    	$sql = "UPDATE {$this->table} SET {$set} WHERE  {$primaryKey} = {$id} AND {$cond}";
			    }
			   //die($sql); 

				$pre = $this->db->prepare($sql);
				$pre->execute($d);

			}


		

	}
?>  