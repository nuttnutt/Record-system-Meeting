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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card">
                <div class="card-header bg-x">
                    <div class="card-title ">
                        <h3 class="font-effect-outline">บันทึกรายงานการประชุม</h3>
                    </div>
                    <div class="card-tools">
                        <a href="?page=mm_smeettext">
                            <button class="btn btn-warning" title=" เพิ่ม รายงานการประชุม "><i class="far fa-plus-square "></i> เพิ่ม รายงานการประชุม</button>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="tbl2" class="table table-hover">
                        <thead class="font-effect-outline ">
                            <tr class="bg-x">
                                <th>ลำดับ</th>
                                <th>วันที่ประชุม</th>
                                <th>หัวข้อการประชุม</th>
                                <th>หน่วยงาน</th>
                                <th>สถานที่</th>
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
<script src="./dist/jQueryPrintPage/jquery.printPage.js"></script>


<script>
    var tb2;
    $(document).ready(function() {

        tb2 = $('#tbl2').dataTable({
            "processing": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "ajax": {
                "url": "./db/mmdata.php",
                "dataSrc": function(json) {
                    var return_data = new Array();
                    for (var i = 0; i < json.length; i++) {
                        return_data.push({
                            'no': json[i].no,
                            'datec1start': json[i].datec1start,
                            'title': json[i].title,
                            'equisysdep_name': json[i].equisysdep_name,
                            'loc': json[i].loc,
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
                    'data': 'datec1start'
                },
                {
                    'data': 'title'
                },
                {
                    'data': 'equisysdep_name'
                },
                {
                    'data': 'loc'
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

        $(document).on('click', '.deltempid', function() {
            var mmdid = $(this).attr('id');
            $.ajax({
                url: "./db/update_mm.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    mm_id: mmdid
                },
                success: function(data) {
                    if (data['success']) {
                        Toast.fire({
                            type: 'success',
                            title: 'ลบข้อมูลเรียบร้อย'
                        })
                        tb2.api().ajax.url('./db/mmdata.php').load();
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.'
                        })
                    }
                }

            });
        });

        $(document).on('click', '.btnprint', function() {
            var mmid = $(this).attr('id');
            $(this).printPage({
                url: "./print_meeting.php?mmid=" + mmid,
                attr: "href",
                message: "Your document is being created"
            });
        });

    });
</script>