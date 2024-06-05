<?php require "../includes/header.php"; ?>
<?php require "../config/config.php";?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($_POST['submit'])) {

            try {

                $up = $conn->query("SELECT user_id FROM bookings where id = $id");
               $up->execute();
                $upA = $up->fetchAll(PDO::FETCH_OBJ);
                 $temp=$upA[0]->user_id;//user id
                 /////////////
                $isvip=0;
                $is=$conn->query("SELECT is_vip FROM users where id = $temp");
                $is->execute();
                $isA = $is->fetchAll(PDO::FETCH_OBJ);
                $isvip=$isA[0]->is_vip;//is vip

                 $upp = $conn->query("SELECT balance FROM users where id = $temp");
                 $upp->execute();
                  $upAA = $upp->fetchAll(PDO::FETCH_OBJ);
                   $tempp=$upAA[0]->balance;//balance of user
          
                   $uppp = $conn->query("SELECT payment FROM bookings where id = $id");
                 $uppp->execute();
                  $upAAA = $uppp->fetchAll(PDO::FETCH_OBJ);
                   $temppp=$upAAA[0]->payment;//taking the bookings payment column value
                   if($isvip==1)
                   {
                    $total=$tempp + $temppp;
                   }
                   else
                   {
                    $total=$tempp + ($temppp/2);
                   }
           
           
                   $updateUserBalance = $conn->prepare("UPDATE users SET balance = $total WHERE id = $temp");

                   $updateUserBalance->execute();

                   $dd = $conn->query("SELECT balance FROM users where id = $temp");
               $dd->execute();
                $dda = $dd->fetchAll(PDO::FETCH_OBJ);
                 $dddd=$dda[0]->balance;
   

                  

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
              <h5 class="card-title mb-5 d-inline">refund</h5>
          <form method="POST" action="refund_option.php?id=<?php echo $id?>" 
                

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../includes/footer.php";?>