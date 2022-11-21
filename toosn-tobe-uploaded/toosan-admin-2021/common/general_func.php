<?php

function file_upload($temp_name, $file_name,$file_size) {
	//$temp_name = $_FILES['userfile']['tmp_name'][$id];
    //$file_type = $_FILES['userfile']['type'][$id];
    //$file_size = $_FILES['userfile']['size'][$id];
    //$result    = $_FILES['userfile']['error'][$id];
	
	if (file_exists($file_name)) unlink($file_name);
	if ( $file_size > 2500000) {
		$message = "The file size is over 2MB for file $id.";
		return $message;
	}
	//File Type Check
	//else if ( $file_type != "application/pdf" ) {
		//$message = "Sorry, You can upload only pdf files" ;
		//return $message;
	//}
	$updated  =  move_uploaded_file($temp_name, $file_name);
	$message = ($updated)?"File has uploaded." : "Somthing is wrong with uploading a file.";
	return $message;
	}
	
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
?>