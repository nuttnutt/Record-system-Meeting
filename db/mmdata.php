<?php
session_start();
include "./connect.php";
include "../thaidate.php";

$datalist2 = array();

if ($_SESSION["sess_type"] > 1) {
    $strSQL = "SELECT mm_id,datec1start,title,es.equisysdep_name,seldep,loc FROM mm LEFT JOIN equiment_sysdep es ON es.equisysdep_id = seldep where status < 2  ORDER by datec1start asc  ";
} else {
    $strSQL = "SELECT mm_id,datec1start,title,es.equisysdep_name,seldep,loc FROM mm LEFT JOIN equiment_sysdep es ON es.equisysdep_id = seldep WHERE who = '" . $_SESSION["sess_usernameid"] . "' and status < 2  ORDER by datec1start asc ";
}

$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$i = 1;

while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {

    $datalist2[] = array(
        "no" => $i,
        "datec1start" => thai_date_fullmonth($objResult["datec1start"]),
        "title" => $objResult["title"],
        "equisysdep_name" => $objResult["equisysdep_name"],
        "loc" => $objResult["loc"],
        "link" => "<a href='?page=mm_smeetname&id=" . $objResult["mm_id"] . "' class='showpdf'>
            <button type='button' class='btn btn-sm btn-warning' title='แก้ไข'><i class='fa fa-edit'></i> </button>
        </a>
        <button type='button' class='btn btn-sm btn-success btnprint' id='".$objResult["mm_id"]."' title='พิมพ์'><i class='fa fa-print'></i></button> 
        <button type='button' class='btn btn-sm btn-danger deltempid' id='" . $objResult["mm_id"]. "' title='ลบ' ><i class='fas fa-trash'></i></button>
        
        ",
    );
    $i++;
}

header('Content-Type: application/json');
echo json_encode($datalist2);

mysqli_close($conn);
