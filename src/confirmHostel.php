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
    $hostelId = $_POST['hostelId'];
 	
	mysqli_query($conn,"INSERT INTO std_hostel_booking (User_Id, Hostel_User_Id, Booking_status, Payment_status) VALUES ('$username','$hostelId','Not Confirmed','Pending')");
 	header("location:mybookings.php");
 }
 else{
 	header("location:UserRegistration.html");
 }
 
mysqli_close($conn);

?>
</body>
</html>
