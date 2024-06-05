
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>

<?php
   
   if(!isset($_SESSION['adminname']))
   {
	echo "<script>window.location.href='".ADMINURL."'</script>";  //JAVASCRIPT USED KARON PHP KAJ KORTESILO NA LOCATION : .APPURL. AITA
   }


   //hotels
   $hotel = $conn->query("SELECT * from hotels");
   $hotel->execute();
   $allHotels=$hotel->fetchALL(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Hotels</h5>
             <a  href="create-hotels.php" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">location</th>
                    <th scope="col">status value</th>
                    <th scope="col">change status</th>
                    <th scope="col">update</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allHotels as $hotel): ?>
                  <tr>
                    
                    <th scope="row"><?php echo $hotel->id; ?></th>
                    <td><?php echo $hotel->name; ?></td>
                    <td><?php echo $hotel->location; ?></td>
                    <td><?php echo $hotel->status; ?></td>

                    <td><a  href="status-hotels.php?id=<?php echo $hotel->id ?>" class="btn btn-warning text-white text-center ">status</a></td>
                    <td><a  href="update-hotels.php?id=<?php echo $hotel->id ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                
                  
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layouts/footer.php";?>