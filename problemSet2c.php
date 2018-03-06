<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sportStoreCSS.css">

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			    <div class="navbar-header">
			    	<a href="#" class="navbar-left"><img src="sportStoreLogo.png" alt="Logo"></a>
			    </div>
			    <ul class="nav navbar-nav navbar-right" style="padding-top: 20px; padding-right: 4px;">
			      <li><a href="index.php">Home</a></li>
			      <li><a href="problemSet1a.php">Problem Set 1</a></li>
			      <li class="active"><a href="problemSet2a.php">Problem Set 2</a></li>
			      <li><a href="problemSet3a.php">Problem Set 3</a></li>
			    </ul>
			</div>
		</nav>
	</header>

	<div class="container">
		<div class="col-2">
			<div class="sidenav">
					<a href="problemSet2a.php">2a</a>
				<a href="problemSet2b.php">2b</a>
				<a href="problemSet2c.php">2c</a>
				<a href="problemSet2d.php">2d</a>
				<form method="post">
					<p>Please type the name of the supplier you wish to obtain data about</p>
					<br>
					<p>Supplier Name</p>
					<input style="color:black" type="text" name="name" placeholder="ABC Wholesalers">
					<br>
					<input style="color:lightblue;background-color: rgb(80,80,80);margin-top: 7px; " type="submit" value="Submit">
				</form>
				<p id="white">a.Customer By ID or Name</p>
				<p id="white">b.Salespeople By Name</p>
				<p id="white">c.Supplier By Name</p>
				<p id="white">d.Invoice By Invoice Number</p>
				<p style="color:white; padding-top:30px;padding-left:10px;padding-right: 10px;color:rgb(134,134,134); ">To get to the next set of problems, click the links in the top right</p>
			</div>
		</div>
		<!--php to create the table -->
		<?php 
			if (isset($_POST["name"])){
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
			  	$name = $_POST["name"];
			  	$sql = "SELECT * FROM `SUPPLIERS` WHERE NAME='$name';";
				$result = mysqli_query($conn, $sql);
			  	if (mysqli_num_rows($result) < 1) { 
				    echo'<script type="text/javascript">alert("Name not found. Try Again.")</script>'; 
				} else{
					echo"<div class='col-10'>";
					echo"<table>";
					echo"<tr>
							<td align='justify'><b>ID</b></td>
							<td align='justify'><b>NAME</b></td>
						 </tr>";

					while($row = mysqli_fetch_assoc($result)){
						echo"<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td></tr>";
					}
					echo"</div>";
				$conn->close();
				}
			} else{
			  	$name = null;
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
