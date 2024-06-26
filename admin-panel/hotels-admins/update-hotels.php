<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>
<?php
   if(isset($_GET['id']))
   {

    $id=$_GET['id'];
    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];

      if(empty($_POST['name']) OR empty($_POST['description']) OR empty($_POST['location'])) 
      {
        echo "<script>alert('Please select a valid status (0 or 1)');</script>";
     }
      else
    {
     $id=$_GET['id'];
     $name = $_POST['name'];
     $description=$_POST['description'];
     $location = $_POST['location'];
     $update=$conn->prepare("UPDATE hotels SET name=:name, description=:description, location=:location Where id=$id");
     $update->execute([
      ":name"=>$name,
      ":description"=>$description,
      ":location"=>$location
     ]);
     header("location: show-hotels.php");
    }
    }
  }

   
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
          <form method="POST" action="update-hotels.php?id=<?php echo $id?>" 
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php";?>