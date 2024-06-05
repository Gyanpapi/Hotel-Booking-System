
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>

<?php
   
   if(isset($_SESSION['adminname']))
   {
	echo "<script>window.location.href='".ADMINURL."'</script>";  //JAVASCRIPT USED KARON PHP KAJ KORTESILO NA LOCATION : .APPURL. AITA
   }

   if(isset($_POST['submit']))
  {
     if(empty($_POST['email'])  OR empty($_POST['password']))
	 {
        echo "<script>alert('one or more input are empty')</script>";
	 }
	 else{
	
		$email= $_POST['email'];
		$password=($_POST['password']);



		//validate the email with query

		$login = $conn->query("SELECT * FROM admins WHERE email='$email'"); //This part prepares the query to find the book details

        $login->execute();

		$fetch = $login->fetch(PDO::FETCH_ASSOC);
		//get the row count

		if($login->rowCount()>0)   // 1 ta row k effect korbe email er so it will return 1 
		{
			if(password_verify( $password,$fetch['mypassword']))        //verify password php 
			{
        // echo "<script> alert('logged int')</script>";
				$_SESSION['adminname']=$fetch['adminname'];
				$_SESSION['id']=$fetch['id'];

				header("location: ".ADMINURL." ");
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
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
       <?php require "../layouts/footer.php";?>