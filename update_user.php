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
		  	<div class="col-md-10">

<?php 
  $db=mysqli_connect("localhost","root","","uol") ;
  // getting present record of student whos data is being updated
  $s_cnic=@$_REQUEST['s_cnic'];
  $SQL="SELECT * FROM students WHERE s_cnic='$s_cnic'";
  $rs=mysqli_query($db,$SQL);  
  $data=mysqli_fetch_assoc($rs)
?>

          <form class="form-horizontal" method="post" action="php/db.php">

          <div class="content-box-large">
              <div class="panel-body">

                <h3 class="text-muted">Update User</h3>

                <!-- input fields / Frm start here  -->

                <hr>
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label for="s_first_name">First Name:</label>
                    <input type="text" class="form-control" name="s_first_name" placeholder="First Name" required pattern="[a-zA-Z]+" title="only english alphabets allowed upto 60." value="<?= $data['s_first_name'] ?>" id="s_first_name">
                  </div>

                  <div class="col-sm-3">
                      <label for="s_last_name">Last Name</label>
                      <input type="text" class="form-control"  name="s_last_name" placeholder="Last Name" pattern="[a-zA-Z]+" title="only english alphabets allowed upto 60." min="2" max="60" required id="s_last_name" value="<?= $data['s_last_name'] ?>">
                  </div>
                  
                                    
                  <div class="col-sm-3">  
                    <label for="s_gender">Gender</label>
                      <div class="form-group">

                        <label>Male&nbsp;&nbsp;&nbsp;<input type="radio"  name="s_gender" value="<?= $data['s_gender'] ?>" required id="s_gender" ></label>
                        <label>Female&nbsp;&nbsp;&nbsp;<input type="radio"   name="s_gender" value="<?= $data['s_gender'] ?>" required id="s_gender"  ></label>
                      </div>
                    
                  </div>
                
                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-6">
                    <label for="s_address">Address</label>
                    <input type="text" class="form-control" name="s_address" placeholder="Address" required  min="7" max="100" value="<?= $data['s_address'] ?>" id="s_address">
                </div>
                  
                <div class="col-sm-3">
                  <label for="s_city">City</label>
                  <input type="text" class="form-control"  name="s_city" placeholder="City" required pattern="[a-zA-Z]+" min="4" max="50" title="Only English alphabets allowed." value="<?= $data['s_city'] ?>" id="s_city">
                </div>

                  <div class="col-sm-3">
                      <label for="s_postal_code">Postel Code</label>
                      <input type="text" class="form-control" name="s_postal_code" placeholder="Postal Code" required min="4" max="10" pattern="\d*" id="s_postal_code" value="<?= $data['s_postal_code'] ?>">
                  </div>
                                
                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label for="s_email">Email</label>
                    <input type="email" class="form-control"  name="s_email" placeholder="Email" required min="8" max="60" id="s_email" value="<?= $data['s_email'] ?>">
                  </div>

                  <div class="col-sm-3">
                    <label for="s_cell1">Phone#</label>
                    <input type="text" class="form-control" name="s_cell1" placeholder="Phone Number" required pattern="(\d{4}([\-]\d{7})?)" min="12" max="12" title="use format 03xxx-xxxxxxx" id="s_cell1" value="<?= $data['s_cell1'] ?>">
                  </div>

                  <div class="col-sm-3">
                    <label for="s_cell2">Phone#(Optional)</label>
                    <input type="text" class="form-control"  name="s_cell2" placeholder="Phone Number(Optional)" pattern="(\d{4}([\-]\d{7})?)" min="12" max="12" id="s_cell2" value="<?= $data['s_cell2'] ?>">
                  </div>

                  <div class="col-sm-3">
                    <label for="s_department">Department / Class</label>
                    <input type="text" class="form-control" name="s_department" placeholder="Department/Class" required pattern="[A-Za-z]+" title="only English alphabets allowed." id="s_department" value="<?= $data['s_department'] ?>">
                  </div>
                
                </div>

                <hr>
                <div class="row">
                  
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <input type="hidden" name="s_cnic" value="<?= $data['s_cnic'] ?>">
                  <input type="hidden" name="act" value="update_students_registered">
                  <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                </div>
                <div class="col-sm-1"></div>
                
                </div>
              </form>
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

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>