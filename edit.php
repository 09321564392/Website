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

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nick name</td>
				<td><input type="text" name="nickname" value="<?php echo $inickname;?>"></td>
			</tr>
			<tr> 
				<td>Role</td>
				<td><input type="text" name="role" value="<?php echo $irole;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>