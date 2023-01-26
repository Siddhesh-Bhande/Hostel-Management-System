<?php
session_start();
?>
<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Submit Issues or Greivances</title>
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
			<a class="hms-nav-links" href="mybookings.php">Manage Bookings</a>
			<a class="hms-nav-links" href="BookAHotel.php">Book Hostel</a>
			<a class="hms-nav-links active" href="Greivance.php">Service And Maintainance</a>
		</div>
	</div>
	<div id="GreivanceApp">
		<div class="issuesClass" v-if="createIssue">
			<button class="raiseAissue btn btn-warning" id="raiseComplaint" @click="logGreivance=true;createIssue=false;">Raise an issue or complaint</button>
		</div>
		<div class="registrationForm Greivance-form" v-if="logGreivance">
			<div class="formContainer">
				<form action="logGreivance.php" method="POST">
					<div class="form-group">
					    <label for="issueTitle">Title of the Issue</label>
					    <input type="text" class="form-control" name="issueTitle" id="issueTitle" aria-describedby="issueTitle" placeholder="Enter a title here">
					</div>
					<div class="form-group">
					    <label for="issueDescription">Description</label>
					    <textarea type="text" class="form-control" name="issueDescription" id="issueDescription" max-length=500 aria-describedby="issueDescription" placeholder="Please explain you problem in brief.">
					    </textarea>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="issueCategory">Enter Category</label>
					  </div>
					  <select class="custom-select" id="issueCategory" name="issueCategory">
					    <option selected>Choose...</option>
					    <option value="Infrastructure">Infrastructure</option>
					    <option value="Utilities">Utilities</option>
					    <option value="Payments and Refunds">Payments and Refunds</option>
					    <option value="Other">Other</option>
					  </select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="submit" class="btn btn-success" @click="createIssue=true; logGreivance=false;">Cancel</button>
				</form>
			</div>
			
		</div>
		<div class="hms-userComplaints">
			
		</div>
	</div>
	<script>
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
		function showComplaints(gtitle,gdesc,gcat,gstatus,gres){
			$(".hms-userComplaints").append('<div class="hostelsOuterDiv"><div class="gtitle"><span class="g_subtitle">Greivance Title: </span><span class="gvalue">'+gtitle+'</span></div><div class="gcategory"><span class="g_subtitle">Category: </span><span class="gvalue">'+gcat+'</span></div><div class="gstatus"><span class="g_subtitle">Status: </span><span class="gvalue">'+gstatus+'</span></div><div class="gdesc"><span class="g_subtitle">Description: </span><span class="gvalue">'+gdesc+'</span></div><div class="gres"><span class="g_subtitle">Resolution Provided by Hostel Team:</span><span class="gvalue">'+gres+'</span></div></div>');
		}
		function getUserComplaints(){
			<?php 
			$user_name = "root";
			$password = "";
			$host_name = "localhost"; 

			$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");
			$selected=mysqli_select_db($conn,"HMSystem");
			$username = $_SESSION['username'];
			$query="SELECT * FROM student_hostel_connect where User_Id='$username'";
			$result=mysqli_query($conn,$query);
	
			while ($row = mysqli_fetch_array($result)) {
				$userId=$row['User_Id'];
				$hostelId=$row['Hostel_Id'];
				$gtitle=$row['Greivance_Title'];
				$gdesc=$row['G_Desc'];
				$gcat=$row['G_Category'];
				$gstatus=$row['G_Status'];
				$gres=$row['G_resolution'];
			    /*echo "currentQuestion='$Question';opt1='$optionA'; opt2='$optionB'; opt3='$optionC'; opt4='$optionD';answer='$answer';";*/
			    echo "showComplaints('$gtitle','$gdesc','$gcat','$gstatus','$gres');";
				}

		?>
		}
		getUserComplaints();
	</script>
	<script>
		new Vue({
			el: '#GreivanceApp',
			data: {
				logGreivance: false,
				createIssue: true
			}
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>