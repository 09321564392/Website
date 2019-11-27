<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM dbreformed.tusers ORDER BY id DESC");
?>

<html>
<head>	
	<title>List of Users</title>
</head>

<body>
<a href="index.php">Home</a> | <a href="adduser.php">ADD user</a> 
<h1>List of users by ID & Nickname</h1>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Nickname</td>
		<td>Role</td>
		<td>Update</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['nickname']."</td>";
		echo "<td>".$row['role']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[ID]\">Edit</a> | <a href=\"delete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></br>";	
	}
	?>
	</table>
</body>