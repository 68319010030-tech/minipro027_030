<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- สร้างฟอร์มสำหรับรับข้อมูลนักเรียนจำนวน 1 คน โดยให้ผู้ใช้ระบุข้อมูลดังนี้ รหัสนักเรียน ชื่อ-สกุล คะแนนช่องที่ 1 คะแนนช่องที่ 2 -->
<form action="exmyfunc005send_020.php" method="post">
    <input type="text" name="stdid" required placeholder="รหัสนักเรียน">
    <input type="text" name="stdname" required placeholder="ชื่อรักเรียน">
    <input type="number" name="stdscore1" required placeholder="คะแนนครั้งที่1" min="0" max="50">
    <input type="number" name="stdscore2" required placeholder="คะแนนครั้งที่2" min="0" max="50">
    <button type="submit">ส่ง</button>
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

</form>
</body>
</html>