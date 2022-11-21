<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
   if($_REQUEST["email"] != ""){
 
 $email = $_REQUEST['email'];
		$query = sprintf("SELECT email FROM tbl_booking_info where email = %s ", GetSQLValueString($_REQUEST["email"], "text"));
		$n = db_select_query($conn, $query, $rs_users);

		if($n > 0){
		// do not insert
		echo " <div class='container pt-3'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				 The email address already exists!.
				 <button class='btn btn-primary btn-sm btn-link'><a href='http://oichealth.azurewebsites.net/user/user-registration-form.php'><span class='text-white'>Go Back</span></a></button>
			</div>
		</div>";
		exit();
		} else {
			// insert 
			     $query1 = sprintf("insert into tbl_booking_info(room_id, noofnights,checkinDate, checkoutDate, title, first_name, last_name,country_id, phone_code, phone_number,email,s_request,BookingNumber) values(%s, %s, %s, %s, %s,%s,%s,%s,%s,%s,%s,%s,%s)", 
									GetSQLValueString($_REQUEST["room_id"], "int"),
									GetSQLValueString($_REQUEST["noofnights"], "int"),
									GetSQLValueString($_REQUEST["checkinDate"], "text"),							
									GetSQLValueString($_REQUEST["checkoutDate"], "text"),
									GetSQLValueString($_REQUEST["title"], "text"),
									GetSQLValueString($_REQUEST["first_name"], "text"),
									GetSQLValueString($_REQUEST["last_name"], "text"),								
									GetSQLValueString($_REQUEST["country_id"], "int"), 
                                    GetSQLValueString($_REQUEST["phone_code"], "text"),
                                    GetSQLValueString($_REQUEST["phone_number"], "text"),
									 GetSQLValueString($_REQUEST["email"], "text"),
									GetSQLValueString($_REQUEST["s_request"], "text"),
									GetSQLValueString($booking_number, "int"));
			$n1 = db_other_query($conn, $query1);			
		} 
			
	}
	db_close($conn);
	//header("Location: register-sucess.php");
?>
   
	