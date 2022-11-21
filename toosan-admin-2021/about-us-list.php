<?php require_once("authenticate.php");?>
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
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- DataTables CSS -->
<main class="pl-1 pt-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success text-center" role="alert">
				<a href="about-us-form.php"><span class="font-weight-bold">Add About Us</span></a> 			
				</div>
			</div>				
		</div>
		
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Title 
					</th>
					<th class="th-sm">About 
					</th>
					<th class="th-sm text-center">Update
					</th>
					<th class="th-sm text-center">Delete
					</th>
					
					</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					for($i=0; $i<$n; $i++){
					?>
					<tr>	
						<td><?php echo $rs_about[$i]["title"]; ?></td>
                        <td><?php echo $rs_about[$i]["policy_title"]; ?></td>							
						<td><a href="about_us_info_update_form.php?about-us-id=<?php echo $rs_about[$i]["id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	
					 <td>						
						<!-- Delete trigger modal-->			
						<a href="about_info_delete.php?about-us-id=<?php echo $rs_about[$i]["id"]; ?>" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this record')"><i class="fas fa-trash-alt"></i></a>
						<!--Modal: modalConfirmDelete-->
						</td>			
					</tr>
					<?php
					}
				?>  
			</tbody>
			
			<tfoot>
				<tr>
					<th>Room Type
					</th>
					<th>About 
					</th>
										
					<th>Update
					</th>
					<th>Delete
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
	<script>
		$(document).ready(function () {
			$('#dtBasicExample').DataTable();
			$('.dataTables_length').addClass('bs-select');
		});
	</script>	
</div>
</main>
<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->
