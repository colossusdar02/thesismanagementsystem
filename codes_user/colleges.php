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
		button{
			background-color: white;
			border: 1px solid white;
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
		#tms-colleges{
			z-index: 1;
			padding-top: 100px;
		}
		.pictureContainer{
			width: 150px;
			height: 150px;
			overflow: hidden;
		}
		.pictureContainer img:hover {
			transition: .2s ease-in-out;
			overflow: hidden;
			transform: translate3d(0px, -150px, 0px);
		}
		footer{
			top: bottom;
			bottom: 0px;
			position: absolute;
			overflow: hidden;
			width: 1366px;
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
					<td><a href="/sysiac1/codes_user/index.php"><font color="white"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;<b>HOME</b></font></td>
					<td style="padding-left: 150px"><a href="/sysiac1/codes_user/colleges.php"><font color="white"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;&nbsp;<b>COLLEGES</b></font></td>
				</tr>
			</table>
		</div>
	</div>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<div id="tms-colleges">
		<table align="center">
			<tr>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/cbeam.php" name="college" value="ceas">
					<div class="pictureContainer">
						<img src="/sysiac1/images/cbeam_3.png" style="width: 150px">
					</div>
					</a>
				</td>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/ceas.php" name="college" value="ceas">
					<div class="pictureContainer">
						<img src="/sysiac1/images/ceas_3.png" style="width: 150px">
					</div>
					</a>
				</td>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/cihtm.php" name="college" value="cihtm">
					<div class="pictureContainer">
						<img src="/sysiac1/images/cihtm_3.png" style="width: 150px">
					</div>
					</a>
				</td>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/cite.php" name="college" value="cite">
					<div class="pictureContainer">
						<img src="/sysiac1/images/cite_3.png" style="width: 150px">
					</div>
					</a>
				</td>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/colaw.php" name="college" value="colaw">
					<div class="pictureContainer">
						<img src="/sysiac1/images/colaw_3.png" style="width: 150px">
					</div>
					</a>
				</td>
				<td style="padding-left: 15px; padding-right:15px;">
					<a href="/sysiac1/codes_user/conursing.php" name="college" value="conursing">
					<div class="pictureContainer">
						<img src="/sysiac1/images/conursing_3.png" style="width: 150px">
					</div>
					</a>
				</td>
			</tr>
		</table>
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