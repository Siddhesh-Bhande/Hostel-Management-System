<?php
session_start();
$user_name = "root";
$password = "";
$host_name = "localhost"; 

$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");
$selected=mysqli_select_db($conn,"HMSystem");

if (isset($_POST['userId'])){
		
		$username = stripslashes($_POST['userId']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_POST['userPassword']);
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM hotels_info WHERE Hostel_User_Id='$username' and Hostel_password='$password' and Hostel_reg_status='Approved'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
        if($rows==1){
        	$username = $_POST['userId'];
			$_SESSION['username'] = $username;
			header("Location: confirmBookings.php");			
            }
        else{
			echo "<script type='text/javascript'>
		alert('Wrong Details Entered');
		document.location='hostelRegistration.php'</script>";
			}
    }
?>
