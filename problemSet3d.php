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

					<p style="margin-top: 80px;">Please type the ID of the person you wish to add to change their data</p>
					<p style="margin-bottom: 0px;">ID</p>
					<input style="color:black" type="text" name="id" placeholder="10001">
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
				if (isset($_POST["id"])){
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
					$ID = $_POST["id"];
					
					$sql = "SELECT * FROM `customers` WHERE ID='$ID';";
					

					//display the current record, allow user input to alter it, then display new data
					if ($conn->query($sql) == TRUE) {
						echo"<div class='col-10'>";
						echo"<table>";
						echo"<tr>
								<td align='justify'><b>ID</b></td>
								<td align='justify'><b>NAME</b></td>
								<td align='justify'><b>ADDRESS</b></td>
							 </tr>";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						echo "<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td><td>{$row['ADDRESS']}</td></tr>";
						echo "</table>";
						echo "</div>";
						echo "<div class = container>";
						echo "<form method='post>'";
						echo "<p>Name</p>";
						echo "<input style='color:black; margin-left:200px;' type='text' name='id' placeholder='10001'>";
						echo "</form>";
						echo "</div>";

					$conn->close();
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
			?>
	</div>
</body>
<!--BOOTSTRAP-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
