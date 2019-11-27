<?php
session_start();
$br = "<br/>";
include_once ('config.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
// header ("location:login.php");

echo "<a href=\"logout.php\">LOG-OUT</a> | ";
echo "<a href=\"list.php\">List of users</a> | ";
echo "<a href=\"Compositions.php\">Compositions</a> | ";
echo "<a href=\"recom.php\">Recommendations</a> | $br";
echo "Home" . "<br>";
?>