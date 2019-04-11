<?php

require_once "../../init.php";
require_once "../../session.php";
require_once "../../app/http/session/authanticate.php";

try{
$post= new draft();
	if(!empty($_POST['title'])  && !empty($_POST['author']) && !empty($_POST['body']) ){
		$post->title=filter_text($_POST['title']);
		$post->author=filter_text($_POST['author']);
		$post->body=filter_text($_POST['body']);
		$post->image_id=filter_int($_POST['number']);
		$row=draft::find_imageId($post->image_id);
		if(!empty($row)){
				$post->id = $row->id;
				if($post->update()){
					?><h5>draft saved...</h5><?php
				}else {throw new PDOException("Can't update..");}
		}else{
				if($post->create()){
					?><h5>new draft saved...</h5><?php
				}else {throw new PDOException("Can't create..");}
		}
	}

}
catch(PDOException $e)
{
	echo $e->getMessage();
}