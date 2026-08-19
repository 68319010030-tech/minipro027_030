<?php
// ตั้งชื่อไฟล์เป็น exfunc_return03_xxx.php
$num = @$_GET['no'];
oddoreven($num);

function oddoreven($nx) {
    if ($nx % 2 == 0) {
        echo "<span style='color:red; font-size:30pt;'>เป็นเลขคู่</span>";
        //return;
    }
    else {
        echo "<span style='color:blue; font-size:30pt;'>เป็นเลขคี่</span>";
        //return;
    }
}
?>