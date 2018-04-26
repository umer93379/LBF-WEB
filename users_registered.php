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

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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

<?php
  // connection to databae
  $db=mysqli_connect("localhost","root","","uol") ;
?>

		  <div class="col-md-10">
		  		<!-- Start Registered users list -->
        <div class="content-box-large">	  		
          <div class="panel-heading">
          
            <div class="col-md-5">
            <h3 class="text-muted">Registered Users</h3>
            </div>
            <div class="col-md-1">
              
            <!-- <form accept="#" method="POST">
              <input type="text" name="search_student" placeholder="Search..">
            </form> -->
                        <div class="input-group form">
                          <form accept="#" method="POST">
                            <input type="text" class="form-control" name="search_student" placeholder="Search..">
                          </form>
                        </div>

            <?php

              $condition="1";
                if(@$_REQUEST['search_student'])
                  { 

                    $search_student=$_REQUEST['search_student'];
                    $condition  =" (s_first_name LIKE '%$search_student%'";
                    $condition.=" OR s_cnic LIKE '%$search_student%'";
                    $condition.=" OR s_department LIKE '%$search_student%'";
                    $condition.=" OR s_cell1 LIKE '%$search_student%')";
                  }

                $SQL="SELECT * FROM students WHERE $condition ORDER BY s_first_name";
                $rs=mysqli_query($db,$SQL);
            ?>

            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" type="button">Search</button>
            </div>

          <div class="panel-body">
<center>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>CNIC</th>
        <th>Department</th>
        <th>Books Issued</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php while($data=mysqli_fetch_assoc($rs))
     {
      $s_cnic=$data['s_cnic'];
    ?>
      <tr>
        <td><?= $data['s_first_name'] ?></td>
        <td><?= $data['s_cnic'] ?></td>
        <td><?= $data['s_department'] ?></td>
        <td>
          <!-- counting number of books which student BORROWED -->
            <?php $SQL="SELECT COUNT(*) FROM borrow_book WHERE s_cnic='$s_cnic' AND bb_date_returned='0000-00-00'; ";
            $query = mysqli_query($db, $SQL);
            $row = mysqli_fetch_array($query);
             echo  $row[0];
           ?>
        </td>
        <td>
          <button>
            <a href="update_user.php?s_cnic=<?php echo $s_cnic; ?>">Update</a>
          </button>
          
          <form action="php/db.php" method="POST">
            <input type="hidden" name="s_cnic" value="<?php echo $s_cnic; ?>">
            <input type="hidden" name="act" value="delete_students_registered">
            <input type="submit" name="Delete" value="Delete">
          </form>

        </td>
      </tr>

      <?php } ?>
    
    </tbody>
</table>
</center>
          </div>
        </div>	


		  		<!-- End Registered users list -->
		  </div>
		</div>
    </div>

   <!--  <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>
 -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
  </body>
</html>