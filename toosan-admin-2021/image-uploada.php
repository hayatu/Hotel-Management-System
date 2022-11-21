<?php
session_start();
  require_once("common/db_func.php");
	      $conn = db_connect();	
 $query1 = sprintf("select image from image_gallery where id = %s", 
							GetSQLValueString($_REQUEST["image-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_image);
if ($n1 == 1) {
	if (file_exists($SOMTURK_Image_DIR.$rs_image[0]["image"])) unlink($SOMTURK_Image_DIR.$rs_image[0]["image"]);	
}

 $query2 = sprintf("DELETE FROM image_gallery WHERE id = %s", GetSQLValueString($_REQUEST["image-id"], "int") );
		$n2 = db_other_query($conn, $query2);
		//$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		//$mysqli->query($sql);
		$_SESSION['success'] = 'Image Deleted successfully.';
		header("Location: index.php");
?>