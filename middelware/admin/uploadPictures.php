<?php

require_once "../../init.php";


try{
$photo= new upload();
$result=upload::find_all();

if(isset($_FILES['file'])){
		$photo->discription= filter_name($_POST['discription']);
		$photo->post_id= filter_int($_POST['number']);
		$photo->file_set($_FILES['file']);
		if(!$photo->save_it()){
			throw new PDOException("Error: ");
			exit();
		}else{
			echo "<h3 class='text-center text-green'>Photo Uploaded Successfully...</h3>";
		}
	}

}
catch(PDOException $e){
	echo("<h3 class='text-center text-red'>".$e->getMessage(). array_shift($photo->error)."</h3>"); 
}
