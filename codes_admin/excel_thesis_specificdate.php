	<style>
		.table{
			font-family: Arial;
		}
	</style>
<?php  
//excel_thesis_specific.php  
$connect = mysqli_connect("localhost", "root", "", "tms");
$output = '';
if(isset($_POST["generatespecificdate_thesis"]))
{
 $from = $_POST["date_thesis_from"];
 $to = $_POST["date_thesis_to"];
 $query = "SELECT * FROM thesis WHERE thesisdateuploaded between '$from' AND '$to'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
	<table class="table">
					<tr>
						<td colspan="9"><center><b>De La Salle Lipa</b></center></td>
					</tr>
					<tr>
						<td colspan="9"><center><b>Inventory of Thesis Management System</b></center></td>
					</tr>
					<tr>
						<td colspan="9"></td>
					</tr>
	</table>
   <table class="table" border="1">
                    <tr>  
                        <th>ID</th>  
                        <th>Title</th>  
                        <th>Authors</th>  
						<th>School Year</th>
						<th>College</th>
						<th>Course</th>
						<th>File Path</th>
						<th>File Name</th>
						<th>Date Uploaded</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td>'.$row["thesisid"].'</td>  
                        <td>'.$row["thesistitle"].'</td>  
                        <td>'.$row["thesisauthors"].'</td>  
						<td>'.$row["thesisschoolyear"].'</td>  
						<td>'.$row["thesiscollege"].'</td>
						<td>'.$row["thesiscourse"].'</td>
						<td>'.$row["thesisfilepath"].'</td>
						<td>'.$row["thesisfile"].'</td>
						<td>'.$row["thesisdateuploaded"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  date_default_timezone_set("Asia/Manila");
  $Today = date('y:m:d');
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=TMS_Report001'.$Today.'.xls');
  echo $output;
 }
 if(mysqli_num_rows($result) == 0){
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
				#tms-banner{
					z-index: 1;
				}
				#inventoryTable{
					background: #b0ddbf;
					width: 95%;
				}
				#inventoryTable>tbody>tr>td, #inventory-table>thead>tr>th{
					padding: 6px;
					border: 1px dotted black;
				}
				#buttonGenerate1{
					padding-left: 450px;
				}
				#buttonGenerate1 button{
					border-radius: 10px;
					color: white;
					background-color: #0a4818;
					border: 1px solid #0a4818;
					font-family: Next Art;
					font-size: 2em;
					padding-top: 1px;
					width: 450px;
				}
				#buttonGenerate1 button:hover{
					color: white;
					background-color: #378861;
					border: 1px solid #378861;
				}
				#buttonGenerate2{
					padding-top: 15px;
					padding-left: 450px;
				}
				#buttonGenerate2 button{
					border-radius: 10px;
					color: white;
					background-color: #0a4818;
					border: 1px solid #0a4818;
					font-family: Next Art;
					font-size: 2em;
					padding-top: 1px;
					width: 450px;
				}
				#buttonGenerate2 button:hover{
					color: white;
					background-color: #378861;
					border: 1px solid #378861;
				}
				#buttonGenerate3{
					padding-top: 15px;
					padding-left: 450px;
				}
				#buttonGenerate3 button{
					border-radius: 10px;
					color: white;
					background-color: #0a4818;
					border: 1px solid #0a4818;
					font-family: Next Art;
					font-size: 2em;
					padding-top: 1px;
					width: 450px;
				}
				#buttonGenerate3 button:hover{
					color: white;
					background-color: #378861;
					border: 1px solid #378861;
				}

				#calendar{
					padding-left: 450px;
					font-family: Arial;
					color: black;
					font-size: 1.25em;
				}
				#calendar input{
					font-family: Arial;
					color: black;
					font-size: 1em;
					border-radius: 5px;
					border: 1px solid black;
				}
				#calendar input:hover{
					border: 1px solid black;
					background-color: #5bc6fd;
				}
				#calendar button{
					border-radius: 7px;
					border: 1px solid #5bc6fd;
					background-color: #5bc6fd;
				}
				#calendar button:hover{
					color: white;
					border: 1px solid #285a74;
					background-color: #285a74;
				}
				#error{
					background-color: red;
					color: white;
					border-radius: 5px;
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
							<td><a href="/sysiac1/codes_admin/index.php"><font color="white"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;<b>HOME</b></font></td>
							<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/inventory.php"><font color="white"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;<b>INVENTORY</b></font></td>
							<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/reports.php"><font color="white"><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span>&nbsp;&nbsp;<b>REPORTS</b></font></td>
							<td style="padding-left: 50px"><a href="/sysiac1/codes_admin/users.php"><font color="white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<b>SYSTEM USERS</b></font></td>
							<td style="padding-left: 510px"><a href="/sysiac1/codes_admin/logout.php"><font color="white"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;<b>LOG OUT</b></font></td>
						</tr>
					</table>
				</div>
			</div>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<div id="buttonGenerate1">
				<a href="/sysiac1/codes_admin/reports_thesis.php"><button>REPORT OF THESIS INVENTORY</button></a>
			</div>
			<div id="calendar">
				<form action="excel_thesis_specificdate.php" method="POST">
					<span>Generate report of thesi uploaded</span>
					<div>FROM: <input type="date" name="date_thesis_from">&nbsp;&nbsp;&nbsp;TO: <input type="date" name="date_thesis_to">&nbsp;<button name="generatespecificdate_thesis">GENERATE</button></div>
				</form>
				<span id="error">Error: No Data Read!</span>
				<form action="excel_thesis_all.php" method="POST">
					<span>Generate report of all available thesis in the system:</span>
					<div><button name="generateall_thesis">GENERATE</button></div>
				</form>
			</div>
			<div id="buttonGenerate2">
				<a href="/sysiac1/codes_admin/reports_users.php"><button>LIST OF SYSTEM USERS</button></a>
			</div>
			<div id="buttonGenerate3">
				<button onclick="location.href='/sysiac1/codes_admin/reports_statistics.php'">STATISTICS</button>
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
 }
}
?>