<head>
	<style>
		.table{
			font-family: Arial;
		}
	</style>
</head>
<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "tms");
$output = '';
if(isset($_POST["generateall_thesis"]))
{
 $query = "SELECT * FROM admin";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th>ID</th>  
                        <th>Full Name</th>  
                        <th>E-mail/Username</th>  
						<th>Position</th>
						<th>Status</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                        <td>'.$row["tmsid"].'</td>  
                        <td>'.$row["tmsadminfullname"].'</td>  
                        <td>'.$row["user"].'</td>  
						<td>'.$row["position"].'</td>
						<td>'.$row["status"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=TMS_Users.xls');
  echo $output;
 }
}
?>