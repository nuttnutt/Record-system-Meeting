<?php
include "./connect.php";

$status = array('success'=>false);

$mmdid = isset($_POST['mmdid']) ? $_POST['mmdid'] : "";

if(!empty($mmdid)){
    $strSQL = "DELETE from mm_detail WHERE mm_detail_id = '".$mmdid."' ";
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