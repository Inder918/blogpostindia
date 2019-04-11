<?php


$imagefolder= "../../Assets/uploads/";
reset($_FILES);
$temp= current($_FILES);

if (!in_array(strtolower(pathinfo($temp['name'],PATHINFO_EXTENSION)), array('gif','jpg','png','jpeg'))) {
	header("Http/1.1 400 Invalid extension");
	return;
}

$filetowrite= $imagefolder . $temp['name'];
move_uploaded_file($temp['tmp_name'] , $filetowrite);

echo json_encode(array('location'=>$filetowrite));

