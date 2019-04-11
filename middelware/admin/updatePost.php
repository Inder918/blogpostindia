<?php


require_once "../../init.php";


if(isset($_POST['submit'])){
    $update=new post();
    $update->id=filter_int($hash->get_id($_POST['edit']));
    $update->title=filter_text($_POST['title']);
	$update->author=filter_name($_POST['author']);
	$update->body=filter_text($_POST['body']);
	$update->image_id=filter_int($_POST['number']);
	if($update->update()){
	redirect("https://blogpostindia.com/view/admin/All-post");
	}
}else{redirect("https://blogpostindia.com");}