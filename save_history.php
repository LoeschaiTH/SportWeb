<?php
 session_start(); 
 include  "fucntion_query.php";

 //print_r($_POST['equipment_id']);
$id = $_SESSION["id"];
$data = $_POST['equipment_id'];

$history_id =  InsertLendequipment($id);

foreach ($data as $key => $value) {

  $detail = InsertDetailLead($history_id,$value);
  $update = Updatestatusequipment($value,'ถูกยืม');
	
}

header("Location: returns.php?id=$id");