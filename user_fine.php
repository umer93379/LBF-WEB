<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/calendar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php
  // connection to databae
  $db=mysqli_connect("localhost","root","","uol") ;
?> 
    
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

		  	<div class="content-box-large">

			  	<div class="panel-heading">
	            	<h3 class="text-muted">Fine List</h3>
	        	</div>

	        	<div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <?php
  $SQL="SELECT * FROM borrow_book WHERE bb_fine_status='unpaid' ";
  $rs=mysqli_query($db,$SQL);
?>
    <thead>
      <tr>
        <th>Book ISBN</th>
        <th>Student CNIC</th>
        <th>Fine</th>
        <th>Payment</th>
      </tr>
    </thead>
    <tbody>
    <?php while($data=mysqli_fetch_assoc($rs))
     {
      $b_isbn=$data['b_isbn'];

      // calculating fine for late book return
      $date_issued = $data['bb_date_issued'];
      $date_now=date('Y/m/d');
      $datetime1 = date_create($date_issued);
      $datetime2 = date_create($date_now);
      $interval = date_diff($datetime1, $datetime2);
      $interval= $interval->format('%R%a');
      if($interval>7){
    ?>
     <tr>
        <td><?php echo $b_isbn; ?></td>
        <td><?php echo $data['s_cnic']?></td>
        <th>
          <?php echo ($interval-7)*10; ?>
        </th>
        <td>
            <form action="php/db.php" method="POST">
              <input type="hidden" name="bb_id" value="<?php echo $data['bb_id']?>">
              <input type="hidden" name="act" value="update_student_fine_payment">
              <input type="submit" name="Paid" value="Paid">
            </form>
        </td>
      </tr>
      <?php } }?>
          </tbody>
  </table>
          </div>

	        </div>
		  </div>
		</div>
    </div>

<!--     <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/fullcalendar/fullcalendar.js"></script>
    <script src="vendors/fullcalendar/gcal.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/calendar.js"></script>
  </body>
</html>