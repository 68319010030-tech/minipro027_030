<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// exmyfun_alert02.php สร้างไว้ในโฟลเดอร์ userfunction
// จงเขียนโปรแกรมตรวจสอบผู้ใช้ถ้า username=htc, password=1234 เป็นจริงแล้วให้แสดง alert
// เป็นสวัสดีคุณ... แต่ถ้าไม่ใช่ แสดง alert คุณระบุ username/password ไม่ถูกต้อง
// แล้วให้เปลี่ยนหน้าเป็นหน้าแรก

function check_user($username, $pw) {
    if ($username == "htc" && $pw == "1234") {
        echo "<script>alert('สวัสดีคุณ $username')</script>";
    }
    else {
        echo "<script>alert('คุณระบุ username/password ไม่ถูกต้อง!!');</script>";
        echo "<script>window.location.href=('exmyfun_alert01.php')</script>";
        exit();
        //header("refresh:1;url=exmyfun_alert01.php"); //redirect ไปหน้า exmyfun_alert01.php
    }
}

$username = $_POST['username'];
$pw = $_POST['pw'];
check_user($username, $pw);
?>
</body>
</html>