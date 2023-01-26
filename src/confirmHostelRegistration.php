<?php
session_start();
?>
<!doctype html>
<html>
<head> <title> Hostel Confirmation Form </title></head>
<body>
<?php

$user_name = "root";
 
$password = "";
 
$host_name = "localhost";
 
$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");

$selected=mysqli_select_db($conn,"HMSystem");
 
if(isset($_POST['hostelId']))
{ 	
	$username = $_POST['hostelId'];
  	$rowNum = 1;

		mysqli_query($conn,"UPDATE hotels_info set Hostel_reg_status='Approved' WHERE Hostel_User_Id='$username'");
		header("location:hostelReq.php");
 }
 
mysqli_close($conn);

?>
</body>
</html>
