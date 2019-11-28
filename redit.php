<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$irecom=$_POST['Recommendations'];
	
	// checking empty fields
			
		if(empty($irecom)) {
			echo "<font color='red'>Recommendation field is empty.</font><br/>";
	} else {	
		//updating the table
		$sql = "UPDATE dbreformed.rusers SET Recommendations=:Recommendations
         WHERE id=:id";
		$query = $conn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':Recommendations', $irecom);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':Recommendations' => $irecom));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM dbreformed.rusers  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$irecom = $row['Recommendations'];
}
?>
<html>
<head>	
	<title>Edit Recommendations</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
	.draw-border {
  box-shadow: inset 0 0 0 4px red;
  color: red;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}
.draw-border:hover {
  color: white;
  box-shadow: inset 0 0 0 4px white;
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
body{
	background-image: url("eq.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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
.text{
	padding: 10px;
	width: 90%;
}
</style>
<body>
	<a class="btn draw-border" href="index.php">Home</a>
	<form name="form1" method="post" action="redit.php">
	<div class="row">
		<div class="col-sm-2">
			<td style="color: white">Recommendations</td>
		</div>
		<div class="col-sm-10">
			<input class="text" type="text" name="Recommendations" value="<?php echo $irecom;?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>> <br>
			<input class='pulse-button' type="submit" name="update" value="Update">
		</div>
	</div>
	</form>
	
</body>
</html>