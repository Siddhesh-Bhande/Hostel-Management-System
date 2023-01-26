<?php
session_start();
?>
<!doctype html>
<html>
<head> <title> registration Form </title></head>
<body>
<?php

$user_name = "root";
 
$password = "";
 
$host_name = "localhost";
 
$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");

$selected=mysqli_select_db($conn,"HMSystem");
 
if(isset($_SESSION['username']))
{ 	
	$username = $_SESSION['username'];
	$grevId = $_POST['grevId'];
	$hres = $_POST['gresolution'];


		mysqli_query($conn,"UPDATE student_hostel_connect SET G_Status='Resolved',G_resolution='$hres' WHERE Greivance_Id='$grevId'");
		
 		header("location:resolveGreivances.php");
 }
 else{
				header("location:hostelRegistration.html");
			}
 
mysqli_close($conn);

?>
</body>
</html>
