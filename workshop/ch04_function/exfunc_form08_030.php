<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--ตั้งชื่อไฟล์เป็น exfunc_form08_030.php-->
    <h2>โปรแกรมรับข้อมูลสั่งซื้อสินค้า</h2>
    <form action="exgetfunc_form08_xxx.php" method="get">
        ระบุคำนำหน้า :  <select name="title">
            <option value="m">นาย</option>
            <option value="f">นางสาว</option>
        </select>
        <br><br>
        ระบุชื่อ : <input type="text" name="name"><br><br>
        เลือกสาขา : <select name="depart">
            <option value="ชย.">ช่างยนต์</option>
            <option value="ชก.">ช่างกล</option>
            <option value="ชล.">เครื่องเรือน</option>
            <option value="ลจ.">โลจิสติกส์</option>
        </select>
        <br><br>
        <input type="submit" value="ส่ง">
    </form>
</body>
</html>