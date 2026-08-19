<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<a href='readsession01.php'>ดู session</a>";
?>