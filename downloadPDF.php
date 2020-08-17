<?php
	require("lib/vendor/autoload.php");
	
	// Create connection
	$conn =  mysqli_connect("localhost", "root", "", "infoData");
	
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	$mpdf=new \Mpdf\Mpdf();
	$mpdf->AddPage('L');
	$content='<html><body><div class="main"><h1>Responses</h1>';
	$sql = "SELECT * FROM details";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		$content.=' <table><tr><th>ID</th><th>Photo</th><th>Name</th><th>Phone</th><th>Email</th><th>Gender</th><th>Address</th></tr>';
		  
		// output data of each row
		while($row = $result->fetch_assoc())
		{
			$content.=' <tr><td>'.$row["id"].'</td><td><img src= "image/'.$row["photo"].' "width="300" height="270" /></td><td>'.$row["name"].'</td><td>'.$row["phone"].'</td><td>'.$row["email"].'</td><td>'.$row["gender"].'</td><td>'.$row["address"].'</td></tr>';
		}
		$content.=' "</table>"';
	}
	else
	{
		$content.=' "0 results"';
	}
	$content.='</div></body></html>';

	$stylesheet =file_get_contents('pdfStyle.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($content,2);
	$mpdf->Output(rand(1111,9999).'downloadResponse.pdf','D');
	exit;

	$conn->close();
?>