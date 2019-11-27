<?php
$br = "<br/>";
session_start();
session_destroy();
echo "You have been logged out $br";
echo "<a href=\"login.php\">LOGIN</a>";
?>