<?php
require_once("authenticate.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

$delition_date = date("y-m-d H:i:s");
$username = $_SESSION["first_name"];
echo $query1 = sprintf("select image_name1,image_name2,image_name3,image_name4 from tble_room_info where room_id = %s", 
							GetSQLValueString($_REQUEST["room-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_image);
if ($n1 == 1) {
	if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name1"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name1"]);
if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name2"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name2"]);
if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name3"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name3"]);
if (file_exists($toosanHomes_Image_DIR.$rs_image[0]["image_name4"])) unlink($toosanHomes_Image_DIR.$rs_image[0]["image_name4"]);

}
 echo $query2 = sprintf("update tble_room_info set deleteflag = 1, deletedate= '$delition_date', deletedby = '$username'  where room_id = %s",
					GetSQLValueString($_REQUEST["room-id"], "int") );
				   $n2 = db_other_query($conn, $query2);
db_close($conn);
header("Location: rooms-list.php");
?>

