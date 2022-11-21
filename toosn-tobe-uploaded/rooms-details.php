<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);		
	require_once("common/db_func.php");
	$conn = db_connect();	
      $query1 = sprintf("select ri.room_id, ri.room_no, ri.room_status, ri.maxAdult, ri.maxChild, ri.noofBed, ri.roomDesc,ri.image_name1,ri.room_price,room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.deleteflag = 0 order by room_price");
	$n = db_select_query($conn, $query1, $rs_rooms);	
	db_close($conn);	
?>
<?php include("main-header.php"); ?>
<!-- Main Header Ends -->

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <?php include("hr-menu.php"); ?>
  </nav><!-- End Header/Navbar -->
  
<div class="container">
     
        <div class="propery-carousel-pagination carousel-pagination"></div>

<div class="my-sm-3 border p-0 bg-sec-light ">
    <div id="content">
		      <div class="row section-t3">
              <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box ">
                <h2 class="title-a p-2">Available Rooms</h2>
              </div>
			  </div>
          </div>
            </div>
			<?php
				for($i=0; $i<$n; $i++){
				?>
		<div class="d-sm-flex">
            
            <div class="bg-white p-2 border" id="hotels">
                <div class="hotel py-2 px-2 pb-4 border-bottom">
                    <div class="row">
                        <div class="col-lg-3"> <img src="https://images.unsplash.com/photo-1580835845971-a393b73bf370?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80" alt="" class="hotel-img"> </div>
                        <div class="col-lg-9">
                            <div class="d-md-flex align-items-md-center">
                                <div class="name"><?php echo $rs_rooms[$i]["room_price"]; ?> Mayflower Hibiscus Inn <span class="city">Bandra, Mumbai</span> </div>
                            </div>
                             <div class="d-flex flex-column tags pt-1">
                                <div><i class="bi bi-check-circle"></i> Fee Canellation</div>
                                <div><span class="bi bi-check-circle"></span> Express check-in</div>
                                <div><span class="bi bi-check-circle"></span> Concierge</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-1">
                        <div class="btn enquiry text-uppercase mx-2">Enquiry</div>
                        <div class="btn btn-primary text-uppercase">Book Now</div>
                    </div>
                </div>
               
            </div>
			
        </div>
		<?php
				}
				?>  
    </div>
</div>
      </div>