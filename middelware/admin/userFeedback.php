<?php

require_once "../../init.php";


	if (isset($_POST['submit'])) {
		$contact= new contact();
		if(!empty($_POST["name"]) && !empty($_POST["Email"]) && !empty($_POST["subject"]) && !empty($_POST["comment"])){
		$contact->name= filter_name($_POST["name"]);
		$contact->email= filter_email($_POST["Email"]);
		$contact->subject= filter_text($_POST["subject"]);
		$contact->comment= filter_text($_POST["comment"]);
			if($contact->create()){
				redirect("https://blogpostindia.com");
			}
		}else{
			$contact->error = "Input fields can't be empty, Please fill the all fields..!!";
			exit();
		}
	}

