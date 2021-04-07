<?php
include "./connect.php";

$datalist = array();

$status = array('success' => false);

$user_mm = isset($_POST['user_mm']) ? $_POST['user_mm'] : "";
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : "";
$seldep = isset($_POST['seldep']) ? $_POST['seldep'] : "";
$type_user = isset($_POST['type_user']) ? $_POST['type_user'] : "";

if(!empty($user_mm)){
    $strSQL = "INSERT INTO user_mm ";
    $strSQL .="(user_mm, user_password, seldep ,type_user) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$user_mm."','".$user_password."','".$seldep."', '".$type_user."')";

    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
    if($objQuery){
        $status['success'] = true;
    }else{
        $status['success'] = false;
    }
}else {
    $status['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($status);
mysqli_close($conn);    
?>