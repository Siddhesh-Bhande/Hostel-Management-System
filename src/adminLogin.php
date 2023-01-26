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
			<a class="hms-nav-links" href="hostelReq.php">Hostel Requests</a>
			<a class="hms-nav-links" href="studentGreivances.php">Student Greivances</a>
		</div>
	</div>
	<div id="registrationApp">
		<div class="loginForm" v-if="existingUser">
			<div class="formContainer">
			<form action="adminsignup.php" method="POST">
				<div class="form-group">
				    <label for="userId">Admin User ID</label>
				    <input type="text" class="form-control" name="userId" id="userId" aria-describedby="emailHelp" placeholder="Enter user Id" required>
				</div>
				<div class="form-group">
				    <label for="userPassword">Password</label>
				    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">Login</button>
			</form>
		</div>
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