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
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Add Recommendations</title>
    <style type="text/css">
        body{
            background-color: black;
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

label{
    color: white;
    font-size: 50px;
}


    </style>
</head>
    <form action="addrecom.php" method="POST">

        <div class="row">
            <div align="center" class="col-sm-12">
                 <label>Recommendations</label>
            </div>
        </div>
        <div class="row">
            <div align="center" class="col-sm-12">
                 <textarea name="Recommendations"cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div align="center" class="col-sm-12">
                 <input class="btn draw-border" type="submit" name="Register" value="Add">
                 <a class="btn draw-border" href="index.php">Home</a>
            </div>
        </div> 

<img id="loading" class="cd1" src="cd.png">
    <img id="loading" class="cd2" src="cd.png">
       
    </form>
    
        
</body>
</html>