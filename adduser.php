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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Add User</title>
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
        }
        .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
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
    height: 400px;
    position: absolute;
    margin-left: 50px;
    bottom: 0;
    margin-bottom: 50px;
}
.cd2{
    height: 200px;
    position: absolute;
    margin-left: 300px;
    bottom: 0;
    margin-bottom: 250px;
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
    <div class="row">
        <div class="box1"></div>
       <div class="col-sm-1">
           <img  src="btn.jpg" height="100px">
       </div>
       <div class="col-sm-11">
          <h1>Reformed Melodies</h1>
       </div>
    </div>
    <img id="loading" class="cd1" src="cd.png">
    <img id="loading" class="cd2" src="cd.png">
    <div class="line"></div>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn draw-border" href="index.php">Home</a>
        </div>
    </div>

    <form action="adduser.php" method="POST">

    <div class="row">
        <div class="col-sm-6">
            <label>Username</label>
        </div>
        <div class="col-sm-6">
            <input type="text" name="username">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-6">
            <label>Password</label>
        </div>
        <div class="col-sm-6">
            <input type="password" name="password">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-6">
            <label>Nickname</label>
        </div>
        <div class="col-sm-6">
            <input type="text" name="nickname">
        </div>
    </div>

    <br>

     <div class="row">
        <div class="col-sm-6">
            <label>Role</label>
        </div>
        <div class="col-sm-6">
             <input type="text" name="role">
        </div>
    </div>

    <br>

    <div class="row">
        <div align="center" class="col-sm-12">
            <input class="btn draw-border" type="submit" name="Register" value="Add">
        </div>
    </div>
    </form>
    
        
</body>
</html>