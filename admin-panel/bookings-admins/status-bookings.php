
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>
<?php
   if(isset($_GET['id']))
   {
    $id=$_GET['id'];
    if(isset($_POST['submit']))
    {
      $status = $_POST['status'];
   

      if($status !== "Confirmed" && $status !== "Pending" &&  $status !== "Rejected" && $status !== "Done" ) {
        echo "<script>alert('Please select a valid status (Confirmed or Pending)');</script>";
    }
      else
    {
     $id=$_GET['id'];
     $status=$_POST['status'];
     $update=$conn->prepare("UPDATE bookings SET status =:status Where id=$id");
     $update->execute([
      ":status"=>$status
     ]);
     header("location: show-bookings.php");
    }
    }
    }
  
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Change Status</h5>
          <form method="POST" action="status-bookings.php?id=<?php echo $id?>" 
                <!-- Email input -->
                <select name="status" style="margin-top: 15px;" class="form-control">
                    <option>Choose Status</option>
                    <option value=Pending>Pending</option>
         
                    <option value=Confirmed>Confirmed</option>
                    <option value=Rejected>Rejected</option>
                    <option value=Done>Done</option>

                </select>

      
                <!-- Submit button -->
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php";?>