<?php require "../includes/header.php"; ?>
<?php require "../config/config.php";?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($_POST['submit'])) {

            try {


                 $stmt = $conn->prepare("DELETE FROM bookings WHERE id = :id");
                 $stmt->bindParam(":id", $id);
                 $stmt->execute();
 
                 echo "<script>window.location.href='".APPURL."'</script>";

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
    }
}
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Cancel</h5>
          <form method="POST" action="cancel_booking.php?id=<?php echo $id?>" 
                

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Confirm</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../includes/footer.php";?>