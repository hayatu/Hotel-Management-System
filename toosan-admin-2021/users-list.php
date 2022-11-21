<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("authenticate.php");	
	require_once("common/db_func.php");
	$conn = db_connect();			
	$query1 = sprintf("select * from tbl_user_info where deleteflag = 0 order by first_name");
	$n = db_select_query($conn, $query1, $rs_users);
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
			
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Firs Name
					</th>
					<th class="th-sm">Last Name
					</th>
					<th class="th-sm">User Name
					</th>					
					<th class="th-sm">Mobile
					</th>
					<th class="th-sm">Email Address
					</th>					
					<th class="th-sm">Address
					</th>
					<th class="th-sm text-center" colspan="2">Action
					</th>
					<th class="th-sm" style="display: none">
					</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					for($i=0; $i<$n; $i++){
					?>
					<tr <?php if(($rs_users[$i]["is_confirmed"]==1)){ echo "class='alert alert-success' role='alert';"; }								
						else{ echo "class='alert alert-danger';"; }?>>	
						<td><?php echo $rs_users[$i]["first_name"]; ?></td>				
						<td><?php echo $rs_users[$i]["last_name"]; ?></td>
						<td><?php echo $rs_users[$i]["U_USERNAME"]; ?></td>					
						<td><?php echo $rs_users[$i]["mobile"]; ?></td>
						<td><?php echo $rs_users[$i]["email"]; ?></td>
						<td><?php echo $rs_users[$i]["address"]; ?></td>
						<td><a href="user_info_update_form.php?user-id=<?php echo $rs_users[$i]["id"]; ?>" class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	

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

							<a href="#" data-href="user_info_delete.php?user-id=<?php echo $rs_users[$i]["id"]; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm" role="button"><i class="fas fa-trash-alt"></i></a>  

						<script>
						$('#confirm-delete').on('show.bs.modal', function(e) {
						$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

						 $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
						});
						</script>
						<!--Modal: modalConfirmDelete-->		
						</td>
						<td style="display: none"></td>
					</tr>
					<?php
					}
				?>  
			</tbody>
			<tfoot>
				<tr>
					<th>Firs Name
					</th>
					<th>Last Name
					</th>
					<th>User Name
					</th>
					
					<th>Mobile
					</th>
					<th>Email Address
					</th>
					<th>Address
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
