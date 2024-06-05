<?php require "../layouts/header.php";?>
<?php require "../../config/config.php";?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($_POST['submit'])) {
        $delete = $_POST['delete'];
        
        if($delete !== "0" && $delete !== "1") {
            echo "<script>alert('Please select a valid status (0 or 1)');</script>";
        } else {
            try {
                // Use prepared statements to avoid SQL injection
                $stmt = $conn->prepare("DELETE FROM rooms WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                header("location: show-rooms.php");
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Delete Room</h5>
                <form method="POST" action="delete-rooms.php?id=<?php echo $id;?>">
                    <!-- Email input -->
                    <select name="delete" style="margin-top: 15px;" class="form-control">
                        <option>Choose Status</option>
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>

                    <!-- Submit button -->
                    <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary mb-4 text-center">delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php";?>




