<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("common/db_func.php");
$conn = db_connect();

   $query = sprintf("update tbl_user_info set first_name = %s, last_name = %s, U_USERNAME = %s, mobile = %s ,email= %s, address = %s, is_confirmed = %s, user_type = %s where id = %s",     
			   GetSQLValueString($_REQUEST["first_name"], "text"),
				GetSQLValueString($_REQUEST["last_name"], "text"),							
				GetSQLValueString($_REQUEST["U_USERNAME"], "text"),				
				GetSQLValueString($_REQUEST["mobile"], "text"),
				GetSQLValueString($_REQUEST["email"], "text"),
				GetSQLValueString($_REQUEST["address"], "text"),
				GetSQLValueString($_REQUEST["is_confirmed"], "text"),
				GetSQLValueString($_REQUEST["user_type"], "text"),
				GetSQLValueString($_REQUEST["id"], "int"));
			$n1 = db_other_query($conn, $query);			
db_close($conn);
header("Location: users-list.php");
?>

