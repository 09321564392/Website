<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$inickname=$_POST['nickname'];
	$irole=$_POST['role'];
	
	// checking empty fields
	if(empty($inickname) || empty($irole)) {	
			
		if(empty($inickname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($irole)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
			
	} else {	
		//updating the table
		$sql = "UPDATE dbreformed.tusers SET nickname=:nickname, role=:role WHERE id=:id";
		$query = $conn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':nickname', $inickname);
		$query->bindparam(':role', $irole);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM dbreformed.tusers  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$inickname = $row['nickname'];
	$irole = $row['role'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
	body{
		background-image: url("gt.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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
*{
	color: white;
}
</style>
<body>
	<a class="btn draw-border" href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">

		<div class="containter">
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<td class="float">Nickname</td>
				</div>
				<div class="col-sm-6">.
					<input type="text" name="nickname" value="<?php echo $inickname;?>">
				</div>
			</div>


			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<td class="float">Role</td>
				</div>
				<div class="col-sm-6">.
					<td><input type="text" name="role" value="<?php echo $irole;?>"></td>
				</div>
			</div>

			<br><br>

			<div class="row">
				<div align="center" class="col-sm-12">
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn draw-border" type="submit" name="update" value="Update"></td>
				</div>
			</div>

		</div>

	</form>
</body>
</html>