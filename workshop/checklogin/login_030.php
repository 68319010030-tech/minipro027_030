<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>login</h2>
    <form action="checklogin01_030.php" method="post">
        <input type="text" name="username">
        <input type="password" name="pw">
        <input type="checkbox" name="member" value="true">จำรหัสผ่าน
        <button type="submit">ส่ง</button>
    </form>
<?php
if (isset($_SESSION['msgerror'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_SESSION['msgerror']) . "</p>";
    unset($_SESSION['msgerror']);
}
?>
</body>
</html>