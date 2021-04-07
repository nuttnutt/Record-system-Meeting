<?php
session_start();
include "./connect.php";
include "../thaidate.php";
$datalist = array();

$status = array('success'=>false, 'title'=>'', 'mmid'=>'');

$formno = isset($_POST['formno']) ? $_POST['formno'] : "";
$datenow = isset($_POST['datenow']) ? $_POST['datenow'] : "";
$datnowemp = explode("/", $datenow);
$datnowempYear = $datnowemp[2]-543;
$datenow2db =  date("Y-m-d", strtotime($datnowempYear."-".$datnowemp[1]."-".$datnowemp[0]));

$title = isset($_POST['title']) ? $_POST['title'] : "";

$datec1start = isset($_POST['datec1start']) ? $_POST['datec1start'] : "";

$datec1starttemp = explode("/", $datec1start);
$datec1starttempYear = $datec1starttemp[2]-543;
$datec1start2db =  date("Y-m-d", strtotime($datec1starttempYear."-".$datec1starttemp[1]."-".$datec1starttemp[0]));

$timestart = isset($_POST['timestart']) ? $_POST['timestart'] : "";
$timestart2db = date("H:i", strtotime($timestart));

$datec1end = isset($_POST['datec1end']) ? $_POST['datec1end'] : "";

$datec1endtemp = explode("/", $datec1end);
$datec1endtempYear = $datec1endtemp[2]-543;
$datec1end2db =  date("Y-m-d", strtotime($datec1endtempYear."-".$datec1endtemp[1]."-".$datec1endtemp[0]));

$timeend = isset($_POST['timeend']) ? $_POST['timeend'] : "";
$seldep = isset($_POST['seldep']) ? $_POST['seldep'] : "";
$loc = isset($_POST['loc']) ? $_POST['loc'] : "";

$strSQL = "INSERT INTO mm ";
$strSQL .="(formno, datenow, title ,datec1start, timestart, datec1end, timeend, seldep, loc, who, datetime,status) ";
$strSQL .="VALUES ";
$strSQL .="('".$formno."','".$datenow2db."','".$title."', '".$datec1start2db."', '".$timestart2db."', '".$datec1end2db."',  '".$timeend."' ";
$strSQL .=", '".$seldep."','".$loc."', '".$_SESSION["sess_usernameid"]."', '".date("Y-m-d H:i:s")."',0 )";

$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));

$lastid = mysqli_insert_id($conn);


if($objQuery){
    $status['success'] = true;
    $status['mmid'] = $lastid;
}else{
    $status['success'] = false;
}


//footer
echo json_encode($status);
mysqli_close($conn);    
?>