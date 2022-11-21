<?php require_once("authenticate.php");?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();			
	 $query1 = sprintf("select * from room_type_info where deleteflag = 0 order by room_type_id");
	$n = db_select_query($conn, $query1, $rs_roomtype);
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
				<a href="room-type-register.php"><span class="font-weight-bold">Add New Room Type or Category</span></a> Total Rooms (<?php echo $n ;  ?>) 					
				</div>
			</div>
				
		</div>
		
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Room Type
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
						<td><?php echo $rs_roomtype[$i]["room_type"]; ?></td>							
						<td><a href="room_type_info_update_form.php?room-type-id=<?php echo $rs_roomtype[$i]["room_type_id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	
							<td>
						<!-- Delete trigger modal-->
							<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header pl-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
										</div>
										<div class="modal-body">
											<p>You are about to delete one track, this procedure is irreversible.</p>
											<p>Do you want to proceed?</p>
											<p class="debug-url"></p>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
											<a class="btn btn-danger btn-ok">Yes</a>
										</div>
									</div>
								</div>
							</div>

							<a href="#" data-href="room_type_info_delete.php?room-type-id=<?php echo $rs_roomtype[$i]["room_type_id"]; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm" role="button"><i class="fas fa-trash-alt"></i></a>  

						<script>
						$('#confirm-delete').on('show.bs.modal', function(e) {
						$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

						 $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
						});
						</script>
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
