<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM dbreformed.rusers ORDER BY id DESC");
?>

<html>
<head>	
	<title>List of Recommendations</title>
</head>

<body>
<a href="index.php">Home</a> | <a href="addrecom.php">ADD Recommendations</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Recommendations</td>
		<td>Update</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Recommendations']."</td>";
		echo "<td><a href=\"redit.php?id=$row[ID]\">Edit</a> | <a href=\"rdelete.php?id=$row[ID]\" onClick=\"return confirm('Did you make sure to read all of it?')\">Read</a></td>";	
	}
	?>
	</table>
</body>