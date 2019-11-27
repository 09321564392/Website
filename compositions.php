<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM dbreformed.cusers ORDER BY id DESC");
?>

<html>
<head>	
	<title>Compositions</title>
</head>

<body>
<a href="index.php">Home</a> | <a href="addcomp.php">ADD Composition</a><br/><br/>
	
	<h1>Compositions</h1>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Verse1</td>
		<td>Chorus</td>
		<td>Verse2</td>
		<td>Tilte</td>
		<td>Update /Edit /Delete</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Verse1']."</td>";
        echo "<td>".$row['Chorus']."</td>";
        echo "<td>".$row['Verse2']."</td>";
		echo "<td>".$row['Title']."</td>";	
		echo "<td><a href=\"cedit.php?id=$row[ID]\">Edit</a> | <a href=\"cdelete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</body>