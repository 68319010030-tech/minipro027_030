<?php
if(!empty($_post['price']) && !empty(&_post['unit'])) {
    $price =$_post['price'];
    $unit =$_post['unit'];
    $discount=0;
    $total=$price*$unit;
    if ($total>1000){
        $discount=$total*0.03;
    }
    else{
        $discount=$total*0.05;
    }
    $net=$total-$discount;
    echo "ราคาสินค้าทั้งหมด :", total," บาท<br>";
    echo "ส่วนลด :",$discount," บาท <br>";
    echo "ราคาที่ต้องชำระ :",$net, "บาท";
}
?>