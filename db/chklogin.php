<?php
session_start();
include "./connect.php";

$user = isset($_POST['user']) ? $_POST['user'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";

$status = array('success'=>false);


$strSQL = " SELECT * FROM user_mm WHERE user_mm = '".$user."' and user_password = '".$pass."' ";
$sqlQuerychk = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));

$num = mysqli_num_rows($sqlQuerychk);

if($num <= 0)
{
    $status['success'] = false;
    $status['title'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
}
else
{
    $objResultchk = mysqli_fetch_array($sqlQuerychk, MYSQLI_ASSOC);

  	$_SESSION["sess_mm"] = session_id();
  	$_SESSION["sess_usernameid"] = $objResultchk["user_mm_id"];
    $_SESSION["sess_namefull"] = $objResultchk["user_mm"];
    $_SESSION["sess_dep"] = $objResultchk["seldep"];

    if($objResultchk["type_user"] == 1){
      $_SESSION["sess_type"] = "1";
    }else {
      $_SESSION["sess_type"] = "2";
    }
      
    $status['success'] = true;  
}


header('Content-Type: application/json');
echo json_encode($status);
mysqli_close($conn);
?>