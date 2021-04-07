<?php
include "../db/connect.php";

$dateicid = isset($_POST['dateicid']) ? $_POST['dateicid'] : "";
$icspdep = isset($_POST['icspdep']) ? $_POST['icspdep'] : "";

?>
<div class="modal-header">
    <h4 class="modal-title">บันทึกผู้ป่วยติดเชื้อ</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="card-body">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ค้นหา HN</label>
            <div class="col-sm-9">
                <select class="form-control select2bs4 selecthn" name="hn" id="hn" style="width: 100%;">
                    <option value="">ค้นหา HN</option>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >เลือกวันที่ Admit</label>
            <div class="col-sm-9">
                <select class="form-control select2bs4 selectdatean" name="seldatean" id="seldatean" style="width: 100%;">
                    <option>เลือกวันที่ Admin</option>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >หอผู้ป่วย</label>
            <div class="col-sm-9">
                <select class="form-control select2bs4 selectward" name="selward" id="selward" style="width: 100%;">
                    <option value="">เลือกหอผู้ป่วย</option>
                    <?php                    
                    $strSQLward = "SELECT w.ward, w.name FROM ward w WHERE w.ward not in ('41', '44', '45') AND w.ward_active = 'Y' Order by name";
                    $objQueryward = pg_query($connpg, $strSQLward) or die(pg_last_error($connpg));                    
                    while($objResultward = pg_fetch_array($objQueryward, NULL, PGSQL_ASSOC)){  
                    ?> 
                        <option value="<?=$objResultward["ward"]?>" <?php if($objResultward["ward"] == $icspdep) echo "selected"; ?>><?=$objResultward["name"]?></option>
                    <?php } ?>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >วันที่พบอาการ</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="datefirst" id="datefirst" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ตำแหน่งการติดเชื้อ</label>
            <div class="col-sm-9">
                <select class="form-control select2bs4" style="width: 100%;" name='selpos' id='selpos'>
                    <option value="">เลือกตำแหน่งการติดเชื้อ</option>
                    <?php                    
                    $strSQLpos = "SELECT * FROM position WHERE position_status != 2 ";
                    $objQuerypos = mysqli_query($conn, $strSQLpos) or die(mysqli_error($conn));  
                    while($objResultpos = mysqli_fetch_array($objQuerypos, MYSQLI_ASSOC)){
                        echo "<option value='".$objResultpos["position_id"]."'>".$objResultpos["position_name"]."</option>";
                    }
                    ?>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >สั่งเพาะเชื้อหรือไม่</label>            
            <div class="col-sm-2">
                <div class="input-group">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" value='2' name="r1" checked>
                        <label for="radioPrimary2">ไม่ส่งตรวจ</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" value='1' name="r1" >
                        <label for="radioPrimary1">ส่งตรวจ</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >วันที่สั่งเพาะเชื้อ</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="datese" id="datese" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ชนิดของสิ่งส่งตรวจ</label>
            <div class="col-sm-9">
                <select class="form-control select2bs4" style="width: 100%;" name='selsend' id='selsend'>
                    <option value="">เลือกชนิดของสิ่งส่งตรวจ</option>
                    <?php                    
                    $strSQLtype = "SELECT * FROM type WHERE type_status != 2 ";
                    $objQuerytype = mysqli_query($conn, $strSQLtype) or die(mysqli_error($conn));  
                    while($objResulttype = mysqli_fetch_array($objQuerytype, MYSQLI_ASSOC)){
                        echo "<option value='".$objResulttype["type_id"]."'>".$objResulttype["type_name"]."</option>";
                    }
                    ?>
                </select>
            </div>
        </div> 
    </div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    <button type="submit" class="btn btn-success">บันทึก</button>
    <input type="hidden" name="dateicid" value="<?=$dateicid?>" />
</div>
<!-- /.modal-content -->

<!-- Select2 -->
<script src="./plugins/select2/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="./dist/js/bootstrap-datepicker-custom.js"></script>
<script src="./dist/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

<script>
    $(function () {
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    function formatRepo (repo) {
        
        if (repo.loading) return repo.text;
        
        var markup = repo.value + " " + repo.fullname;

        return markup;
    }      
    function formatRepoSelection (repo) {
        return repo.value +" "+ repo.fullname || repo.text;
    }

    $(document).ready(function() {  
        //Date picker
        $('#datefirst').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: true,
        language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
        thaiyear: true,              //Set เป็นปี พ.ศ.
        autoclose: true
        }).datepicker("setDate", "0"); 

         //Date picker
         $('#datese').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: true,
        language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
        thaiyear: true,              //Set เป็นปี พ.ศ.
        autoclose: true
        }).datepicker("setDate", "0");

        $(".selecthn").select2({
            ajax: {     
                url: './db/search_hn.php',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
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
            minimumInputLength: 4,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });

        $('.selecthn').change(function() {
            var hn = $(this).val();
            console.log(hn);        
            $.ajax({
                url: "./db/search_hnadmit.php",  
                method: "POST",
                //dataType: "JSON",
                data:{hn: hn},  
                success: function(data) {
                    $('#seldatean').html(data);
                } 
            });
        }); 

        $('#datese').prop("disabled", true);
        $('#selsend').prop("disabled", true);

        $("form input:radio").change(function() {
            if ($(this).val() == "2") {
                $('#datese').prop("disabled", true);
                $('#selsend').prop("disabled", true);
            }
            // Else Enable radio buttons.
            else {
                $('#datese').prop("disabled", false);
                $('#selsend').prop("disabled", false);
            }
        });
    });
    
</script>