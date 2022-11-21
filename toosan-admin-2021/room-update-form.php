<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>

<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	
	 $query1 = sprintf("select room_type_id, room_type from room_type_info order by room_type ");
	$n1 = db_select_query($conn, $query1, $rs_roomtype);
	
	  $query2 = sprintf("select * from tble_room_info where room_id = %s", GetSQLValueString($_REQUEST["room-id"], "int") );
	$n2 = db_select_query($conn, $query2, $rs_rooms);
	 
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
		
		 <form name="form1" action="rooms-update.php" method="post" enctype="multipart/form-data">
		 <input name="room-id" type="hidden" id="room-id" value="<?php echo $rs_rooms[0]["room_id"]; ?>">
            <p class="h5 text-center mb-0">Rooms Update Form</p>
            <hr class="light-blue lighten-1 title-hr">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
				
				 <div class="col-md-4 mb-4">
				  <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_type" class="active">Room Type</label>
				<select name="room_type_id" class=" form-control">
				<option value="0" selected >Select Room Type</option>
				<?php 
				for($i=0; $i<$n1; $i++){
				?>
				<option value="<?php echo $rs_roomtype[$i]["room_type_id"]; ?>"<?php if($rs_roomtype[$i]["room_type_id"] == $rs_rooms[0]["room_type_id"]) echo " selected"; ?>><?php echo $rs_roomtype[$i]["room_type"]; ?></option>
				
				
				<?php 
				} 
				?>
				</select>
				</div>
				
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <label for="room_price " class="active">Room Price</label>
                      <input name="room_price" type="text" id="room_price" class="form-control" value="<?php echo  $rs_rooms[0]["room_price"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                        <label for="security_deposit " class="active">Security Deposit</label>
                      <input name="security_deposit" type="text" id="security_deposit" class="form-control" value="<?php echo  $rs_rooms[0]["security_deposit"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
				
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_no" class="active">Room Number</label>
						 <input name="room_no" type="text" id="room_no" class="form-control" value="<?php echo  $rs_rooms[0]["room_no"]; ?>">		
						 
                    </div>
                </div>
                <!--Grid column-->
			
                <!--Grid column-->
               <div class="col-md-4 mb-4">
			    <i class="fas fa-home prefix grey-text"></i>  
                <label for="room_status" class="active">Room Status</label>
				<select name="room_status" class=" form-control">
				<option value="0" selected >Select Room Status</option>
				<option value="available" <?php if($rs_rooms[0]["room_status"] == 'available') echo " selected"; ?>>Available</option>
				<option value="unavailable" <?php if($rs_rooms[0]["room_status"] == 'unavailable') echo " selected"; ?>>Un-available</option>
				<!--<option value="available">Available</option>
				<option value="unavailable">Un-available</option>-->
				</select>
				</div>
                <!--Grid column-->
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-user-friends prefix grey-text"></i>
                        <label for="maxAdult " class="active">Maximum Adult</label>
                      <input name="maxAdult" type="text" id="maxAdult" class="form-control" value="<?php echo  $rs_rooms[0]["maxAdult"]; ?>">						
                          
                    </div>
                </div>
                <!--Grid column-->
              <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-user-friends prefix grey-text"></i>
                        <label for="maxChild" class="active">Maximum Child</label> 
                         
						   <input name="maxChild" type="text" id="maxChild" class="form-control" value="<?php echo  $rs_rooms[0]["maxChild"]; ?>">
                    </div>
                </div>
                <!--Grid column-->
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-bed prefix grey-text"></i>
                        <label for="noofBed" class="active">Number of Beds</label> 
						 <input name="noofBed" type="text" id="noofBed" class="form-control" value="<?php echo  $rs_rooms[0]["noofBed"]; ?>">
                         
                    </div>
                </div>
                <!--Grid column-->
				 <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                          <i class="fas fa-image prefix grey-text"></i>  
                        <label for="roomDesc" class="active">Room Description</label>
                        <textarea name="roomDesc" type="text" class="form-control md-textarea" id="roomDesc" required rows="3"> <?php echo  $rs_rooms[0]["roomDesc"]; ?></textarea>
                    </div>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-bed prefix grey-text"></i>
                        <label for="image_name1" class="active">Room Photo</label> 
						<img height= "100" width="100" src="../rooms-photos/<?php echo $rs_rooms[0]["image_name1"]; ?>"/>
                          <input name="image_name1" type="file" id="image_name1" class="form-control">
                    </div>
					<p id="error1" style="display:none; color:#FF0000;">Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.</p>
					<p id="error2" style="display:none; color:#FF0000;">Maximum File Size Limit is 2MB.</p>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-image prefix grey-text"></i>
                        <label for="image_name2" class="active">Room Photo</label> 
						<img height= "100" width="100" src="../rooms-photos/<?php echo $rs_rooms[0]["image_name2"]; ?>"/>
                          <input name="image_name2" type="file" id="image_name2" class="form-control">
                    </div>
					<p id="error3" style="display:none; color:#FF0000;">Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.</p>
					<p id="error4" style="display:none; color:#FF0000;">Maximum File Size Limit is 2MB.</p>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-image prefix grey-text"></i>
                        <label for="image_name3" class="active">Room Photo</label> 
						<img height= "100" width="100" src="../rooms-photos/<?php echo $rs_rooms[0]["image_name3"]; ?>"/>
                          <input name="image_name3" type="file" id="image_name3" class="form-control">
                    </div>
					<p id="error5" style="display:none; color:#FF0000;">Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.</p>
					<p id="error6" style="display:none; color:#FF0000;">Maximum File Size Limit is 2MB.</p>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-image prefix grey-text"></i>
                        <label for="image_name4" class="active">Room Photo</label> 
						<img height= "100" width="100" src="../rooms-photos/<?php echo $rs_rooms[0]["image_name4"]; ?>"/>
                          <input name="image_name4" type="file" id="image_name4" class="form-control">
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            <div class="text-center mt-4">
                
				 <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
            </div>
			<script>
				$('input[type="submit"]').prop("enabled", true);
				var a=0;
				//binds to onchange event of your input field
				$('#image_name1').bind('change', function() {
				if ($('input:submit').attr('enabled',false)){
				$('input:submit').attr('enabled',true);
				}
				var ext = $('#image_name1').val().split('.').pop().toLowerCase();
				if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
				$('#error1').slideDown("slow");
				$('#error2').slideUp("slow");
				a=0;
				}else{
				var picsize = (this.files[0].size);
				if (picsize > 2500000){
				$('#error2').slideDown("slow");
				a=0;
				}else{
				a=1;
				$('#error2').slideUp("slow");
				}
				$('#error1').slideUp("slow");
				if (a==1){
				$('input:submit').attr('enabled',false);
				}
				}
				});
				</script>
				
				<script>
				$('input[type="submit"]').prop("enabled", true);
				var a=0;
				//binds to onchange event of your input field
				$('#image_name2').bind('change', function() {
				if ($('input:submit').attr('enabled',false)){
				$('input:submit').attr('enabled',true);
				}
				var ext = $('#image_name2').val().split('.').pop().toLowerCase();
				if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
				$('#error3').slideDown("slow");
				$('#error4').slideUp("slow");
				a=0;
				}else{
				var picsize = (this.files[0].size);
				if (picsize > 2500000){
				$('#error4').slideDown("slow");
				a=0;
				}else{
				a=1;
				$('#error4').slideUp("slow");
				}
				$('#error3').slideUp("slow");
				if (a==1){
				$('input:submit').attr('enabled',false);
				}
				}
				});
				</script>
				<script>
				$('input[type="submit"]').prop("enabled", true);
				var a=0;
				//binds to onchange event of your input field
				$('#image_name3').bind('change', function() {
				if ($('input:submit').attr('enabled',false)){
				$('input:submit').attr('enabled',true);
				}
				var ext = $('#image_name3').val().split('.').pop().toLowerCase();
				if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
				$('#error5').slideDown("slow");
				$('#error6').slideUp("slow");
				a=0;
				}else{
				var picsize = (this.files[0].size);
				if (picsize > 2500000){
				$('#error6').slideDown("slow");
				a=0;
				}else{
				a=1;
				$('#error6').slideUp("slow");
				}
				$('#error1').slideUp("slow");
				if (a==1){
				$('input:submit').attr('enabled',false);
				}
				}
				});
				</script>
				
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