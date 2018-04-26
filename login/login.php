<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	
	<title>Online Travel Travel - Login</title>
	
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/theme-turqoise.css" id="template-color" />
	<link rel="stylesheet" href="css/lightslider.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto+Slab:400,700&subset=latin,latin-ext,greek-ext,greek,cyrillic,vietnamese,cyrillic-ext">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico" />
	
	
	 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!--- loading animation -->
	<div class="loading">
		<div class="ball"></div>
		<div class="ball1"></div>
	</div>
	<!--- //loading animation -->
	
	<?php include 'header.php'; ?>
	
<!--slider-->
	<div class="slider">
		<ul id="hero-gallery" class="cS-hidden">
			<li data-thumb="images/uploads/pia-img.jpg"> 
				<img src="images/uploads/pia-img.jpg" alt="" />
			</li>
			<li data-thumb="images/uploads/train.jpg"> 
				<img src="images/uploads/train.jpg" alt="" width="1920" />
			</li>
			
		</ul>
	</div>
	<!--//slider-->
	

	
	<?php include 'footer.php'; ?>
	
	<div class="lightbox" style="display:block;">
		<div class="lb-wrap">
			<a href="#" class="close">x</a>
			<div class="lb-content">
				<form class="row">
					<h3>Log in</h3>
					<div class="f-item full-width">
						<label for="email">E-mail address</label>
						<input type="email" id="email" name="email" />
					</div>
					<div class="f-item full-width">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" />
					</div>
					<div class="f-item checkbox full-width">
						<input type="checkbox" id="remember_me" name="checkbox" />
						<label for="remember_me">Remember me next time</label>
					</div>
					<div class="f-item full-width">
						<p><a href="#" title="Forgot password?">Forgot password?</a><br />
						Dont have an account yet? <a href="register.php" title="Sign up">Sign up.</a></p>
						<input type="submit" id="login" name="login" value="login" class="gradient-button" />
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.slimmenu.min.js"></script>
	<script type="text/javascript" src="js/lightslider.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">	
		$(document).ready(function(){
			$('.form').hide();
			$('.form:first').show();
			$('.f-item:first').addClass('active');
			$('.f-item:first span').addClass('checked');
			
			$('#hero-gallery').lightSlider({
                gallery:true,
                item:1,
                pager:false,
				gallery:false,
                slideMargin: 0,
                speed:2000,
				pause:6000,
				mode: 'fade',
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#hero-gallery').removeClass('cS-hidden');
                }  
            });	
		});
	</script>
</body>
</html>