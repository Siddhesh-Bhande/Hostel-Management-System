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
 
if(isset($_POST['stdId']) && isset($_SESSION['username']))
{ 	
	$studentId = $_POST['stdId'];
  $HostelId = $_SESSION['username'];
 	
		mysqli_query($conn,"UPDATE std_hostel_booking SET Booking_status='Confirmed' WHERE User_Id='$studentId' AND Hostel_User_Id='$HostelId'");
		mysqli_query($conn,"UPDATE hotels_info SET Beds_Vacant = Beds_Vacant - 1 WHERE Hostel_User_Id='$HostelId'");
 		header("location:confirmBookings.php");
 }
 else{
		header("location:hostelRegistration.html");
	}
 
mysqli_close($conn);

?>
</body>
</html>
