<?php
// echo "<script>alert('Thank you for signing up!');</script>";

$dbservername="localhost";
$dbusername= "arjun1001";
$dbpassword="";
$dbname="INTERRUPT";

$connect=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
			
$name=cleanString($_POST['nameInput']);
$college=cleanString($_POST['collegeInput']);

$email=$_POST['emailInput'];
$mobile=$_POST['numberInput'];

$sql="INSERT INTO aws_workshop VALUES (SNO, '$mobile','$name','$college','$email', 0);";

if(mysqli_query($connect, $sql)){
		echo "<script>alert('Thank you for signing up for this workshop! An email regarding the details will be sent to you shortly!');</script>";
		echo "<script>window.location.href='../';</script>";
	}


function cleanString($str){
	$str=htmlspecialchars($str);
	$str=strip_tags($str);
	return $str;
}

mysqli_close($connect);

?>
