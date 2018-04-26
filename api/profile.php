<?php 
require "conn.php";
if (isset($_POST['email']) /*&& isset($_POST['pass'])*/) 
{
	$email = $_POST["email"];
	//$password = $_POST["pass"];
	
	$query = "SELECT * FROM students WHERE s_email = '$email'"; //AND s_pass = '$password' ";
	$result = mysqli_query($conn, $query);
	$row= mysqli_fetch_assoc($result);
		if ($result->num_rows>0 ) 
		{
			/*if (isset($_POST['mobile']) && $_POST['mobile']=="android") 
			{
				//echo "success";
				//echo "<br>";
				//exit();
				//echo "string";	
			}*/
  				$cnic = $row['s_cnic'];
  				$SQL = "SELECT * FROM borrow_book WHERE bb_date_returned='0000-00-00' AND s_cnic= '$cnic' ";
  				$rs = mysqli_query($conn,$SQL);

  					$data= array();
						while($r = mysqli_fetch_assoc($rs)) {
    					$data[] = $r;
						}
						echo json_encode($data);

  				//$data = mysqli_fetch_array($rs);
  				//echo json_encode($data);
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