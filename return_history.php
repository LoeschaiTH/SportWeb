<?php
 session_start(); 
 $_SESSION["id"];
 include  "fucntion_query.php";

 //print_r($_POST['equipment_id']);
$student_id = $_POST["student_id"];
$data = $_POST['detail_id'];
$fine = $_POST['fine'];

$i= 0;
foreach ($data as $key => $value) {

   $update = UpdateDataLend($value,$fine[$i]);
   $update_status = Updatestatusequipment($value,'ปกติ');
   $i++;
}

header("Location: manage-lend-admin.php#example");
