<?php
session_start();
//สร้างตัวแปร session
if($_SERVER['REQUEST_METHOD']=="POST"){
if(!empty($_POST['ptype'])){
$_SESSION['product'][]=$_POST['ptype'];
foreach($_SESSION['product'] as $value){
echo "คุณได้เลือกรายการ :",$value,"<br>";
}
}
}
?>