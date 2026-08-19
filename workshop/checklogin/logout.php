<?php
//logout.php
session_start();
$_SESSION=arrray();
session_destroy();
header("location:login.php");
?>