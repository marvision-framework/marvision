<?php
 /*  
	define ('APP',dirname(__FILE__));//root constant de app
	define ('ROOT',dirname(APP));//root constant de site
	define ('SRC',ROOT.'/assets');//url de fiche src  
	define ('WEB',ROOT.'/web');//url de fiche web  
	define ('APP_config',APP.'/config');//url de fiche app/config  
	define ('VENDOR',ROOT.'/vendor');//url de fiche core 
	define ('CORE',ROOT.'/vendor/core');//url de fiche core 
	define ('WEBROOT',WEB.'/view/core');//url de fiche core  

	define ('BOOT',BASE_SRC.'/_BOOT');//url de fiche core 
	define ('SRC_WEB',BASE_SRC.'/_WEB');//url de fiche src web 
*/
	
	define ('ROOT',dirname(dirname(__FILE__)));
	define ('APP',dirname(__FILE__));
	define ('MVC',ROOT.'\mvc');
	define ('Vendor',ROOT.'\vendor');
	define ('WEB',ROOT.'\web');
	define ('CACHE',ROOT.'\cache');