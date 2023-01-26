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
 
if(isset($_POST['userId']) && isset($_POST['userPassword']))
{ 	$username = $_POST['userId'];
  $email = $_POST['userEmail'];
  $password = $_POST['userPassword'];
  $HostelName = $_POST['hostelName'];
  $HostelLoc = $_POST['hostelLocation'];
  $hMob = $_POST['hostelMobNo'];
  $noBeds = $_POST['noOfBeds'];
  $stdPerRoom = $_POST['stdPerRoom'];
  $hostelcost = $_POST['HostelCost'];
 	$hType='Boys and Girls';
 	if($_POST['hostelType']==1){ 
 		$hType = 'Boys only';
 	}
 	else if($_POST['hostelType']==2){
 	 $hType = 'Girls only';
 	}
 	else if($_POST['hostelType']==3){ 
 		$hType = 'Boys and Girls';
 	}
 	else{ 
 		$hType = 'NA';
 	}
 	if($_POST['hostelAC']==1){
 	 $hAc = 'Available';
 	}
 	else{
 	 $hAc = 'Not Available';
 	}
 	if($_POST['mealType']==1){
 	 $mealType = 'Breakfast + Dinner';
 	}
 	else if($_POST['mealType']==2){ 
 		$mealType = 'Lunch + Dinner';
 	}
 	else if($_POST['mealType']==3){
 	 $mealType = 'Breakfast + Lunch';
 	}
 	else{
 	 $mealType = 'NA';
 	}

	$rowNum = 1;

	$query=mysqli_query($conn,"SELECT * FROM hotels_info WHERE Hostel_User_Id='$username'");
 
	if(mysqli_num_rows($query)>0){
	
		$msg="username already exists";

		echo "<script type='text/javascript'>
		alert('$msg');
		document.location='hostelRegistration.php'</script>";
	}

 	else{
		mysqli_query($conn,"INSERT INTO hotels_info (Hotel_Name, Location, Boy_Girls, NumberOfBeds, Beds_Vacant, Ac_NonAc, Lunch_options, Students_per_room, Hostel_User_Id, Hostel_password, Hostel_reg_status, Cost_Per_Year) VALUES ('$HostelName', '$HostelLoc', '$hType', '$noBeds', '$noBeds', '$hAc', '$mealType', '$stdPerRoom', '$username','$password','Not Confirmed', '$hostelcost')");
 		header("location:hostelRegistration.php");
 	}
 }
 
mysqli_close($conn);

?>
</body>
</html>
