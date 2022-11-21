<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("authenticate.php");
require_once("common/db_func.php");
$conn = db_connect();
  
  $query = sprintf("update tbl_about_info set title = %s, about = %s, policy_title = %s, policies = %s, email_address = %s, phone = %s, address = %s   where id  = %s",     
			   GetSQLValueString($_REQUEST["title"], "text"),
               GetSQLValueString($_REQUEST["about"], "text"),
			   GetSQLValueString($_REQUEST["policy_title"], "text"),
               GetSQLValueString($_REQUEST["policies"], "text"),
               GetSQLValueString($_REQUEST["email_address"], "text"),
               GetSQLValueString($_REQUEST["phone"], "text"),
               GetSQLValueString($_REQUEST["address"], "text"),			   
				GetSQLValueString($_REQUEST["about-us-id"], "int"));
	$n1 = db_other_query($conn, $query);	
db_close($conn);
header("Location: about-us-list.php");
?>

