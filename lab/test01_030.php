<?php
 $std=[["id"=>"69319010050","name"=>"เยาวเรศ อนันต์","score1"=>40,"score2"=>10],
    ["id"=>"69319010051","name"=>"มัทธิกา จันทร์ทอง","score1"=>20,"score2"=>18],
    ["id"=>"69319010052","name"=>"วิภาดา วุฒบุญญะ","score1"=>30,"score2"=>15]];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $stdid=$_POST[' stdid'];
        $stdname=$_POST['stdname'];
        $stdscore1=$_POST['stdscore1'];
        $stdscore2=$_POST['stdscore2'];
        $std[]=["id"=>$stdid,"name"=>$stdname,"score1"=>$stdscore1,"score2"=>$stdscore2];
    }
    function check_user($username, $pw) {
    if ($stdid == "htc") {
    }
    else {
        echo "<script>alert('คุณระบุรหัสนักศึกษาซ้ำ');</script>";
        echo "<script>window.location.href=('test001_030.php')</script>";
        header("refresh:1;url=test001_030.php");
         //redirect ไปหน้า <test001_030 class=""></test001_030>php
         }
         $stdide = $_POST['id'];
         check_user($stdid);
    }

?>