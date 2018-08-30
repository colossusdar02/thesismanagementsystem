<?php
session_start();
	if(!isset($_SESSION["sess_user"]) && !isset($_SESSION["sess_id"])){
		header("Location: login.php");
	}
	else{
		include('inc/db.php');
		$sql="SELECT * FROM thesis";
		$res = mysql_query($sql);
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
	
	<style>
		body{
			display: block;
			margin: 0px 0px 0px 0px;
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
			background: #b0ddbf;
			width: 95%;
		}
		#inventoryTable>tbody>tr>td, #inventoryTable>thead>tr>th{
			padding: 3px;
			border: 1px solid black;
			color: black;
			font-family: Arial;
		}
		#buttonAdd{
			padding-left: 585px;
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
			padding-left: 982px;
		}
		#searchBox>form>input{
			width: 350px;
			border-radius: 5px;
			border: 1px solid #9e9f9f;
		}
		#searchBox>form>input:hover{
			background-color: #d9d9d9;
		}
		footer{
			right: 0px;
			left: 0px;
			bottom: 0px;
			position: fixed;
			overflow: hidden;
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
	<br/><br/><br/><br/><br/>
	<div class="body">
		<br/><br/><br/><br/>
		<form action="" method="POST" class="form-horizontal" style="width:95%;">
		<div class="form-group">
			<label class="col-sm-2 control-label">Full Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tmsadminfullname" placeholder="Full Name" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="user" placeholder="E-mail" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="pass" value="rwed2017" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Position</label>
			<div class="col-sm-10">
			<select class="form-control" name="position" required>
			  <option value="">---</option>
			  <option value="Staff">Staff</option>
			  <option value="Librarian">Librarian</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <input type="submit" name="submit" class="btn btn-default" value="Add" style="width:100px">
			</div>
			<div>
				<br/><br/>
			</div>
		</form>
			<div class="col-sm-offset-2 col-sm-10">
			  <input type="button" class="btn btn-danger" value="Back" onclick="location.href='/sysiac1/codes_admin/users.php'" style="width:100px">
			</div>
		</div>
		<?php
		if (isset($_POST['submit'])) {
			include('inc/db.php');
			$tmsadminfullname = $_POST["tmsadminfullname"];
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$position = $_POST['position'];
			$status = "Active";
			
			$query = "SELECT * FROM admin where tmsadminfullname='$tmsadminfullname' OR user='$user'";

			$result = mysql_query($query);

			if(mysql_num_rows($result) > 0){
				?>
					<div class="col-sm-offset-2 col-sm-10">
					  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>A same record is already existing!!
					</div>
				<?php
			}

			else{
				$sql = mysql_query("INSERT INTO admin (tmsadminfullname, user, pass, position, status) VALUES('$tmsadminfullname', '$user', '$pass', '$position', '$status')");
				?>
					<div class="col-sm-offset-2 col-sm-10">
					  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Successfully Added!
					</div>
				<?php
			}
			mysql_close();

			}
		?>
	</div>
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