<?php 
		// if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// db credentials
			$dbservername="localhost";
			$dbusername= "arjun1001";
			$dbpassword="";
			$dbname="INTERRUPT";
			$connect=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
			if (!$connect) {
			    die("Connection failed: " . mysqli_connect_error());
			}
				
			$mobile = $_REQUEST['mobile'];
			// user selection of events during change of events
			$GoodWillHunting=$_POST['event1'];
			$TheGameOfCodes=$_POST['event2'];
			$Predestination=$_POST['event3'];
			$TheDigitalFortress=$_POST['event4'];
			$TheSecretSociety=$_POST['event5'];
			$UnicornOfSilicon=$_POST['event6'];
			$FishBowlConversation=$_POST['event7'];
			$Inquizitive=$_POST['event8'];
			$MiniProject=$_POST['event9'];
			$PresentationFrankenstein=$_POST['event10'];
			//sql cmd fr updating change of events
	    	//updates only the row with correct mobileNo
			$sql="UPDATE events set GoodWillHunting='$GoodWillHunting',TheGameOfCodes='$TheGameOfCodes',Predestination='$Predestination',TheDigitalFortress='$TheDigitalFortress',TheSecretSociety='$TheSecretSociety',UnicornOfSilicon='$UnicornOfSilicon',FishBowlConversation='$FishBowlConversation',Inquizitive='$Inquizitive',MiniProject='$MiniProject',PresentationFrankenstein='$PresentationFrankenstein' WHERE mobileNo='$mobile';";
			
			//sending those queries to db and if query successful, redirect to login/index.php
			if(mysqli_query($connect,$sql))
			{
				echo "Your changes have been saved!";
			} else {
		    	echo "Sorry for the inconvenience! Please try again!";
			} 
		// } 
	?>
