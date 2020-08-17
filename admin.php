<html>
	<link rel="stylesheet" href="adminStyle.css" type="text/css">
	<title>Admin</title>
	<body>
		<div class="main">
			<h1>Responses</h1>
				
			<?php
				// Create connection
				$conn = mysqli_connect("localhost", "root", "", "infoData");
				// Check connection
				if ($conn->connect_error)
				{
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = "SELECT * FROM details";
				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
					echo "<table class='tbl'><tr><th>ID</th><th>Photo</th><th>Name</th><th>Phone</th><th>Email</th><th>Gender</th><th>Address</th></tr>";
					
					// output data of each row
					while($row = $result->fetch_assoc())
					{
						echo "<tr><td>".$row["id"]."</td><td><img src= image/".$row["photo"]." width='100' height='100' /></td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["gender"]."</td><td>".$row["address"]."</td></tr>";
					}
					echo "</table>";
				} 
				else
				{
					echo "0 results";
				}
				$conn->close();
			?>
		</div>
		<div class="downloadbtn" onClick=download()>Download</div> 
		<div class= "logout" onClick=logout()>logout</div>

		<script>
			function logout(){
				window.location.href = 'index.php';
			}
			function  download(){
			  // window.alert('hhh');
				window.location.href = 'downloadPDF.php';
			}
		</script>
	</body>
</html>

