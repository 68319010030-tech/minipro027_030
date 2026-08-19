<?php
// ตั้งชื่อไฟล์เป็น exgetfunc_form08_030.php
$depart = $_GET['depart'];
$title = $_GET['title'];
$name = $_GET['name'];

echo "ชื่อนักเรียน : $name <br> สาขาที่เลือก : $depart <br>";

if ($depart == "ชย." or $depart == "ชก." or $depart == "ชล.") {
    std_trade($title);
} 
else {
    std_business($title);
}

function std_trade($title) {
    echo "<span style='color:red; font-size:20pt;'>รายการที่ต้องซื้อคือ</span><br>เสื้อนักเรียน<br>กางเกงนักเรียน<br>เสื้อช็อป<br>รองเท้า<br>เข็มขัด<br>ตะไบ";
    if ($title == "f") {
        echo "<br>กระโปรง";
    }
}

function std_business($title) {
    echo "<span style='color:red; font-size:20pt;'>รายการที่ต้องซื้อคือ</span><br>เสื้อนักเรียน<br>กางเกงนักเรียน<br>เสื้อช็อป<br>รองเท้า<br>เข็มขัด";
    if ($title == "f") {
        echo "<br>กระโปรง";
    }
}
?>