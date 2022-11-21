<?php require_once("authenticate.php");?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
     $query1 = sprintf("select ri.room_id, ri.room_no, ri.room_status, ri.maxAdult, ri.maxChild, ri.noofBed, ri.roomDesc,ri.image_name1,ri.room_price,ri.security_deposit,room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.deleteflag = 0 order by room_price");
	
	//$query1 = sprintf("select * from tble_room_info where deleteflag = 0 order by room_no");
	$n = db_select_query($conn, $query1, $rs_rooms);
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
				<a href="room-register.php"><span class="font-weight-bold">Add New Room </span></a> Total Rooms (<?php echo $n ;  ?>) 					
				</div>
			</div>
				
		</div>
		
		<table id="dtBasicExample" class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Room Number
					</th>
					<th class="th-sm">Room Status
					</th>
					<th class="th-sm">Maximum Persons
					</th>
					<th class="th-sm">Maximum Children
					</th>
					<th class="th-sm">Number of Beds
					</th>
					<th class="th-sm">Room Type
					</th>
					<th class="th-sm">Price
					</th>
					<th class="th-sm">Security Deposit
					</th>
					<th class="th-sm">Description
					</th>
					<th class="th-sm">Photos
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
						<td><?php echo $rs_rooms[$i]["room_no"]; ?></td>								
						<td><?php echo $rs_rooms[$i]["room_status"]; ?></td>
						<td><?php echo $rs_rooms[$i]["maxAdult"]; ?></td>
						<td><?php echo $rs_rooms[$i]["maxChild"]; ?></td>
						<td><?php echo $rs_rooms[$i]["noofBed"]; ?></td>
						<td><?php echo $rs_rooms[$i]["room_type"]; ?></td>
						<td><?php echo $rs_rooms[$i]["room_price"]; ?></td>
						<td><?php echo $rs_rooms[$i]["security_deposit"]; ?></td>
						<td><?php echo $rs_rooms[$i]["roomDesc"]; ?></td>
						<td><img height= "100" width="100" src="../rooms-photos/<?php echo $rs_rooms[0]["image_name1"]; ?>"/></td>			
						<td><a href="room-update-form.php?room-id=<?php echo $rs_rooms[$i]["room_id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>	
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

							<a href="#" data-href="rooms_info_delete.php?room-id=<?php echo $rs_rooms[$i]["room_id"]; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm" role="button"><i class="fas fa-trash-alt"></i></a>  

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
					<th>Room Price
					</th>
					<th>Security Deposit
					</th>
					<th>Maximum Persons
					</th>
					<th>Maximum Children
					</th>
					<th>Number of Beds
					</th>
					<th>Room Type
					</th>
					<th>Price
					</th>
					<th>Description
					</th>
					<th>Photos
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
