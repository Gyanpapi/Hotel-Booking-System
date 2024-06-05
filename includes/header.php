<?php
   session_start();
   define("APPURL","http://localhost/hotel-booking");
   $vip=0;

?>




<!DOCTYPE html>
<html lang="en">
  <head>
	
    <title>Hotel Sheratonn - Free Bootstrap 4 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo APPURL;?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?php echo APPURL;?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo APPURL;?>/css/style.css">
  </head>
  <body>

		<div class="wrap">
			<div class="container">
				<div class="row justify-content-between">
						<div class="col d-flex align-items-center">
							<p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+00 1234 567</a> or <span class="mailus">email us:</span> <a href="#">emailsample@email.com</a></p>
						</div>
						<div class="col d-flex justify-content-end">
							<div class="social-media">
				    		<p class="mb-0 d-flex">
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
				    		</p>
			        </div>
						</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	

		

	    	<a class="navbar-brand" href="<?php echo APPURL;?>">Hotel<span> Sheraton</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>

		  
		  
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				
	        	<li class="nav-item"><a href="<?php echo APPURL;?>/index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?php echo APPURL;?>/about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="<?php echo APPURL;?>/services.php" class="nav-link">Services</a></li>

	          <li class="nav-item"><a href="<?php echo APPURL;?>/contact.php" class="nav-link">Contact</a></li>
			  <?php if(!isset($_SESSION['username'])) :?>
	            <li class="nav-item"><a href="<?php echo APPURL;?>/auth/login.php" class="nav-link">Login</a></li>
	            <li class="nav-item"><a href="<?php echo APPURL;?>/auth/register.php" class="nav-link">Register</a></li>
			  <?php else: ?>
			  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	
				    <?php 
                    // Retrieve the user's is_vip value from the database      ///// this code is for identifying vip user's
                    $userIdentifier = $_SESSION['username'];
					define("HOsST","localhost");
					//dbname
					define("DBsNAME","hotel-booking");
					//user 
					define("USsER","root");
					//password
					define("PAsSS","");
					
					$conn = new PDO("mysql:host=".HOsST.";dbname=".DBsNAME."",USsER,PAsSS);
					$conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              
                    $stmt = $conn->query("SELECT * FROM users WHERE username = '$userIdentifier'");
      
                    $stmt->execute();
                    $fetch =$stmt->fetch(PDO::FETCH_OBJ);
					$isVip = $fetch->is_vip;
                     $vip=$isVip;
                    if ($isVip == 1) {
						echo '<span style="color: black; text-shadow: 1px 2px 1px rgba(1, 1, 0, 0); font-weight: bold;">VIP : </span><span style="color: red; text-shadow: 1px 2px 1px rgba(1, 1, 0, 0); font-weight: bold;">' . $_SESSION['username'] . '</span>';
                    } else {
                        echo "" . $_SESSION['username'];
                    }
                   ?>
                </a>
			
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					     <?php if($vip==1):?>
                         <li><a class="dropdown-item" href="<?php echo APPURL;?>/demo1.php">Special Request</a></li>
						 <?php endif;?>
                         <li><a class="dropdown-item" href="<?php echo APPURL;?>/users/bookings.php?id=<?php echo $_SESSION['id']?>">My Bookings</a></li>
						 <li><a class="dropdown-item" href="<?php echo APPURL;?>/my_wallet.php">My Wallet</a></li>
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item" href="<?php echo APPURL;?>/auth/logout.php">Logout</a></li>
                    </ul>
                </li>
				<?php endif; ?>
	        </ul>
		
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->