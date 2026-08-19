<?php
setcookie('last_active', date('H:i:s'), time() + 86400 * 30);
setcookie('user_active', 'yaowares', time() + 86400 * 30);
echo "<br><a href='clearcookie01.php'>ทำลายคุกกี้</a>";
?>