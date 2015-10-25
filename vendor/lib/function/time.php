<?php
		function DateNow($type=null){
			$result = date("Y-m-j H:i:s"); 
			return $result;
		}
		function dateTrans($date){
			//03/29/2015 --> 2015-29-03
			$date = toarray($date,"none","/");
			$data = $date['2']."-".$date['1']."-".$date['0'];
			return $data;

		}
		function ArrayToDate($array){
			return $array["y"].'-'.$array["m"].'-'.$array["d"];
		}
		function array_date($date,$type=null){

			$result = array();
			if ($type == "date") { $date = $date." 00:00:00"; }
			$pattern = '/(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/i';
			$replacement1   = '${1}';
			$replacement2   = '${2}';
			$replacement3   = '${3}'; 
			$replacement4   = '${4}'; 
			$replacement5   = '${5}'; 
			$replacement6   = '${6}'; 

			$result['y'] = preg_replace($pattern, $replacement1, $date);
			$result['m'] = preg_replace($pattern, $replacement2, $date);
			$result['j'] = preg_replace($pattern, $replacement3, $date);
			$result['h'] = preg_replace($pattern, $replacement4, $date);
			$result['min']  = preg_replace($pattern, $replacement5, $date);
			$result['s']  = preg_replace($pattern, $replacement6, $date);

			return $result;
		}


		function herscop_moin_jour($moin,$y){ 
			$m = array(	"1"=>"31","3"=>"31","4"=>"30","5"=>"31","6"=>"30",
						"7"=>"31","8"=>"31","9"=>"30","10"=>"31","11"=>"30","12"=>"31"); 
			$m["2"] = (fmod($y,"2") == "0") ? "29" : "28" ;
			$jour = 0;
			for ($i=0; $i < $moin; $i++) { 
				$jour = $jour + $m[$i+1];
			}

			return $jour;
		}
		function time_in_sec($date){
			$date = array_date($date);
			$anne = (fmod($date['y'],"2") == "0") ? "366" : "365" ;
			$result = $date['sec'] + ($date['min'] * 60) + ($date['h'] * 3600) + (($date['j'] + herscop_moin_jour($date['m'],$date['y']) + $anne ) * 86400);
			
			return $result;
		}
		function time_out_sec($timestamp){
			$date = array("Y"=>0,"M"=>0,"J"=>0,"h"=>0,"m"=>0,"s"=>$timestamp);
			
			while ( $date['s'] > 59) {
				if ($date['s'] > 31556925) {//anne
					$date['Y'] = $date['s'] / 31556926;
					$num = explode(".", $date['Y']);
					$date['Y'] = $num['0'];
					$date['s'] = $date['s'] - (("0.".$num['1']) * 31556926);
					return $date;
				}else{ 
					if ($date['s'] > "2629743") {//moin
						$date['M'] = $date['s'] / 2629744;
						$num = explode(".", $date['M']);
						$date['M'] = $num['0'];
						$date['s'] = $date['s'] - (("0.".$num['1']) * 2629744);
						return $date;
 
					}else{
						if ($date['s'] > "86399") {//JOUR
							$date['J'] = $date['s'] / 86400;
							$num = explode(".", $date['J']);
							$date['J'] = $num['0'];
							$date['s'] = $date['s'] - (("0.".$num['1']) * 86400);
							return $date;
						}else{
							if ($date['s'] > "3599") {//HEAuR
								$date['h'] = $date['s'] / 3600;
								$num = explode(".", $date['h']);
								$date['h'] = $num['0'];
								$date['s'] = $date['s'] - (("0.".$num['1']) * 3600);
								return $date;
							}else{
								if ($date['s'] > "59") {//MIN
									$date['m'] = $date['s'] / 60;
									$num = explode(".", $date['m']);
									$date['m'] = $num['0'];
									$date['s'] = $date['s'] - (("0.".$num['1']) * 60);
									return $date;
								}
							}
						}
					}
				}
			}
			
			
			return $date;
		}
		function dure($date){ 
			$lib_ar = array("now"=>"now","sec"=>"s","2sec"=>"2s","secs"=>"ss","min"=>"min","2min"=>"2min","mins"=>"mins","h"=>"h","2h"=>"2h","hs"=>"hs","j"=>"jour","2j"=>"2jour","js"=>"jours","m"=>"moin","2m"=>"2moin","ms"=>"moins","y"=>"anne","2y"=>"2anne","ys"=>"annes");
			$date = array_date($date); 
			if ($date["y"] == date("Y")) {
				
				if ($date["m"] == date("m")) {
				
						if ($date["j"] == date("j")) {
						
								if ($date["h"] == date("H")) {
								
										if ($date["min"] == date("i")) {
								
												if ($date["s"] == date("s")) {
														$result = $lib_ar['now'];
													}elseif($date["s"] < date("s")){
														$sec = (date("s")-$date['s']);  
														if ($sec == 1) {
															$result = $lib_ar['sec'];
														}elseif ($sec == 2) { 
															$result = $lib_ar['2sec'];
														}else{
															$result = $sec." ".$lib_ar['secs'];
														}
													}else{
														$result = false;
												}
											}elseif($date["min"] < date("i")){
												$min = (date("i")-$date['min']);  
												if ($min == 1) {
													$result = $lib_ar['min'];
												}elseif ($min == 2) { 
													$result = $lib_ar['2min'];
												}else{
													$result = $min." ".$lib_ar['mins'];
												}
											}else{
												$result = false;
										}
									}elseif($date["h"] < date("H")){
										$heur = (date("H")-$date['h']);  
										if ($heur == 1) {
											$result = $lib_ar['h'];
										}elseif ($heur == 2) { 
											$result = $lib_ar['2h'];
										}else{
											$result = $heur." ".$lib_ar['hs'];
										}
									}else{
										$result = false;
								}

							}elseif($date["j"] < date("j")){
								$jour = (date("j")-$date['j']);  
								if ($jour == 1) {
									$result = $lib_ar['j'];
								}elseif ($jour == 2) { 
									$result = $lib_ar['2j'];
								}else{
									$result = $jour." ".$lib_ar['js'];
								}
							}else{
								$result = false;
						}

					}elseif($date["m"] < date("m")){
						$moin = (date("m")-$date['m']);  
						if ($moin == 1) {
							$result = $lib_ar['m'];
						}elseif ($moin == 2) { 
							$result = $lib_ar['2m'];
						}else{
							$result = $moin." ".$lib_ar['ms'];
						}
					}else{
						$result = false;
				}

			}elseif($date["y"] < date("Y")){
				$anne = (date("Y")-$date['y']);  
				if ($anne == 1) {
					$result = $lib_ar['y'];
				}elseif ($anne == 2) { 
					$result = $lib_ar['2y'];
				}else{
					$result = $anne." ".$lib_ar['ys'];
				}
			}else{
				$result = false;
			}
			return $result;
		}

		function age($birthday){
			//birthday == anneé
			$date = array_date($birthday,'date'); 
			$age = date("Y") - $date['y'];
			if ($date['m'] < date("m")) {
				$age = $age -1 ;
			}else{
				if ($date['j'] < date("j")) {
					$age = $age -1 ;
				}
			}

			return $age;
			
		}

	function dureTime($from,$to,$form=null){ //2015/5/24 10:50:03 -- 2019/1/1 00:01:23
		$from = array_date($from,"date"); 
		$to = array_date($to,"date"); 
			if ($to['y'] >= $from['y']) {
				if ($from['y'] == $to['y']) {
					if ($from['m'] == $to['m']) {
						if ($from['j'] == $to['j']) {
							if ($from['h'] == $to['h']) {
								if ($from['min'] == $to['min']) {
									if ($from['s'] == $to['s']) {
										$result = "now";
									}elseif ($from['s'] < $to['s']) {
										$result = $to['s'] - $from['s'].' s';
									}else{ 
										$result = "Error";
									}
									
								}elseif ($from['min'] < $to['min']) {
									$result = $to['min'] - $from['min'].' min';
								}else{ 
									$result = "Error";
								}
								
							}elseif ($from['h'] < $to['h']) {
								$result = $to['h'] - $from['h'].' h';
							}else{ 
								$result = "Error";
							}
							
						}elseif ($from['j'] < $to['j']) {
							$result = $to['j'] - $from['j'].' jour';
						}else{ 
							$result = "Error";
						} 
						
					}elseif ($from['m'] < $to['m']) {
						$result = $to['m'] - $from['m'].' moin';
					}else{ 
						$result = "Error";
					} 
				}else{ 
					$result = $to['y'] - $from['y'].' anne';
				}
			}else{
				$result = "Error";
			} 
		return $result;
	}
	  


	#######################################################################################
	################  1991-7-5 ==> 5 juil 1991 or 1991 ةيليوج 5
	######################################################################################

	function DateTxtForm($date){

		$date = array_date($date,'date');
		$m = translater("moin","time",$date['m']);
		return $date['j'].' '.$m.' '.$date['y'];
	}


?>