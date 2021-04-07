<?php
session_start();
include "./connect.php";


$datalist2 = array();

$strSQL = "SELECT * FROM user_mm LEFT JOIN equiment_sysdep es ON es.equisysdep_id = seldep";
$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$i = 1;
while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
    
    if($objResult["type_user"] > 1){
        $level = "<span class='badge bg-danger'>ผู้ดูแลระบบ</span>";
    }else{
        $level = "<span class='badge bg-primary'>ผู้ใช้งานทั่วไป</span>";
    }

    $datalist2[] = array(
        "no" => $i,
        "user_mm" => $objResult["user_mm"],
        "equisysdep_name" => $objResult["equisysdep_name"],
        "type_user" => $level,
        "link" => "<a href='#data_Modal_edit' id='".($objResult["user_mm_id"])."' class='password_formid'>
        <button type='button' class='btn btn-sm btn-warning' title='แก้ไข Password'><i class='fas fa-edit'></i> </button> 
         </a>"

    );
    $i++;
}

header('Content-Type: application/json');
echo json_encode($datalist2);

mysqli_close($conn);
