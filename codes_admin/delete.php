<?php
	include('inc/db.php');
	$thesisid=$_GET['thesisid'];
	mysql_query("delete from thesis where thesisid='$thesisid'") or die(mysql_error());
	header('location:inventory.php');
?>