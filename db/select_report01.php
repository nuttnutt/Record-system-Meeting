<?php
include "./connect.php";
include "../thaidate.php";
$datalist = array();

$ddstart = isset($_REQUEST['ddstart']) ? $_REQUEST['ddstart'] : "";
$ddend = isset($_REQUEST['ddend']) ? $_REQUEST['ddend'] : "";
$dep = isset($_REQUEST['dep']) ? $_REQUEST['dep'] : "";

//$ddstart = "01/02/2564";
//$ddend = "02/03/2564";
//$dep = "202";

$datec1starttemp = explode("/", $ddstart);
$datec1starttempYear = $datec1starttemp[2]-543;
$datec1start2db =  date("Y-m-d", strtotime($datec1starttempYear."-".$datec1starttemp[1]."-".$datec1starttemp[0]));

$datec1endtemp = explode("/", $ddend);
$datec1endtempYear = $datec1endtemp[2]-543;
$datec1end2db =  date("Y-m-d", strtotime($datec1endtempYear."-".$datec1endtemp[1]."-".$datec1endtemp[0]));

if(!empty($ddstart) AND !empty($ddend)){
    $strSQL = " SELECT mm_id, datec1start, title, es.equisysdep_name, seldep, loc ";
    $strSQL .= " FROM mm LEFT JOIN equiment_sysdep es ON es.equisysdep_id = seldep ";
    $strSQL .= " WHERE status < 2  ";
    $strSQL .= " AND datec1start >= '".$datec1start2db."' AND datec1end <= '".$datec1end2db ."' ";
    
    if(!empty($dep)){
        $strSQL .= " AND seldep = '".$dep."' ";
    }

    $strSQL .= " ORDER by datec1start asc  ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
    $i = 1;      
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {    
        $datalist[] = array(
            "no" => $i,
            "dd" => thai_date_fullmonth($objResult["datec1start"]),
            "title" => $objResult["title"],
            "dep" => $objResult["equisysdep_name"],
            "loc" => $objResult["loc"],
        );
        $i++; 
    }
    
}

header('Content-Type: application/json');
echo json_encode($datalist);

mysqli_close($conn);
?>