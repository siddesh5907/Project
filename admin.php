<html>
	<link rel="stylesheet" href="adminStyle.css" type="text/css">
	<title>Admin</title>
	<body>
		<div class="main">
			<h1>Records</h1>
				
			<?php
				// Create connection
				$conn = mysqli_connect("localhost", "root", "", "infoData");
				// Check connection
				if ($conn->connect_error)
				{
					die("Connection failed: " . $conn->connect_error);
				}
				
				//define total number of results you want per page  
				$results_per_page = 5;
				
				
				//Query to get data
				$sql = "SELECT * FROM details";
				$result = $conn->query($sql);
				
				//Get total Nummber of pages
				$number_of_result = mysqli_num_rows($result);
				$number_of_page = ceil ($number_of_result / $results_per_page);
				
				//determine which page number visitor is currently on  
				if (!isset ($_GET['page']) ) {  
					$page = 1;  
				} else {  
					$page = $_GET['page'];  
				}
				
				//determine the sql LIMIT
				$page_first_result = ($page-1) * $results_per_page;
				
				$sql = "SELECT * FROM details LIMIT " . $page_first_result .','. $results_per_page."";
				$result = $conn->query($sql);
				
				//Display				
				if ($result->num_rows > 0)
				{
					echo "<table class='tbl'><tr><th>Photo</th><th>Name</th><th>Download</th></tr>";
					
					// output data of each row
					while($row = $result->fetch_assoc())
					{
						echo "<tr><td><img src= image/".$row["photo"]." width='200' height='200' /></td><td>".$row["name"]."</td><td><a href='singleRecordPDF.php?id=".$row["id"]."'>Download</a></td></tr>";
					}
					echo "</table>";
				} 
				else
				{
					echo "0 results";
				}
				
				//display the link of the pages in URL
				echo "<div class='pageNo'>Page";				
				for($page = 1; $page<= $number_of_page; $page++)
				{  
					echo '<a href = "admin.php?page=' . $page . '">' . $page . ' </a>';  
				}
				echo "</div>";
				
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
				window.location.href = 'downloadPDF.php';
			}
		</script>
	</body>
</html>

