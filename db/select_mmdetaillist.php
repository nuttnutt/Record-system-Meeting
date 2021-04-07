<?php
include "./connect.php";
$datalist = array();

$mmid = isset($_REQUEST['mmid']) ? $_REQUEST['mmid'] : "";

if(!empty($mmid)){
    $strSQL = "SELECT * FROM mm_detail WHERE mm_id = '".$mmid."' ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
    $i=1;
    while($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){

        $strSQL01 = " SELECT officer_id, officer_name";
        $strSQL01 .= " FROM officer  ";
        $strSQL01 .= " WHERE officer_id = '".$objResult["mm_detail_name"]."' ";
        $sqlQuery01 = pg_query($connpg, $strSQL01) or die(pg_last_error($connpg));
        $objResult01 = pg_fetch_array($sqlQuery01, NULL, PGSQL_ASSOC);

        $datalist[] = array(
            "no" => $i,
            "mm_detail_name" => $objResult01["officer_name"],
            "mm_detail_position" => $objResult["mm_detail_position"],
            "link" =>" 
            <button type='button' class='btn btn-sm btn-danger deltempid' title='ลบ' id='".$objResult["mm_detail_id"]."'><i class='fas fa-trash'></i></button> 
            " 

        );
    $i++;
    }
}

header('Content-Type: application/json');
echo json_encode($datalist);

mysqli_close($conn);
