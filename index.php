<?php
 
	$db = mysqli_connect("localhost", "root", "", "infoData");
	
	
	//ATHENTICATION
	if (isset($_POST['login']))
	{
		$result = mysqli_query($db,"SELECT * FROM admin WHERE adminName='" . $_POST["adminName"] . "' and password = '". $_POST["password"]."'");
		$count  = mysqli_num_rows($result);
		if($count==0)
		{
			echo "<script>window.alert('Invalid Credentials');</script>";
		}
		else
		{
			echo "<script> window.location.href = 'admin.php';</script>";
		}
	}
	else if (count($_POST) > 0 && isset($_FILES["uploadfile"]["name"]))
	{
		// If upload button is clicked ...
		$name= $_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$gender=$_POST['gender'];
		$filename = $_FILES["uploadfile"]["name"]; 
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "image/".$filename; 

		// Get all the submitted data from the form 
		$sql = "INSERT INTO details (name, photo, phone, email, gender, address) VALUES ('$name','$filename','$phone','$email','$gender','$address')"; 

		if (mysqli_query($db, $sql))
		{
			// Move the uploaded image into the folder: image 
			if (move_uploaded_file($tempname, $folder)) 
			{ 
				echo "<script>
							window.alert('Record saved Sucessfully');
							window.location.href='index.php';</script>";
			}else{
				echo "<script>window.alert('Failed to save')</script>"; 
			} 
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	else if(count($_POST) > 0 && !isset($_POST['upload']))
	{
		echo "Error: No Image Uploaded..";
	}
	mysqli_close($db);
?>


  
<!DOCTYPE html> 
<html> 
<head> 
<title>Response</title> 
<link rel="stylesheet" type= "text/css" href ="style.css"/> 
<div class="main" id="mainDiv"> 
  <h1>Add Details</h1>
	<div class="box">
	  <form   name="responseForm" class="responseForm" method="POST" action="" enctype="multipart/form-data"> 
		NAME<input type="text" name="name"  placeholder="Name" required/>
		<br>Phone<input type="text" name="phone"  placeholder="Phone" onclick="return validateChar()" required/>
		<br>Email<input type="text" name="email"  placeholder="Email" onclick="return validateContact()" required/>
		<br>Gender:<input type="radio" name="gender" value="male" required/>Male
		<input type="radio" name="gender" value="female" required/>Female      
		<br>Address<input type="text" name="address" placeholder="Address" onclick="return ValidateEmail()" required/>
		<br>Photo<input type="file" name="uploadfile" value="" required/> 
		<br><input type="submit" name="upload"/>
	  </form> 
	</div>
</div>
<div  class="loginButton" onClick=g()>
	ADMIN LOGIN
</div>
<div id="loginBox" class="loginBox">
    <button  class="cross" onClick=r() >x</button>
    <h1>Admin Login</h1>
    <form class="login" action="" method="post">   
        <input type="text" placeholder="User Name" name="adminName"/>
        <input type="password" placeholder="Password" name="password"/><br>
        <input type="submit" value="Login" name="login"  /> 
    </form>
</div>

<script>
	//Display ADMIN Login form
    function g(){
        var w=document.getElementById("loginBox");
        w.setAttribute('class', 'logc');
    }
	//Hide ADMIN Login form
    function r(){
        var w=document.getElementById("loginBox");
		w.setAttribute('class', 'loginBox');
    }
	//Validate Phone
	function validateContact()
	{
		var nam= document.forms["responseForm"]["phone"].value;
		if(isNaN(nam))  
		{
			alert("you cannot put Alphabets ");
		}
		if(nam.length!=10)
		{
			alert("Contact should be of 10 digits");
		}
	}
	//Validate NAME
	function validateChar()  
	{
		if (!/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/g.test(document.responseForm.name.value))
		{
			alert("Name in alphabets only");
			return false;
		}	
	}
	//Validate Email	
	function ValidateEmail(mail)
	{
			 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(responseForm.email.value))
			 {
				return (true)
			 }
				alert("You have entered an invalid email address!")
				return (false)
	}
</script>   

</body> 
</html>