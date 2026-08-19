<?php
if (isset($_COOKIE['last_active'])) {
    echo htmlspecialchars($_COOKIE['last_active']) . "<br>";
}
if (isset($_COOKIE['user_active'])) {
    echo htmlspecialchars($_COOKIE['user_active']);
}
?>