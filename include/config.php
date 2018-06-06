<?php
//Configuration file
ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

//Database connectivity fields
$dbserver = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "email_system";

//Include files
require_once("include/dbconn.php");
$dbobj = new dbcon;
?>
