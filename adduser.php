<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $iusername = $_POST['username'];
    $ipassword = $_POST['password'];
    $inickname = $_POST['nickname'];
    $irole = $_POST['role'];

    $sql = "insert into dbreformed.tusers";
    $sql .= "(username, password, nickname, role, date_created) ";
    $sql .= "values (:pusername, :ppassword, :pnickname, :prole, NOW())";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':pusername', $iusername);
    $query -> bindParam(':ppassword', $ipassword);
    $query -> bindParam(':pnickname', $inickname);
    $query -> bindParam(':prole', $irole);
    $query -> execute();
    echo "Successfully Added";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
</head>
    <form action="adduser.php" method="POST">
        <label>username</label><br/>
        <input type="text" name="username"><br/>
        <label>password</label><br/>
        <input type="password" name="password"><br/>
        <label>nickname</label><br>
        <input type="text" name="nickname"><br/>
        <label>role</label><br>
        <input type="text" name="role"><br/>
        <input type="submit" name="Register" value="Add">
    </form>
    <a href="index.php">Home</a>
        
</body>
</html>