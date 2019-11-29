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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>LOGIN</title>
<style type="text/css">
    body{
        padding: 0;
        margin: 0;
    }
    .bg{
        background-image: url("wall.jpg");
        height: 650px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .glow {
  text-align: center;
}
.glow .major {
  color: white;
  text-shadow: 0 0 2px green, 0 0 10px green, 0 0 20px green, 0 0 30px green, 0 0 40px green, 0 0 50px green;
}
.glow .minor {
  color: white;
  text-shadow: 0 0 2px orange, 0 0 10px orange, 0 0 20px orange, 0 0 30px orange, 0 0 40px orange, 0 0 50px orange;
}
.glow .major {
  display: block;
  font-size: 100px;
}
.glow .minor {
  display: block;
  font-size: 50px;
}
.text{
    float: right;
}
.container{
    height: 100%;
    background-color: black;
    width: 400px;
    padding: 20px;
    box-shadow: 0 12px 20px 0 red;
    opacity: .5;
    color: white;
}
.pulse-button {
  top: 50%;
  left: 50%;
  margin-top: 10px;
  width: 150px;
  height: 50px;
  font-size: 20px;
  font-family: 'Trebuchet MS', sans-serif;
  text-align: center;
  color: white;
  border: none;
  background: red;
  cursor: pointer;
  box-shadow: 0 0 0 0 rgba(90, 153, 212, 0.5);
  -webkit-animation: pulse 1.5s infinite;
}
@-webkit-keyframes pulse {
  0% {
    -moz-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }
  70% {
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
    box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
  }
  100% {
    -moz-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
    box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
  }
}
.one{
    font-size: 100px;
    position: absolute;
    top: 0;
    margin: 30px;
    color: white;
    text-shadow: 7px 7px 5px green;
}
.one-one{
    font-size: 100px;
    position: absolute;
    top: 0;
    right: 0;
    margin: 30px;
    transform: scaleX(-1);
    color: white;
    text-shadow: 7px 7px 5px green;
}
.two{
    font-size: 100px;
    position: absolute;
    top: 0;
    margin: 200px 100px;
    transform: scaleX(-1);
    color: white;
    text-shadow: 7px 7px 5px orange;
}
.two-two{
    font-size: 100px;
    position: absolute;
    top: 0;
    right: 0;
    margin: 200px 100px;
    color: white;
    text-shadow: 7px 7px 5px orange;
}
</style>
</head>
<body>
    <div class="bg">
    <div class="glow">
         <span class="major">DB REFORMED</span>
         <span class="minor">Reformed Melodies</span>
    </div> <br><br><br>
    <form action="login.php" method="POST">
        <div class="container">
            <div class="row">
             <div class="col-sm-3"></div>
             <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3">
                         <label class="text">Username</label>
                    </div>
                    <div class="col-sm-9">
                        <input placeholder="Username" type="text" name="username" required>
                    </div>
                    </div>      
                </div>
             <div class="col-sm-3"></div>
            </div>
            <br>

             <div class="row">
             <div class="col-sm-3"></div>
             <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-3">
                          <label class="text">Password</label>
                    </div>
                    <div class="col-sm-9">
                       <input placeholder="Password" type="password" name="password" required>
                    </div>
                    </div>      
                </div>
             <div class="col-sm-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12" align="center">



                    <input class='pulse-button' type="submit" name="login" value="LOGIN">
                </div>
            </div>
        </div>
        <p style="color:red"><?php echo "$err_msg" ?></p>
    </form>
    <i class="fa fa-music one" aria-hidden="true"></i>
    </div>
    <i class="fa fa-music one-one" aria-hidden="true"></i>
    </div>
    <i class="fa fa-music two" aria-hidden="true"></i>
    </div>
    <i class="fa fa-music two-two" aria-hidden="true"></i>
    </div>
</body>
</html>