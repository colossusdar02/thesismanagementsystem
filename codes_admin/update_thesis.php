<?php 
include('inc/db.php');
if (isset($_POST['submit'])){
	$thesisid = $_POST['thesisid'];
	$thesistitle = $_POST['thesistitle'];
	$thesisauthors = $_POST['thesisauthors'];
	$thesisschoolyear = $_POST['thesisschoolyear'];
	$thesiscollege = $_POST['thesiscollege'];
	$thesiscourse = $_POST['thesiscourse'];

	mysql_query("update thesis set thesistitle = '$thesistitle', thesisauthors = '$thesisauthors', thesisschoolyear = '$thesisschoolyear', thesiscollege = '$thesiscollege', thesiscourse = '$thesiscourse' where thesisid='$thesisid'")or die(mysql_error());
								
	header('location:inventory.php');
}
?>	