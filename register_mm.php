<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Content Wrapper. Contains page content -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dist/css/style.css">
<!-- font css -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <form role="form" method="post" id="in_user" enctype="multipart/form-data">
    <div class="modal fade" id="myModal" role="dialog" action="" novalidate>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-x">
            <h4 class="font-effect-outline">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <br></br>
          <div class="col-md-5 offset-md-5">
            <i class="nav-icon fas fa-user-plus" style="font-size:80px;"></i>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>User Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="User Name" name="user_mm" id="user_mm" required>
                    <div class="invalid-feedback">
                      กรุณากรอกชื่อ-นามสกุล
                    </div>
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-pencil-alt"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" required>
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-pencil-alt"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>หน่วยงาน</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="seldep" id="seldep" required>
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
                  <label>ประเภทผู้ใช้งาน</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="type_user" id="type_user">
                    <option value="1">ผู้ใช้งานทั่วไป</option>
                    <option value="2">แอดมิน</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="col-6">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
              </div>
              <div class="col-6">
                <button type="submit" name="submit" id="submit" class="btn btn-outline-success float-right">บันทึก</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>

  <!-- Modal -->

  <!-- Main content -->
  <div class="container">
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-x">
              <div class="card-title ">
                <h3 class="font-effect-outline">ตั้งค่าผู้ใช้งาน</h3>
              </div>
              <div class="card-tools">
                <!--   <button type="button" class="btn btn-sm btn-warning btnadd"><i class="fas fa-edit"></i> เพิ่มการลงทะเบียน </button> -->
                <a href='#data_Modal_add' id='btnadd' name='btnadd' class='btnadd'>
                  <button type='button' class='btn btn-sm btn-warning btnadd' title='เพิ่มการลงทะเบียน' data-toggle="modal" data-target="#myModal"><i class='fas fa-edit'></i>เพิ่มการลงทะเบียน</button>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="tbl2" class="table table-hover">
                <thead class="font-effect-outline">
                  <tr class="bg-x">
                    <th>No.</th>
                    <th>User Name</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>*</th>
                  </tr>
                </thead>
                <tbody id="datalist2"></tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->


      <div class="modal fade" id="data_Modal_edit">
        <div class="modal-dialog modal-lg">
          <form role="form" method="post" id="userform_update" enctype="multipart/form-data">
            <div class="modal-content" id="userformupdate"></div>
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>


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
<script src="./dist/jQueryPrintPage/jquery.printPage.js"></script>

<script>
  $(document).ready(function() {
    var tb2;
    tb2 = $('#tbl2').dataTable({
      "processing": true,
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "ajax": {
        "url": "./db/select_user_mm.php",
        "dataSrc": function(json) {
          var return_data = new Array();
          for (var i = 0; i < json.length; i++) {
            return_data.push({
              'no': json[i].no,
              'user_mm': json[i].user_mm,
              'equisysdep_name': json[i].equisysdep_name,
              'type_user': json[i].type_user,
              'link': json[i].link

            })
          }
          return return_data;
        }
      },
      "columns": [{
          'data': 'no'
        },
        {
          'data': 'user_mm'
        },
        {
          'data': 'equisysdep_name'
        },
        {
          'data': 'type_user'
        },
        {
          'data': 'link'
        }
      ]
    });

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('#in_user').on("submit", function(event) {
      event.preventDefault();
      if ($('#user_mm').val() === "") {
        alert("กรุณาระบุ user name");
        return false;
      }
      if ($('#user_password').val() === "") {
        alert("กรุณาระบุ password");
        return false;
      }
      if ($('#seldep').val() === "") {
        alert("กรุณาระบุ หน่วยงาน");
        return false;
      }
      var formData = new FormData($("#in_user")[0]);
      $.ajax({
        url: "./db/insert_user_mm.php",
        method: "POST",
        dataType: "JSON",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          console.log(data['success']);
          if (data['success']) {
            $('#myModal').modal('hide');
            Toast.fire({
              type: 'success',
              title: 'บันทึกข้อมูลเรียบร้อย'
            })
            tbl.api().ajax.url('./db/select_user_mm.php').load();
          } else {
            Toast.fire({
              type: 'error',
              title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.'
            })
          }
        }
      });
    });



    $('#userform_update').on("submit", function(event) {
      event.preventDefault();
      if ($('#user_password2').val() === "") {
        alert("New Password");
        return false;
      }
      var formData = new FormData($("#userform_update")[0]);
      $.ajax({
        url: "./db/update_user.php",
        method: "POST",
        dataType: "JSON",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          if (data['success']) {
            $('#userform_update')[0].reset();
            $('#data_Modal_edit').modal('hide');
            //tbl.api().ajax.url('./db/select_dataiclistdep.php?selyear='+icid).load();
            Toast.fire({
              type: 'success',
              title: 'บันทึกข้อมูลเรียบร้อย'
            })
          } else {
            Toast.fire({
              type: 'error',
              title: data['title']
            })
          }
        }
      });

    });

    $(document).on('click', '.password_formid', function() {
      var userid = $(this).attr('id');
      $.ajax({
        url: "./form/update_user.php",
        method: "POST",
        data: {
          userid: userid
        },
        success: function(data) {
          $('#userformupdate').html(data);
          $('#data_Modal_edit').modal('show');
        }
      });
    });




  });
</script>