<?php

$handler=new persistentclass($database->conn);
session_set_save_handler($handler);
session_start();
$handler->visitor_count();
$_SESSION['active']= time();
$_SESSION['user_estimated_ip']= $_SERVER['HTTP_X_FORWARDED_FOR'];


