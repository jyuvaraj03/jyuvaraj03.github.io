<?php session_start(); ?>

<html>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>Interrupt '18 | Login</title>
		<link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet">
		<link href="css/index-css.css" rel="stylesheet">
		<link rel="icon" href="../img/favicon.jpeg">
		<link rel="apple-touch-icon" href="img/favicon.jpeg">

		<meta charset="UTF-8">
                <meta name="description" content="Interrupt 2018 Official Website">
                <meta name="keywords" content="interrupt,2018,2k18,svce,symposium,event,tech">
                <meta name="author" content="SVCE Interrupt Web Team 2018">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<?php 
		$message="";
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// db credentials	
			$dbservername="localhost";
			$dbusername= "arjun1001";
			$dbpassword="";
			$dbname="INTERRUPT";
			$connect=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			
			$mobile=$_POST["numberInput"];
			$password=$_POST['passInput'];

			
			//check if mobile has 10 digits and only contains numbers
			if (!is_numeric($mobile) OR strlen($mobile) != 10) {
				$message = 'You seem to have entered a wrong mobile number! Please try again!';
			} else {
				$row2;
				$result2;
				// echo password_verify()
				$sql1= "SELECT * from users where mobileNo='".$mobile."';";
				$result1=mysqli_query($connect,$sql1);

				$row=mysqli_fetch_assoc($result1);
				$hashed_password = $row['password'];
				$rootAccess = $row['rootAccess'];
				// echo $row['mobileNo'];
				// using session variables to access it in other files
				$_SESSION['mobile']=0;
				if(password_verify($password, $hashed_password) || $rootAccess=="1")
				{
					$sql2= "SELECT * from events where mobileNo='".$mobile."';";
					$result2= mysqli_query($connect,$sql2);
					$row2=mysqli_fetch_assoc($result2);
					$_SESSION['mobile']=$mobile;
					$_SESSION['ev'][0] = $row2['LogiciansCode'];
					$_SESSION['ev'][1] = $row2['PitchPerfect'];
					$_SESSION['ev'][2] = $row2['Inquizitive'];
					$_SESSION['ev'][3] = $row2['ArtAttack'];
					$_SESSION['ev'][4] = $row2['ClashOfCodes'];
					$_SESSION['ev'][5] = $row2['TerminalOfSecrets'];
					$_SESSION['ev'][6] = $row2['PresentationHub'];
					$_SESSION['ev'][7] = $row2['TechnoFair'];
					$_SESSION['ev'][8] = $row2['InterruptChallenge'];
					$_SESSION['ev'][9] = $row2['PipeThePiper'];
					$_SESSION['ev'][10] = $row2['Datafication'];
					$_SESSION['ev'][11] = $row2['WorkshopAWS'];
					echo "<script>window.location.href='events.php'</script>";
				} elseif ($row['mobileNo']) {		//if mobile exists, but password is wrong
					$message = "Our server is handling too many users at the moment! Please try after a few hours. Sorry!";
				} else {		//if mobile doesn't exist
					$message = 'Our server is handling too many users at the moment! Please try after a few hours. Sorry!';
				}
			}
		}
	?>	
	
	<body>
		
		
		<pre><span id="title">
  _                 _       
 | |               (_)      
 | |     ___   __ _ _ _ __  
 | |    / _ \ / _` | | '_ \ 
 | |___| (_) | (_| | | | | |
 |______\___/ \__, |_|_| |_|
               __/ |        
                                                   |___/                                             
		</span></pre>
		
		<div>
			<p id="error-message">
				<?php echo $message ?>
			</p><!-- #error-message -->
		</div>
		<form id='register-form' method="post" action="index.php">
			<input type='tel' name='numberInput' class='home-links form-input' id='number-login' placeholder='Mobile Number' minlength="10" maxlength="10">
			<input type='password' name='passInput' class='home-links form-input end' id='pass-login' placeholder='Password'>
			<button type='submit' class='home-links submit-butt' id='login-butt'>Login &rarr;</button>
		</form>
						
		<a href="http://www.interrupt2k18.in/register/" class="home-links">Create Account &rarr;</a>
		<a href="http://www.interrupt2k18.in/" class="home-links bottom">Go To Home &crarr;</a>
		
	</body>


	<?php 
	// deletes the session variables after the user clicks save on events.php (or when user goes into login page using URL)
		if($_SERVER['REQUEST_METHOD'] != 'POST') {
			session_unset();
		}
	?>
</html>
