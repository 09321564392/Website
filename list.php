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
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
	body{
		padding: 0;
		margin:0;
	}
	.bg {
  background-image: url("hs.jpg");
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
table{
	margin-left: 10px;
}
td{
	background-color: white;
	opacity: .5;
}
</style>
<body>
	<div class="bg">
<a class="btn draw-border" href="index.php">Home</a> | <a class="btn draw-border" href="adduser.php">ADD user</a> 
<h1 style="color:white;margin-left: 10px;">List of users by ID & Nickname</h1>

	<table width='80%' border=0>

	<tr bgcolor='black'>
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
	</div>
</body>