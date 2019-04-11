<?php

require '../../init.php';
require '../../session.php';
            
 if(isset($_POST['submit'])){

	$username= filter_text($_POST['uname']);
	$pwd=filter_text($_POST['pass']);
	$stmt= $database->conn->prepare('SELECT pwd FROM admin WHERE username = :username LIMIT 1');
	$stmt->bindParam(':username',$username);
	$stmt->execute();
	$stored= $stmt->fetchColumn();
	if(password_verify($pwd,$stored)){
		session_regenerate_id(true);
	 	$_SESSION['username']=$username;
	 	$_SESSION['authenticated']=true;
		if(isset($_POST['remember'])){
			$autologin= new Autologin($database->conn);
			$autologin->persistentlogin();
		}
		header('Location:https://blogpostindia.com/view/admin/dashboard');
		exit;
	}else{
		header("Location:https://blogpostindia.com/view/admin/login");
		$error= "Login failed. check username and password";
	}
 }
