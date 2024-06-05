
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>
<?php
   if(isset($_GET['id']))
   {
    $id=$_GET['id'];
    if(isset($_POST['submit']))
    {
      $status = $_POST['status'];
   

      if($status !== "1" && $status !== "0" ) {
        echo "<script>alert('Please select a valid status (Confirmed or Pending)');</script>";
    }
      else
    {
      $id = $_GET['id'];
      $is_vip = $_POST['status'];
      $update = $conn->prepare("UPDATE users SET is_vip = :is_vip WHERE id = :id");
      $update->execute([
          ":is_vip" => $is_vip
      ]);
  //   header("location: show-users.php");
    }
    }
    }
  
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline" >Change Status</h5>
              <form method="POST" action="status-users.php?id=<?php echo $id?>"
                <!-- Email input -->
                <select name="status" style="margin-top: 15px;" class="form-control">
    <option>Choose Status</option>
    <option value="1">1</option>
    <option value="0">0</option>
</select>
              
      
                <!-- Submit button -->
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php";?>