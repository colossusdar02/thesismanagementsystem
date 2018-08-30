<?php
$error = "error";

$con = mysql_connect('localhost', 'root', '') or die($error);
mysql_select_db('tms', $con) or die($error);
?>