<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$iverse1=$_POST['verse1'];
    $ichorus=$_POST['chorus'];
    $iverse2=$_POST['verse2'];
	$ititle=$_POST['title'];
	
	// checking empty fields
	if(empty($iverse1) || empty($ichorus) || empty($iverse2) || empty($ititle)) {	
			
		if(empty($iverse1)) {
			echo "<font color='red'>Verse 1 is empty.</font><br/>";
		}
		
		if(empty($ichorus)) {
			echo "<font color='red'>Chorus is empty.</font><br/>";
        }
        if(empty($iverse2)) {
			echo "<font color='red'>Verse 2 is empty.</font><br/>";
		}
		
		if(empty($ititle)) {
			echo "<font color='red'>Title is empty.</font><br/>";
		}
			
	} else {	
		//updating the table
		$sql = "UPDATE dbreformed.cusers SET verse1=:verse1, chorus=:chorus, verse2=:verse2, title=:title
         WHERE id=:id";
		$query = $conn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':verse1', $iverse1);
        $query->bindparam(':chorus', $ichorus);
        $query->bindparam(':verse2', $iverse2);
		$query->bindparam(':title', $ititle);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':verse1' => $iverse1, ':chorus' => $ichorus, ':verse2' => $iverse2, ':title' => $ititle));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM dbreformed.cusers  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$iverse1 = $row['Verse1'];
	$ichorus = $row['Chorus'];
	$iverse2 = $row['Verse2'];
	$ititle = $row['Title'];
}
?>
<html>
<head>	
	<title>Edit Composition</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="cedit.php">
		<table border="0">
			<tr> 
				<td>Verse1</td>
				<td><input type="text" name="verse1" value="<?php echo $iverse1;?>"></td>
			</tr>
			<tr> 
				<td>Chorus</td>
				<td><input type="text" name="chorus" value="<?php echo $ichorus;?>"></td>
			</tr>
            <tr> 
				<td>Verse2</td>
				<td><input type="text" name="verse2" value="<?php echo $iverse2;?>"></td>
			</tr>
            <tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $ititle;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>