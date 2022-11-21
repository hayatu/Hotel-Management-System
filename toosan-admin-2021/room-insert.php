<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

 if($_REQUEST["room_type"] != ""){			
		$query = sprintf("SELECT room_type FROM room_type_info where room_type = %s ", GetSQLValueString($_REQUEST["room_type"], "text"));
		$n = db_select_query($conn, $query, $rs_room_type);

		if($n > 0){
		// do not insert
		echo " <div class='container pt-3'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				 Room type already exists!.		
				<button class='btn btn-primary btn-sm btn-link'><a href='http://localhost/toosan/toosan-admin-2021/room-type-register.php'><span class='text-white'>Go Back</span></a></button>				 
			</div>
		</div>";
		exit();
		} else {
			// insert 
			    $query1 = sprintf("insert into room_type_info(room_type) values(%s)", 
									GetSQLValueString($_REQUEST["room_type"], "text"));
			$n1 = db_other_query($conn, $query1);
		db_close($conn);
		} 	
	}	
 header("Location: room_type-list.php");
 
?>

