<?php require_once("authenticate.php");?>


<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	
	  $query2 = sprintf("select booking_id, first_name, last_name from tbl_booking_info order by booking_id ");
	$n2 = db_select_query($conn, $query2, $rs_guests);
	 
	db_close($conn);
?>
<script type="text/javascript" src="js/date-picker.min.js"></script> 



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
		<form name="form1" action="track-booking.php" method="POST" enctype="multipart/form-data">
	
	 <!--Grid row-->
            <div class="row">
			<div class="col-md-2 pt-1 p-0">
			<select name="first_name" class=" form-control">
				<option value="0" selected >Guest Fist Name</option>
				<?php 
				for($i=0; $i<$n2; $i++){
				?>
				<option value="<?php echo $rs_guests[$i]["first_name"]; ?>"><?php echo $rs_guests[$i]["first_name"]; ?></option>
				<?php 
				} 
				?>
				</select>
				</div>
				 <!--Grid column-->
				 <div class="col-md-2 pt-1 p-0">
			<select name="last_name" class=" form-control">
				<option value="0" selected >Guest Last Name</option>
				<?php 
				for($i=0; $i<$n2; $i++){
				?>
				<option value="<?php echo $rs_guests[$i]["last_name"]; ?>"><?php echo $rs_guests[$i]["last_name"]; ?></option>
				<?php 
				} 
				?>
				</select>
				</div>
				 <!--Grid column-->
				<div class="col-md-2  pt-2">
					<div>
						
						<input name="checkinDate" type="text" id="checkinndatepicker" placeholder="Chek-in date" class="form-control" required>  
					</div>
				</div>	
              <!--Grid column-->	
			   <!--Grid column-->
				<div class="col-md-3 pt-2">
					<div>
						
						<input name="checkoutDate" type="text" id="checkoutdatepicker" placeholder="Check-out date" class="form-control" required>  
					</div>
				</div>	
              <!--Grid column-->		
				<div class="col-md-3 p-0">
		<button class="btn btn-primary btn-md" type="submit">Search Booking</button>
		</div>
		</div>
		<!--Grid row-->
	</form>
	<!-- Track form -->
		
		
		<!--Grid column-->
	</div>

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


<!-- Footer -->