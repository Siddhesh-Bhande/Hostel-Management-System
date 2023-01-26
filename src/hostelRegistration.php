<?php
session_start();
?>
<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup Here</title>
	<script src="https://npmcdn.com/vue/dist/vue.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
</head>
<body>
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
	<div id="registrationApp">
		<div class="loginForm" v-if="existingUser">
			<div class="formContainer">
			<form action="hostellogin.php" method="POST">
				<div class="form-group">
				    <label for="userId">Hostel ID</label>
				    <input type="text" class="form-control" name="userId" id="userId" aria-describedby="emailHelp" placeholder="Enter Hostel Id" required>
				</div>
				<div class="form-group">
				    <label for="userPassword">Password</label>
				    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">Login</button>
			</form>
			<div  class="Alink" @click="existingUser = !existingUser">New Hostel? Register here..</div>
		</div>
		</div>
		<div class="registrationForm" v-else>
			<div class="formContainer">
				<form action="hostelreg.php" method="POST">
					<div class="form-group">
					    <label for="userFirstName">Hostel Name</label>
					    <input type="text" class="form-control" name="hostelName" id="hostelName" aria-describedby="emailHelp" placeholder="Hostel Name">
					</div>
					<div class="form-group">
					    <label for="userLastName">Hostel Location</label>
					    <input type="text" class="form-control" name="hostelLocation" id="hostelLocation" aria-describedby="emailHelp" placeholder="Enter Location">
					</div>
					<div class="form-group">
					    <label for="userId">Hostel User ID</label>
					    <input type="text" class="form-control" name="userId" id="userId" aria-describedby="emailHelp" placeholder="Please select a unique Hostel Id" required>
					</div>
					<div class="form-group">
					    <label for="userPassword">Password</label>
					    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" required>
					</div>
					<div class="form-group">
					    <label for="userAge">Contact Number</label>
					    <input type="number" class="form-control" name="hostelMobNo" id="hostelMobNo" placeholder="Mobile Number">
					</div>
					<div class="form-group">
					    <label for="userEmail">No Of Beds Available</label>
					    <input type="number" class="form-control" name="noOfBeds" id="noOfBeds" aria-describedby="emailHelp" placeholder="Total Beds" required>
				
					</div>
					<div class="form-group">
					    <label for="userAge">Student Per Room</label>
					    <input type="number" class="form-control" name="stdPerRoom" id="stdPerRoom" placeholder="Student Per Room">
					</div>
					<div class="form-group">
					    <label for="userAge">Cost per Yeah</label>
					    <input type="number" class="form-control" name="HostelCost" id="HostelCost" placeholder="Cost of housing per year">
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="inputGroupSelect01">Select Type of Hostel</label>
					  </div>
					  <select class="custom-select" id="inputGroupSelect01" name="hostelType">
					    <option selected>Choose...</option>
					    <option value="1">Boys Only</option>
					    <option value="2">Girls Only</option>
					    <option value="3">Boys and Girls</option>
					    <option value="4">Other</option>
					  </select>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="inputGroupSelect01">Type of Meals Available</label>
					  </div>
					  <select class="custom-select" id="inputGroupSelect01" name="mealType">
					    <option selected>Choose...</option>
					    <option value="1">Breakfast + Dinner</option>
					    <option value="2">Lunch + Dinner</option>
					    <option value="3">Breakfast + Lunch</option>
					    <option value="4">Other</option>
					  </select>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="inputGroupSelect01">Air Conditioning?</label>
					  </div>
					  <select class="custom-select" id="inputGroupSelect01" name="hostelAC">
					    <option selected>Choose...</option>
					    <option value="1">Available</option>
					    <option value="2">Not Available</option>
					  </select>
					</div>
					<button type="submit" class="btn btn-primary">Sign Up</button>
				</form>
			<div class="Alink" @click="existingUser = !existingUser">Existing User? Click here to login...</div>
			</div>
			
		</div>
	</div>
	<script>
		new Vue({
			el: '#registrationApp',
			data: {
				existingUser: true
			}
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>