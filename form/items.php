<?php
include "../db/connect.php";

$itid = isset($_POST['itid']) ? $_POST['itid'] : "";

$strSQL = "SELECT * FROM inv_items WHERE items_id = '".$itid."' ";
$objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
<div class="modal-header">
    <h4 class="modal-title">แก้ไขรายการอุปกรณ์</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="card-body">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >รายงนอุปกรณ์</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="<?=$objResult["items_topic"]?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >หน่วย</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="unit" name="unit" value="<?=$objResult["items_unit"]?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ราคา</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="price" name="price" value="<?=$objResult["items_price"]?>">
            </div>
        </div>
        
    </div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    <button type="submit" class="btn btn-primary">บันทึกแก้ไข</button>
    <input type="hidden" name="itid" id="itid" value="<?=$objResult["items_id"]?>" />
</div>
<!-- /.modal-content -->