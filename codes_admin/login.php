<html>
<head>
<title>Thesis Management System</title>
<link rel="shortcut icon" href="/icon.png" type="image/png">
<link rel="shortcut icon" type="image/png" href="/sysiac1/images/icon.png" />
<link href="/sysiac1/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="/sysiac1/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>
<body background="/sysiac1/images/pattern.jpg">
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<div id="loginbanner" align="center">
		<img src="/sysiac1/images/loginbanner.png" style="width:750px">
	</div>
	<form action="" method="post" class="form-inline">
		<center>
		<input type="email" name="user" class="form-control" placeholder="Email" style="width:150px">
		<input type="password" name="pass" class="form-control" placeholder="Password" style="width:150px">
		<input type="submit" value="Login" name="submit" class="btn btn-default"><center><br/>
	</form>
	<?php
	if(isset($_POST["submit"])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	//DB Connection
	$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
	//Select DB From database
	$db = mysqli_select_db($conn, 'tms') or die("databse error");
	//Selecting database
	$query = mysqli_query($conn, "SELECT * FROM admin WHERE user='$user' AND pass='$pass'");
	$numrows = mysqli_num_rows($query);
	if($numrows !=0){
		while($row = mysqli_fetch_assoc($query)){
			$dbusername=$row['user'];
			$dbpassword=$row['pass'];
			$dbid=$row['tmsadminid'];
			$dbfullname=$row['tmsadminfullname'];
			$status=$row['status'];
		}
		if($user == $dbusername && $pass == $dbpassword && $status == "Active"){
			session_start();
			$_SESSION['sess_user']=$dbfullname;
			$_SESSION['sess_id']=$dbid;
			//Redirect Browser
			header("Location:index.php");
		}
	}
	else{
		echo "Invalid username or password!";
	}
	}
	else{
		echo "Required all fields!";
	}
	}
	?>
</body>
</html>