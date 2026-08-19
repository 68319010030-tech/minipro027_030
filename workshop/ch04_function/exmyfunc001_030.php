<?php
//ฟังก์ชั่นสร้างเอง แสดงชื่อตัวเอง 
showName();
showStar();
function showName(){
    echo "เยาวเรศ<br>";
    showStar();
}
showName();
//ฟังก์ชั่นสร้างเอง แสดงเครื่องหมาย*
function showStar(){
    for($i=1;$i<=60;$i++){
        echo "*";
    }
    echo "<br>";
}
//showStar();
//ฟังก์ชั้นวร้างเอง คำนวณหาราคาสินค้า
function calProduct($price,$qty=1){
     $net=$price*$qty;
     //echo $net;
     return $net;
}
echo calProduct(100,4);
$net=calProduct(100);
echo $net+1000;
?>