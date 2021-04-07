<?php
include "./db/connect.php";
include "./thaidate.php";

$strSQL = " SELECT formno,datenow,title,datec1start,timestart,datec1end,timeend,es.equisysdep_name,loc FROM mm ";
$strSQL .= " LEFT JOIN equiment_sysdep es on es.equisysdep_id = seldep ";
$strSQL .= " WHERE mm_id = '" . $_REQUEST["mmid"] . "' ";
$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบสารสนเทศเพื่อการทำรายงานระบบห้องประชุม โรงพยาบาลวชิระภูเก็ต</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./dist/css/style.css">
</head>

<style type="text/css">
    body {
        font-family: 'THSarabunNew', sans-serif;
    }

    table {
        max-width: 2480px;
        width: 100%;

    }

    .headTitle {
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .headerTitle01 {
        border: 1px solid #333333;
        border-left: 2px solid #000;
        border-bottom-width: 2px;
        border-top-width: 2px;
        font-size: 11px;
    }

    .headerTitle01_r {
        border: 1px solid #333333;
        border-left: 2px solid #000;
        border-right: 2px solid #000;
        border-bottom-width: 2px;
        border-top-width: 2px;
        font-size: 11px;
    }

    /* สำหรับช่องกรอกข้อมูล  */
    .box_data1 {
        font-family: Arial, "times New Roman", tahoma;
        height: 18px;
        border: 0px dotted #333333;
        border-bottom-width: 1px;
    }

    /* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
    .left_bottom {
        border-left: 2px solid #000;
        border-bottom: 1px solid #000;
    }

    /* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
    .left_right_bottom {
        border-left: 2px solid #000;
        border-bottom: 1px solid #000;
        border-right: 2px solid #000;
    }

    /* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
    .chk_box {
        display: block;
        width: 10px;
        height: 10px;
        overflow: hidden;
        border: 1px solid #000;
    }

    img {
        width: 8%;
        height: auto;
    }

    .topleft {
        position: absolute;
        top: 8px;
        left: 16px;
        font-size: 18px;
    }


    @media print {
        .output {
            -ms-transform: rotate(270deg);
            /* IE 9 */
            -webkit-transform: rotate(270deg);
            /* Chrome, Safari, Opera */
            transform: rotate(270deg);
            /*top: 1.0in;*/
            /*left: -1in;*/
        }

        .page-break {
            display: block;
            page-break-before: always;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .A4 {
            box-shadow: none;
            /*margin-top: 180px;*/
            width: auto;
            height: auto;
            font-size: 18px;
        }

        .noprint {
            display: none;
        }

        .enable-print {
            display: block;
        }

        .pagebreak {
            clear: both;
            page-break-after: always;
        }

        @page {
            size: A4 portrait;
            margin-left: 1.0cm;
            margin-right: 1.0cm;
            margin-top: 1.0cm;
            margin-bottom: 0.5cm;
        }
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed" style>

    <div class="wrapper">
        <div class="A4">
            <div class="row">
                <div class="col-12" align="center">
                    &nbsp;
                    <h2>บันทึกรายงานการประชุมโรงพยาบาลวชิระภูเก็ต</h2>
                    <img class="topleft" src="./dist/img/Logo_of_Vachira_Phuket_Hospital1.png">
                </div>
            </div>

            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr style="height: 18px;">
                                    <td style="width: 100%; height: 18px; font-size: 18px;">
                                        &nbsp;
                                        <p style="text-align: left;">&nbsp;&nbsp;เลขที่การประชุม : ____<u><?= $objResult["formno"] ?></u>____ วันที่ลง : ____<u><?= thai_date_fullmonth($objResult["datenow"]) ?></u>____</p>
                                        <p style="text-align: left;">&nbsp;&nbsp;หัวข้อการประชุม : ____<u><?= $objResult["title"] ?></u>____ </p>
                                        <p style="text-align: left;">&nbsp;&nbsp;วันที่เริ่ม : ___<u><?= thai_date_fullmonth($objResult["datec1start"]) ?></u>___ เวลา : ___<u><?= $objResult["timestart"] ?></u>___ ถึงวันที่ : ___<u><?= thai_date_fullmonth($objResult["datec1end"]) ?></u>___ ถึงเวลา : ___<u><?= $objResult["timeend"] ?></u>___</p>
                                        <p style="text-align: left;">&nbsp;&nbsp;หน่วยงาน : ____<u><?= $objResult["equisysdep_name"] ?></u>____ สถานที่ : ____<u><?= $objResult["loc"] ?></u>____</p>
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>&nbsp;</tr>
                <tr>&nbsp;</tr>
                <tr>
                    <td align="center">
                        <table style="height: 36px; width: 100%; border-collapse: collapse;" border="1">
                            <br></br>
                            <h2></h2>
                            <h1></h1>
                            <h3 align="left">รายชื่อผู้เข้าประชุม</h3>
                            <tbody>
                                <tr style="height: 18px;font-size: 20px;">
                                    <td style="width: 10%; height: 18px; text-align: center;"><strong>ลำดับ</strong></td>
                                    <td style="width: 50%; height: 18px; text-align: center;"><strong>ชื่อ-สกุล</strong></td>
                                    <td style="width: 40%; height: 18px; text-align: center;"><strong>ตำแหน่ง</strong></td>
                                </tr>
                                <?php
                                $strSQL2 = "SELECT * FROM mm_detail WHERE mm_id = '" . $_REQUEST["mmid"] . "' ";
                                $objQuery2 = mysqli_query($conn, $strSQL2) or die(mysqli_error($conn));
                                $i = 0;
                                while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
                                    $strSQL01 = " SELECT officer_id, officer_name";
                                    $strSQL01 .= " FROM officer  ";
                                    $strSQL01 .= " WHERE officer_id = '" . $objResult2["mm_detail_name"] . "' ";
                                    $sqlQuery01 = pg_query($connpg, $strSQL01) or die(pg_last_error($connpg));
                                    $objResult01 = pg_fetch_array($sqlQuery01, NULL, PGSQL_ASSOC);
                                    $i++;
                                ?>
                                    <tr style="height: 18px; font-size: 18px;">
                                        <td style="width: 10%;  height: 18px; text-align: center;"><?= $i ?></td>
                                        <td style="width: 50%;  height: 18px; text-align: center;"><?= $objResult01["officer_name"] ?></td>
                                        <td style="width: 40%;  height: 18px; text-align: center;"><?= $objResult2["mm_detail_position"] ?></td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

            </table>
            <div class="pagebreak"></div>
        </div>
    </div>




</body>

</html>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./plugins/jquery-ui/jquery-ui.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>

<?php mysqli_close($conn); ?>