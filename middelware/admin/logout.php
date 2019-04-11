<?php
require '../../init.php';
require "../../session.php";
$logout= new Autologin($database->conn);
	if (isset($_POST['all_logout'])) {
		$logout->logout(true);
		session_destroy();
		header("Location:login.php");
		exit;
	}
		$logout->logout(false);
			session_destroy();
		redirect("https://blogpostindia.com/view/admin/login");
