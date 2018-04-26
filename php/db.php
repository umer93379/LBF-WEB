<?php

	if($_REQUEST['act'])
	{	
		$db=mysqli_connect("localhost","root","","uol") ;
		
		$_REQUEST['act']($db);
	}
	### Function for inserting book STARTS here
	function insert_book($db){
		$db=mysqli_connect("localhost","root","","uol") ;

		$b_isbn = $_REQUEST['b_isbn'];
		$b_title = $_REQUEST['b_title'];
		$b_author = $_REQUEST['b_author'];
		$bp_id = $_REQUEST['bp_id'];
		$b_chapters = $_REQUEST['b_chapters'];
		$b_pages = $_REQUEST['b_pages'];
		$b_copies = $_REQUEST['b_copies'];
		$b_row = $_REQUEST['b_row'];
		$b_stand = $_REQUEST['b_stand'];
		$b_shelf = $_REQUEST['b_shelf'];
		$b_publishing_year = $_REQUEST['b_publishing_year'];
		$bc_id = $_REQUEST['bc_id'];
		
		 if(!empty($_FILES['b_image']))
  {
  	$Imagename =''; 
    $path = "Images/";
    $path = $path . basename( $_FILES['b_image']['name']);
    if(move_uploaded_file($_FILES['b_image']['tmp_name'], $path)) {
     	$Imagename = basename($_FILES['b_image']['name']); 
    }
  }

		$SQL="INSERT INTO `books` (`b_isbn`, `b_title`, `b_author`, `bp_id`, `b_chapters`, `b_pages`, `b_copies`, `b_row`, `b_stand`, `b_shelf`, `b_publishing_year`, `bc_id`, `b_img`) VALUES ('$b_isbn', '$b_title', '$b_author', '$bp_id', '$b_chapters', '$b_pages', '$b_copies', '$b_row', '$b_stand', '$b_shelf', '$b_publishing_year', '$bc_id', '$Imagename')";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	$msg="Book Registered successfully.";
			header("Location:../index.php?msg=$msg");
		}
		else
		{
			$msg="Book not registered.";
			header("Location:../index.php?msg=$msg");
		}
		
	}
	### Function for inserting book ENDS here


	### Function for inserting student STARTS here
	function insert_student($db){
		$db=mysqli_connect("localhost","root","","uol") ;
		$s_cnic = $_REQUEST['s_cnic'];
		$s_first_name = $_REQUEST['s_first_name'];
		$s_last_name = $_REQUEST['s_last_name'];
		$s_address = $_REQUEST['s_address'];
		$s_city = $_REQUEST['s_city'];
		$s_postal_code = $_REQUEST['s_postal_code'];
		$s_email = $_REQUEST['s_email'];
		$s_cell1 = $_REQUEST['s_cell1'];
		$s_cell2 = $_REQUEST['s_cell2'];
		$s_department = $_REQUEST['s_department'];
		$s_gender = $_REQUEST['s_gender'];
		

		$SQL="INSERT INTO `students` (`s_cnic`, `s_first_name`, `s_last_name`, `s_address`, `s_city`, `s_postal_code`, `s_email`, `s_cell1`, `s_cell2`, `s_department`, `s_gender`) VALUES ('$s_cnic', '$s_first_name', '$s_last_name', '$s_address', '$s_city', '$s_postal_code', '$s_email', '$s_cell1', '$s_cell2', '$s_department', '$s_gender');";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	$msg="Student Registered successfully.";
			header("Location:../user_add.php?msg=$msg");
		}
		else
		{
			$msg="Student Not Registered.";
			header("Location:../user_add.php?msg=$msg");
		}
		
	}
	### Function for inserting student ENDS here

	### Function for inserting borrow book STARTS here
	function insert_borrow_book($db){
		//$db=mysqli_connect("localhost","root","","uol") ;
		$b_isbn = $_REQUEST['b_isbn'];
		$s_cnic = $_REQUEST['s_cnic'];
		$bb_date_issued = date("Y/m/d");
		//$bb_date_returned = "NULL";

		$Today=date('y:m:d');
		$NewDate=Date('y:m:d', strtotime("+12 days"));


		$bb_date_returned = $NewDate;
		
		$query= "SELECT * FROM borrow_book WHERE  s_cnic= '$s_cnic' ";
		$res=mysqli_query($db,$query);
		$count=0;
		while($r = mysqli_fetch_assoc($res)) {
    		$count += count($r['bb_id']);
		}

		
		if($count>=2){
			$msg="You already have 2 borrow books.";
			header("Location:../borrow_book.php?msg=$msg");
		}
		else{
			$SQL="INSERT INTO `borrow_book` (`bb_id`, `b_isbn`, `s_cnic`, `bb_date_issued`, `bb_date_returned`) VALUES (NULL, '$b_isbn', '$s_cnic', '$bb_date_issued', '$bb_date_returned');";

			$rs=mysqli_query($db,$SQL);

			if($rs)
			{	
				$msg="Book issued successfully.";
				$sql = "SELECT * from  borrow_book where b_isbn = '$b_isbn'"; 

				$res=mysqli_query($db,$sql);
	    		$count=0;
					while($r = mysqli_fetch_assoc($res)) {
    					$count += count($r['bb_id']);
					}
				$sql="UPDATE  books set issued_copies='$count' where b_isbn = '$b_isbn'";
				$res=mysqli_query($db,$sql);

				header("Location:../borrow_book.php?msg=$msg");
			}
			else
			{
				$msg="Book not issued.";
				header("Location:../borrow_book.php?msg=$msg");
			}
		}	
	}
	### Function for inserting borrow book ENDS here

	### Function for returning borrow book STARTS here
	function insert_return_book($db){
		//$db=mysqli_connect("localhost","root","","uol") ;
		$bb_date_returned = date("Y/m/d");
		$bb_id=$_REQUEST["bb_id"];

		$SQL="UPDATE `borrow_book` SET `bb_date_returned`='$bb_date_returned' WHERE bb_id='$bb_id'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
				$msg="Book returned successfully.";
				header("Location:../book_return.php?msg=$msg");
		}
		else
		{
			$msg="Book not returned.";
			header("Location:../book_return.php?msg=$msg");
		}
		
	}
	### Function for returning borrow book ENDS here

### Function for student fine payment STARTS here
	function update_student_fine_payment($db){
		$bb_id=$_REQUEST["bb_id"];
		
		$SQL="UPDATE `borrow_book` SET `bb_fine_status`='paid' WHERE bb_id='$bb_id'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
			$msg="Fine paid successfully.";
			header("Location:../user_fine.php?msg=$msg");
		}
		else
		{
			$msg="Book not returned.";
			header("Location:../user_fine.php?msg=$msg");
		}
		
	}
	### Function for student fine payment ENDS here


	### Function for deletion of book record STARTS here
	function delete_books_registered($db){
		$b_isbn=$_REQUEST["b_isbn"];

		$SQL="DELETE FROM `books` WHERE b_isbn='$b_isbn'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
				$msg="Book deleted successfully.";
				header("Location:../books_registered.php?msg=$msg");
		}
		else
		{
			$msg="Book not deleted.";
			header("Location:../books_registered.php?msg=$msg");
		}
		
	}
	### Function for deletion of book record ENDS here

	### Function for deletion of user record STARTS here
	function delete_students_registered($db){
		$s_cnic=$_REQUEST["s_cnic"];

		$SQL="DELETE FROM `students` WHERE s_cnic='$s_cnic'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
				$msg="Student deleted successfully.";
				header("Location:../users_registered.php?msg=$msg");
		}
		else
		{
			$msg="Student not deleted.";
			header("Location:../users_registered.php?msg=$msg");
		}
		
	}
	### Function for deletion of student record ENDS here

	### Function for updation of book record STARTS here
	function update_students_registered($db){
		$s_cnic=$_REQUEST["s_cnic"];
		$s_first_name = $_REQUEST['s_first_name'];
		$s_last_name = $_REQUEST['s_last_name'];
		$s_address = $_REQUEST['s_address'];
		$s_city = $_REQUEST['s_city'];
		$s_postal_code = $_REQUEST['s_postal_code'];
		$s_email = $_REQUEST['s_email'];
		$s_cell1 = $_REQUEST['s_cell1'];
		$s_cell2 = $_REQUEST['s_cell2'];
		$s_department = $_REQUEST['s_department'];
		$s_gender = $_REQUEST['s_gender'];

		$SQL="UPDATE `students` SET `s_first_name`='$s_first_name',`s_last_name`='$s_last_name',`s_address`='$s_address',`s_city`='$s_city',`s_postal_code`='$s_postal_code',`s_email`='$s_email',`s_cell1`='$s_cell1',`s_cell2`='$s_cell2',`s_department`='$s_department',`s_gender`='$s_gender' WHERE s_cnic='$s_cnic'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
				$msg="Student updated successfully.";
				header("Location:../update_user.php?msg=$msg");
		}
		else
		{
			$msg="Student not updated.";
			header("Location:../update_user.php?msg=$msg");
		}
		
	}
	### Function for updation of student record ENDS here

### Function for updation of book record STARTS here
	function update_book($db){
		$b_isbn = $_REQUEST['b_isbn'];
		$b_title = $_REQUEST['b_title'];
		//$b_author = $_REQUEST['b_author'];
		$b_publisher = $_REQUEST['b_publisher'];
		$b_chapters = $_REQUEST['b_chapters'];
		$b_pages = $_REQUEST['b_pages'];
		$b_copies = $_REQUEST['b_copies'];
		$b_row = $_REQUEST['b_row'];
		$b_stand = $_REQUEST['b_stand'];
		$b_shelf = $_REQUEST['b_shelf'];
		//$b_publishing_year = $_REQUEST['b_publishing_year'];
				
		$SQL="UPDATE `books` SET `b_title`='$b_title',`b_author`='$b_author',`b_chapters`='$b_chapters',`b_pages`='$b_pages',`b_copies`='$b_copies',`b_row`='$b_row',`b_stand`='$b_stand',`b_shelf`='$b_shelf' WHERE b_isbn='$b_isbn'";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	
				$msg="Book updated successfully.";
				header("Location:../books_registered.php?msg=$msg");
		}
		else
		{
			$msg="Book not updated.";
			header("Location:../books_registered.php?msg=$msg");
		}
		
	}
	### Function for updation of books record ENDS here



	### Function for inserting book category STARTS here
	function insert_book_category($db){
		$bc_name = $_REQUEST['bc_name'];
		$bc_department = $_REQUEST['bc_department'];
		$bc_description = $_REQUEST['bc_description'];

		$SQL="INSERT INTO `book_category` (`bc_id`, `bc_name`, `bc_department`, `bc_description`) VALUES (NULL, '$bc_name', '$bc_department', '$bc_description')";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	$msg="Book Category Registered successfully.";
			header("Location:../book_cat.php?msg=$msg");
		}
		else
		{
			$msg="Book not registered.";
			header("Location:../index.php?msg=$msg");
		}
		
	}
	### Function for inserting book category ENDS here

	###Function for inserting book publisher STARTS here
	function insert_book_publisher($db){
		$bp_name = $_REQUEST['bp_name'];
		$bp_contact = $_REQUEST['bp_contact'];
		$bp_email = $_REQUEST['bp_email'];
		$bp_country = $_REQUEST['bp_country'];
		$bp_postal_code = $_REQUEST['bp_postal_code'];

		$SQL="INSERT INTO `book_publisher` (`bp_id`, `bp_name`, `bp_contact`, `bp_email`, `bp_country`, `bp_postal_code`) VALUES (NULL, '$bp_name', '$bp_contact', '$bp_email', '$bp_country', '$bp_postal_code')";

		$rs=mysqli_query($db,$SQL);

		if($rs)
		{	$msg="Book Publisher Registered successfully.";
			header("Location:../publisher_reg.php?msg=$msg");
		}
		else
		{
			$msg="Book not registered.";
			header("Location:../publisher_reg.php?msg=$msg");
		}
		
	}
	### Function for inserting book publisher ENDS here


	function search_student($db){

		if(isset($_POST['submit']))
		{ 
	  

	  	} 
	  else{ 

	  	echo  "<p>Please enter a search query</p>"; 
	  	

		} 

	}



?>
