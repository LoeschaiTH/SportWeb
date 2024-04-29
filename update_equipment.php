<?php  
session_start(); 
include  "fucntion_query.php";
$data = $_REQUEST;

if(!file_exists($_FILES['file_up']['tmp_name']) || !is_uploaded_file($_FILES['file_up']['tmp_name'])) {
   $name_file =$data['files'];
}else{
	$temp = explode(".", $_FILES["file_up"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file_up"]["tmp_name"], "./file/" . $newfilename);

	$name_file = "./file/" . $newfilename;
}

$update = Upadateequipment($data,$name_file);


header("Location: equipment_update.php?equipment_id={$data['equipment_id']}");
