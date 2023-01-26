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
  $FirstName = $_POST['userFirstName'];
  $LastName = $_POST['userLastName'];
  $age = $_POST['userAge'];
  $Education = $_POST['educationLevel'];
 	
	$rowNum = 1;

	$query=mysqli_query($conn,"SELECT * FROM Student_Info WHERE User_Id='$username'");
 
	if(mysqli_num_rows($query)>0){
	
		$msg="username already exists";

		echo "<script type='text/javascript'>
		alert('$msg');
		document.location='UserRegistration.html'</script>";
}

 	else{
		mysqli_query($conn,"INSERT INTO Student_Info (First_Name, Last_Name, User_Id, Password, Email, Age, Education) VALUES ('$FirstName', '$LastName','$username', '$password', '$email', '$age', '$Education')");

 		header("location:UserRegistration.html");
 }
 }
 
mysqli_close($conn);

?>
</body>
</html>
