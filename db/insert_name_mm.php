<?php
session_start();
include "./connect.php";
$datalist = array();

$status = array('success'=>false);

$mmid = isset($_POST['mmid']) ? $_POST['mmid'] : "";
$mm_detail_name = isset($_POST['officer_name']) ? $_POST['officer_name'] : "";
$mm_detail_position = isset($_POST['officer_position']) ? $_POST['officer_position'] : "";

if(!empty($mmid)){
    $strSQL = "INSERT INTO mm_detail ";
    $strSQL .="(mm_id, mm_detail_name, mm_detail_position) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$mmid."', '".$mm_detail_name."', '".$mm_detail_position."')";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
    if($objQuery){
        $status['success'] = true;
    }else{
        $status['success'] = false;
    }
}else {
    $status['success'] = false;
}


//footer
echo json_encode($status);
mysqli_close($conn);    
?>