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

          <script type="text/javascript">
  function check_s_cnic(val) {
    $.ajax({
      type:"POST",
      url:"check_s_cnic.php",
      data:'s_cnic'=val,
      success: function (data) {
        $("#msg").html(data);
      }
    })
  }
</script>

          <form class="form-horizontal" method="post" action="php/db.php">

          <div class="content-box-large">
              <div class="panel-body">

                <h3 class="text-muted">User Registration Panel</h3>

                <!-- input fields / Frm start here  -->

                <hr>
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label>First Name:</label>
                    <input type="text" class="form-control" placeholder="First Name" name="s_first_name" placeholder="First Name" required pattern="[a-zA-Z]+" title="only english alphabets allowed upto 60." min="2" max="60">
                  </div>

                  <div class="col-sm-3">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name" name="s_last_name" pattern="[a-zA-Z]+" title="only english alphabets allowed upto 60." min="2" max="60" required>
                  </div>
                  
                  <div class="col-sm-3">
                      <label>CNIC: XXXXX-XXXXXXX-X</label>
                    <input type="text" class="form-control" placeholder="CNIC" name="s_cnic" required maxlength="15" maxlength="17"  pattern="[0-9]{5}[\-]?[0-9]{7}[\-]?[0-9]{1}" title="use format xxxxx-xxxxxxx-x" min="17" onkeyup="check_s_cnic(this.value)">
                    <div id="msg"></div>
                  </div>
                  
                  <div class="col-sm-3">  
                    <label for="sel1">Gender</label>
                      <div class="form-group">
                        <label>Male&nbsp;&nbsp;&nbsp;<input type="radio"  name="s_gender" value="male" required></label>
                        <label>Female&nbsp;&nbsp;&nbsp;<input type="radio"   name="s_gender" value="female" required></label>
                      </div>
                    
                  </div>
                
                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-6">
                    <label for="sel1">Address</label>
                    <input type="text" class="form-control" name="s_address" placeholder="Address" required  min="7" max="100">
                </div>
                  
                  <div class="col-sm-3">
                    <label for="sel1">City</label>
                    <input type="text" class="form-control"  name="s_city" placeholder="City" required pattern="[a-zA-Z]+" min="4" max="50" title="Only English alphabets allowed.">
                  </div>

                  <div class="col-sm-3">
                      <label for="sel1">Postel Code</label>
                      <input type="text" class="form-control" name="s_postal_code" placeholder="Postel Code" required min="4" max="10" pattern="\d*">
                  </div>
                                
                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label for="sel1">Email</label>
                    <input type="email" class="form-control"  name="s_email" placeholder="Email" required min="8" max="60">
                  </div>
                  <div class="col-sm-3">
                    <label for="sel1">Phone#</label>
                    <input type="text" class="form-control" name="s_cell1" placeholder="Phone Number" required pattern="(\d{4}([\-]\d{7})?)" min="12" max="12" title="use format 03xxx-xxxxxxx">
                  </div>

                  <div class="col-sm-3">
                    <label for="sel1">Phone#(Optional)</label>
                    <input type="text" class="form-control"  name="s_cell2" placeholder="Phone Number(Optional)"  pattern="(\d{4}([\-]\d{7})?)" min="12" max="12">
                  </div>

                  <div class="col-sm-3">
                    <label for="sel1">Department / Class</label>
                    <input type="text" class="form-control" name="s_department" placeholder="Department/Class" required pattern="[A-Za-z]+" title="only English alphabets allowed.">
                  </div>
                
                </div>

                <hr>
                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10">
                  <input type="hidden" name="act" value="insert_student">
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