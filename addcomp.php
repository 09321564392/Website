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
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Compositions</title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
            body{
            background-color: black;
        }
        h1{
            color: white;
            margin-top: 20px;
            text-shadow: 2px 2px 10px white;
        }
        .box1{
            position: absolute;
            width: 65%;
            height: 50px;
            background-color: white;
            right: 0;
            margin-top: 22px;
            box-shadow: -5px 0px 18px white;
        }
        label{
            float: right;
            color: white;
        }
        .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
  margin:10px;
}
.draw-border:hover {
  color: white;
}
.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 1em 2em;
  letter-spacing: 0.05rem;
}
.cd1{
    height: 300px;
    position: absolute;
    margin-left: 50px;
    bottom: 0;
    margin-bottom: 30px;
}
.cd2{
    height: 200px;
    position: absolute;
    margin-right: 100px;
    bottom: 0;
    right: 0;
    margin-bottom: 100px;

}
#loading {
        -webkit-animation: rotation 2s infinite linear;
}
@-webkit-keyframes rotation {
        from {
                -webkit-transform: rotate(0deg);
        }
        to {
                -webkit-transform: rotate(359deg);
        }
}
.line{
    border-left: solid white 5px;
    margin-top: 80px;
    margin-left: 40px;
    border-radius: 50%;
    height: 420px;
    width: 420px;
    position: absolute;
}

</style>
</head>
<body>
    <form action="addcomp.php" method="POST">
        <a class="btn draw-border" href="index.php">Home</a> 
        <div class="contain"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <label>Verse1</label>
            </div>
            <div class="col-sm-2">
                <textarea name="verse1"cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Chorus</label>
            </div>
            <div class="col-sm-2">
                <textarea name="chorus"cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Verse2</label>
            </div>
             <div class="col-sm-2">
                <textarea name="verse2"cols="30" rows="10"></textarea>
            </div>
        </div> <br>

        <div class="row">
            <div class="col-sm-5">
                <label>Title</label>
            </div>
            <div class="col-sm-7">
                <input type="text" name="title">
            </div>
        </div> <br>
        <div class="row">
            <div align="center" class="col-sm-12">.
                <input type="submit" name="Register" value="Add">
            </div>
        </div>
        
    </form>
    <img id="loading" class="cd1" src="cd.png">
    <img id="loading" class="cd2" src="cd.png">
        
</body>
</html>