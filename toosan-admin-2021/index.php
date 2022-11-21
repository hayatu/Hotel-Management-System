<?php require_once("authenticate.php");?>
<?php include_once("main-top-header.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->
<!--<script src="js/session-timeout.js"></script>
    <script>
      sessionTimeout({
        warnAfter: 60000,
        timeOutAfter: 60000,
      });
    </script>-->
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
      $query1 = sprintf("select booking_id from  tbl_booking_info where deleteflag = 0 and status_id = 3");
	$n1 = db_select_query($conn, $query1, $new_bookings);
	
	$query2 = sprintf("select booking_id from  tbl_booking_info where deleteflag = 0 and status_id = 1");
	$n2 = db_select_query($conn, $query2, $booked_rooms);
	
	$query3 = sprintf("select booking_id from  tbl_booking_info where deleteflag = 0 and status_id = 2");
	$n3 = db_select_query($conn, $query3, $canceled_bookings);
	
	db_close($conn);
	//header("Location: register-sucess.php");
?>
<main class="pl-1 pt-1">
	<div class="container">
	<?php include("booking-track-form.php"); ?>
		<!--Section: Main panel-->
		<section class="mb-3">
			<!--Card-->
			<div class="card card-cascade narrower">         
				<!--Section: Table-->
				<section class="text-dark">
				
					<!--Top Table UI-->
					<div class="table-ui p-0 mb-0 mx-0 mb-0">
						<!--Grid row-->						
							<h6 class="font-weight-bold pl-2 pt-1">Toosan Homes Admin Dashboard (<?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"];?>)</h6>
						 <hr class="light-blue lighten-1 title-hr">
						<!--Grid row-->
					</div>
					<!--Top Table UI--> 				
				</section>
				<!--Section: Table-->			
			</div>
			<!--/.Card-->			
		</section>
		<!--Section: Main panel-->		
		<!--Section: Cascading panels-->
		<section class="mb-3">			
			<!--Grid row-->
			<div class="row">				
				<!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Rooms Section
						</div>
						<!--/.Card-->
													
							<!--Card content-->
									<div class="card" style="height:10rem">					
								<div class="list-group list-panel">
									<!--<a href="room-type-register.php" class="list-group-item d-flex justify-content-between text-info">Add Room Type
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>-->
									<a href="room_type-list.php" class="list-group-item d-flex justify-content-between text-info">Rooms Type List
									<i class="fas fa-users ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<!--<a href="room-register.php" class="list-group-item d-flex justify-content-between text-info">Add New Room
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>-->
									<a href="rooms-list.php" class="list-group-item d-flex justify-content-between text-info">Rooms List
									<i class="fas fa-users ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
						
							<!--/.Card content-->							
						
						<!--/.Card-->	
						</div>							
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Bookings Section
						</div>
						<!--/.Card-->
													
							<!--Card content-->
								<div class="card" style="height:10rem">									
								<div class="list-group list-panel">
									<a href="new-books-list.php" class="list-group-item d-flex justify-content-between text-info">New Bookings  (<?php echo $n1; ?>)
									<i class="fas fa-bed ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="books-list.php" class="list-group-item d-flex justify-content-between text-info">Bookings List (<?php echo $n2; ?>)
									<i class="fas fa-bed ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="cancelled-books-list.php" class="list-group-item d-flex justify-content-between text-info">Canceled Bookings (<?php echo $n3; ?>)
									<i class="fas fa-bed ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
							
							<!--/.Card content-->							
						</div>
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                  <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Users Section
						</div>
						<!--/.Card-->
							<!--Card content-->
							<div class="card" style="height:10rem">					
								<div class="list-group list-panel">
									<a href="user-registration-form.php" class="list-group-item d-flex justify-content-between text-info">Add User
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									<a href="users-list.php" class="list-group-item d-flex justify-content-between text-info">Users List
									<i class="fas fa-user ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>									
								</div>								
							</div>
							<!--/.Card content-->							
						
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				</div>
				<!--Grid column-->	
                 <!--Grid column-->
				<div class="col-lg-3 col-md-12 mb-4">					
					<!--Panel-->
					<div class="card">
						<div class="card-header white-text primary-color">
							Gallery Section
						</div>
						<!--/.Card-->
											
							<!--Card content-->
							<div class="card" style="height:10rem">								
								<div class="list-group list-panel">
									<a href="about-us-list.php" class="list-group-item d-flex justify-content-between text-info">Add About us
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
									
									<a href="gallery.php" class="list-group-item d-flex justify-content-between text-info">Add Photos
									<i class="fas fa-file-invoice-dollar ml-auto" data-toggle="tooltip" data-placement="top" title="Click to add user"></i></a>
								</div>								
							
							<!--/.Card content-->							
						
						<!--/.Card-->						
					</div>
					<!--Panel-->					
				
				<!--Grid column-->							
					
			</section>
			<!--Section: Cascading panels-->		
		</div>
	</div>
</main>
<!--Main layout-->

<!--/ Main layout -->
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->