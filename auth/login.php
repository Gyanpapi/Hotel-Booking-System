<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

   if(isset($_POST['submit']))
  {

	 {
	
		$email= $_POST['email'];
		$password=($_POST['password']);



		//validate the email with query

		$login = $conn->query("SELECT * FROM users WHERE email='$email'"); //This part prepares the query to find the book details

        $login->execute();

		$fetch = $login->fetch(PDO::FETCH_ASSOC);
		//get the row count

		if($login->rowCount()>0)   // 1 ta row k effect korbe email er so it will return 1 
		{
			if(password_verify( $password,$fetch['mypassword']))        //verify password php 
			{
				$_SESSION['username']=$fetch['username'];
				$_SESSION['id']=$fetch['id'];

				header("location: ".APPURL." ");
			}
			else
			{
				echo "<script>alert('email or password is wrong')</script>";
			}
		}
		else{
			echo "<script>alert('email or password is wrong')</script>";
		}
	 }
  }

?>

    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL;?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-middle" style="margin-left: 397px;">
	    		<div class="col-md-6 mt-5">
						<form action="login.php" method="POST" class="appointment-form" style="margin-top: -568px;">
							<h3 class="mb-3">Login</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					    <input type="text" name="email" class="form-control" placeholder="Email">
			    				    </div>
								</div>
                               
                                <div class="col-md-12">
									<div class="form-group">
			    					    <input type="password" name="password" class="form-control" placeholder="Password">
			    				    </div>
								</div>
								
							
							
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-4">
                                    </div>
								</div>
							</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>


<?php require "../includes/footer.php"; ?>