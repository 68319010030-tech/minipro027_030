<?php
// สร้างฟังก์ชันชื่อ daysInMonth เพื่อตรวจสอบค่า ระหว่าง 1-12 แล้วให้ส่งค่าจำนวนวันของเดือนนั้นๆออกมา เช่น หากเรียก daysInMonth(6) .sh return 30
//ตั้งชื่อไฟล์เป็น exfunc_return08_030.php
function daysInMonth($num){
    $month=array(1=>30,2=>28,2=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
    foreach($month as $key=>$keyvalue){
        if($num==$key){
            return $month[$key];
        }
    }
}
echo  daysInMonth(10);
echo "<br>";
echo  daysInMonth(2);
?>