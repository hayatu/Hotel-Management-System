<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
    $query1 = sprintf("select ri.room_id, ri.image_name1,ri.room_price,ri.noofBed, ri.maxAdult,ri.maxChild, room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.deleteflag = 0 order by room_price");
	$n1 = db_select_query($conn, $query1, $rs_image);
	db_close($conn);
	//header("Location: register-sucess.php");
?>
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
             <!-- <div class="title-box">
                <h2 class="title-a">Available Rooms</h2>
              </div>-->
              <div class="title-link">
                <a href="#">Available Rooms
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper-container">
          <div class="swiper-wrapper">
				<?php
					for($i=0; $i<$n1; $i++){
					?>
            <div class="carousel-item-b swiper-slide">
			
              <div class="card-box-a card-shadow" style=" height:20rem">
			 
                <div class="img-box-a">
				
                 <img  src="rooms-photos/<?php echo $rs_image[$i]["image_name1"];  ?>" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href=""><?php echo $rs_image[$i]["room_type"]; ?></a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a"> <?php echo "$".$rs_image[$i]["room_price"]; ?>/Night</span>
                      </div>
                      <a href="booking.php" class="link-a">Book Now
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                       
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span><?php echo $rs_image[$i]["noofBed"]; ?></span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Maximum Adult</h4>
                          <span><?php echo $rs_image[$i]["maxAdult"]; ?></span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Maximum Children</h4>
                          <span><?php echo $rs_image[$i]["maxChild"]; ?></span>
                        </li>
                      </ul>
                    </div>
                  </div>				 
                </div>		
              </div>			  
            </div><!-- End carousel item -->
   <?php }	?> 
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>