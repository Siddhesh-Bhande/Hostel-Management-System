<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Your Bookings</title>
	<script src="https://npmcdn.com/vue/dist/vue.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>
<div id='MyBookings'>
	<div class="hms-header-section">
		<div class="MainTitle"><span class="hhIcon"><img src="dormitory.svg"></span><h1>Hostels Hub<h1>
		<div class="hms-userprofile">
			<button class="UserLoginLogout"><img src="user.svg"></button>
			<span id="loggedInUser">User</span>
		</div></div>
		<div class="HMS-nav-bar">
			<a class="hms-nav-links" href="home.php">Home</a>
			<a class="hms-nav-links" href="confirmBookings.php">Confirm Bookings</a>
			<a class="hms-nav-links" href="resolveGreivances.php">Service And Maintainance</a>
			<a class="hms-nav-links" href="editHostelProfile.php">Edit Hostel Info</a>
			
		</div>
	</div>
	<div class="studentRequests">

	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	function displayHotel(stdId,bookingStatus,PaymentStatus){
		$(".studentRequests").append("<div class='hostelsOuterDiv'><div class='bedsVacant'><span class='HostelDetailSubTitle'>Student Id</span><span class='bednos'>"+stdId+"</span></div><div class='bedsVacant'><span class='HostelDetailSubTitle'>Booking status</span><span class='bednos'>"+bookingStatus+"</span></div><div class='bedsVacant'><span class='HostelDetailSubTitle'>Payment Status</span><span class='bednos'>"+PaymentStatus+"</span></div><form action='confirmStudentBooking.php' method='POST'><input name='stdId' value="+stdId+" style='display:none;'><button type='submit' class='btn btn-success'>Confirm Student Booking</button></form></div>");
	}
	function getUserHostel(){
		<?php
		$user_name = "root";
			$password = "";
			$host_name = "localhost"; 

			$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");
			$selected=mysqli_select_db($conn,"HMSystem");
			$userN = $_SESSION['username'];
			$query="select User_Id, Booking_status, Payment_status from std_hostel_booking WHERE Booking_status='Not Confirmed'";
			$result=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result)) {
				$StudentsId=$row['User_Id'];
				$bookingStatus=$row['Booking_status'];
				$payStatus=$row['Payment_status'];
				
			    /*echo "currentQuestion='$Question';opt1='$optionA'; opt2='$optionB'; opt3='$optionC'; opt4='$optionD';answer='$answer';";*/
			    echo "displayHotel('$StudentsId','$bookingStatus','$bookingStatus');";
				}
				?>
	}
	function getUserProfile(){
		var userProf;
		<?php 
			if(isset($_SESSION['username'])){
				$userN = $_SESSION['username'];
				echo "userProf = '$userN';";
			}
			else{
				header("location:UserRegistration.html");
			}
		?>
		$('#loggedInUser').text(userProf);
	}
	getUserProfile();
	getUserHostel();
</script>
</body>
</html>