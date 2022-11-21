<?php
require_once("authenticate.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

$createdby = $_SESSION["first_name"];
   if ($_FILES['image_name1']) {
		//echo $_FILES['imageFile']['name'];
    	//echo '<pre>'; var_dump($_FILES); echo '</pre>';
			if ($_FILES['image_name1']['size'] > 2500000) {			
					$message = "The file size is over 2MB";
				}
				$ImageName1 = $_FILES['image_name1']['name'];
				if (file_exists($toosanHomes_Image_DIR.$ImageName1)) unlink($toosanHomes_Image_DIR.$ImageName1);
				$temp_name = $_FILES['image_name1']['tmp_name'];
				$file_size = $_FILES['image_name1']['size'];
				 $message = file_upload($temp_name, $toosanHomes_Image_DIR.$ImageName1, $file_size);
				 
				   $ImageName2 = $_FILES['image_name2']['name'];
				if (file_exists($toosanHomes_Image_DIR.$ImageName2)) unlink($toosanHomes_Image_DIR.$ImageName2);
				$temp_name2 = $_FILES['image_name2']['tmp_name'];
				$file_size2 = $_FILES['image_name2']['size'];
				 $message = file_upload($temp_name2, $toosanHomes_Image_DIR.$ImageName2, $file_size2);
				 
				
				  $ImageName3 = $_FILES['image_name3']['name'];
				if (file_exists($toosanHomes_Image_DIR.$ImageName3)) unlink($toosanHomes_Image_DIR.$ImageName3);
				$temp_name3 = $_FILES['image_name3']['tmp_name'];
				$file_size3 = $_FILES['image_name3']['size'];
				 $message = file_upload($temp_name3, $toosanHomes_Image_DIR.$ImageName3, $file_size3);
				 
				 $ImageName4 = $_FILES['image_name4']['name'];
				if (file_exists($toosanHomes_Image_DIR.$ImageName4)) unlink($toosanHomes_Image_DIR.$ImageName4);
				$temp_name4 = $_FILES['image_name4']['tmp_name'];
				$file_size4 = $_FILES['image_name4']['size'];
				 $message = file_upload($temp_name4, $toosanHomes_Image_DIR.$ImageName4, $file_size4);
			}		
		if (isset($_REQUEST["room_no"]) && $_REQUEST["room_no"] != '' && $ImageName1 != '') {	
		     $query = sprintf("insert into tble_room_info (room_type_id,room_price,security_deposit, room_no,room_status, maxAdult, maxChild,noofBed,roomDesc, image_name1,image_name2,image_name3,image_name4, createdby) values (%s, %s, %s, %s, %s, %s, %s,%s,%s,%s,%s,%s,%s,%s)",
						GetSQLValueString($_REQUEST["room_type_id"], "int"),						
						GetSQLValueString($_REQUEST["room_price"], "int"),
						GetSQLValueString($_REQUEST["security_deposit"], "int"),
						GetSQLValueString($_REQUEST["room_no"], "int"),
						GetSQLValueString($_REQUEST["room_status"], "text"),	
						GetSQLValueString($_REQUEST["maxAdult"], "int"),
						GetSQLValueString($_REQUEST["maxChild"], "int"),
						GetSQLValueString($_REQUEST["noofBed"], "int"),
						GetSQLValueString($_REQUEST["roomDesc"], "text"),
						GetSQLValueString($ImageName1, "text"),
						GetSQLValueString($ImageName2, "text"),
						GetSQLValueString($ImageName3, "text"),
						GetSQLValueString($ImageName4, "text"),
						GetSQLValueString($createdby, "text"));
		$n = db_other_query($conn, $query);
	}	
 header("Location: rooms-list.php");
 
?>

