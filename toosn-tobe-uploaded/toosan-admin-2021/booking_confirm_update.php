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
	$checkDate = $_REQUEST["checkinDate"];
	$choutDate = $_REQUEST["checkoutDate"];
	$stayNights = $_REQUEST["noofnights"];
	$price_no = $_REQUEST["room_price"];
	$reservation_id = $_REQUEST["booking-id"];
	$total_price =  $stayNights * $price_no; 
	$today = date("F j, Y");
    $query = sprintf("update tbl_booking_info set noofnights = %s, checkinDate = %s, checkoutDate = %s,
   room_type_id = %s, first_name = %s, last_name = %s, country_id = %s, phone_number = %s, email =%s, room_price =%s, status_id =%s, s_request =%s   where booking_id  = %s",     
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
								GetSQLValueString($_REQUEST["status_id"], "int"),
								GetSQLValueString($_REQUEST["s_request"], "text"),
								GetSQLValueString($_REQUEST["booking-id"], "int"));
	$n1 = db_other_query($conn, $query);	
	
	 $query1 = sprintf("select bi.booking_id, bi.security_deposit, room_type_info.room_type_id,room_type_info.room_type,tble_room_info.maxAdult,tble_room_info.maxChild,tble_room_info.room_price "
	."from tbl_booking_info bi "	 
	 ."left join room_type_info on bi.room_type_id = room_type_info.room_type_id "
	  ."left join tble_room_info on bi.room_id = tble_room_info.room_id "
	."where bi.booking_id  = %s ",
	GetSQLValueString($_REQUEST["booking-id"], "int"));
	$n = db_select_query($conn, $query1, $rs_bookings);
	
	$maxAdult = $rs_bookings[0]["maxAdult"];
	$maxChild = $rs_bookings[0]["maxChild"];
	//$roomp = $rs_bookings[0]["room_price"];
	$sec_deposit = $rs_bookings[0]["security_deposit"];
	
	
db_close($conn);

//User Mailer starts	
	
		$mail             = new PHPMailer(); // defaults to using php "mail()"
		$body             = $mail->getFile('user-email.html');
		//$body= ereg_replace("[\]",'',$body); old code
		$body= preg_replace('{[\{]}', '',$body);
		
		$body = preg_replace("#user_email#", $email, $body);
		$body = preg_replace("#firstName#",  $fname, $body); 
		$body = preg_replace("#lastName#", $lname, $body);
		$body = preg_replace("#phoneNo#", $phoneNumber, $body);	
		$body = preg_replace("#BookinNo#", $reserveNumber, $body);
        $body = preg_replace("#TodayDate#", $today , $body);
		$body = preg_replace("#MaximumAdult#", $maxAdult , $body);
        $body = preg_replace("#MaxChild#", $maxChild , $body);
		$body = preg_replace("#InDate#", $checkDate, $body);
		$body = preg_replace("#OutDate#", $choutDate , $body);
		$body = preg_replace("#No_nights#", $stayNights , $body);
		$body = preg_replace("#Rprice#", $price_no, $body);
         $body = preg_replace("#T_price#", $total_price, $body);
        $body = preg_replace("#reservation-id#", $reservation_id, $body);		 
         $body = preg_replace("#sec_depo#", $sec_deposit, $body);
		 $mail->From       = "info@hasskay.com";
		 $mail->FromName   = "Toosan Homes";

		$mail->Subject    = "Reservation Confirmation";

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);

		$mail->AddAddress("$email"); 	
		//$mail->AddBCC("ihassan@sesric.org");
		//$mail->AddBCC("training@sesric.org");

		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		}
		//else {echo "Message Sent";}
header("Location: books-list.php");
?>

