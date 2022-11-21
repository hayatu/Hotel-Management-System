<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>

<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select country_id, country_name from tble_countries order by country_name ");
	$n1 = db_select_query($conn, $query1, $rs_country);
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
		
		 <form name="form1" action="room-insert.php" method="post" enctype="multipart/form-data">
            <p class="h5 text-center mb-0">Room Type or gategory Registration Form</p>
            <hr class="light-blue lighten-1 title-hr">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <div>
                        <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_type" class="active">Room Type</label>
                        <input name="room_type" type="text" id="room_type" class="form-control" placeholder="Room Type or Gategory" required>
                    </div>
                </div>
                <!--Grid column-->             
            </div>
            <!--Grid row-->
            <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit">Submit</button>
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