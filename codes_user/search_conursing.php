<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "counter";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");
error_reporting("E-NOTICE");
$search = $_GET['tmssearch'];
$id = 'CONURSING';
$dateToday = date('Y-m-d');
$query = mysql_query("SELECT * FROM viewcounter WHERE id = 'CONURSING'");
while($row = mysql_fetch_array($query)){
$date = $row["date"];
$id = $row["id"];
$views = $row["views"];
};
if($date == $dateToday && $id == 'CONURSING'){
	$view = $views + 1;
	mysql_query("UPDATE viewcounter SET `views` = '$view' WHERE id='CONURSING'");
}
else{
	$view = 1;
	mysql_query("INSERT INTO viewcounter (id, views, date) VALUES ('CONURSING', '$view', '$dateToday')");
}
?>
<?php
include('inc/db.php');
error_reporting("E-NOTICE");
?>
<html>
<head>
	<title>Thesis Management System</title>
	<link rel="shortcut icon" href="/icon.png" type="image/png">
	<link rel="shortcut icon" type="image/png" href="/sysiac1/images/icon.png" />
	
	<link href="/sysiac1/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="/sysiac1/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="/sysiac1/bootstrap/css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="/sysiac1/bootstrap/css/A_green.css" rel="stylesheet" type="text/css" />
	<style>
		a:link
		{
			color:black;
		}
		a:visited
		{
			color:black;
		}
		a:hover
		{
			color: #142800;
		}
		a:active
		{
			color: #142800;
		}
		html,
		body {
			margin:0 auto;
			background-color: #d8d8d8;
		}
		#tableCollege{
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<table id="tableCollege">
		<tr>
					<td><a href="/sysiac1/codes_user/colleges.php"><img src="/sysiac1/images/dlsllogo.png" style="width: 70px;margin-left: 35px;margin-right: 205px;"></a></td>
					<form action="search_conursing.php" method="GET">
					<td><input type="text" class="form-control" name="tmssearch" value="<?php echo $search ?>"placeholder="Search" style="width:500px"></td>
					<td>&nbsp;</td>
					<td><button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button></td>
					</form>
					<td>&nbsp;</td>
					<td><button type="button" name="submit" class="btn btn-success" onclick="location.href='/sysiac1/codes_user/conursing.php'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View All</button></td>
					<td><a href="/sysiac1/codes_user/colleges.php"><img src="/sysiac1/images/conursing.png" style="width: 80px; margin-left: 249px;"></a></td>
		</tr>
	</table>
	<?php 
	include("function.php");
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$limit = 5; //if you want to dispaly 10 records per page then you have to change here
	$startpoint = ($page * $limit) - $limit;
	
	$statement = "thesis 
	
	WHERE 
	
	thesistitle LIKE '%".$search."%' AND thesiscollege = 'conursing' || thesisauthors LIKE '%".$search."%' AND thesiscollege = 'conursing' || thesisschoolyear LIKE '%".$search."%' AND thesiscollege = 'conursing' || thesiscourse LIKE '%".$search."%' AND thesiscollege = 'conursing' || thesisdateuploaded LIKE '%".$search."%' AND thesiscollege = 'conursing'
	"; //you have to pass your query over here

	$sql="select * from {$statement} LIMIT {$startpoint} , {$limit}";
	$res = mysql_query($sql);
	?>
	<table align="center" style="width:65%">
			<?php
					if(mysql_num_rows($res)==0){
						?>
						<td colspan="8"><center>No files to post!</center></td>
						<?php
					}
					else{
					while($row=mysql_fetch_array($res)){
					$thesisid = $row['thesisid'];
					$thesistitle = $row['thesistitle'];
					$thesisauthors = $row['thesisauthors'];
					$thesisschoolyear = $row['thesisschoolyear'];
					$thesiscollege = $row['thesiscollege'];
					$thesiscourse = $row['thesiscourse'];
					$thesisfile = $row['thesisfile'];
					$thesisdateuploaded = $row['thesisdateuploaded'];
					$thesisfilepath = $row['thesisfilepath'];
			?>
			<tr>
				<td style="width:450px">
					<?php
						echo "<a href='/sysiac1/codes_admin/$thesisfilepath' target='_blank'><font face='arial' size='5px'>" . $thesistitle . "</font></a>";
					?>
					<br/>
					<table>
						<tr>
							<td width="900px">
								<?php
									echo "<font face='arial' size='2px'>Author/s: " . $thesisauthors . "</font>";
								?>
							</td>
						</tr>
						<tr>
							<td>
								<?php
									echo "<font face='arial' size='2px'>" . $thesisschoolyear . "</font>";
								?>
							</td>
						</tr>
						<tr>
							<td width="450px">
								<?php
									echo "<font face='arial' size='2px'>College: " . $thesiscollege . "</font>";
								?>
							</td>
						<tr>
							<td>
								<?php
									echo "<font face='arial' size='2px'>Course: " . $thesiscourse . "</font>";
								?>
							</td>
						</tr>
						<tr>
							<td width="450px" colspan="2">
								<?php
									echo "<font face='arial' size='2px'>Date Uploaded: " . $thesisdateuploaded . "</font>";
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><br/></td>
			</tr>
			<?php
				}
			}
			?>
		</table>
		<?php
		echo "<div id='pagingg' style='margin-left:227px; margin-top: 5px;'>";
		echo pagination($statement,$limit,$page);
		echo "</div>";
		?>
</body>
</html>