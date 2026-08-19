<?php
//exstring_operator_030.php
$a=5; $b=12;
$c=$a*$b;
$a.=$c;

echo "ตัวแปร a เท่ากับ ",$a,"<br>ตัวแปร b เท่ากับ ",$b," <br>ตัวแปร c เท่ากับ ",$c;
echo "<br>ตัวแปร a มีชนิดข้อมูลเป็น ",gettype($a);
echo "<br>ตัวแปร b มีชนิดข้อมูลเป็น ",gettype($b);
echo "<br>ตัวแปร c มีชนิดข้อมูลเป็น ",gettype($c);
?>