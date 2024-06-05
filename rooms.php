<?php require "includes/header.php"; ?>
<?php require "config/config.php";?>



<?php
   
   if(isset($_GET['id']))
   {
	$id=$_GET['id'];
	$getRooms=$conn->query("SELECT * FROM rooms where hotel_id=$id");
	$getRooms->execute();
	$getAllRooms= $getRooms->fetchAll(PDO::FETCH_OBJ);

	//for bringing the image of hotels
	$getht = $conn->query("SELECT image FROM hotels where id = $id");
    $getht->execute();
    $getAllht = $getht->fetchAll(PDO::FETCH_OBJ);
   }


?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/<?php echo $getAllht[0]->image; ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Rooms <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Apartment Room</h1>
          </div>
        </div>
      </div>
    </section>
   
    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-md-0">
				<div class="row no-gutters">
            <?php foreach($getAllRooms as $room): ?>
    			<div class="col-lg-12">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img" style="background-image: url(images/<?php echo $room->image;?>);"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">Price per night: </span> <span class="per"> <?php echo $room->price;?> dollar</span></p>
	    						<h3 class="mb-3"><a href="rooms/room-single.php?id=<?php echo $room->id;?>"><?php echo $room->name;?></a></h3>
									<ul class="list-accomodation">
	    							<li><span>Max:</span> <?php echo $room->num_persons;?> Persons</li>
	    							<li><span>Size:</span> <?php echo $room->size;?> m2</li>
	    							<li><span>View:</span> <?php echo $room->view;?></li>
	    							<li><span>Bed:</span> <?php echo $room->num_beds;?></li>
	    						</ul>
								<?php if(empty($_SESSION['email'])):?>
	    						
								
								<p class="pt-1"><a href="<?php echo APPURL;?>/rooms/room-single.php?id=<?php echo $room->id;?>" class="btn-custom px-3 py-2">Book Room<span class="icon-long-arrow-right"></span></a></p>

							<?php else:?>
								<p class="pt-1"><a href="<?php echo APPURL;?>" class="btn-custom px-3 py-2">Book Room<span class="icon-long-arrow-right"></span></a></p>

							<?php endif;?>    						</div>
    					</div>
    				</div>
    			</div>
			<?php endforeach; ?>
    		</div>
			</div>
		</section>
		
<?php require "includes/footer.php"; ?>