<?php
session_start();

if (isset($_COOKIE['remember'])) {
    $remember_username = $_COOKIE['remember'];
    if ($remember_username == "jane") {
        $_SESSION['username'] = $remember_username;
        header("location:dashboard_030.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $pw = isset($_POST['pw']) ? $_POST['pw'] : '';
    $member = isset($_POST['member']) ? true : false;

    if ($username == "jane" && $pw == "1234") {
        $_SESSION['username'] = $username;

        if ($member == true) {
            setcookie('remember', $username, time() + (86400 * 30));
        } else {
            setcookie('remember', '', time() - 3600);
        }

        header("refresh:2;url=dashboard_030.php");
        exit();
    } else {
        $_SESSION['msgerror'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!";
        header("location:login_030.php");
        exit();
    }
} else {
    header("location:login_030.php");
    exit();
}
?>