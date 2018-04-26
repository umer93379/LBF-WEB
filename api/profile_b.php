<?php 


require "conn.php";
if (isset($_GET['email']))// && isset($_POST['pass'])) 
{
	$email = $_GET["email"];
	//$password = $_POST["pass"];
	
	$query = "SELECT * FROM students WHERE s_email = '$email' "; //AND s_pass = '$password' ";
	
	$result = mysqli_query($conn, $query);
	$row= mysqli_fetch_assoc($result);
		if ($result->num_rows>0 ) 
		{

  			$cnic = $row['s_cnic'];
  			$SQL = "SELECT * FROM borrow_book WHERE  s_cnic= '$cnic' ";//bb_date_returned='0000-00-00' AND
  		
  				$rs = mysqli_query($conn,$SQL);
  					$data= array();
						while($r = mysqli_fetch_assoc($rs)) {
					$today =time();
					$newformat =strtotime($r['bb_date_returned']);

					if($today > $newformat){
							$days=ceil((time()-$newformat)/60/60/24);
							$r['status']='fine';
							
							$r['fine']= $days*100;
							$r['difference']= $days;
							}
							else{
                                $days=ceil(($newformat-time())/60/60/24);
							$r['status']='no fine';
							$r['difference']= $days;
							}
    					$data[] = $r;
						}
						echo json_encode($data);
				exit();  			
		}
		else 
		{
			echo "Login fail";
			exit();
		}

}

?>