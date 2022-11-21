<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();			
	 $query1 = sprintf("select * from tbl_about_info where deleteflag = 0 order by title");
	$n = db_select_query($conn, $query1, $rs_about);
	db_close($conn);
	//header("Location: register-sucess.php");
?>

 <div class="container  mt-5 pt-5">
<section class="contact bg-white  mt-5 pt-5">
  <h4>Contact Us</h4>
<div class="row">

          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p><?php echo $rs_about[0]["address"]; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><?php echo $rs_about[0]["email_address"]; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p><?php echo $rs_about[0]["phone"]; ?></p>
            </div>
          </div>

        </div>
		</section>
     </div>
	  
	  