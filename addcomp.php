<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $iverse1 = $_POST['verse1'];
    $ichorus = $_POST['chorus'];
    $iverse2 = $_POST['verse2'];
    $ititle = $_POST['title'];

    $sql = "insert into dbreformed.cusers";
    $sql .= "(verse1, chorus, verse2, title) ";
    $sql .= "values (:pverse1, :pchorus, :pverse2, :ptitle)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':pverse1', $iverse1);
    $query -> bindParam(':pchorus', $ichorus);
    $query -> bindParam(':pverse2', $iverse2);
    $query -> bindParam(':ptitle', $ititle);
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
    <title>Add Compositions</title>
</head>
    <form action="addcomp.php" method="POST">
        <label>Verse1</label><br/>
        <textarea name="verse1"cols="30" rows="10"></textarea><br/>
        <label>Chorus</label><br/>
        <textarea name="chorus"cols="30" rows="10"></textarea><br/>
        <label>Verse2</label><br>
        <textarea name="verse2"cols="30" rows="10"></textarea><br/>
        <label>Title</label><br>
        <input type="text" name="title"><br/>
        <input type="submit" name="Register" value="Add">
    </form>
    <a href="index.php">Home</a>
        
</body>
</html>