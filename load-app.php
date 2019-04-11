<?php 

if(!defined('WPATH')){
	define('WPATH', dirname(__FILE__) .'/');
}

require_once(WPATH . 'config' .DS. 'config.php');

require_once(WPATH . 'functions.php');

check_constant_entry();

require_once(WPATH . 'app' .DS. 'http' .DS. 'Auth' .DS. 'fileHandler.php');
require_once(WPATH . 'app' .DS. 'http' .DS. 'Auth' .DS. 'setEnvironment.php');
require_once(WPATH . 'app' .DS. 'http' .DS. 'Auth' .DS. 'dbConnector.php');

require_once(WPATH .'view'.DS. 'public' .DS. 'app.php');

