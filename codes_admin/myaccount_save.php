<?php
include('inc/db.php');
if (isset($_POST['submit'])){
	$tmsadminid = $_POST['tmsadminid'];
	$tmsadminfullname = $_POST['tmsadminfullname'];
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$position = $_POST['position'];
	$status = $_POST['status'];

	mysql_query("update admin set tmsadminfullname = '$tmsadminfullname', user = '$username', pass = '$password', position = '$position', status = '$status'  where tmsadminid = '$tmsadminid'")or die(mysql_error());
	header("location:myaccount.php");
}
?>