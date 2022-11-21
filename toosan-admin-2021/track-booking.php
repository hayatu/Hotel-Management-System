<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("common/db_func.php");
$conn = db_connect();

	if(isset($_POST["checkinDate"], $_POST["checkinDate"])){
	   $query1 = sprintf("select *, SUM(room_price) as price_total ,
	    tble_countries.country_name,tbl_status_booking.status "
	."from tbl_booking_info "
	."left join tble_countries on tbl_booking_info.country_id = tble_countries.country_id "
     ."left join room_type_info on tbl_booking_info.room_type_id = room_type_info.room_type_id "
     ."left join tbl_status_booking on tbl_booking_info.status_id = tbl_status_booking.status_id "	 
	."where tbl_booking_info.first_name = %s and last_name = %s and checkinDate BETWEEN '".$_POST["checkinDate"]."' AND '".$_POST["checkoutDate"]."' and tbl_booking_info.deleteflag = 0" ,
	GetSQLValueString($_REQUEST["first_name"], "text"),
	GetSQLValueString($_REQUEST["last_name"], "text"));

	$n = db_select_query($conn, $query1, $rs_bookings);
$roomprice = $rs_bookings[0]["room_price"];
	
	$n_nights = $rs_bookings[0]["noofnights"];
	
	$total = $roomprice *$n_nights;
	 db_close($conn);	 
	//header("Location: customer-list.php");	
	?>
	<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->
<link href="js/export/buttons.dataTables.min.css" rel="stylesheet" />
<!--<script src="js/export/jquery.dataTables.min.js"></script>-->
<script src="js/export/dataTables.buttons.min.js"></script>
<script src="js/export/jszip.min.js"></script>
<script src="js/export/pdfmake.min.js"></script>
<script src="js/export/vfs_fonts.js"></script>
<script src="js/export/buttons.html5.min.js"></script>
<?php include("booking-track-form.php"); ?>
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
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php echo  "$" .$rs_bookings[$i]["room_price"]; ?></td>
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php $t1 = $rs_bookings[$i]["room_price"]; $t2 = $rs_bookings[$i]["noofnights"]; echo "$" .$t1*$t2; ?></td>
						<td><i class="fas fa-dollar-sign fa-sm"></i> <?php echo  "$" .$rs_bookings[$i]["security_deposit"]; ?></td>
						<td><?php echo $rs_bookings[$i]["status"]; ?></td>
						<td><?php echo $rs_bookings[$i]["s_request"]; ?></td>										
					
					</tr>
					<?php
					}
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
						
				</tr>
			</tfoot>
		</table>
	</div>
	
	<script>
		$(document).ready(function () {
		$('#dtBasicExample').DataTable(
		{
               
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Booking Report',
                        text:'Export to excel'
                        //Columns to export
                        //exportOptions: {
                       //     columns: [0, 1, 2, 3,4,5,6]
                       // }
                    }
                    /*,{
                        extend: 'pdfHtml5',
                        title: 'Weekly Report',
                        text: 'Export to PDF'
                        //Columns to export
                        //exportOptions: {
                       //     columns: [0, 1, 2, 3, 4, 5, 6]
                      //  }
                    }*/
                ]
            }
		
		);
		$('.dataTables_length').addClass('bs-select');
		});
		</script>	
</div>
</main>

<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->
