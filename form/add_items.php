<?php
include "../db//connect.php";
?>
<div class="modal-header">
    <h4 class="modal-title">เพิ่มรายการอุปกรณ์</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="card-body">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ประเภท</label>
            <div class="col-sm-9">
                <select class="form-control" name="seltype">
                    <option value=""> -- เลือกประเภท -- </option>
                    <option value="อุปโภค">อุปโภค</option>
                    <option value="จิปาถะ">จิปาถะ</option>
                    <option value="เวชภัณฑ์">เวชภัณฑ์</option>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ชื่ออุปกรณ์</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" >
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >รายละเอียด</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="detail" name="detail" >
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >หน่วย</label>
            <div class="col-sm-9">
                <select class="form-control" name="selunit">
                <option value=""> -- เลือกหน่วย --</option>  
                <?php
                $strSQL = "SELECT * FROM inv_unit ";
                $objQuery = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
                while($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
                ?>
                <option value="<?=$objResult["unit_id"]?>"><?=$objResult["unit_name"]?></option>    
                <?php }?>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ราคา</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="price" name="price" >
            </div>
        </div>          
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label" >ภาพ</label>
            <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="fileUpload">
                        <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์รูป</label>
                    </div>
            </div>
        </div> 
          
        
    </div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    <button type="submit" class="btn btn-primary">บันทึก</button>
</div>
<!-- /.modal-content -->