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
  $gtitle = $_POST['issueTitle'];
  $gdesc = $_POST['issueDescription'];
  $gcategory = $_POST['issueCategory'];
  $gstatus = 'Created';
  $query = "SELECT * FROM student_hostel_connect";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$noOfrows = mysqli_num_rows($result);
	$noOfrows = $noOfrows+1;
  $query="SELECT Hostel_User_Id FROM Std_hostel_Booking where User_Id='$username'";
			$result=mysqli_query($conn,$query);
	
			while ($row = mysqli_fetch_array($result)) {
				$hostelId=$row['Hostel_User_Id'];
			}
 	
	mysqli_query($conn,"INSERT INTO student_hostel_connect(User_Id, Hostel_Id, Greivance_Title, G_Desc, G_Category, G_Status, Greivance_Id) VALUES ('$username', '$hostelId', '$gtitle', '$gdesc', '$gcategory', '$gstatus', '$noOfrows')");

 	header("location:Greivance.php");
 }
 
mysqli_close($conn);

?>
</body>
</html>
