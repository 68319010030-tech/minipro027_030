<?php
session_start();
$_SESSION["username"] = "admin";
$_SESSION["role"] = "superadmin";
echo "session ถูกตั้งค่าแล้ว <a href='readsession01.php'>เปิดดู session ที่ตั้งค่า</a>";
?>