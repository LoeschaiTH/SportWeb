<?php
require_once 'connect_db.php';
error_reporting(0);
function checkLogin($username,$pass){
	global $conn ;
	$sql = "SELECT * FROM sp_user WHERE student_id = '$username' AND password = '$pass' ";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function getUser($id){
	global $conn ;
	$sql = "SELECT * FROM sp_user WHERE user_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function insertUser($data){
	global $conn ;
	$sql ="INSERT INTO sp_user (user_id, student_id, password, name, lastname, status) 
	VALUES (NULL, '".$data['username']."', '".$data['password']."', '".$data['name']."', '".$data['lastname']."', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;

}

function GetDataequipments(){
	global $conn ;
	$sql = "SELECT * FROM sp_equipment WHERE (equipment_name LIKE '%".$_GET["txtKeyword"]."%' )";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function InsertLendequipment($id){
	global $conn ;
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO sp_history (history_id, user_id, history_date, history_status) 
	VALUES (NULL, '$id', '$date', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function InsertDetailLead($history_id,$equipment_id){
	global $conn ;
	$date_strat = date('Y-m-d H:i:s');
	$date_end = date('Y-m-d', strtotime("+30 days"));
	$sql = "INSERT INTO sp_detail (detail_id, history_id, equipment_id, status_lend, lend_date_end, fine, lent_date_strat) VALUES (NULL, '$history_id', '$equipment_id', '0', '$date_end', '0', '$date_strat');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function Updatestatusequipment($equipment_id,$status){
	global $conn ;
	echo $sql ="UPDATE sp_equipment SET equipment_status = '$status' WHERE equipment_id = $equipment_id;";
	$result = $conn->query($sql);
	return "update";

}
function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}

function GetDetailLend($id){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.equipment_name,b.equipment_status FROM sp_history h LEFT JOIN sp_detail d ON h.history_id = d.history_id LEFT JOIN sp_equipment b ON d.equipment_id = b.equipment_id WHERE h.user_id = $id ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function GetDataLend(){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.equipment_name,b.equipment_status,u.name,u.lastname,u.student_id FROM sp_history h LEFT JOIN sp_detail d ON h.history_id = d.history_id LEFT JOIN sp_equipment b ON d.equipment_id = b.equipment_id  LEFT JOIN sp_user u ON u.user_id = h.user_id ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function UpdateDataLend($equipment_id,$fine){
	global $conn ;
	$sql ="UPDATE sp_detail SET status_lend = '1',fine = '$fine' WHERE equipment_id = $equipment_id;";
	$result = $conn->query($sql);

	return true;
}

function Insertequipment($data,$file){
	global $conn ;
	$date = date('Y-m-d');
	echo $sql ="INSERT INTO sp_equipment (equipment_id, equipment_name, equipment_date, equipment_status, equipment_code)
	VALUES (NULL, '".$data['equipment_name']."', '".$date."', 'ปกติ', '".$data['equipment_code']."');";
	$result = $conn->query($sql); 
	
	$id = $conn->insert_id;

	return $id;
}

function Getequipment($id){
	global $conn ;
	$sql ="SELECT * FROM sp_equipment WHERE equipment_id = $id;";
	$result = $conn->query($sql);

	$row = $result->fetch_object();
	return $row;
}

function Upadateequipment($data,$file){
	global $conn ;
	$sql ="UPDATE sp_equipment SET equipment_name = '".$data['equipment_name']."',equipment_code = '".$data['equipment_code']."',equipment_status = '".$data['equipment_status']."'  WHERE equipment_id = '".$data['equipment_id']."'";
	$result = $conn->query($sql);
}

function Deleteequipment($id){
	global $conn ;
	$sql ="DELETE FROM sp_equipment WHERE equipment_id = $id";
	$result = $conn->query($sql);
}


function DateDiff($strDate1,$strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2)
{
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 * 24); // 1 Hour =  60*60
}

