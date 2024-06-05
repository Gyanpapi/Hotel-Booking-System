<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (!isset($_SESSION['adminname'])) {
    echo "<script>window.location.href='" . ADMINURL . "/admins/login-admins.php'</script>";
}

// ... (Your PHP code remains the same) ...

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Hotels</h5>
                    <p class="card-text">Number of Hotels: <?php echo $allHotels->count_hotels; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Rooms</h5>
                    <p class="card-text">Number of Rooms: <?php echo $allRooms->count_rooms; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">Number of Admins: <?php echo $allAdmins->count_admins; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text">Number of Bookings: <?php echo $allBookings->count_bookings; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "layouts/footer.php"; ?>
