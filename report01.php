<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Select2 -->
<link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="./dist/js/bootstrap-datepicker.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 py-2">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <form class="form-horizontal">                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label" >รายการการขอเลือดประจำวันที่</label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="date" id="datepickerstart" class="form-control" autocomplete="off">
                                                </div>                                            
                                            </div>  
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="date" id="datepickerend" class="form-control" autocomplete="off">
                                                </div>                                            
                                            </div>                                          
                                        </div>                                         
                                    </form>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-8">
                                    <form class="form-horizontal">                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label" >หน่วยงาน</label>
                                            <div class="col-sm-4">
                                                <select class="form-control select2bs4" id="seldep" name="seldep" style="width: 100%;">
                                                    <option value="" selected="selected">ทั้งหมด</option>    
                                                    <?php
                                                    include "./db/connect.php";
                                                    $strSQLdep = " SELECT * FROM equiment_sysdep where equisysdep_status = 1 ";
                                                    $objQuerydep = mysqli_query($conn, $strSQLdep) or die(mysqli_error($conn));
                                                    while ($objResultdep = mysqli_fetch_array($objQuerydep, MYSQLI_ASSOC)) {
                                                        echo "<option value='" . $objResultdep["equisysdep_id"] . "'>" . $objResultdep["equisysdep_name"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-block btn-warning btnsearch" ><i class="fas fa-eye"></i> แสดง</button>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-block btn-success btnprint" ><i class='fa fa-print'></i> พิมพ์</button>
                                            </div>
                                        </div>                                         
                                    </form>
                                </div>
                            </div>
                            <div class="row table-responsive">
                                <div class="col-lg-12 col-12 p0">
                                    <table id="blb" class="table table-bordered text-sm" >
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">ลำดับ</th>
                                                <th >วันที่ประชุม</th>
                                                <th >หัวข้อการประชุม</th>
                                                <th >หน่วยงาน</th>
                                                <th >สถานที่ประชุม</th>
                                            </tr>
                                        </thead>
                                        <tbody id="blblist" ></tbody>
                                    </table>  
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-outline-danger" onclick="window.location.href='?page=report_mm';"><i class="fas fa-arrow-left"></i> กลับ</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
     <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="data_Modal">
    <div class="modal-dialog modal-lg">
         <form class="form-horizontal" method="post" id="doc_form" enctype="multipart/form-data" >
           <div class="modal-content" id="docform"></div>
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="./plugins/select2/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="./dist/js/bootstrap-datepicker-custom.js"></script>
<script src="./dist/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script src="./dist/jQueryPrintPage/jquery.printPage.js"></script>
<script>
var tbl   
$(document).ready(function() { 
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    var currentDate = new Date();
    var m = currentDate.getMonth()+1;
    var startDate = currentDate.getFullYear()+"-"+m+"-01";

    //Date picker
    $('#datepickerstart').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true,              //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker("setDate", new Date(startDate)); 

    $('#datepickerend').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true,              //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker("setDate", currentDate); 

    tbl = $('#blb').dataTable({
        "processing"  : true,
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
        "ajax": {
          "url" : "./db/select_report01.php",
          "dataSrc": function (json) {
            var return_data = new Array();
            for(var i=0;i< json.length; i++){
              return_data.push({
                'no': json[i].no,
                'dd': json[i].dd,
                'title': json[i].title,
                'dep': json[i].dep,
                'loc': json[i].loc
              })
            }
            return return_data;
          }
        },
        "columns"    : [ 
          {'data': 'no'},
          {'data': 'dd'}, 
          {'data': 'title'}, 
          {'data': 'dep'}, 
          {'data': 'loc'}
        ]
    }); 

    $(document).on('click', '.btnsearch', function() {
        var ddstart = $('#datepickerstart').val();
        var ddend = $('#datepickerend').val();
        var dep = $('#seldep').val();        
        tbl.api().ajax.url('./db/select_report01.php?ddstart='+ddstart+'&ddend='+ddend+'&dep='+dep).load();
    });    


    $(document).on('click', '.btnprint', function() {
            var ddstart = $('#datepickerstart').val();
            var ddend = $('#datepickerend').val();
            var dep = $('#seldep').val(); 
            $(this).printPage({
                url: "./print_report1.php?ddstart="+ddstart+"&ddend="+ddend+"&dep="+dep,
                attr: "href",
                message: "Your document is being created"
            });
        });
    
});
</script>