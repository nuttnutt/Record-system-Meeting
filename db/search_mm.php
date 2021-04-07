<?php
include "./connect.php";

$officer_name = isset($_GET['q']) ? $_GET['q'] : "";


if(!empty($officer_name)){
    $strSQL = " SELECT officer_id, officer_name";
    $strSQL .= " FROM officer  ";
    $strSQL .= " WHERE officer_name like '%".$officer_name."%' ";
    $strSQL .= " Order by officer_name ";
    $sqlQuery = pg_query($connpg, $strSQL) or die(pg_last_error($connpg));
    $num = pg_num_rows($sqlQuery);

    if($num > 0){
        while($objResult = pg_fetch_array($sqlQuery, NULL, PGSQL_ASSOC)){
            $data[] = array(
                "id" => $objResult["officer_id"],
                "fullname" => $objResult["officer_name"]
            );
        }
    }else {
        echo "ไม่พบ ชื่อ-สกุล ที่ค้นหา กรุณาลองใหม่อีกครั้ง";
    }
}else {
    echo "1";
}

$json = array(
    "total"=>"",
    "items"=>$data    
);

header('Content-Type: application/json');
echo json_encode($json);
?>