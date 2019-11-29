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
  margin: 10px;
}
table{
	margin-left: 10px;
}
td{
	background-color: white;
	opacity: .5;
}
</style>
</head>
<body>
    <div class="bg">
    <div class="glow">
    <a href="logout.php" class="btn draw-border">LOG-OUT</a> | ";
    <a href="list.php" class="btn draw-border">List of users</a> | ";
    <a href="Compositions.php" class="btn draw-border">Compositions</a> | ";    
    <a href="recom.php" class="btn draw-border">Recommendations</a> | ";<br>
    <h1 class="major" class="btn draw-border">Welcome Home</h1>
    <br>";
    </div> 
<?php
session_start();
$br = "<br/>";
include_once ('config.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
// header ("location:login.php");
?>