<?php 


require "conn.php";
if (isset($_POST['email']) && isset($_POST['pass'])) 
{
 
	$email = $_POST["email"];
	$password = $_POST["pass"];
	
	$query = "SELECT * FROM students WHERE BINARY s_email = '$email' AND BINARY s_pass = '$password' ";
	
	$result = mysqli_query($conn, $query);
		if ($result->num_rows>0 ) 
		{
				echo "success";
				exit();  			
		}
		else 
		{
			echo "Login fail";
			exit();
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form accept="<php $_PHP-SELF?>" method="post"  >

	<br><br><br><br>
	<input placeholder="username" type="email" name="email" value="">
	<br>
	<input placeholder="password" type="password" name="pass" value="">
	<br>
	<input type="submit" name="btnSubmit" value="Login">
	<br>
</form>

</body>
</html>