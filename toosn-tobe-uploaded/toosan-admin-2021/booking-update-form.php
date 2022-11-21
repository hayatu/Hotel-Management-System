<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>

<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	
	 $query1 = sprintf("select room_type_id, room_type from room_type_info order by room_type ");
	$n1 = db_select_query($conn, $query1, $rs_roomtype);
	
	
	
	  $query2 = sprintf("select *  from tbl_booking_info where booking_id = %s", GetSQLValueString($_REQUEST["booking-id"], "int") );
	$n2 = db_select_query($conn, $query2, $rs_booking);
	

	$query3 = sprintf("select country_id, country_name from tble_countries order by country_name ");
	$n3 = db_select_query($conn, $query3, $rs_country);
	
	 $query4 = sprintf("select status_id, status from tbl_status_booking order by status ");
	$n4 = db_select_query($conn, $query4, $rs_status);
	 
	db_close($conn);
?>
<script type="text/javascript" src="js/date-picker.min.js"></script> 
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->

<main class="pl-1 pt-1">
	<div class="container">
		<!--Section: Main panel-->
		<section class="mb-3">
			<!--Card-->
			<div>         
				<!--Section: Table-->
				<section class="text-dark">
					
					<!--Top Table UI-->
					<div class="table-ui p-0 mb-0 mx-0 mb-0">
						<!--Grid row-->						
						<h6 class="font-weight-bold pl-2 pt-1">Admin Dashboard</h6>
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
		<!--Grid column-->     
		
		 <form name="form1" action="booking_update.php" method="post" enctype="multipart/form-data">
		 <input name="booking-id" type="hidden" id="booking-id" value="<?php echo $rs_booking[0]["booking_id"]; ?>">
            <p class="h5 text-center mb-0">Booking Update Form</p>
            <hr class="light-blue lighten-1 title-hr">
            <!--Grid row-->
            <div class="row">
			 <!--Grid column-->
			 <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-sort-numeric-up prefix grey-text"></i>  
                        <label for="noofnights" class="active">Booking Number</label>
						 <input name="BookingNumber" type="text" id="BookingNumber" class="form-control" readonly value="<?php echo  $rs_booking[0]["BookingNumber"]; ?>">		
						 
                    </div>
                </div>
				 <!--Grid column-->
				 
				 <!--Grid column-->
			 <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-moon prefix grey-text"></i>  
                        <label for="noofnights" class="active">Nights</label>
						 <input name="noofnights" type="text" id="noofnights" class="form-control" value="<?php echo  $rs_booking[0]["noofnights"]; ?>">		
						 
                    </div>
                </div>
				 <!--Grid column-->
				 
				 <!--Grid column-->
			   <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-sign-out-alt prefix grey-text"></i>  
                        <label for="checkinDate" class="active">CheckIn Date</label>
						 <input name="checkinDate" type="text" id="checkinndatepicker" class="form-control" value="<?php echo  $rs_booking[0]["checkinDate"]; ?>">		
						 
                    </div>
                </div>
				 <!--Grid column-->
				 
				 <!--Grid column-->
			   <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-outdent prefix grey-text"></i>  
                        <label for="checkoutDate" class="active">CheckOut Date</label>
						 <input name="checkoutDate" type="text" id="checkoutdatepicker" class="form-control" value="<?php echo  $rs_booking[0]["checkoutDate"]; ?>">		
						 
                    </div>
                </div>
				 <!--Grid column-->
				 
                <!--Grid column-->				
				 <div class="col-md-4 mb-4">
				  <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_type" class="active">Room Type</label>
				<select name="room_type_id" class=" form-control">
				<option value="0" selected >Select Room Type</option>
				<?php 
				for($i=0; $i<$n1; $i++){
				?>
				<option value="<?php echo $rs_roomtype[$i]["room_type_id"]; ?>"<?php if($rs_roomtype[$i]["room_type_id"] == $rs_booking[0]["room_type_id"]) echo " selected"; ?>><?php echo $rs_roomtype[$i]["room_type"]; ?></option>
				
				
				<?php 
				} 
				?>
				</select>
				</div>				
				<!--Grid column-->
				
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-user prefix grey-text"></i>
                        <label for="first_name " class="active">Client First Name</label>
                      <input name="first_name" type="text" id="first_name" class="form-control" value="<?php echo  $rs_booking[0]["first_name"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-user prefix grey-text"></i>
                        <label for="last_name " class="active">Client Last Name</label>
                      <input name="last_name" type="text" id="last_name" class="form-control" value="<?php echo  $rs_booking[0]["last_name"]; ?>">						
                          
                    </div>
                </div>
				
				
                <!--Grid column-->
				 <!--Grid column-->				
				 <div class="col-md-4 mb-4">
				  <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_type" class="active">Country</label>
				         <select name="country_id" class=" form-control" required>
							<option value="" selected >Select Country</option>
							<?php 
							for($i=0; $i<$n3; $i++){
							?>
							<option value="<?php echo $rs_country[$i]["country_id"]; ?>"<?php if($rs_country[$i]["country_id"] == $rs_booking[0]["country_id"]) echo " selected"; ?>><?php echo $rs_country[$i]["country_name"]; ?></option>
							<?php 
							} 
							?>
						</select>
				</div>
				<!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-mobile-alt prefix grey-text"></i>
                        <label for="phone_number " class="active">Phone Number</label>
                      <input name="phone_number" type="text" id="phone_number" class="form-control" value="<?php echo  $rs_booking[0]["phone_number"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label for="email " class="active">Email</label>
                      <input name="email" type="email" id="email" class="form-control" value="<?php echo  $rs_booking[0]["email"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <label for="room_price " class="active">Room Price</label>
                      <input name="room_price" type="text" id="room_price" class="form-control" value="<?php echo  $rs_booking[0]["room_price"]; ?>">						
                          
                    </div>
                </div>    
          <!--Grid column-->
          <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <label for="security_deposit " class="active">Security Deposit</label>
                      <input name="security_deposit" type="text" id="security_deposit" class="form-control" value="<?php echo  $rs_booking[0]["security_deposit"]; ?>">						
                          
                    </div>
                </div>    
          <!--Grid column-->			  
				 <div class="col-md-4 mb-4">
				  <i class="fas fa-home prefix grey-text"></i>  
                        <label for="status" class="active">Booking Status</label>
				<select name="status_id" class=" form-control">
				<option value="0" selected >Select Status</option>
				<?php 
				for($i=0; $i<$n4; $i++){
				?>
				<option value="<?php echo $rs_status[$i]["status_id"]; ?>"<?php if($rs_status[$i]["status_id"] == $rs_booking[0]["status_id"]) echo " selected"; ?>><?php echo $rs_status[$i]["status"]; ?></option>
				
				
				<?php 
				} 
				?>
				</select>
				</div>				
				<!--Grid column-->				
             
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                          <i class="fas fa-image prefix grey-text"></i>  
                        <label for="s_request" class="active">Remarks</label>
                        <textarea name="s_request" type="text" class="form-control md-textarea" id="s_request" required rows="3"> <?php echo  $rs_booking[0]["s_request"]; ?></textarea>
                    </div>
                </div>
                <!--Grid column-->
							
            </div>
            <!--Grid row-->
            <div class="text-center mt-4">
                
				 <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
            </div>
        </form>
		
		
		<!--Grid column-->
	</div>
</main>
<!--Main layout-->

<script>	
$('#checkinndatepicker').datepicker(
{		
autoclose: true,
format: 'yyyy/mm/dd',
todayHighlight: true,
});  	
$('#checkoutdatepicker').datepicker(
{		
autoclose: true,
format: 'yyyy/mm/dd',
todayHighlight: true,
});  			
</script>
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->