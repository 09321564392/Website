<?php 
session_start();
if(isset($_SESSION['user'])){
    header("location:index.php");
}
$err_msg = "";
include_once ('config.php');

if(isset($_POST['login'])){
#echo "You clicked the button";
$uusername = $_POST['username'];
$upassword = $_POST['password'];
$sql = "select * from dbreformed.tusers where username = :pusername AND password = :ppassword";
$query = $conn -> prepare($sql);
$query -> bindParam(':pusername', $uusername);
$query -> bindParam(':ppassword', $upassword);
$query -> execute();

$result = $query->rowCount();
if ($result > 0){
    $_SESSION['user'] = "ok";
    header("location:index.php");
}
else{
    $err_msg = "*ERROR";
}   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="">Username</label><br>
        <input type="text" name="username"><br>
        <label for="">Password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="LOGIN"><br>
        <p style="color:red"><?php echo "$err_msg" ?></p>
    </form>
</body>
</html>