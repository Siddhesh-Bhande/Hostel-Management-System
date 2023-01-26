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
 
if($_SESSION['username'])
{ 	$username = $_SESSION['username'];
  
  
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

	
		mysqli_query($conn,"UPDATE hotels_info SET Hotel_Name='$HostelName',Location='$HostelLoc',Boy_Girls='$hType',Beds_Vacant='$noBeds',Ac_NonAc='$hAc',Lunch_options='$mealType',Students_per_room='$stdPerRoom',Cost_Per_Year='$hostelcost' WHERE Hostel_User_Id='$username'");
		
 		header("location:resolveGreivances.php");
 }
 else{
				header("location:hostelRegistration.html");
			}
 
mysqli_close($conn);

?>
</body>
</html>
