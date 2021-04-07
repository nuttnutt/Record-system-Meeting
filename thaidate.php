<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "00"=>"",
    "01"=>"มกราคม",
    "02"=>"กุมภาพันธ์",
    "03"=>"มีนาคม",
    "04"=>"เมษายน",
    "05"=>"พฤษภาคม",
    "06"=>"มิถุนายน",
    "07"=>"กรกฎาคม",
    "08"=>"สิงหาคม",
    "09"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
);
$thai_month_arr_short=array(
    "0"=>"",
    "01"=>"ม.ค.",
    "02"=>"ก.พ.",
    "03"=>"มี.ค.",
    "04"=>"เม.ย.",
    "05"=>"พ.ค.",
    "06"=>"มิ.ย.",
    "07"=>"ก.ค.",
    "08"=>"ส.ค.",
    "09"=>"ก.ย.",
    "10"=>"ต.ค.",
    "11"=>"พ.ย.",
    "12"=>"ธ.ค."
);

function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return = date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    $thai_date_return.= " เวลา ".date("H:i:s",$time);
    return $thai_date_return;
}
function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
    global $thai_day_arr,$thai_month_arr_short;
    $thai_date_return = date("j",$time);
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    $thai_date_return.= " ".date("H:i:s",$time);
    return $thai_date_return;
}
function thai_date_short($time){   // 19  ธ.ค. 56
    global $thai_day_arr,$thai_month_arr_short;
    $thai_date_return = date("d", strtotime($time));
    $thai_date_return.=" ".$thai_month_arr_short[date("m", strtotime($time))];
    $thai_date_return.= " ".substr((date("Y", strtotime($time))+543),-2);
    return $thai_date_return;
}
function thai_date_short2($time){   //  ธ.ค. 56
    global $thai_day_arr,$thai_month_arr_short;
    //$thai_date_return = date("d", strtotime($time));
    $thai_date_return = " ".$thai_month_arr_short[date("m", strtotime($time))];
    $thai_date_return .= " ".substr((date("Y", strtotime($time))+543),-2);
    return $thai_date_return;
}
function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return = date("j",strtotime($time));
    $thai_date_return.=" ".$thai_month_arr[date("m", strtotime($time))];
    $thai_date_return.= " ".(date("Y",  strtotime($time))+543);
    return $thai_date_return;
}
function thai_date_fullmonth2($time){   // ธันวาคม 2556
    global $thai_day_arr, $thai_month_arr;
    //$thai_date_return = date("j",$time);
    $thai_date_return =" ".$thai_month_arr[date("m", strtotime($time))];
    $thai_date_return.= " ".(date("Y", strtotime($time)) + 543);
    return $thai_date_return;
}
function thai_date_short_number($time){   // 19-12-56
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return = date("d",$time);
    $thai_date_return.="-".date("m",$time);
    $thai_date_return.= "-".substr((date("Y",$time)+543),-2);
    return $thai_date_return;
}
function datenum($date){
    $datemonth = date("m", $date);
    $dateyear = date("Y", $date);
    $datenum_return = cal_days_in_month(CAL_GREGORIAN, $datemonth, $dateyear);
    return $datenum_return;
}
function chkday($chk){
    $chkday = date("D", $chk);
    return $chkday;
}
function thai_date_monthonly($time){   // ธันวาคม
    global $thai_day_arr, $thai_month_arr;
    $thai_date_return =$thai_month_arr[date("m", strtotime($time))];
    return $thai_date_return;
}

?>
