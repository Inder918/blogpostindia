<?php

require_once "../../init.php";
require_once "../../session.php";

try{
$post= new post();
	if(!empty($_POST['title'])  && !empty($_POST['author']) && !empty($_POST['body']) ){
		$post->title=filter_text($_POST['title']);
		$post->author=filter_text($_POST['author']);
		$post->body=filter_text($_POST['body']);
		$post->image_id=filter_int($_POST['number']);
		if($post->create()){
			header("Location:https://blogpostindia.com/view/admin/All-post");
		}else {throw new PDOException("Something Wrong..");}
	}else{redirect("https://blogpostindia.com");}

}
catch(PDOException $e)
{
	echo $e->getMessage();
}


