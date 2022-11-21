<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
    $query1 = sprintf("select ri.room_id, ri.image_name1,ri.image_name2,ri.image_name3,ri.roomDesc,ri.room_price,ri.noofBed, ri.maxAdult,ri.maxChild, room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.deleteflag = 0 and ri.room_status = 'available' order by room_price");
$n1 = db_select_query($conn, $query1, $rs_image);
	db_close($conn);
	//header("Location: register-sucess.php");
?>

    <section class="room-section spad">
        <div class="container p-5">
            <div class="rooms-page-item">
                <div class="row">
				<?php
				for($i=0; $i<$n1; $i++){
				?>
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
							 <img  src="rooms-photos/<?php echo $rs_image[$i]["image_name1"]; ?>" class="img-a img-fluid">
                                <!--<img src="room/rooms-1.jpg" alt="">-->
                            </div>
                            <div class="single-room-pic pt-5">
                                <img  src="rooms-photos/<?php echo $rs_image[$i]["image_name2"]; ?>" class="img-a img-fluid">
                            </div>
							<div class="single-room-pic">
                                <img  src="rooms-photos/<?php echo $rs_image[$i]["image_name3"]; ?>" class="img-a img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2><?php echo $rs_image[$i]["room_type"]; ?></h2>
                                <div class="room-price">
                                    <span>From</span>
                                    <h2>TL<?php echo $rs_image[$i]["room_price"]; ?></h2>
                                    <sub>/night</sub>
                                </div>
                            </div>
							
                            <div class="room-desc">
                                <p><?php echo $rs_image[$i]["roomDesc"]; ?></p>
                            </div>
							<div class="room-features">
                                <div class="room-info">
                                 
                                    <span>Beds: <?php echo $rs_image[$i]["noofBed"]; ?></span>
                                </div>
                                <div class="room-info">
                                    
                                  <span>Maximum Adul: <?php echo $rs_image[$i]["maxAdult"]; ?></span>
                                </div>
                                <div class="room-info">
                                    
                                    <span>Maximum Children: <?php echo $rs_image[$i]["maxAdult"]; ?></span>
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
                               <!-- <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>  -->                             

                            </div>
							
							
                            <button type="button" class="btn btn-b-n btn-lg p-2">
							<a href="#" class="text-white">Book Now <i class="lnr lnr-arrow-right"></i></a> </button>
                        </div>
                    </div>
					<?php
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