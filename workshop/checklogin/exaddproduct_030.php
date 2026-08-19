<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>เพิ่มสินค้า</title>
</head>
<body>

    <h2>ฟอร์มเพิ่มสินค้า</h2>
   <form action="sendaddproduct_030.php" method="post">
    ชื่อสินค้า: <input type="text" name="pname" required><br>
    ราคา: <input type="number" name="pprice" required><br>
    <input type="submit" name="add" value="เพิ่มสินค้า">
</form>
</body>
</html>