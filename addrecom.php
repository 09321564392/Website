<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $irecom = $_POST['Recommendations'];
    $sql = "insert into dbreformed.rusers";
    $sql .= "(Recommendations) ";
    $sql .= "values (:Recommendations)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':Recommendations', $irecom);
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
    <title>Add Recommendations</title>
</head>
    <form action="addrecom.php" method="POST">
        <label>Recommendations</label><br/>
        <textarea name="Recommendations"cols="30" rows="10"></textarea><br/>
        <input type="submit" name="Register" value="Add">
    </form>
    <a href="index.php">Home</a>
        
</body>
</html>