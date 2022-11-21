<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("authenticate.php");
require_once("common/db_func.php");
$conn = db_connect();
  
  $query = sprintf("update room_type_info set room_type = %s where room_type_id  = %s",     
			   GetSQLValueString($_REQUEST["room_type"], "text"),				
				GetSQLValueString($_REQUEST["room-type-id"], "int"));
	$n1 = db_other_query($conn, $query);	
db_close($conn);
header("Location: room_type-list.php");
?>

