<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

  $query1 = sprintf("select image_name1,image_name2,image_name3,image_name4 from tble_room_info where room_id = %s", 
							GetSQLValueString($_REQUEST["room-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_image);
if ($n1 == 1) {
	$file_name1 = $rs_image[0]["image_name1"];	
	$file_name2 = $rs_image[0]["image_name2"];	
	$file_name3 = $rs_image[0]["image_name3"];	
	$file_name4 = $rs_image[0]["image_name4"];	
	
	if ($_FILES['image_name1']) {
		
			if ($_FILES['image_name1']['size'] > 0) {	
									
				$file_name1 = $_FILES['image_name1']['name'];				
				if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name1"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name1"]);
				$temp_name = $_FILES['image_name1']['tmp_name'];
				$file_size1 = $_FILES['image_name1']['size'];
				 $message = file_upload($temp_name, $toosanHomes_Image_DIR.$file_name1, $file_size1);
				 }
			}
			
			if ($_FILES['image_name2']) {
		
			if ($_FILES['image_name2']['size'] > 0) {	
									
				$file_name2 = $_FILES['image_name2']['name'];				
				if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name2"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name2"]);
				$temp_name = $_FILES['image_name2']['tmp_name'];
				$file_size2 = $_FILES['image_name2']['size'];
				 $message = file_upload($temp_name, $toosanHomes_Image_DIR.$file_name2, $file_size2);
				 }
			}
	
	if ($_FILES['image_name3']) {
		
			if ($_FILES['image_name3']['size'] > 0) {	
									
				$file_name3 = $_FILES['image_name3']['name'];				
				if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name3"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name3"]);
				$temp_name = $_FILES['image_name3']['tmp_name'];
				$file_size3 = $_FILES['image_name3']['size'];
				 $message = file_upload($temp_name, $toosanHomes_Image_DIR.$file_name3, $file_size3);
				 }
			}
			
			if ($_FILES['image_name4']) {
		
			if ($_FILES['image_name4']['size'] > 0) {	
									
				$file_name4 = $_FILES['image_name4']['name'];				
				if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name4"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name4"]);
				$temp_name = $_FILES['image_name4']['tmp_name'];
				$file_size4 = $_FILES['image_name4']['size'];
				 $message = file_upload($temp_name, $toosanHomes_Image_DIR.$file_name4, $file_size4);
				 }
			}
	
	
 $query = sprintf("update tble_room_info set room_type_id = %s, room_price = %s,security_deposit= %s, room_no= %s, room_status = %s, maxAdult = %s, maxChild = %s, noofBed = %s,
roomDesc = %s,image_name1= %s, image_name2= %s, image_name3= %s, image_name4= %s  where room_id = %s",
						GetSQLValueString($_REQUEST["room_type_id"], "int"),						
						GetSQLValueString($_REQUEST["room_price"], "int"),
						GetSQLValueString($_REQUEST["security_deposit"], "int"),
						GetSQLValueString($_REQUEST["room_no"], "int"),
						GetSQLValueString($_REQUEST["room_status"], "text"),	
						GetSQLValueString($_REQUEST["maxAdult"], "int"),
						GetSQLValueString($_REQUEST["maxChild"], "int"),
						GetSQLValueString($_REQUEST["noofBed"], "int"),
						GetSQLValueString($_REQUEST["roomDesc"], "text"),
						GetSQLValueString($file_name1, "text"),
						GetSQLValueString($file_name2, "text"),
						GetSQLValueString($file_name3, "text"),
						GetSQLValueString($file_name4, "text"),
					    GetSQLValueString($_REQUEST["room-id"], "int"));
	$n = db_other_query($conn, $query);	
			}
	db_close($conn);	
		
 header("Location: rooms-list.php");
 
?>

