<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("authenticate.php");
require_once("common/db_func.php");
require_once("common/mailer_func.php");
$conn = db_connect();
  $email = $_REQUEST["email"];
  $fname = $_REQUEST["first_name"];
  $lname = $_REQUEST["last_name"];
  $phoneNumber = $_REQUEST["phone_number"];
  $reserveNumber = $_REQUEST["BookingNumber"];
  $today = date("F j, Y");
    $query = sprintf("update tbl_booking_info set noofnights = %s, checkinDate = %s, checkoutDate = %s,
   room_type_id = %s, first_name = %s, last_name = %s, country_id = %s, phone_number = %s, email =%s, room_price =%s, security_deposit =%s, status_id =%s, s_request =%s   where booking_id  = %s",     
								GetSQLValueString($_REQUEST["noofnights"], "int"),
								GetSQLValueString($_REQUEST["checkinDate"], "text"),							
								GetSQLValueString($_REQUEST["checkoutDate"], "text"),
								GetSQLValueString($_REQUEST["room_type_id"], "int"),
								GetSQLValueString($_REQUEST["first_name"], "text"),
								GetSQLValueString($_REQUEST["last_name"], "text"),								
								GetSQLValueString($_REQUEST["country_id"], "int"), 
								GetSQLValueString($_REQUEST["phone_number"], "text"),
								GetSQLValueString($_REQUEST["email"], "text"),
								GetSQLValueString($_REQUEST["room_price"], "text"),
								GetSQLValueString($_REQUEST["security_deposit"], "text"),
								GetSQLValueString($_REQUEST["status_id"], "int"),
								GetSQLValueString($_REQUEST["s_request"], "text"),
								GetSQLValueString($_REQUEST["booking-id"], "int"));
	$n1 = db_other_query($conn, $query);	
	
db_close($conn);


  header("Location: books-list.php");
?>

