<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("authenticate.php");	
	require_once("common/db_func.php");
	$conn = db_connect();

	$query = sprintf("select * from tbl_user_info where id = %s", GetSQLValueString($_REQUEST["user-id"], "int") );
	$n = db_select_query($conn, $query, $rs_user_info);
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
				<form name="form1" action="user_update.php" method="post" enctype="multipart/form-data">
					<input name="id" type="hidden" id="id" value="<?php echo $rs_user_info[0]["id"]; ?>">
					<p class="h5 text-center mb-0">User Update Form</p>
					<hr class="light-blue lighten-1 title-hr">
					<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="first_name" type="text" id="first_name" class="form-control"  value="<?php echo  $rs_user_info[0]["first_name"]; ?>">               
					</div>		
					<div class="md-form">						
						<i class="fas fa-university prefix grey-text"></i>
						<input name="last_name" type="text" id="last_name" class="form-control"  value="<?php echo  $rs_user_info[0]["last_name"]; ?>">               
					</div>	
					<div class="md-form">						
						<i class="fas fa-user prefix grey-text"></i>
						<input name="U_USERNAME" type="text" id="U_USERNAME" class="form-control"  value="<?php echo  $rs_user_info[0]["U_USERNAME"]; ?>">               
					</div>						
                
					<div class="md-form">						
						<i class="fas fa-phone-volume prefix grey-text"></i>
						<input name="mobile" type="text" id="mobile" class="form-control"  value="<?php echo  $rs_user_info[0]["mobile"]; ?>">               
					</div>						
									
					
					<div class="md-form">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input  name="email" type="email" id="email" class="form-control" value="<?php echo  $rs_user_info[0]["email"]; ?>">                 
					</div>	
							
					
					<div class="md-form">
						<i class="fas fa-fax prefix grey-text"></i>
						<input name="mobile" type="mobile" id="mobile" class="form-control"value="<?php echo  $rs_user_info[0]["mobile"]; ?>">                 
					</div>				
					
					<div class="md-form">
						<i class="fas fa-address-card prefix grey-text"></i>
						<textarea name="address" type="text" class="form-control" id="address" rows="3"> <?php echo  $rs_user_info[0]["address"]; ?></textarea>                        
					</div>
					
					<div>
					<!-- Default inline 1-->
						<i class="far fa-check-circle prefix grey-text"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="is_confirmed" type="radio" class="custom-control-input" id="confirmed" value="1" <?php if($rs_user_info[0]["is_confirmed"] == 1) echo " checked"; ?>>
							<label class="custom-control-label" for="confirmed">Confirmed</label>
						</div>
						
						<!-- Default inline 2-->
						<i class="far fa-times-circle"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="is_confirmed" type="radio" class="custom-control-input" id="Unconfirmed" value="0" <?php if($rs_user_info[0]["is_confirmed"] == 0) echo " checked"; ?>>
							<label class="custom-control-label" for="Unconfirmed">Not Confirmed</label>
						</div>
						<!-- Default inline 3-->
						<i class="far fa-check-circle prefix grey-text"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="user_type" type="radio" class="custom-control-input" id="Usertypeadmin" value="admin" <?php if($rs_user_info[0]["user_type"] == 'admin') echo " checked"; ?>>
							<label class="custom-control-label" for="Usertypeadmin">Admin</label>
						</div>	

						<!-- Default inline 3-->
						<i class="far fa-check-circle prefix grey-text"></i>
						<div class="custom-control custom-radio custom-control-inline">
							<input name="user_type" type="radio" class="custom-control-input" id="Usertypenormal" value="normal" <?php if($rs_user_info[0]["user_type"] == 'normal') echo " checked"; ?>>
							<label class="custom-control-label" for="Usertypenormal">Normal</label>
						</div>									
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