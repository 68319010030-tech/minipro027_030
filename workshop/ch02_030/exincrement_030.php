<?php
//exincrement_030.php
$a=20;
$b=20.2;
$c=200;

++$a;
echo "ผลลัพธ์ของ a = ",$a;
$a-=2;
echo "<br>ผลลัพธ์ของ a = ",$a;
$a=$b+(--$a);
echo "<br>ผลลัพธ์ของ a = ",$a;
$c=$a+(++$c);
echo "<br>ผลลัพธ์ของ c = ",$c;