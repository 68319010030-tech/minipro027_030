<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "สวัสดีคุณ " . htmlspecialchars($_SESSION['username']);
echo "<br><a href='logout.php'>ออกจากระบบ</a>";
?>