

<?php
$user_name = "root";
$password = "";
$host_name = "localhost"; 

$conn=mysqli_connect('localhost','root','','HMSystem') or die("could not connect to internet");
$selected=mysqli_select_db($conn,"HMSystem");
?>