<?php  
session_start(); 
include  "fucntion_query.php";

$id = $_GET['id'];

$delete =  Deleteequipment($id);

header("Location: lend.php");