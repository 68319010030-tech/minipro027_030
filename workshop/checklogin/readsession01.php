<?php
session_start();
if (!empty($_SESSION['username']) && !empty($_SESSION['role'])) {
    echo htmlspecialchars($_SESSION['username']) . "<br>" . htmlspecialchars($_SESSION['role']);
}
echo "<br><a href='clearsession01.php'>ทำลาย session</a>";
?>