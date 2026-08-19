<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $num=$_POST['num'];
    strToarr($num);
 }
function strToarr($numarr){
    $arr=explode(",",$numarr);
    sort($arr);
    foreach($arr as $value){
        echo " $value ";
    }
 }
?>