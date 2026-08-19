<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--รับข้อมูลชื่อและคะแนนของผู้ใช้จำนวน 3 คน -->
    <form action="exmyfunc004send_030.php" method="post">
        <input type="text" name="stdname[]" required placeholder="ระบุชื่อ">
        <input type="text" name="stdscore[]" required placeholder="ระบุคะแนน">
        <input type="text" name="stdname[]" required placeholder="ระบุชื่อ">
        <input type="text" name="stdscore[]" required placeholder="ระบุคะแนน">
        <input type="text" name="stdname[]" required placeholder="ระบุชื่อ">
        <input type="text" name="stdscore[]" required placeholder="ระบุคะแนน">
        <button type="submit">ส่ง</button>
</form>
</body>
</html>