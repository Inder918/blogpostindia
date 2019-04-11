<?php
if (isset($_SESSION['authenticated']) || isset($_SESSION['my_cookie'])) {
	return null;
}else{
	$autologin = new Autologin($database->conn);
	$autologin->checkcreadentials();
	if (!isset($_SESSION['my_cookie'])) {
		redirect("https://blogpostindia.com/view/admin/login");
		exit;
	}

}