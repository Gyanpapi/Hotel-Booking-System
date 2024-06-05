<?php require "includes/header.php"; ?>
<?php require "config/config.php";?>
<?php
    
    $users = $conn->query("SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");

	$users->execute();

	$allUsers=$users->fetchAll(PDO::FETCH_OBJ);
    // foreach($allUsers as $user):
    //   echo $user->email;
	// endforeach;

	$a= $conn->query("SELECT * FROM users WHERE username = '" . $_SESSION['id'] . "'");
	$a-> execute();
	$all=$a->fetchAll(PDO::FETCH_OBJ);
	$b="";

    foreach($all as $al):
      $a=$al->$is_vip;
	  $b=$al->$id;
	  break;
	endforeach;

    




	if(isset($_POST['submit'])) {

		$user_id = $b; // You already retrieved this from the session.
		$subject = $_POST['subject'];
		$message = $_POST['message'];
	
		// Prepare and execute the SQL statement to insert the data into the requests table.
		$insert = $conn->prepare("INSERT INTO requests (user_id, subject, message) VALUES (:user_id, :subject, :message)");
		$insert->execute([
			":user_id" => $user_id,
			":subject" => $subject,
			":message" => $message
		]);
	
		// Redirect the user to a different page after successful insertion.
	    echo "<script>window.location.href='".APPURL."'</script>";
	}
?>


  <body>
		
	
	
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Only For Vip Users</a></span> </p>
            <h1 class="mb-0 bread">Special Request</h1>
          </div>
        </div>
      </div>
    </section>
   
   	<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row no-gutters">

					<div class="col-md-12">
						<div class="wrapper">
							<div class="row no-gutters">
								<div class="col-lg-8 col-md-7 d-flex align-items-stretch">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Please submit Your Request</h3>
										<div id="form-message-warning" class="mb-4"></div> 
					      		<div id="form-message-success" class="mb-4">

					      		</div>
										<form method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
											<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="name">User ID</label>
														<input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" value="<?php echo htmlspecialchars($b); ?>" readonly>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="name">User Name</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
													</div>
												</div>
												<div class="col-md-12"> 
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="subject">Subject</label>
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" name="submit" value="submit" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

				          </div>
								</div>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>
		
<?php require "includes/footer.php"; ?>