<?php
// ตั้งชื่อไฟล์เป็น exfunc_return04_030.php
$num = @$_GET['no'];
echo oddoreven($num);

function oddoreven($nx) {
    if ($nx % 2 == 0) {
        return "<span style='color:red; font-size:30pt;'>เป็นเลขคู่</span>";
    }
    else {
        return "<span style='color:blue; font-size:30pt;'>เป็นเลขคี่</span>";
    }
}
?>