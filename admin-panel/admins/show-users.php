
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>

<?php
   
   if(!isset($_SESSION['adminname']))
   {
	    echo "<script>window.location.href='".ADMINURL."'</script>";  //JAVASCRIPT USED KARON PHP KAJ KORTESILO NA LOCATION : .APPURL. AITA

   }

   $users  = $conn->query("SELECT * FROM users");
   $users->execute();
   $allUsers=$users->fetchAll(PDO::FETCH_OBJ);
?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Users</h5>
    
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">user_id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">paypal account</th>
                    <th scope="col">is_vip</th>
                    <th scope="col">change is_vip</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allUsers as $user):?>
                  <tr>
                    <th scope="row"><?php echo $user->id ; ?></th>
                    <td><?php echo $user->username ; ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->pp_account ?></td>
                    <td><?php echo $user->is_vip ?></td>
                    <td><a  href="status-users.php?id=<?php echo $user->is_vip ?>" class="btn btn-warning text-white text-center ">status</a></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php";?>