<?php


		/****************************************************************************************************/
		/**************************************    icons & logo & ...   *************************************/
		/****************************************************************************************************/

		function icons_gender($geneder,$type=null){
			$type = (empty($type)) ? "default" : $type ;
			if ($type == "default") {
				if ($geneder == "1") {
					$icons = "<i class='ion ion-male notxt_vue'> <p>M</p></i>";
				}else{
					$icons = "<i class='ion ion-female notxt_vue'> <p>F</p></i>";
				} 
			}
			if ($type == "txt") {
				if ($geneder == "1") {
					$icons = "<i class='ion ion-male notxt_vue'></i> Male";
				}else{
					$icons = "<i class='ion ion-female notxt_vue'></i> Female";
				} 
			}
			echo $icons;
		}

		function icons_role($role,$type=null){
			//role : 0:user,1:admin
			$type = (empty($type)) ? "default" : $type ;
			if ($type == "default") {
				if ($role != "0") {
					$icons = "<small class='label bg-teal' style='line-height: 2.5;'><i style='font-size: 20px;' class='ion ion-ribbon-b'></i> admin</small>";
				}else{
					$icons = "<small class='label bg-purple' style='line-height: 2.5;'><i style='font-size: 20px;' class='ion ion-person'></i> user</small>";
				}
			}
			if ($type == "txt") {
				if ($role != "0") {
					$icons = "<i class='ion ion-ribbon-b'></i> admin";
				}else{
					$icons = "<i class='ion ion-person'></i> user";
				}
			} 
			echo $icons;
		}

		function icons_connect($connect,$type=null){
			//connect 0:deconnect,1:connect,2:connect&cacher
			$type = (empty($type)) ? "txt" : $type ;
			if ($type == "txt") {
				if ($connect == "1") {
					$icons = "<small class='label label-success' style='line-height: 2.5;'><i class='fa fa-power-off'></i> connect</small> ";
				}elseif ($connect == "2") {
					$icons = "<small class='label label-warning' style='line-height: 2.5;'><i class='fa fa-power-off'></i> hor-line</small>";
				}else{
					$icons = "<small class='label label-default' style='line-height: 2.5;'><i class='fa fa-power-off'></i> deconnect</small>";
				}
			} 
			echo $icons;
		}

		function icons_active($active,$type=null){
			//active 0:bloque,1:active,2:verif
			$type = (empty($type)) ? "default" : $type ;
			if ($type == "default") {
				if ($active == "1") {
					$icons = "<small class='label label-info' style='line-height: 2.5;'><i class='fa fa-check'></i>&nbsp;actif</small> ";
				}elseif ($active == "2") {
					$icons = "<small class='label label-primary' style='line-height: 2.5;'><i class='fa fa-check-circle-o'></i>&nbsp;verif</small>";
				}else{
					$icons = "<small class='label label-danger' style='line-height: 2.5;'><i class='fa fa-times-circle-o'></i>&nbsp;Bloque</small>";
				}
			} 
			if ($type == "alert") {
				if ($active == "2") {
					$icons = "<i style='font-size:20px; color: rgb(98, 208, 243);' class='fa fa-check-circle-o' title='verif'></i>";
				}elseif ($active == "1") {
					$icons = "<i style='font-size:20px;' class='fa fa-check ' title='actif'></i>";
				}else{
					$icons = "<i style='font-size:20px; color:red;' class='fa fa-times-circle-o' title='Bloque'></i>";
				}
			} 
			echo $icons;
		}

		function icons_type($action,$type=null){
			//type de compte : 0:autre,1:kids,2:kotch,3:parent,4:m-3 

			$lang = (empty($_SESSION['lang'])) ? "ar" : $_SESSION['lang'] ;

			//biblang
				//bib ar
			$bib['ar'] = array("أخر","طفل","مدرب","ولي","مجلس علمي");

			$type = (empty($type)) ? "default" : $type ;
			if ($type == "default") {
				if ($action == "1") {
					$icons = "<small class='label bg-aqua' style='margin:2px;line-height: 2.5;'><i style='font-size:25px; color:white;' class='ion ion-planet'></i><span style='font-size:0px;'>kids</span></small> ";
				}elseif ($action == "2") {
					$icons = "<small class='label bg-orange' style='margin:2px;line-height: 2.5;'><i style='font-size:17px; color:white;' class='ion ion-ribbon-a'></i><span style='font-size:0px;'>kotch</span></small>";
				}elseif ($action == "3") {
					$icons = "<small class='label bg-maroon' style='margin:2px;line-height: 2.5;'><i style='font-size:15px; color:white;' class='ion ion-person-stalker'></i><span style='font-size:0px;'>parant</span></small>";
				}elseif ($action == "4") {
					$icons = "<small class='label bg-orange' style='margin:2px;line-height: 2.5;'><i style='font-size:20px; color:white;' class='ion ion-university'></i><span style='font-size:0px;'>m-3</span></small>";
				}else{
					$icons = "<small class='label label-default' style='margin:2px;line-height: 2.5;'><i style='font-size:15px; color:white;' class='ion ion-more'></i><span style='font-size:0px;'>www</span></small>";
				}
			}
			if ($type == "txt") {
				if ($action == "1") {
					$icons = "<i class='ion ion-planet'></i> &nbsp;".$bib[$lang][1];
				}elseif ($action == "2") {
					$icons = "<i class='ion ion-ribbon-a'></i> &nbsp;".$bib[$lang][2];
				}elseif ($action == "3") {
					$icons = "<i class='ion ion-person-stalker'></i> &nbsp;".$bib[$lang][3];
				}elseif ($action == "4") {
					$icons = "<i class='ion ion-university'></i>&nbsp; ".$bib[$lang][4];
				}else{
					$icons = "<i class='ion ion-more'></i> &nbsp;".$bib[$lang][0];
				}
			} 
			echo $icons;
		}


		function cho_pic($sexe,$date){
			$age = date("Y") - $date;
			if ($sexe == "1") {
				if ($age < "19") {
					$pic = "boy";
				}elseif ($age < "50") {
					$pic = "men";
				}else{
					$pic = "old_men";
				}
			}else{
				$pic = ($age < "19") ? "girl" : "women" ;
			} 
			if ($age < "1") { $pic = "none";}
			return $pic;
		}

?>