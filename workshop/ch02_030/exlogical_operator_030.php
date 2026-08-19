<?php
//exlogical_operator_030.php
$a=20;
$b=20.2;
$c=200;

$result1 = ($a==$b) && ($a>$b);
$result2 = ($c>$a) && ($a>$b);
$result3 = ($c<=$a) || ($a>19);
$result4 = !($b<$a);

echo "ผลลัพธ์ของ result1 = ",$result1;
echo "<br>ผลลัพธ์ของ result2 = ",$result2;
echo "<br>ผลลัพธ์ของ result3 = ",$result3;
echo "<br>ผลลัพธ์ของ result4 = ",$result4;
?>