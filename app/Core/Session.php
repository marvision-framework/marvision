<?php

namespace App;

	class Session
	{
		 
		public function __construct()
		{
			session_start(); 
		} 


		public static function getToken($order=null){
			if (!empty($order)) {
				$_SESSION['csr_token'] = base64_encode(openssl_random_pseudo_bytes(32));
			}
			return $_SESSION['csr_token'];
		}

	}