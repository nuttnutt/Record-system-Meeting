<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="./dist/js/bootstrap-datepicker.css">
<link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dist/css/style.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header  bg-x">
              <h3 class="font-effect-outline">สร้างบันทึกรายงานการประชุม</h3>
            </div>
            <!-- /.card-header -->
            <form role="form" method="post" id="in_form" enctype="multipart/form-data" action="" novalidate>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>เลขที่การประชุม</label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="ระบุเลขที่การประชุม" name="formno" id="formno">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-list-ol"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- date -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>วันที่ลง</label>
                      <div class="input-group">
                        <!-- <div class="input-group-prepend"> -->
                        <input type="text" name="datenow" placeholder="ระบุวันที่ลง" id="datenow" class="form-control" autocomplete="off">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-calendar-alt"></i></div>
                        </div>

                        <!-- </div> -->
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>หัวข้อการประชุม</label>
                      <div class="input-group">
                        <input type="text" placeholder="ระบุหัวข้อการประชุม" class="form-control" placeholder="หัวข้อการประชุม" name="title" id="title">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-pencil-alt"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- date -->
                  <div class="col-sm-3 ">
                    <div class="form-group">

                      <label>ระหว่างวันที่</label>

                      <div class="input-group">
                        <input type="text" placeholder="ระบุวันที่" name="datec1start" id="datepickerC1start" class="form-control" autocomplete="off">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- time -->
                  <div class="col-sm-3">
                    <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">

                        <label>เวลา</label>

                        <div class="input-group date" data-target-input="nearest">
                          <input type="text" placeholder="ระบุเวลา" class="form-control datetimepicker-input" data-target="#timepicker1" name="timestart" id="timepicker1" />
                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                        </div>

                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                  <!-- date -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>ถึงวันที่</label>
                      <div class="input-group">
                        <!-- <div class="input-group-prepend"> -->
                        <input type="text" placeholder="ระบุวันที่" name="datec1end" id="datepickerC1end" class="form-control" autocomplete="off">
                        <div class="input-group-prepend">
                          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <!-- </div> -->
                      </div>
                    </div>
                  </div>
                  <!-- Time -->
                  <div class="col-sm-3 ">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>เวลา</label>
                        <div class="input-group date" data-target-input="nearest">
                          <input type="text" placeholder="ระบุเวลา" class="form-control datetimepicker-input" data-target="#timepicker2" name="timeend" id="timepicker2" />
                          <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>

                <form role="form" method="post" id="out_form" enctype="multipart/form-data">
                  <!-- <div class="card-body"> -->
                  <div class="row ">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>หน่วยงานที่ประชุม</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="seldep" id="seldep">
                          <option value="">-- เลือก หน่วยงาน --</option>
                          <?php
                          include "./db/connect.php";
                          $strSQL = " SELECT * FROM equiment_sysdep where equisysdep_status = 1 ";
                          $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
                          while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                            echo "<option value='" . $objResult["equisysdep_id"] . "'>" . $objResult["equisysdep_name"] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>สถานที่การประชุม</label>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="สถานที่การประชุม" name="loc" id="loc">
                          <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-home"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->

                  <div class="footer">
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='?page=mm_smeeting';">กลับ</button>
                    <button type="submit" class="btn btn-outline-success float-right btninvin">บันทึก</button>
                  </div>

                </form>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


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
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- bootstrap datepicker -->
<script src="./dist/js/bootstrap-datepicker-custom.js"></script>
<script src="./dist/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
 Select2 -->
<script src="./plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Timepicker
    $('#timepicker1').datetimepicker({
      pickDate: false,
      minuteStepping: 30,
      format: 'HH:mm',
      pickTime: true,
      //defaultDate: new Date(1979, 0, 1, 8, 0, 0, 0),
      language: 'en',
      use24hours: true,
      showMeridian: false
    })

    //Timepicker
    $('#timepicker2').datetimepicker({
      pickDate: false,
      minuteStepping: 30,
      format: 'HH:mm',
      pickTime: true,
      //defaultDate: new Date(1979, 0, 1, 8, 0, 0, 0),
      language: 'en',
      use24hours: true
    })

    //Date picker
    $('#datepickerC1start').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true, //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker();

    //Date picker
    $('#datepickerC1end').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true, //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker();

    //Date picker
    $('#datenow').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true, //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker();


    //Time picker
    $(document).ready(function() {
      $('input.timepicker').timepicker({
        timeFormat: 'HH:mm ',
        //startTime: new Date(0,0,0,15,0,0), // 3:00:00 PM - noon
        //interval: 15, // 15 minutes,
        pick12HourFormat: false,
        showMeridian: false,
        language: 'pt-br',
        use24hours: true,
      });
    });
  });


  $(document).ready(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });



    $('#in_form').on("submit", function(event) {
      event.preventDefault();
      var formData = new FormData($("#in_form")[0]);

      if ($('#datenow').val() === "") {
        alert("กรุณาระบุวันที่ลงการประชุม");
        return false;
      }
      if ($('#title').val() === "") {
        alert("กรุณาระบุหัวข้อการประชุม");
        return false;
      }
      if ($('#datepickerC1start').val() === "") {
        alert("กรุณาระบุวันที่เริ่มการประชุม");
        return false;
      }
      if ($('#timepicker1').val() === "") {
        alert("กรุณาระบุเวลาที่เริ่มการประชุม");
        return false;
      }
      if ($('#datepickerC1end').val() === "") {
        alert("กรุณาระบุวันที่สิ้นสุดการประชุม");
        return false;
      }
      if ($('#timepicker2').val() === "") {
        alert("กรุณาระบุเวลาที่สิ้นสุดการประชุม");
        return false;
      }

      $.ajax({
        url: "./db/insert_mm.php",
        method: "POST",
        dataType: "JSON",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          if (data['success']) {
            Toast.fire({
              type: 'success',
              title: 'บันทึกข้อมูลเรียบร้อย'
            })
            setTimeout(function() {
              window.location.href = '?page=mm_smeetname&id=' + data['mmid'];
            }, 3000);
          } else {
            Toast.fire({
              type: 'error',
              title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.'
            })
          }
        }
      });
    });




  });
</script>