<?php session_start(); ?>
<!-- Main Header Start -->
<?php include("main-header.php");
session_start();
 ?>
<!-- Main Header Ends -->

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <?php include("hr-menu.php"); ?>
  </nav> <!-- End Header/Navbar -->
  
  <main id="main">

 <section class="section-services">
      <?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
	
if(isset($_POST["StartDate"], $_POST["EndDate"])){
		 $query1 = sprintf("select book.room_id, book.image_name1,book.image_name2,book.image_name3,book.image_name4,book.roomDesc,book.room_price,book.noofBed, book.maxAdult,book.maxChild,room_type_info.room_type "
		."from tble_room_info book "	 
		."left join room_type_info on book.room_type_id = room_type_info.room_type_id "
		."where book.room_id NOT IN (
		SELECT b.room_id FROM tbl_booking_info AS b
		WHERE (b.checkoutDate >= '".$_POST["EndDate"]."' AND b.checkinDate <= '".$_POST["StartDate"]."') OR (b.checkoutDate <= '".$_POST["EndDate"]."' AND b.checkinDate >= '".$_POST["StartDate"]."')
		) and book.deleteflag = 0 and room_status = 'available' order by room_price");
		$n1 = db_select_query($conn, $query1, $rs_rooms);
		 $_SESSION['StartDate'] = $_POST['StartDate'];
		 $_SESSION["EndDate"] = $_POST["EndDate"];
	
	db_close($conn);
	
	//header("Location: register-sucess.php");
	
?>

    <section class="room-section spad">
        <div class="container pt-5 mt-5">
            <div class="rooms-page-item">
                <div class="row">
				<?php
				for($i=0; $i<$n1; $i++){
				?>
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
							 <img  src="rooms-photos/<?php echo $rs_rooms[$i]["image_name1"]; ?>" class="img-a img-fluid" width="558" height="379">
                                <!--<img src="room/rooms-1.jpg" alt="">-->
                            </div>
                            <div class="single-room-pic">
                                <img  src="rooms-photos/<?php echo $rs_rooms[$i]["image_name2"]; ?>" class="img-a img-fluid" width="558" height="379">
                            </div>
							<div class="single-room-pic">
                                <img  src="rooms-photos/<?php echo $rs_rooms[$i]["image_name3"]; ?>" class="img-a img-fluid" width="558" height="379">
                            </div>
							<div class="single-room-pic">
                                <img  src="rooms-photos/<?php echo $rs_rooms[$i]["image_name4"]; ?>" class="img-a img-fluid" width="558" height="379">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2><?php echo $rs_rooms[$i]["room_type"]; ?></h2>
                                <div class="room-price">
                                    <span>From</span>
                                    <h5>USD <?php echo $rs_rooms[$i]["room_price"]; ?></h5>
                                    <sub>/night</sub>
                                </div>
                            </div>
							
                            <div class="room-desc">
                                <p><?php echo $rs_rooms[$i]["roomDesc"]; ?></p>
                            </div>
							<div class="room-features">
                                <div class="room-info">
                                 
                                    <span>Beds: <?php echo $rs_rooms[$i]["noofBed"]; ?></span>
                                </div>
                                <div class="room-info">
                                    
                                  <span>Maximum Adul: <?php echo $rs_rooms[$i]["maxAdult"]; ?></span>
                                </div>
                                <div class="room-info">
                                    
                                    <span>Maximum Children: <?php echo $rs_rooms[$i]["maxChild"]; ?></span>
                                </div>
                              
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>Smart TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <span>High Wi-fii</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <span>AC</span>
                                </div>
								
                               <!--<div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>--->
								
							<div class="room-info ">
								<i class="flaticon-007-swimming-pool"></i>
								<span>Pool</span>
							</div>	
								<div class="room-info last">
									<i class="flaticon-043-room-service"></i>
									<span>Room Services</span>
								</div>
								<div class="room-info">
									<i class="flaticon-016-washing-machine"></i>
									<span>Washing Machine</span>
								</div>	
                               <div class="room-info last">
									<i class="flaticon-018-iron"></i>
									<span>Iron</span>
								</div>								

                            </div>						
							
                            <button type="button" class="btn btn-b-n btn-lg p-2">
							<a href="reservation.php?room-id=<?php echo $rs_rooms[$i]["room_id"]; ?>" class="text-white">Book Now <i class="lnr lnr-arrow-right"></i></a> </button>
                        </div>
                    </div>
					<?php
				}
				}
				if ($n1==0)				
				{
				echo "<div class='container  mt-5 pt-5'> 	
				<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Sorry! </strong> there is no rooms available for the date your entered. Please try another date. <button type='button' class='btn btn-b-n btn-lg p-2'>
				<a href='booking.php' class='text-white'>Go back <i class='lnr lnr-arrow-right'></i></a> </button>
				</div>
				</div>";
				}				
				?>  
                </div>
				
            </div>
            
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

  <script src="js/jquery-3.3.1.min.js"></script>    
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </section><!-- End Services Section -->
    <!-- ======= Services Section ======= -->   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer contact">
     <?php include("footer.php"); ?>  
  </section>
  <footer>
     <?php include("sub-footer.php"); ?>  
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>