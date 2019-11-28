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
<style type="text/css">
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

		<div class="row">
			<div class="col-sm-12">
				<a class="btn draw-border" href="index.php">Home</a> | <a class="btn draw-border" href="addcomp.php">ADD Composition</a>
			</div>
		</div>

		<div class="row">
			<div align="center" class="col-sm-12">
				<h1 style="color: white">COMPOSITIONS</h1>
			</div>
		</div>


<br/><br/>
	
	

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
	</div>
</body>