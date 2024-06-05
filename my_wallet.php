<?php require "includes/header.php";?>
<?php require "config/config.php";?>
<?php


 $id= $_SESSION['id'];
 $user=$conn->query("SELECT balance FROM users WHERE id='$id'");
 $user->execute();
 $allUsers=$user->fetchAll(PDO::FETCH_OBJ);




?>
<div class="container d-flex justify-content-center">
  <div class="card p-4" style="width: 400px;"> <!-- Increased padding and width to make it bigger -->

    <div class="card-bottom pt-3 px-3 mb-2">
      <div class="d-flex flex-row justify-content-between text-align-center">
        <div class="d-flex flex-column"><span>Balance amount</span><p>&dollar; <span class="text-black"><?php echo $allUsers[0]->balance;?></span></p></div>

      </div>
    </div>
  </div>
</div>

<?php require "includes/footer.php";?>
