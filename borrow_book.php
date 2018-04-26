<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/buttons.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.select_search').select2();
});
</script>
  </head>
  <body>

  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Library Managment Studio</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	               
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php">Dashboard <span class="glyphicon glyphicon-dashboard"></span></a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Add New Rec
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="book_add.php"><i class="glyphicon glyphicon-book"></i>  Add Book</a></li>
                            <li><a href="user_add.php"><i class="glyphicon glyphicon-user"></i>  Add User</a></li>
              <li><a href="book_cat.php"><i class="glyphicon glyphicon-asterisk"></i> Add Category</a></li>
                            <li><a href="publisher_reg.php"><i class="glyphicon glyphicon-pencil"></i> Add Publisher</a></li>
                        </ul>
                    </li>
                    <li><a href="borrow_book.php">Borrow Book <span class="glyphicon glyphicon-hand-left"></span> </a></li>
                    <li><a href="books_registered.php">Registed Books <span class="glyphicon glyphicon-hand-left"></span> </a></li>
                    <li><a href="users_registered.php">Registered Users <span class="glyphicon glyphicon-hand-left"></span></a> </li>
                    <li><a href="book_return.php">Return Book <span class="glyphicon glyphicon-hand-left"></span></a></li>
                    <li><a href="user_fine.php">Fee & Fine <span class="glyphicon glyphicon-hand-left"></a></li>
                     
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
      </div>


		    <div class="col-md-10">
        <!-- Borrow Book Start -->
        <div class="content-box-large">
              <div class="panel-body">
                <form class="form-inline" method="POST" action="php/db.php">

                <h3 class="text-muted">Borrow Book</h3>
                    <?php 
                    if (isset($_GET['msg'])){
                    echo $_GET['msg'];
                    } 
                    ?>
                        <hr>
                        
                        <div class="row">

                          <?php

                            $db=mysqli_connect("localhost","root","","uol") ;
                            $SQL="SELECT * FROM books ";
                            $rs=mysqli_query($db,$SQL);
                          ?>
                          
                  <div class="col-sm-6">

                     <!-- <select name="b_isbn" class="select_search" required="required" required="required"> -->
                      <select class="form-control custom-select" name="b_isbn" required="required" required="required">
                  
                      <?php while($data=mysqli_fetch_assoc($rs))
                       {
                        $b_isbn=$data['b_isbn'];
                        // counting number of book copies BORROWED
                        $SQL="SELECT COUNT(*) FROM borrow_book WHERE b_isbn='$b_isbn' AND bb_date_returned='0000-00-00'; ";
                        $query = mysqli_query($db, $SQL);
                        $row = mysqli_fetch_array($query);
                         $book_issued= $row[0];
                         // getting TOTAL number of book copies
                        $SQL="SELECT * FROM books WHERE b_isbn='$b_isbn'; ";
                        $query = mysqli_query($db, $SQL);
                        $row = mysqli_fetch_array($query);
                        $book_total= $row['b_copies'];
                        // counting number of books remaining
                        $book_left=$book_total-$book_issued;
                
                    ?>
                  
                    <?php 
                      if($book_left>0){
                      ?>
                        <option value="<?php echo $b_isbn; ?>">
                          <?php echo $b_isbn; ?>
                        </option>
                    <?php } } ?>
                </select> 
                  

                  <?php
                    $db=mysqli_connect("localhost","root","","uol") ;
                    $SQL="SELECT * FROM students ";
                    $rs=mysqli_query($db,$SQL);
                  ?>

                  
                  <div class="col-sm-5">
                     
                    <!-- <select name="s_cnic" class="select_search"  required="required"> -->
                    
                    <select name="s_cnic" class="form-control custom-select"  required="required">
                  
                    <?php while($data=mysqli_fetch_assoc($rs))
                     {
                      $s_cnic=$data['s_cnic'];

                      // checking if student has permission to borrow book
                      $SQL="SELECT COUNT(*) FROM borrow_book WHERE s_cnic='$s_cnic' AND bb_date_returned='0000-00-00'; ";
                      $query = mysqli_query($db, $SQL);
                      $row = mysqli_fetch_array($query);
                       $book_borrowed=  $row[0];
                       if ($book_borrowed<2) {?>
                        <option value="<?php echo $s_cnic; ?>">
                           <?php echo $s_cnic; ?>
                        </option>
                    <?php } }?>
                      
                </select>

                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10">
                    <input type="hidden" name="act" value="insert_borrow_book">
                  <button type="Submit" class="btn btn-lg btn-block btn-primary" name="add">Submit</button>
                </div>
                <div class="col-sm-1"></div>
                
                </div>


        <!-- Borrow Book END -->


		    </div>
		</div>
  </form>
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    <script src="js/custom.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('.custom-select').select2();
});
</script>

  </body>
</html>