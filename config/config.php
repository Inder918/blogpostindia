<?php

if($settings = parse_ini_file("config.ini", TRUE))
{
    define("DRIVER", $settings['database']['driver']); 
    define("HOST", $settings['database']['host']); 
    (!empty($settings['database']['port'])) ? (define("PORT", $settings['database']['port'])) : null;
    define("DB",$settings['database']['schema']);
    define("PASS",$settings['database']['password']);
    define("UNAME",$settings['database']['username']);

}else null;



 
		
	
