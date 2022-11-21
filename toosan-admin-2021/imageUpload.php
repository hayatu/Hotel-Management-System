<?php
session_start();
 require_once("common/db_func.php");
	      $conn = db_connect();	


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];

	if(move_uploaded_file($tmp, '../gallery/'.$image_name)){
		
		$query1 = sprintf("insert into tble_image_gallery(title, image) values(%s, %s)", 																								
									GetSQLValueString($_POST["title"], "text"),
									GetSQLValueString($image_name, "text"));
			$n1 = db_other_query($conn, $query1);		
		  
		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("Location: gallery.php");
	}else{
		$_SESSION['error'] = 'image uploading failed';
		header("Location: gallery.php");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("Location: gallery.php");
}
db_close($conn);

?>