<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("common/db_func.php");
$conn = db_connect();

			// insert 
			    $query1 = sprintf("insert into tbl_about_info(title,about,policy_title, policies,email_address,phone,address) values(%s,%s,%s,%s,%s,%s,%s)", 
									GetSQLValueString($_REQUEST["title"], "text"),
									GetSQLValueString($_REQUEST["about"], "text"),
									GetSQLValueString($_REQUEST["policy_title"], "text"),
									GetSQLValueString($_REQUEST["policies"], "text"),
									GetSQLValueString($_REQUEST["email_address"], "text"),
								      GetSQLValueString($_REQUEST["phone"], "text"),
									GetSQLValueString($_REQUEST["address"], "text"));
			$n1 = db_other_query($conn, $query1);
		db_close($conn);
 header("Location: about-us-list.php");
?>

