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
  $b_isbn=@$_REQUEST['b_isbn'];
  $SQL="SELECT * FROM books WHERE b_isbn='$b_isbn'";
  $rs=mysqli_query($db,$SQL);  
  $data=mysqli_fetch_assoc($rs)
?>

          <form class="form-horizontal" method="post" action="php/db.php">

          <div class="content-box-large">
              <div class="panel-body">

                <h3 class="text-muted">Update Book</h3>

                <!-- input fields / Frm start here  -->

                <hr>
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label for="s_first_name">Title</label>
                    <input type="text" class="form-control" name="b_title" placeholder="Title" required maxlength="60" size="30" min="2" max="100" id="b_title" value="<?= $data['b_title'] ?>">
                  </div>
                 
                  <div class="col-sm-3">
                  <label for="s_city">Chapters</label>
                  <input type="number" class="form-control"  name="b_chapters" placeholder="Chapters" required maxlength="3" min="0" max="100" size="30" id="b_chapters" value="<?= $data['b_chapters'] ?>">
                </div>
                <div class="col-sm-3">
                      <label for="s_postal_code">Pages:</label>
                     <input type="number" class="form-control" name="b_pages" placeholder="Pages" required maxlength="4" min="0" max="100000" size="30" id="<?= $data['b_pages'] ?>" value="<?= $data['b_pages'] ?>">
                  </div>

                </div>
                  
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label for="s_email">Copies:</label>
                    <input type="number" class="form-control"  name="b_copies" placeholder="Copies" required maxlength="3" min="0" max="500" size="30" id="b_copies" value="<?= $data['b_copies'] ?>">
                  </div>
               
                  <div class="col-sm-3">
                    <label for="s_cell1">Row:</label>
                    <input type="number" class="form-control" name="b_row" placeholder="Row" required  maxlength="3" min="0" max="10000" size="30" id="b_row" value="<?= $data['b_row'] ?>">
                  </div>

                  <div class="col-sm-3">
                    <label for="s_cell2">Stand:</label>
                    <input type="number" class="form-control"  name="b_stand" placeholder="Stand" required maxlength="3" min="0" max="10000" size="30" id="b_stand" value="<?= $data['b_stand'] ?>">
                  </div>
                  
                  <div class="col-sm-3">
                    <label for="s_department">Shelf:</label>
                    <input type="number" class="form-control" name="b_shelf" placeholder="Shelf" required maxlength="3" min="0" max="10000" size="30" id="b_shelf" value="<?= $data['b_shelf'] ?>">
                  </div>
                
                </div>

                <hr>
                <div class="row">
                  
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <input type="hidden" name="s_cnic" value="<?= $data['b_isbn'] ?>">
                  <input type="hidden" name="act" value="update_book">
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