
<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php";?>
<div class="container"></div>
<?php
   
   if(!isset($_SESSION['adminname']))
   {
    	echo "<script>window.location.href='".ADMINURL."'</script>";  //JAVASCRIPT USED KARON PHP KAJ KORTESILO NA LOCATION : .APPURL. AITA
   }


   //rooms
   $book = $conn->query("SELECT * from bookings");
   $book->execute();
   $allBookings=$book->fetchALL(PDO::FETCH_OBJ);

?>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Bookings</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Booked At</th>
                                <th scope="col">PayPal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allBookings as $book) : ?>
                                <tr>
                                    <th scope="row"><?php echo $book->id; ?></th>
                                    <td><?php echo $book->user_id; ?></td>
                                    <td><?php echo $book->check_in; ?></td>
                                    <td><?php echo $book->check_out; ?></td>
                                    <td><?php echo $book->email; ?></td>
                                    <td><?php echo $book->phone_number; ?></td>
                                    <td><?php echo $book->full_name; ?></td>
                                    <td><?php echo $book->hotel_name; ?></td>
                                    <td><?php echo $book->room_name; ?></td>
                                    <td><?php echo $book->payment; ?></td>
                                    <td><?php echo $book->created_at; ?></td>
                                    <th><?php echo $book->user_pp_account; ?></th>
                                    <?php if($book->status=="Done"):?>
                                        
                                        <td><a href="status-bookings.php?id=<?php echo $book->id ?>" class="btn btn-dark  text-center "><?php echo $book->status ?></a></td>
                                    <?php elseif($book->status=="Rejected"):?>
                                        <td><a href="status-bookings.php?id=<?php echo $book->id ?>" class="btn btn-danger  text-center "><?php echo $book->status ?></a></td>
                                    <?php elseif($book->status=="Confirmed"):?>
                                        <td><a href="status-bookings.php?id=<?php echo $book->id ?>" class="btn btn-success text-center "><?php echo $book->status ?></a></td>
                                    <?php else:?>
                                        <td><a href="status-bookings.php?id=<?php echo $book->id ?>" class="btn btn-light text-center "><?php echo $book->status ?></a></td>
                                    <?php endif;?>
                                    <td><a href="delete-bookings.php?id=<?php echo $book->id ?>" class="btn btn-danger text-center ">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>