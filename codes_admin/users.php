<?php
session_start();
	if(!isset($_SESSION["sess_user"]) && !isset($_SESSION["sess_id"])){
		header("Location: login.php");
	}
	else{
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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="/sysiac1/bootstrap/css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="/sysiac1/bootstrap/css/A_green.css" rel="stylesheet" type="text/css" />
	<style>
		body{
			display: block;
			margin: 0px auto;
			cursor: auto;
			z-index: 1;
		}
		a.nounderline{
			text-decoration: none;
		}
		a:hover{
			color: #588600;
			text-decoration: none;
		}
		a:active{
			color: #588600;
			text-decoration: none;
		}
		#tms-header{
			overflow: hidden;
			width: 1366px;
			height: 170px;
			background-image: url("/sysiac1/images/header_tms.jpg");
			position: fixed;
			z-index: 2;
		}
		#tms-header-tabs{
			font-family: Arial;
			padding-top: 106px;
			padding-left: 138px;
		}
		#inventoryTable{
			width: 75%;
			border-radius: 5px;
			background: #b0ddbf;
		}
		#inventoryTable>tbody>tr>td, #inventoryTable>thead>tr>th{
			color: black;
			font-family: Arial;
		}
		#buttonAdd{
			padding-left: 616px;
		}
		#buttonAdd>button{
			border-radius: 5px;
			background-color: #0a4818;
			color: white;
			border: 1px solid #0a4818;
		}
		#buttonAdd>button:hover{
			background-color: #03280b;
			border: 1px solid #03280b;
		}
		#searchBox{
			padding-left: 800px;
		}
		#searchBox>form>input{
			width: 300px;
			border-radius: 5px;
			border: 1px solid #9e9f9f;
		}
		#searchBox>form>input:hover{
			background-color: #d9d9d9;
		}
		#searchBox>form>button{
			border-radius: 5px;
			border: 1px solid #9e9f9f;
		}
		#searchBox>button{
			border-radius: 5px;
			border: 1px solid #9e9f9f;
		}
		footer{
			top: bottom;
			bottom: 0px;
			position: fixed;
			width: 100%;
			height: 25px;
			background-image : url("/sysiac1/images/footer_tms.jpg");
		}
	</style>
</head>
<body>
	<div id="tms-header">
		<div id="tms-header-tabs">
			<table>
				<tr>
					<td><a href="/sysiac1/codes_admin/index.php"><font color="white"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;<b>HOME</b></font></a></td>
					<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/inventory.php"><font color="white"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;<b>INVENTORY</b></font></a></td>
					<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/reports.php"><font color="white"><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span>&nbsp;&nbsp;<b>REPORTS</b></font></a></td>
					<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/users.php"><font color="white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<b>SYSTEM USERS</b></font></a></td>
					<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/myaccount.php"><font color="white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<b>MY ACCOUNT</b></font></a></td>
					<td style="padding-left: 320px"><a href="/sysiac1/codes_admin/logout.php"><font color="white"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;<b>LOG OUT</b></font></a></td>
				</tr>
			</table>
		</div>
	</div>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<div id="buttonAdd">
		<button onclick="location.href='/sysiac1/codes_admin/users_add.php'">ADD NEW ADMIN USER</button>
	</div>
	<div id="searchBox">
		<form action="systemusers_search.php" method="GET">
			<input type="text" name="users" placeholder="Search">&nbsp;<button type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
		</form>
	</div>
	<?php 
	include("function.php");
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$limit = 5; //if you want to dispaly 10 records per page then you have to change here
	$startpoint = ($page * $limit) - $limit;
	$statement = "admin"; //you have to pass your query over here

	$sql="select * from {$statement} LIMIT {$startpoint} , {$limit}";
	$res = mysql_query($sql);
	?>
		<table align="center" id="inventoryTable">
			<thead>
			<tr>
				<th style="width:500px"><font size="2px"><center><b>NAME</b></center></font></th>
				<th style="width:300px"><font size="2px"><center><b>USERNAME</b></center></font></th>
				<th style="width:50px"><font size="2px"><center><b>STATUS</b></center></font></th>
				<th style="width:100px"><font size="2px"><center><b>POSITION</b></center></font></th>
				<th style="width:100px"><font size="2px"><center>ACTIONS<center></font></th>
			</tr>
			</thead>
			<tbody>
			<?php
					if(mysql_num_rows($res)==0){
						?>
						<td colspan="8">No users to post!</td>
						<?php
					}
					else{
					while($row=mysql_fetch_array($res)){
						$id = $row['tmsadminid'];
						$name = $row['tmsadminfullname'];
						$user = $row['user'];
						$status = $row['status'];
						$position = $row['position'];
			?>
			<tr>
				<td style="width:300px"><font size="2px"><?php
					echo $name;
				?></font></td>
				<td style="width:250px"><font size="2px"><center><?php
					echo $user;
				?></font></center></td>
				<td style="width:50px"><font size="2px"><center><?php
					echo $status;
				?></font></center></td>
				<td style="width:100px"><font size="2px"><center><?php
					echo $position;
				?></font></center></td>
				<td>
				<table align="center">
				<tr>
					<td style="width:100px"><center>
						<form action="users_edit.php" method="POST">
						<button type="submit" class="btn btn-success" style="width:50px;height:30px"><span class="glyphicon glyphicon-pencil" aria-hidden="true"><input type="hidden" name="id" value="<?php echo $id ?>"></span></button>
						</form>
					</center></td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td style="width:100px"><center>
						<form action="users_delete.php" method="POST">
						<button type="submit" class="btn btn-danger" style="width:50px;height:30px"><span class="glyphicon glyphicon-trash" aria-hidden="true"><input type="hidden" name="id" value="<?php echo $id ?>"></span></button>
						</form>
					</center></td>
				</tr>
				</table>
				</td>
			</tr>
			</tbody>
			<?php
						}
					}
			?>
		</table>
	<?php
	echo "<div id='pagingg' style='margin-left:159px; margin-top: 5px;'>";
	echo pagination($statement,$limit,$page);
	echo "</div>";
	?>
	<br/><br/><br/><br/>
</body>
<footer>
	<table>
		<tr>
			<td width="39.5%" style="padding-top: 2px;">
			<?php
				date_default_timezone_set("Asia/Manila");
				$Today = date('y:m:d');
				$Time = date('h:i:sa');
				$new = date('l, F d, Y', strtotime($Today));
				$newTime = date('h : i : s a', strtotime($Time));
				echo "<font size='1px' color='white'><b>" . $new . "</b></font>"; 
				echo "<font size='1px' color='white'><b>" . "&nbsp;&nbsp;" . "</b></font>";
			?>
			</td>
		</tr>
		<tr>
			<td>
			<font size='1px' color='white'><b><div id="clockDisplay" class="clockStyle"> </div></b></font>
				<script>
					function renderTime() {
						var currentTime = new Date();
						var diem = "AM";
						var h = currentTime.getHours();
						var m = currentTime.getMinutes();
						var s = currentTime.getSeconds();
						setTimeout('renderTime()',1000);
						if (h == 0) {
							h = 12;
						} else if (h > 12) { 
							h = h - 12;
							diem="PM";
						}
						if (h < 10) {
							h = "0" + h;
						}
						if (m < 10) {
							m = "0" + m;
						}
						if (s < 10) {
							s = "0" + s;
						}
						var myClock = document.getElementById('clockDisplay');
						myClock.textContent = h + ":" + m + ":" + s + " " + diem;
						myClock.innerText = h + ":" + m + ":" + s + " " + diem;
					}
					renderTime();
				</script>
			</td>
		</tr>
	</table>
</footer>
</html>
<?php
	}
?>