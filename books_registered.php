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
        <div class="content-box-large">
          <div class="panel-heading">
          
            <h3 class="text-muted">Registed Books</h3>

          <form accept="#" method="post">
  <input type="text" name="search_book" placeholder="Search..">
</form>
<hr/>
<?php
// searching book based on different parameters
  $db=mysqli_connect("localhost","root","","uol") ;
  $condition="1";
  if(@$_REQUEST['search_book'])
    { 

      $search_book=$_REQUEST['search_book'];
      $condition  =" (b_isbn LIKE '%$search_book%'";
      $condition.=" OR b_title LIKE '%$search_book%'";
      $condition.=" OR b_author LIKE '%$search_book%'";
      $condition.=" OR b_publishing_year LIKE '%$search_book%')";
    }
  $SQL="SELECT * FROM books WHERE $condition ORDER BY b_title";
  $rs=mysqli_query($db,$SQL);
?>
<center>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>ISBN</th>
        <th>Author</th>
        <th>Publishing Year</th>
        <th>Total Copies</th>
        <th>Issued Copies</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php while($data=mysqli_fetch_assoc($rs))
     {
      $b_isbn=$data['b_isbn'];

    ?>
     <tr>
        <td><?= $data['b_title'] ?></td>
        <td><?php echo $b_isbn; ?></td>
        <td><?= $data['b_author'] ?></td>
        <td><?= $data['b_publishing_year'] ?></td>
        <td><?= $data['b_copies'] ?></td>
        <td>
        <!-- counting number of BOOKS AVAILABLE -->  
          <?php $SQL="SELECT COUNT(*) FROM borrow_book WHERE b_isbn='$b_isbn' AND bb_date_returned='0000-00-00'; ";
            $query = mysqli_query($db, $SQL);
            $row = mysqli_fetch_array($query);
             echo  $row[0];
           ?>
          
        </td>
        <td>
          <button><a href="update_book.php?b_isbn=<?php echo $b_isbn; ?>">Update</a></button>
          <form action="php/db.php" method="POST">
            <input type="hidden" name="b_isbn" value="<?php echo $b_isbn; ?>">
            <input type="hidden" name="act" value="delete_books_registered">
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



		  </div>
		</div>
    </div>

 <!--    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer> -->

     <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

    <script src="vendors/ckeditor/ckeditor.js"></script>
    <script src="vendors/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/editors.js"></script>
  </body>
</html>