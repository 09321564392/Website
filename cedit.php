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
		header("Location:login.php");
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
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
	body{
            background-color: black;
        }
        h1{
            color: white;
            margin-top: 20px;
            text-shadow: 2px 2px 10px white;
        }
        .box1{
            position: absolute;
            width: 65%;
            height: 50px;
            background-color: white;
            right: 0;
            margin-top: 22px;
            box-shadow: -5px 0px 18px white;
        }
        label{
            float: right;
            color: white;
        }
        .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
  margin:10px;
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
}
.cd1{
    height: 300px;
    position: absolute;
    margin-left: 50px;
    bottom: 0;
    margin-bottom: 30px;
}
.cd2{
    height: 200px;
    position: absolute;
    margin-right: 100px;
    bottom: 0;
    right: 0;
    margin-bottom: 100px;

}
#loading {
        -webkit-animation: rotation 2s infinite linear;
}
@-webkit-keyframes rotation {
        from {
                -webkit-transform: rotate(0deg);
        }
        to {
                -webkit-transform: rotate(359deg);
        }
}
.line{
    border-left: solid white 5px;
    margin-top: 80px;
    margin-left: 40px;
    border-radius: 50%;
    height: 420px;
    width: 420px;
    position: absolute;
}
</style>
<body>
	<a class="btn draw-border" href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="cedit.php">

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-1">
				<td>Verse1</td>
			</div>
			<div class="col-s-m-2">
				<td><input type="text" name="verse1" value="<?php echo $iverse1;?>"></td>
			</div>
			<div class="col-sm-1">
				<td>Chorus</td>
			</div>
			<div class="col-s-m-2">
				<td><input type="text" name="chorus" value="<?php echo $ichorus;?>"></td>
			</div>
			<div class="col-sm-1">
				<td>Verse2</td>
			</div>
			<div class="col-s-m-2">
				<td><input type="text" name="verse2" value="<?php echo $iverse2;?>"></td>
			</div>
		</div>	
		<br><br>
		<div class="row">
			<div class="col-sm-5">
				<td>Title</td>
			</div>
			<div class="col-sm-7">
				<td><input type="text" name="title" value="<?php echo $ititle;?>"></td>
			</div>
		</div>
		<br>
		<div class="row">
			<div align="center" class="col-sm-12">
								<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</div>
		</div>

		 <img id="loading" class="cd1" src="cd.png">
    <img id="loading" class="cd2" src="cd.png">


	</form>
</body>
</html>