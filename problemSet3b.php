<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sportStoreCSS.css">
	<title>The Sports Fan</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			    <div class="navbar-header">
			    	<a href="#" class="navbar-left"><img src="sportStoreLogo.png" alt="Logo"></a>
			    </div>
			    <ul class="nav navbar-nav navbar-right" style="padding-top: 20px; padding-right: 4px;">
			      <li><a href="problemSet1a.php">Problem Set 1</a></li>
			      <li ><a href="problemSet2a.php">Problem Set 2</a></li>
			      <li class="active"><a href="problemSet3a.php">Problem Set 3</a></li>
			    </ul>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="col-2">
			<div class="sidenav">
				<a href="problemSet3a.php">3a</a>
				<a href="problemSet3b.php">3b</a>
				<a href="problemSet3c.php">3c</a>
				<a href="problemSet3d.php">3d</a>
				<a href="problemSet3e.php">3e</a>

				<form method="post">

					<p style="margin-top: 80px;">Please type the name of the person and commission rate to be added to the database(commission rate should be entered as the percent [ex. 5% should be 5])</p>
					<p style="margin-bottom: 0px;">Salesperson Name</p>
					<input style="color:black" type="text" name="name" placeholder="Matt">
					<p style="margin-bottom: 0px; margin-top: 3px;">Commission Rate</p>
					<input style="color:black" type="text" name="comm_rate" placeholder="5.0">
					<input style="color:lightblue;background-color: rgb(80,80,80);margin-top: 7px; " type="submit" value="Submit">
				</form>
				<p id="white">a.Add Customer</p>
				<p id="white">b.Add Salesperson</p>
				<p id="white">c.Add Supplier</p>
				<p id="white">d.Update Customer Information</p>
				<p id="white">e.Add Item</p>
				<p style="color:white; padding-top:0px;padding-left:10px;padding-right: 10px;color:rgb(134,134,134); ">To get to the next set of problems, click the links in the top right</p>
			</div>
		</div>
		<!--php to create the table -->
		<?php 
			if (isset($_POST["name"]) && isset($_POST["comm_rate"])){
				$servername = 'localhost';
				$user = 'root';
				$pass = '';
				$db = 'the_sports_store';
				$conn = new mysqli($servername,$user, $pass, $db);

				// Check connection
				if ($conn->connect_error) {
					echo '<script language="javascript">';
					echo 'alert("DB Connection Failed:")';
					echo '</script>';
				    die("" . $conn->connect_error);
				} 
				$name = $_POST["name"];
				$comm_rate = $_POST["comm_rate"];
				$sql = "INSERT INTO `salespeople` (`ID`, `NAME`, `COMMISSION_RATE`) VALUES (NULL, '$name', '$comm_rate');";
				

				//create the record or send an error message
				if ($conn->query($sql) === TRUE) {
					echo '<script language="javascript">';
					echo 'alert("Record Created Successfully. The record added is now displayed in the table.")';
					echo '</script>';
					echo"<div class='col-10'>";
					echo"<table>";
					echo"<tr>
							<td align='justify'><b>ID</b></td>
							<td align='justify'><b>NAME</b></td>
							<td align='justify'><b>COMMISSION RATE</b></td>
						 </tr>";
					$sql_result = "SELECT * FROM `SALESPEOPLE` WHERE NAME='$name' ORDER BY ID DESC LIMIT 1;";
					$result = mysqli_query($conn, $sql_result);
					$row = mysqli_fetch_assoc($result);
					echo"<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td><td>{$row['COMMISSION_RATE']}</td></tr>";
					echo"</div>";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}
			
		?>


			</div>
		</div>
	</div>
</body>
<!--BOOTSTRAP-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
