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
		  				<div class="panel-body">

		  				<form class="form-horizontal" method="post" action="php/db.php" enctype="multipart/form-data">

		  					<h3 class="text-muted">Book Registration Panel</h3>

		  					<!-- input fields / Frm start here  -->

		  					<hr>

		  					<div class="form-horizontal" method="post" action="php/db.php">

		  					<div class="row">
		  						
		  						<div class="col-sm-3">
		  								<label for="b_isbn">ISBN: XXX-XX-XXXXX-XX-X</label>
										<input type="text" class="form-control" placeholder="ISBN" name="b_isbn" required maxlength="17"  pattern="(?:(?=.{17}$)97[89][ -](?:[0-9]+[ -]){2}[0-9]+[ -][0-9]|97[89][0-9]{10}|(?=.{13}$)(?:[0-9]+[ -]){2}[0-9]+[ -][0-9Xx]|[0-9]{9}[0-9Xx])" title="use format: xxx-xx-xxxxx-xx-x" size="30">
								</div>

		  						<div class="col-sm-3">
		  								<label for="b_title">Title:</label>
										<input type="text" class="form-control" name="b_title" placeholder="Title" required maxlength="60" size="30" min="2" max="100">
								</div>

		  						<div class="col-sm-3">
		  							<label for="b_author">Author</label>
									<input type="text" name="b_author" class="form-control" placeholder="Author" required maxlength="50" size="30">
								</div>
								
						<div class="col-sm-3">
							<div class="form-group">
        					<label class="control-label col-sm-4" for="bp_postal_code">Category:</label>
 
          <!-- getting registered book categories from DB -->
					          <?php
					            $SQL="SELECT * FROM book_category ";
					            $rs=mysqli_query($db,$SQL);
					          ?>
					        <select name="bc_id" required="required" class="form-control" required="required">
					             
					            <?php while($data=mysqli_fetch_assoc($rs))
					                { ?>
					                    <option value="<?php echo $data['bc_id']; ?>">
					                    <?php echo $data['bc_name']; ?>
					                    </option>
					            <?php  }?>
					        </select>  

      						</div>
						</div>


									<!-- <div class="col-sm-3">
									<div class="Publisher">
										<label for="bp_postal_code">Chose Category</label>
									    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Book Category</button>
									    <span class="caret"></span>
									    <ul class="dropdown-menu">
									      <li class="dropdown-header">< Dropdown header 1 </li>
									      	<li><a href="#">LAW</a></li>
									      	<li><a href="#">MATHEMATICS</a></li>
									      	<li><a href="#">LATRATURE</a></li>
									    </ul>
									  </div>
									</div> -->
		  						
		  					</div>

		  					<hr>
		  					<div class="row">
		  						
		  						<div class="col-sm-3">
		  								<label for="b_chapters">Total Chapters</label>
		  								<input type="number" class="form-control"  name="b_copies" placeholder="Copies" required maxlength="3" min="0" max="500" size="30">
										
								</div>
		  						
		  						<div class="col-sm-3">
		  								<label for="b_pages">Total Pages</label>
										<input type="number" class="form-control" name="b_pages" placeholder="Pages" required maxlength="4" min="0" max="100000" size="30">
									</div>

		  						<div class="col-sm-3">
		  								<label for="b_publishing_year">Publishing Date</label>
		  								<input type="date" class="form-control"  name="b_publishing_year" placeholder="Publising year" required size="30">
									</div>
								
								<!-- To do -->

								<div class="col-sm-3">
								<div class="form-group">
        							<label class="control-label col-sm-4" for="b_publisher">Publisher:</label>
        							
          <!-- getting registered book publishers from DB -->
						          	<?php
						            	$SQL="SELECT * FROM book_publisher ";
						            	$rs=mysqli_query($db,$SQL);
						          	?>
						          	<select name="bp_id" required="required" class="form-control" required="required">
						                  
						                <?php while($data=mysqli_fetch_assoc($rs))
						                   	{ ?>
						                    <option value="<?php echo $data['bp_id']; ?>">
						                        <?php echo $data['bp_name']; ?>
						                        </option>
						                <?php  }?>
						            </select>  

						        	
						      	</div>
						      </div>
			<!-- 						<div class="col-sm-3">
										<div class="Publisher">
										
										<label for="bp_postal_code">Publisher</label>
									    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">PUBLISHER
									    
									    <span class="caret"></span></button>
									    <ul class="dropdown-menu">
									      <li class="dropdown-header"> Dropdown header 1 </li>
									      	<li><a href="#">HTML</a></li>
									      	<li><a href="#">CSS</a></li>
									      	<li><a href="#">JavaScript</a></li>
									    </ul>
									  </div>
									</div> -->

								<!-- Till here -->
		  					
		  					</div>

		  					<hr>
		  					<div class="row">
		  						
		  						<div class="col-sm-3">
		  							<label for="b_copies">Total Copies</label>
									<input type="number" class="form-control"  name="b_copies" placeholder="Copies" required maxlength="3" min="0" max="500" size="30">
									</div>
		  						<div class="col-sm-3">
		  							<label for="b_row">Row No#</label>
									<input type="number" class="form-control" name="b_row" placeholder="Row" required  maxlength="3" min="0" max="10000" size="30">
									</div>

		  						<div class="col-sm-3">
		  							<label for="b_stand">Stand No#</label>
									<input type="number" class="form-control"  name="b_stand" placeholder="Stand" required maxlength="3" min="0" max="10000" size="30">
									</div>
								<div class="col-sm-3">
									<label for="b_shelf">Shelf No#</label>
									<input type="number" class="form-control" name="b_shelf" placeholder="Shelf" required maxlength="3" min="0" max="10000" size="30">
									</div>
		  					
		  					</div>
						<div class="row">
		  						
		  						<div class="col-sm-3">
		  							<label for="b_copies">Book Image</label>
									<input type="file" class="form-control"  name="b_image"  required >
									</div>
		  						
		  					</div>

		  					<hr>
		  					<div class="row">
		  						
		  						<div class="col-sm-1"></div>
		  						
		  							

		  						<div class="col-sm-10">
		  							<input type="hidden" name="act" value="insert_book">
									<button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
								</div>
								<div class="col-sm-1"></div>
		  					
		  					</div>
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