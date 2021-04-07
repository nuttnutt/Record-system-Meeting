<?php
session_start();

if ($_SESSION["sess_mm"] == "") {
  //echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน')</script>";
  echo "<script>window.location='index.html'</script>";
}

$get_action = (isset($_GET["page"])) ? $_GET["page"] : '';
?>
<!DOCTYPE html>
<html>

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

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-x">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
      </ul>
      <div class="btn btn-outline-light">
        <div class="fas fa-clock" id="css_time_run">
          <?= date("H:i:s") ?>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-y ">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="./dist/img/Logo_of_Vachira_Phuket_Hospital.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ประชุม</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./dist/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION["sess_namefull"] ?></a>

          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--  <li class="nav-item">
              <a href="?page=main" class="nav-link <?php if ($get_action == "main" or $get_action == "" or $get_action == "inv_stock" or $get_action == "inv_stockdetail") {
                                                      echo "active";
                                                    }
                                                    ?>">
                <i class="nav-icon fas fa-home"> </i>
                <p> หน้าแรก</p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="?page=mm_smeeting" class="nav-link <?php if ($get_action == "mm_smeeting" or $get_action == "mm_smeettext") {
                                                            echo "active";
                                                          }
                                                          ?>">
                <i class="nav-icon fas fa-edit"></i></i>
                <p>บันทึกการประชุม</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=report_mm" class="nav-link <?php if(strpos($get_action, 'report') !== false) echo "active";?>">
                <i class="nav-icon fas fa-file"> </i>
                <p> รายงานการประชุม</p>
              </a>
            </li>
            <?php if ($_SESSION["sess_type"] > 1) { ?>
              <li class="nav-item">
                <a href="?page=register_mm" class="nav-link <?php if ($get_action == "register_mm") echo "active";?>">
                  <i class="nav-icon fas fa-user-plus"> </i>
                  <p> ตั้งค่าผู้ใช้งาน </p>
                </a>
              </li>
            <?php } ?>

            <li class="nav-item">
              <a href="?page=logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i></i>
                <p> ออกจากระบบ</p>
              </a>
            </li>
              
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <?php
    if ($get_action == "") {
      $get_action = "mm_smeeting";
    }
    switch ($get_action) {

      case $get_action:
        include $get_action . ".php";
        break;

      default:
        include "mm_smeeting.php";
    }
    ?>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 พัฒนาโดยศูนย์คอมพิวเตอร์ โรงพยาบาลวชิระภูเก็ต</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.1
      </div>
    </footer>

  </div>
  <!-- ./wrapper -->

  <script type="text/javascript">
    $(function() {


      var nowDateTime = new Date("<?= date("m/d/Y H:i:s") ?>");
      var d = nowDateTime.getTime();
      var mkHour, mkMinute, mkSecond;
      setInterval(function() {
        d = parseInt(d) + 1000;
        var nowDateTime = new Date(d);
        mkHour = new String(nowDateTime.getHours());
        if (mkHour.length == 1) {
          mkHour = "0" + mkHour;
        }
        mkMinute = new String(nowDateTime.getMinutes());
        if (mkMinute.length == 1) {
          mkMinute = "0" + mkMinute;
        }
        mkSecond = new String(nowDateTime.getSeconds());
        if (mkSecond.length == 1) {
          mkSecond = "0" + mkSecond;
        }
        var runDateTime = mkHour + ":" + mkMinute + ":" + mkSecond;
        $("#css_time_run").html(runDateTime);
      }, 1000);


    });
  </script>

</body>

</html>