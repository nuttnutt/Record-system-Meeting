<?php
include "./connect.php";

$status['success'] = false;
$status['title'] = '';

$user_mm_id = isset($_POST['userid']) ? $_POST['userid'] : "";

$user_mm = isset($_POST['user_mm']) ? $_POST['user_mm'] : "";
$user_password2 = isset($_POST['user_password2']) ? $_POST['user_password2'] : "";
$seldep = isset($_POST['seldep']) ? $_POST['seldep'] : "";
$type_user = isset($_POST['type_user']) ? $_POST['type_user'] : "";

if(!empty($user_password2) AND !empty($user_mm_id)){
    $strSQL = "UPDATE user_mm SET ";
    $strSQL .=" user_password = '".$user_password2."' ";
    $strSQL .="WHERE user_mm_id = '".$user_mm_id."' ";        
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
    if($objQuery){
        $status['success'] = true;
    }else{
        $status['success'] = false;
        $status['title'] = 'ไม่สามารถบันทึกข้อมูลได้ error01';
    }
}else {
    $status['success'] = false;
    $status['title'] = 'ไม่สามารถบันทึกข้อมูลได้ error02';
}

echo json_encode($status);
mysqli_close($conn);
?>