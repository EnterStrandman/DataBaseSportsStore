<?php session_start();?>
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
			    	<a href="index.php" class="navbar-left"><img src="sportStoreLogo.png" alt="Logo"></a>
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
				<br>

				

				<form method="post">
					<p style="margin-top: 70px;">Please type the ID of the person you wish to add to change their data and submit the form. After that, type the other values and resubmit.</p>
					<p style="margin-bottom: 0px;">ID</p>
					<input style="color:black;" type="text" name="id" placeholder="10001" value="">
					<input style="color:black;" type="text" name="newName" placeholder="New Name">
					<input style="color:black;" type="text" name="newAddress" placeholder="New Address">
					<input style="color:lightblue;background-color: rgb(80,80,80);margin-top: 7px; " type="submit" value="Submit">
				</form>
				<p id="white">a.Add Customer</p>
				<p id="white">b.Add Salesperson</p>
				<p id="white">c.Add Supplier</p>
				<p id="white">d.Update Customer Information</p>
				<p id="white">e.Add Item</p>
				
				
			</div>
		</div>
			<!--php to create the table -->
			<?php 		
				$servername = 'localhost';
				$user = 'root';
				$pass = '';
				$db = 'the_sports_store';
				$conn = new mysqli($servername,$user, $pass, $db);
				
				if (array_key_exists('id', $_POST) && !empty($_POST['id'])) {
					$_SESSION['ID'] = $_POST['id'];	
				}
				$id = $_SESSION['ID'];
				// Check connection
				if ($conn->connect_error) {
					echo '<script language="javascript">';
					echo 'alert("DB Connection Failed:")';
					echo '</script>';
				    die("" . $conn->connect_error);
				} 
				
				$sql = "SELECT * FROM `customers` WHERE ID='$id';";
					

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
						echo "<caption><h2>Current/Old Information</h2></caption>";
						echo "</table>";
						echo "</div>";
					}
				

					if(!empty($_POST["newName"]) && !empty($_POST["newAddress"])){
						$newName = $_POST["newName"];
						$newAddress = $_POST["newAddress"];
						$sqlChange = "UPDATE `customers` 
										SET `NAME` = '$newName', `ADDRESS` = '$newAddress' 
										WHERE `ID` = '$id';";

						if ($conn->query($sqlChange) === TRUE) {
						   	echo '<script language="javascript">';
							echo 'alert("Update Successful.")';
							echo '</script>';	
							echo"<div class='col-5'>";
							echo"<table>";
							echo"<tr>
									<td align='justify'><b>ID</b></td>
									<td align='justify'><b>NAME</b></td>
									<td align='justify'><b>ADDRESS</b></td>
								 </tr>";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							echo "<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td><td>{$row['ADDRESS']}</td></tr>";
							echo "<caption><h2>New Information</h2></caption>";
							echo "</table>";
							echo "</div>";		
						} else {
						    echo '<script language="javascript">';
							echo 'alert("Error. Update Unsucessful.")';
							echo '</script>';
						}
					}else if(!empty($_POST["newName"])){
						$newName = $_POST["newName"];
						$sqlChange = "UPDATE `customers` SET `NAME` = '$newName' WHERE `ID` =  '$id'";

						if ($conn->query($sqlChange) === TRUE) {
						   	echo '<script language="javascript">';
							echo 'alert("Update Successful.")';
							echo '</script>';	
							echo"<div class='col-5'>";
							echo"<table>";
							echo"<tr>
									<td align='justify'><b>ID</b></td>
									<td align='justify'><b>NAME</b></td>
									<td align='justify'><b>ADDRESS</b></td>
								 </tr>";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							echo "<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td><td>{$row['ADDRESS']}</td></tr>";
							echo "<caption><h2>New Information</h2></caption>";
							echo "</table>";
							echo "</div>";	
						} else {
						    echo '<script language="javascript">';
							echo 'alert("Error. Update Unsucessful.")';
							echo '</script>';
						}
					}else if(!empty($_POST["newAddress"])){
						$newAddress = $_POST["newAddress"];
						$sqlChange = "UPDATE `customers` SET `ADDRESS` = '$newAddress' WHERE `ID` =  '$id'";

						if ($conn->query($sqlChange) === TRUE) {
						   	echo '<script language="javascript">';
							echo 'alert("Update Successful.")';
							echo '</script>';	
							echo"<div class='col-5'>";
							echo"<table>";
							echo"<tr>
									<td align='justify'><b>ID</b></td>
									<td align='justify'><b>NAME</b></td>
									<td align='justify'><b>ADDRESS</b></td>
								 </tr>";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							echo "<tr><td style='padding: 10px;'>{$row['ID']}</td><td>{$row['NAME']}</td><td>{$row['ADDRESS']}</td></tr>";
							echo "<caption><h2>New Information</h2></caption>";
							echo "</table>";
							echo "</div>";
							
						} else {
							echo '<script language="javascript">';
							echo 'alert("Error. Update Unsucessful.")';
							echo '</script>';
						}
					}
					
					$conn->close();
			?>
	</div>
</body>
<!--BOOTSTRAP-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
