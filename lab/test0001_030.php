<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
?>
<function check_user($username, $pw) {
    if ($username == "htc" && $pw == "1234") {
    }
    else {
        echo "<script> alert(คุณระบุรหัสนักศึกษาซ้ำ);</script>";
        echo "<script>window.location.href=('exmyfun_alert01.php')</script>";
        exit();
        header("refresh:1;url=test001.php"); //redirect ไปหน้า exmyfun_alert01.php
    }
}
$username = $_POST['username'];
$pw = $_POST['pw'];
check_user($username, $pw);
</body>
</html>