<?php

$db = mysqli_connect("localhost","root","","uol");
   
  /*$isbn = '978-3-16-110110-2';*/

  $isbn = $_POST['isb'];
  $SQL = "SELECT b_copies FROM books WHERE b_isbn = '$isbn' ";

  $rs = mysqli_query($db,$SQL);
  
  $data = mysqli_fetch_array($rs);

  $SQL2 = "SELECT * FROM borrow_book WHERE b_isbn = '$isbn' ";

  $rs2 = mysqli_query($db,$SQL2);
  if (mysqli_num_rows($rs2) > 0){

       echo $data['b_copies']-mysqli_num_rows($rs2);
  }
  else{
  	echo $data['b_copies'];
  }

  
?>
