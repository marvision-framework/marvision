<?php
/*
	Loads environment data from .env to any place in code
*/
	$dotenv = new Dotenv\Dotenv(ROOT);
	$dotenv->load();
