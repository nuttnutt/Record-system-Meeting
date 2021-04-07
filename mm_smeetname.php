<?php
include "./db/connect.php";
include "./thaidate.php";

$strSQL = " SELECT formno,datenow,title,datec1start,timestart,datec1end,timeend,es.equisysdep_name,loc FROM mm ";
$strSQL .= " LEFT JOIN equiment_sysdep es on es.equisysdep_id = seldep ";
$strSQL .= " WHERE mm_id = '" . $_REQUEST["id"] . "' ";
$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);


?>
<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- font css -->
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
            <div class="card">
                <div class=" card-header bg-x">
                    <h5 class="font-effect-outline">ข้อมูลการประชุม</h5>
                </div>

                <div class="border border-light">
                    <div class="card-body">
                        <!-- <blockquote class="blockquote mb-0"> -->
                        <div class="row ">
                            <div class="col-sm-6">
                                <B>เลขที่การประชุม</B>
                                <li class="text-danger">
                                    <?= $objResult["formno"] ?>
                                </li>
                            </div>
                            <div class="col-sm-6">
                                <b>วันที่ลง</b>
                                <li class="text-danger">
                                    <?= thai_date_fullmonth($objResult["datenow"]) ?>
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <b>หัวข้อประชุม</b>
                                <li class="text-danger">
                                    <?= $objResult["title"] ?>
                                </li>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3">
                                <b>ระหว่างวันที่</b>
                                <li class="text-danger">
                                    <?= thai_date_fullmonth($objResult["datec1start"]) ?>
                                </li>
                            </div>
                            <div class="col-sm-3">
                                <b>เวลา</b>
                                <li class="text-danger">
                                    <?= $objResult["timestart"] ?>
                                </li>
                            </div>
                            <div class="col-sm-3">
                                <b>ถึงวันที่</b>
                                <li class="text-danger">
                                    <?= thai_date_fullmonth($objResult["datec1end"]) ?>
                                </li>
                            </div>
                            <div class="col-sm-3">
                                <b>ถึงเวลา</b>
                                <li class="text-danger">
                                    <?= $objResult["timeend"] ?>
                                </li>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <b>หน่วยงาน</b>
                                <li class="text-danger">
                                    <?= $objResult["equisysdep_name"] ?>
                                </li>
                            </div>
                            <div class="col-sm-6">
                                <b>สถานที่</b>
                                <li class="text-danger">
                                    <?= $objResult["loc"] ?>
                                </li>
                            </div>
                        </div>
                        <!-- </blockquote> -->
                    </div>
                </div>
            </div>
            <br></br>
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header bg-x">
                    <h5 class="font-effect-outline">เพิ่มข้อมูลผู้เข้าร่วมการประชุม</h5>
                </div>
                <div class="border border-light">
                    <div class="card-body">
                        <form role="form" method="post" id="ins_name" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ชื่อผู้เข้าร่วมการประชุม</label>
                                        <!--  <input type="text" class="form-control selectname" id="search" name="search" placeholder="-- ชื่อ-สกุล --">  -->
                                        <select class="form-control select2bs4" style="width: 100%;" name="officer_name" id="officer_name">
                                            <!-- <option value="" selected="selected" >-- ค้นหา ชื่อ-สกุล --</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>ตำแหน่ง</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="officer_position" id="officer_position">
                                            <option value="" selected="selected">-- ตำแหน่ง --</option>
                                            <?php
                                            $strSQL = " SELECT DISTINCT dp.name, dp.id as poid FROM officer oc  ";
                                            $strSQL .= " LEFT JOIN doctor dt on dt.code = oc.officer_doctor_code ";
                                            $strSQL .= " LEFT JOIN doctor_position dp on dp.id = dt.position_id ";
                                            $strSQL .= " WHERE dp.name is not null";
                                            $objQuery = pg_query($connpg, $strSQL) or die(pg_last_error($connpg));
                                            while ($objResult = pg_fetch_array($objQuery, NULL, PGSQL_ASSOC)) {
                                                echo "<option value='" . $objResult["name"] . "'>" . $objResult["name"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label>เพิ่มข้อมูล</label>
                                    <!-- <button type="button" class="btn btn-primary active">Active Primary</button> -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success">
                                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                        </button>
                                        <input type="hidden" name="mmid" id="mmid" value="<?= $_REQUEST["id"] ?>" />
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <!-- <span class="input-group-text"><i class="fas fa-user"></i></span> -->
                                    </div>
                                    <input type="text" class="form-control" placeholder="-- ชื่อ-สกุล --" name="from" id="from" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" class="form-control" placeholder="-- ตำแหน่ง --" name="from" id="from" disabled>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-success" disabled>
                                        <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- </blockquote> -->
                    </div>
                </div>
            </div>
            <br></br>
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-x">
                                <h5 class="font-effect-outline">รายชื่อผู้เข้าประชุม</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="tbl1" class="table table-bordered table-hover">
                                <thead class="font-effect-outline">
                                    <tr class="bg-x">
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>*</th>
                                    </tr>
                                </thead>
                                <tbody id="datalist"></tbody>
                            </table>
                            <br /> <br />
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="window.location.href='?page=mm_smeeting';">กลับ</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card"> -->
                        <!-- <div class="col"> -->
                        <!-- <div class="footer"> -->

                        <!-- </div> -->
                        <!-- </div> -->

                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

        </div>

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
<!--Select2 -->
<script src="./plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    function formatRepo(repo) {

        if (repo.loading) return repo.text;

        var markup = repo.fullname

        return markup;
    }

    function formatRepoSelection(repo) {
        return repo.fullname
    }
    $(document).ready(function() {
        var tbl;
        tbl = $('#tbl1').dataTable({
            "processing": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "ajax": {
                "url": "./db/select_mmdetaillist.php?mmid=" + <?= $_REQUEST["id"] ?>,
                "dataSrc": function(json) {
                    var return_data = new Array();
                    for (var i = 0; i < json.length; i++) {
                        return_data.push({
                            'no': json[i].no,
                            'mm_detail_name': json[i].mm_detail_name,
                            'mm_detail_position': json[i].mm_detail_position,
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
                    'data': 'mm_detail_name'
                },
                {
                    'data': 'mm_detail_position'
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

        $("#officer_name").select2({
            ajax: {
                url: './db/search_mm.php',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            placeholder: 'Search for a repository',
            minimumInputLength: 2,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });


        $('#ins_name').on("submit", function(event) {
            event.preventDefault();
            var formData = new FormData($("#ins_name")[0]);

            if ($('#officer_name').val() === "") {
                alert("กรุณาระบุชื่อ");
                return false;
            }
            if ($('#officer_position').val() === "") {
                alert("กรุณาระบุตำแหน่ง");
                return false;
            }
            var mmid = $('#mmid').val();
            $.ajax({
                url: "./db/insert_name_mm.php",
                method: "POST",
                dataType: "JSON",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data['success']) {
                        $("#officer_position").select2('val', 'All');
                        $('#officer_name').select2('val', 'All');
                        Toast.fire({
                            type: 'success',
                            title: 'บันทึกข้อมูลเรียบร้อย'
                        })
                        tbl.api().ajax.url('./db/select_mmdetaillist.php?mmid=' + mmid).load();
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.'
                        })
                    }
                }
            });
        });

        $(document).on('click', '.deltempid', function() {
            var mmdid = $(this).attr('id');
            var mmid = $('#mmid').val();
            $.ajax({
                url: "./db/delete_mm_detail.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    mmdid: mmdid
                },
                success: function(data) {
                    if (data['success']) {
                        Toast.fire({
                            type: 'success',
                            title: 'ลบข้อมูลเรียบร้อย'
                        })
                        tbl.api().ajax.url('./db/select_mmdetaillist.php?mmid=' + mmid).load();
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