<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sportStoreCSS.css">
	<title>The Sports Fan</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<a href="#" class="navbar-left"><img src="sportStoreLogo.png" alt="Logo"></a>
		    </div>
		    <ul class="nav navbar-nav navbar-right" style="padding-top: 20px; padding-right: 4px;">
		      <li class="active"><a href="problemSet1a.php">Problem Set 1</a></li>
		      <li><a href="problemSet2a.php">Problem Set 2</a></li>
		      <li><a href="problemSet3a.php">Problem Set 3</a></li>
		    </ul>
		</div>
	</nav>

	<div class="container">
		<div class="sidenav">
			<a href="problemSet1a.php">1a</a>
			<a href="problemSet1b.php">1b</a>
			<a href="problemSet1c.php">1c</a>
			<a href="problemSet1d.php">1d</a>
			<p id="white">a.Customers</p>
			<p id="white">b.Salespeople</p>
			<p id="white">c.Supplies</p>
			<p id="white">d.Items with Supplier</p>
			<p style="color:white; padding-top:30px;padding-left:10px;padding-right: 10px;color:rgb(134,134,134); ">To get to the next set of problems, click the links in the top right</p>
		</div>

			<!--php to create the table -->
		<?php 
			$servername = 'localhost';
			$user = 'root';
			$pass = '';
			$db = 'the_sports_store';
			$conn = new mysqli($servername,$user, $pass, $db);

			// Check connection
			if ($conn->connect_error) {
				echo '<script language="javascript">';
				echo 'alert("Connection Failed:")';
				echo '</script>';
			    die("" . $conn->connect_error);
			} 
				
			$sql = "SELECT * FROM `SUPPLIERS`;";
			$result = mysqli_query($conn, $sql) or die("Bad Query: $sql"); 

			echo"<table>";
			echo"<tr>
					<td align='left' style='padding: 5px;'><b>ID</b></td>
					<td align='left' style='padding: 5px;'><b>NAME</b></td>
				 </tr>";

			while($row = mysqli_fetch_assoc($result)){
				echo"<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td></tr>";
			}

			$conn->close();
		?>
	
			</div>
		</div>
	</div>
</body>
<!--BOOTSTRAP-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
	

	
