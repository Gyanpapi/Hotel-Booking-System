<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>
<?php
   
   if($_SESSION['id']!=$_GET['id'])
   {
    echo "<script>window.location.href='".APPURL."'</script>";
   }

   if(isset($_GET['id']))
   {

    $id= $_GET['id'];
    $bookings=$conn->query("SELECT * FROM bookings WHERE user_id='$id'");
    $bookings->execute();
    $allBookings=$bookings->fetchAll(PDO::FETCH_OBJ);
   }


?>


<div class="container">
<?php if(count($allBookings)>0):?>
<h1 class="mb-2">My Bookings</h1>

<table class="table mt-4 table-dark">

  <thead>
    <tr>
      
      <th scope="col">User Id</th>
      <th scope="col">booking_id</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">Room Name</th>
      <th scope="col">Check In</th>
      <th scope="col">Check Out</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Payment</th>
      <th scope="col">Status</th>
      <th scope="col">Cancel Booking</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allBookings as $booking):?>
     <tr>
    


      <td><?php echo $booking->user_id;?></td>
      <td><?php echo $booking->id;?></td>
      <td><?php echo $booking->hotel_name;?></td>
      <th><?php echo $booking->room_name;?></td>
      <th><?php echo $booking->check_in;?></td>
      <td><?php echo $booking->check_out;?></td>
      <td><?php echo $booking->phone_number;?></td>
      <td><?php echo $booking->payment;?></td>
      <td><?php echo $booking->status;?></td>
      <?php if($booking->status == "Confirmed"):?>
      <td><a href="refund_option.php?id=<?php echo $booking->id?>" class="btn btn-warning  text-center ">Cancel & Refund</a></td>
      
      <?php else:?>
      <td><a href="cancel_booking.php?id=<?php echo $booking->id?>" class="btn btn-warning  text-center ">Cancel</a></td>

      <?php endif;?>
     </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php else:?>
    <h1>
    <div class="alert alert-primary" role="alert">
      You Haven't made a booking yet !!!!!!!!!!!!
<div class="mt-4">
</h1>
</div></div>


<?php endif;?>
</div>

<?php require "../includes/footer.php";?>