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
			<a class="hms-nav-links active" href="mybookings.php">Manage Bookings</a>
			<a class="hms-nav-links" href="BookAHotel.php">Book Hostel</a>
			<a class="hms-nav-links" href="Greivance.php">Service And Maintainance</a>
		</div>
	</div>
	<div class="hotelsBooked">

	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	function displayHotel(hname,hloc,htype,nBed,vBed,ac,lunch,StdPR,hostelId,hostelCost){
		$(".hotelsBooked").append("<div class='hostelsOuterDiv'><div class='HostelName'>"+hname+"</div><div class='hotelLocation'><span class='HostelDetailSubTitle'>Location:<span class='hostelLoc'>"+hloc+"</span></div><div class='HotelsDetails'><div class='noOfBeds'><span class='HostelDetailSubTitle'>Number of Beds Available</span><span class='bednos'>"+nBed+"</span></div><div class='bedsVacant'><span class='HostelDetailSubTitle'>Vacant Beds</span><span class='bednos'>"+vBed+"</span></div><div class='StudentPerBed'><span class='HostelDetailSubTitle'>Students Per Room</span><span class='bednos'>"+StdPR+"</span></div><div class='typeOfHostel'><span class='HostelDetailSubTitle'>Type of Hostel</span><span class='bednos'>"+htype+"</span></div><div class='AcService'><span class='HostelDetailSubTitle'>Air Conditioning</span><span class='bednos'>"+ac+"</span></div><div class='LunchOptions'><span class='HostelDetailSubTitle'>Food Options Included</span><span class='bednos'>"+lunch+"</span></div></div><div class='hostelCost'>Cost per year:- <span>"+hostelCost+" Rs</span></div></div>");
	}
	function getUserHostel(){
		<?php
		$user_name = "root";
			$password = "";
			$host_name = "localhost"; 

			$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");
			$selected=mysqli_select_db($conn,"HMSystem");
			$userN = $_SESSION['username'];
			$query="SELECT * FROM hotels_info WHERE Hostel_User_Id=(SELECT Hostel_User_Id from std_hostel_booking WHERE User_Id='$userN')";
			$result=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result)) {
				$hName=$row['Hotel_Name'];
				$hloc=$row['Location'];
				$htype=$row['Boy_Girls'];
				$hNbeds=$row['NumberOfBeds'];
				$hVacBeds=$row['Beds_Vacant'];
				$ac=$row['Ac_NonAc'];
				$lunch=$row['Lunch_options'];
				$stdPerRoom=$row['Students_per_room'];
				$HostelId=$row['Hostel_User_Id'];
				$hostelCost=$row['Cost_Per_Year'];
			    /*echo "currentQuestion='$Question';opt1='$optionA'; opt2='$optionB'; opt3='$optionC'; opt4='$optionD';answer='$answer';";*/
			    echo "displayHotel('$hName','$hloc','$htype','$hNbeds','$hVacBeds','$ac','$lunch','$stdPerRoom','$HostelId','$hostelCost');";
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