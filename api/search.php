<?php

$db = mysqli_connect("localhost","root","","uol");
   
$string = "%".$_GET['string']."%";

  $SQL = "SELECT * FROM books WHERE b_isbn LIKE '$string' OR  b_author LIKE '$string' OR b_title LIKE '$string' ";

$rs = mysqli_query($db,$SQL);
$data= array();
while($r = mysqli_fetch_assoc($rs)) {
     if($r['b_copies']==$r['issued_copies']){
		$book_id = $r['b_isbn'];
        $sql1 = "SELECT * from  borrow_book where b_isbn = '$book_id'"; 

		$res1=mysqli_query($db,$sql1);
	    
		while($r1 = mysqli_fetch_assoc($res1)) {
    		$lastdate = $r1['bb_date_returned'];
		}
		     $r['last_availbleDate']= $lastdate;

     }
    $data [] = $r;


}
echo json_encode($data);
?>