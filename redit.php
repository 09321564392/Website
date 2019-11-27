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
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="redit.php">
		<table border="0">
			<tr> 
				<td>Recommendations</td>
				<td><input type="text" name="Recommendations" value="<?php echo $irecom;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>