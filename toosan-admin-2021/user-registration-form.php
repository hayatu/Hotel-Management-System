<?php require_once("authenticate.php");?>
<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select C_CODE, C_SHORT_NAME_ENG from countries order by C_SHORT_NAME_ENG ");
	$n1 = db_select_query($conn, $query1, $rs_country);
	db_close($conn);
?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->
<main class="pl-1 pt-1">
	<div class="container">
		<!--Section: Main panel-->
		<section class="mb-3">
			<!--Card-->
			<div class="card card-cascade narrower">         
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
		
		<!--Card-->
		<div class="card card-cascade narrower">        
			
			<!--Card content-->
			<div class="card-body">
				<!-- Register form -->
				<form name="form1" action="user_insert.php" method="post" enctype="multipart/form-data">
					<p class="h5 text-center mb-0">User Registration Form</p>
					<hr class="light-blue lighten-1 title-hr">
					<div class="md-form">					
					<input name="is_enabled" type="hidden" id="is_enabled" value="1"/>
						<i class="fas fa-user prefix grey-text"></i>
						<input name="first_name" type="text" id="first_name" class="form-control" placeholder="First Name" required>               
					</div>	
					<div class="md-form">					
					<input name="is_enabled" type="hidden" id="is_enabled" value="1"/>
						<i class="fas fa-user prefix grey-text"></i>
						<input name="last_name" type="text" id="last_name" class="form-control" placeholder="Last Name" required>               
					</div>	
					
					<div class="md-form">					
					<input name="is_enabled" type="hidden" id="is_enabled" value="1"/>
						<i class="fas fa-user prefix grey-text"></i>
						<input name="U_USERNAME" type="text" id="U_USERNAME" class="form-control" placeholder="User Name" required>               
					</div>	
					
                   <div class="md-form">					
					<input name="is_enabled" type="hidden" id="is_enabled" value="1"/>
						<i class="fas fa-key prefix grey-text"></i>
						<input name="U_PASSWORD" type="password" id="U_PASSWORD" class="form-control" placeholder="Password" required>               
					</div>
					
                   						
					
					<div class="md-form">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input  name="email" type="email" id="email" class="form-control" placeholder="Email Address" required>                 
					</div>
									
					<div class="md-form">
						<i class="fas fa-phone-volume prefix grey-text"></i>
						<input name="mobile" type="text" id="mobile" class="form-control" placeholder="TeleMobile phone" required>               
					</div>				
							
					
					<div class="md-form">
						<i class="fas fa-address-card prefix grey-text"></i>
						<textarea name="address" type="text" class="form-control" id="address" placeholder="Address" required rows="3"></textarea>                        
					</div>
					
					<div class="text-center mt-4">
						<!--<button class="btn btn-primary" type="submit">Submit</button>-->
						<input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
					</div>	
					
				</form>
				<!-- Register form -->
			</div>
		</div>
		<!--/.Card-->
		<!--Grid column-->
	</div>
</main>
<!--Main layout-->

<!--/ Main layout -->
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->