<?php
include "./connect.php";

$status = array('success'=>false);

$depid = isset($_POST['depid']) ? $_POST['depid'] : "";
$dep = isset($_POST['dep']) ? $_POST['dep'] : "";

if(!empty($depid)){
    $strSQL = "UPDATE inv_dep SET ";
    $strSQL .=" dep_name = '".$dep."' ";
    $strSQL .=" WHERE dep_id = '".$depid."' ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));

    if($objQuery){
        $status['success'] = true;
    }else{
        $status['success'] = false;
    }
}else {
    $status['success'] = false;
}

echo json_encode($status);
mysqli_close($conn);    
?>