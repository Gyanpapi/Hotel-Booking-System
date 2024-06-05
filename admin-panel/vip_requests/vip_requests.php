
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>

<?php
   
   if(!isset($_SESSION['adminname']))
   {
	echo "<script>window.location.href='".ADMINURL."'</script>";  //JAVASCRIPT USED KARON PHP KAJ KORTESILO NA LOCATION : .APPURL. AITA
   }


   //hotels
   $hotel = $conn->query("SELECT * from requests");
   $hotel->execute();
   $allHotels=$hotel->fetchALL(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Requests</h5>
         
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">user_id</th>
                    <th scope="col">subject</th>
                    <th scope="col">message</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allHotels as $hotel): ?>
                  <tr>
                    
                    <th scope="row"><?php echo $hotel->id; ?></th>
                    <td><?php echo $hotel->user_id; ?></td>
                    <td><?php echo $hotel->subject; ?></td>
                    <td><?php echo $hotel->message; ?></td>

         
                
                  
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layouts/footer.php";?>