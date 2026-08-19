<?php
//ฟังก์ชั่นรวมข้อมูลในอาร์เรย์
$price=[20,40,10,50];
function sumArr($num){
    return array_sum($num);
}
echo "ผลรวม array =",sumArr($price),"<br>";
echo "ค่าเฉลี่ย arraysumArr=",sumArr($price)/count($price),"<br>";
//ฟังก์ชั้นเรียงลำดับในอาร์เรย์
function sortArr($num){
    sort($num);  //[10,20,40,50] ถ้าเรียงสำเร็จจะไห้ค่า true
    rsort($num);
    return $num;
}
$numsort=sortArr($price);
foreach($numsort as $value){
    echo " $value ";
}
?>