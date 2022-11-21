<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	require_once("common/recaptcha.php");
		$conn = db_connect();
      	
 if(isset($_POST['submit'])){
	 
if(checkCaptcha($_POST['g-recaptcha-response'])) {
	
	
	// select 
	 $query1 = sprintf("select  BookingNumber from tbl_booking_info where BookingNumber = '".$_POST["BookingNumber"]."'");
			$n1 = db_select_query($conn, $query1, $rs_booking);
			$reserve_id = $rs_booking[0]["BookingNumber"];
			if ($reserve_id !== $_POST["BookingNumber"] ){
			
				echo "<div class='container pt-5 mt-5'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Sorry</strong> The booking number you entered does not exist in our database.!
			</div>
		</div>";
			}
			else {
		// update 
			     $query2 = sprintf("update tbl_booking_info set status_id = 2 where booking_id  = %s",
				 GetSQLValueString($_GET["reservation_id"], "int"));
			$n2 = db_other_query($conn, $query2);			
			
echo " <div class='container pt-5 mt-5'> 	
			<div class='alert alert-success' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Your booking has been cancelled</strong>. We thank you for choosing our hotel and will wait you again in our hotel on your future trips to Turkey.
			</div>
		</div>";
}
}                 
	else {
	echo "<div class='container pt-5 mt-5'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>There was an error!</strong> while submiting your form. Please try again.
			</div>
		</div>";
	}	
		
		}
	$query3 = sprintf("select email_address,phone,address from tbl_about_info where deleteflag = 0 order by title");
	$n3 = db_select_query($conn, $query3, $rs_about);
	
db_close($conn);
	  ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-4 section-md-t3 pt-5 mt-5">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell ">
                    <div class="icon-box-title ">
                      <h4 class="icon-title">Quick Contact</h4>
                    </div>
					
                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a"><?php echo $rs_about[0]["email_address"]; ?> </span>
                      </p>
                      <p class="mb-1">Phone.
                        <span class="color-a"><?php echo $rs_about[0]["phone"]; ?></span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Find us in</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="col-sm-12">
					  <p class="mb-1">
                        <?php echo $rs_about[0]["address"]; ?>
                      </p>
            <div class="contact-map box">
              <div id="map" class="contact-map">
                <iframe src="https://maps.google.com/maps?q=Yenibosna%20Merkez,%201.%20Asena%20Sk.%20No:15%20,%2034197%20Bahcelievler%20/%20Istanbul&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Social networks</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-linkedin" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			<!-- ======= Start Reservation Form ======= -->
					
					
			  <div class="col-md-8">
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?reservation_id='
               . $_GET["reservation_id"]; ?>" role="form">
			   <input name="reservation_id" type="hidden" id="reservation_id" value="<?php echo $rs_booking[0]["reservation_id"]; ?>"/>
				
                  <div class="row">
				  <div class="icon-box-content table-cell pt-5 mt-5">
						<div class="icon-box-title">
							<h4 class="icon-title">Cancellation booking form</h4>
						</div>
					</div>
					
                  
                    <div class="col-md-6 mb-3 pt-5">
                      <div class="form-group"> 
                        <input type="text" name="BookingNumber" class="form-control form-control-lg form-control-a" placeholder="Enter reservation number" required>
                      </div>
                    </div>
					   <div class="col-md-12">
                      <div class="form-group">
					<?php include_once("common/googlecaptcha.php"); ?>
					</div>
					</div>      
					
					 <div class="col-md-12">
                      <button type="submit" name ="submit" class="btn btn-a">Cancel reservation</button>
                    </div>
                  </div>
                </form>
              </div>
			  <!-- ======= End Reservation Form ======= -->
            </div>
          </div>
        </div>
      </div>
	 
    </section><!-- End Contact Single-->
 
  </main><!-- End #main -->
 