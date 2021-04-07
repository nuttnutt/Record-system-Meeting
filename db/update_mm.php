<?php
include "./connect.php";

$status = array('success' => false);

$mm_id = isset($_POST['mm_id']) ? $_POST['mm_id'] : "";

if (!empty($mm_id)) {
    $strSQL = "UPDATE mm SET ";
    $strSQL .= " status = 2 ";
    $strSQL .= " WHERE mm_id = '" . $mm_id . "' ";
    $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));

    if ($objQuery) {
        $status['success'] = true;
    } else {
        $status['success'] = false;
    }
} else {
    $status['success'] = false;
}

echo json_encode($status);
mysqli_close($conn);
?>
