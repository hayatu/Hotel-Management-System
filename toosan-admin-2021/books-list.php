<?php require_once("authenticate.php");?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
       $query1 = sprintf("select bi.booking_id, bi.noofnights, bi.checkinDate, bi.checkoutDate, bi.title, bi.first_name,bi.last_name,bi.phone_code,bi.phone_number, bi.email, bi.BookingNumber, bi.room_price,
       bi.security_deposit,	bi.s_request,bi.status_id, room_type_info.room_type_id,room_type_info.room_type,tble_countries.country_name,tbl_status_booking.status "
	."from tbl_booking_info bi "	 
	 ."left join room_type_info on bi.room_type_id = room_type_info.room_type_id "
	 ."left join tble_countries on bi.country_id = tble_countries.country_id "
	  ."left join tbl_status_booking on bi.status_id = tbl_status_booking.status_id "
	."where bi.deleteflag = 0 order by bi.checkinDate");
	$n = db_select_query($conn, $query1, $rs_bookings);
	
	$roomprice = $rs_bookings[0]["room_price"];
	
	$n_nights = $rs_bookings[0]["noofnights"];
	
	$total = $roomprice *$n_nights;
	
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
<style>
table.tab thead tr th {
    word-wrap: break-word;
    word-break: break-all;
}
</style>
<main class="pl-1 pt-1">
	<div class="container">
				
		<table id="dtBasicExample" class="table table-bordered tab" cellspacing="0" width="100%">
			<thead>
				
				<tr>
					<th class="th-sm">Nights
					</th>
					<th class="th-sm">CheckIn
					</th>
					<th class="th-sm">CheckOut
					</th>	
					<th class="th-sm">Room Type
					</th>					
					<th class="th-sm">Client Full Name
					</th>
					<th class="th-sm">Phone 
					</th>
					<th class="th-sm">Country
					</th>
					<th class="th-sm">Email
					</th>
						
					<th class="th-sm">Booking No
					</th>
					<th class="th-sm">Price/Night
					</th>
					<th class="th-sm">Total Payment
					</th>
					<th class="th-sm">Security Dep.
					</th>
					<th class="th-sm">Status
					</th>
						<th class="th-sm">Remarks
					</th>
					<th class="th-sm text-center">Confirm
					</th>					
					<th class="th-sm text-center">Update
					</th>
					<th class="th-sm text-center">Delete
					</th>			
				</tr>
			</thead>
			
			<tbody>
				<?php
					for($i=0; $i<$n; $i++){
					?>
					<tr>	
						<td><?php echo $rs_bookings[$i]["noofnights"]; ?></td>								
						<td><?php echo $rs_bookings[$i]["checkinDate"]; ?></td>
						<td><?php echo $rs_bookings[$i]["checkoutDate"]; ?></td>
						<td><?php echo $rs_bookings[$i]["room_type"]; ?></td>
						<td><?php echo $rs_bookings[$i]["title"]." ".$rs_bookings[$i]["first_name"]." ".$rs_bookings[$i]["last_name"]; ?></td>
						<td><?php echo $rs_bookings[$i]["phone_code"]." ".$rs_bookings[$i]["phone_number"]; ?></td>
						<td><?php echo $rs_bookings[$i]["country_name"]; ?></td>
						<td><?php echo $rs_bookings[$i]["email"]; ?></td>
						<td><?php echo $rs_bookings[$i]["BookingNumber"]; ?></td>
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php echo $rs_bookings[$i]["room_price"]; ?></td>
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php $t1 = $rs_bookings[$i]["room_price"]; $t2 = $rs_bookings[$i]["noofnights"]; echo $t1*$t2; ?></td>
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php echo $rs_bookings[$i]["security_deposit"]; ?></td>
						<td><?php echo $rs_bookings[$i]["status"]; ?></td>
						<td><?php echo $rs_bookings[$i]["s_request"]; ?></td>
						<td><a href="booking-confirm-form.php?booking-id=<?php echo $rs_bookings[$i]["booking_id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-check-circle"></i></a></td>
						<td><a href="booking-update-form.php?booking-id=<?php echo $rs_bookings[$i]["booking_id"]; ?>"class="btn btn-sm" role="button"><i class="fas fa-edit"></i></a></td>							
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

							<a href="#" data-href="rooms_info_delete.php?room-id=<?php echo $rs_bookings[$i]["booking_id"]; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-sm" role="button"><i class="fas fa-trash-alt"></i></a>  

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
					<th>Nights
					</th>
					<th>CheckIn
					</th>
					<th>CheckOut
					</th>	
                    <th>Room Type
					</th>					
					<th>Client Full Name
					</th>
					<th>Phone 
					</th>
					<th>Country
					</th>
					<th>Email
					</th>
					<th>Booking No
					</th>
					<th>Price/Night
					</th>
					<th>Total Payment
					</th>
					<th>Security Dep.
					</th>
					<th>Status
					</th>
						<th>Remarks
					</th>	
					<th>Confirm
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
