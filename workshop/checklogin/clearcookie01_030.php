<?php
setcookie('last_active', '', time() - 3600);
setcookie('user_active', '', time() - 3600);
echo "<br><a href='cookie01.php'>ดูคุกกี้</a>";
?>