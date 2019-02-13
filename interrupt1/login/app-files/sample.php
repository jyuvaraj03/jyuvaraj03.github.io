<?php session_start(); ob_start() ?>
<html>
	
	<head>
		<title>Interrupt '18 | Registered Events</title>
		<link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet"> 
		<link rel="stylesheet" href="css/events-css.css">
		<link rel="icon" href="../img/favicon.jpeg">
	</head>
	
	<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// db credentials
			//------check IP--------//
			$dbservername="http://159.65.154.83/";
			$dbusername= "arjun1001";
			$dbpassword="";
			$dbname="INTERRUPT";
			$connect=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			
				
			$mobile = $_POST['mobile'];
			
			
// -----------------check collegeName and email------------------------------------//
			$sql="SELECT college, email from users where mobileNo=$mobile";
			$resultFromDB = mysqli_query($connect, $sql);
			$email_array = array();
			
			if(mysqli_num_rows($resultFromDB)>0){
				  while($row = mysqli_fetch_assoc($resultFromDB)) {
				  	//-------change 'email' and 'collegeName'------------//
					array_push($email_array, $row['email']);
					array_push($email_array, $row['college']);
					return $email_array;
    				}
			}
			else{
				echo "0 results";
			}
		}
		 
	?>
