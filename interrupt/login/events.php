<?php session_start(); ob_start() ?>
<html>
	
	<head>
		<title>Interrupt '18 | Registered Events</title>
		<link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet"> 
		<link rel="stylesheet" href="css/events-css.css">
		<link rel="icon" href="../img/favicon.jpeg">
		<link rel="apple-touch-icon" href="img/favicon.jpeg">

		<meta charset="UTF-8">
                <meta name="description" content="Interrupt 2018 Official Website">
                <meta name="keywords" content="interrupt,2018,2k18,svce,symposium,event,tech">
                <meta name="author" content="SVCE Interrupt Web Team 2018">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<?php 
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
			
			$mobile = $_SESSION['mobile'];

			// user selection of events during change of events
			$LogiciansCode=$_POST['event1'];
			$PitchPerfect=$_POST['event2'];
			$Inquizitive=$_POST['event3'];
			$ArtAttack=$_POST['event4'];
			$ClashOfCodes=$_POST['event5'];
			$TerminalOfSecrets=$_POST['event6'];
			$PresentationHub=$_POST['event7'];
			$TechnoFair=$_POST['event8'];
			$InterruptChallenge=$_POST['event9'];
			$PipeThePiper=$_POST['event10'];
			$Datafication=$_POST['event11'];
			$WorkshopAWS=$_POST['event12'];

			//sql cmd fr updating change of events
	    	//updates only the row with correct mobileNo

			$sql="UPDATE events set LogiciansCode=$LogiciansCode,PitchPerfect=$PitchPerfect,Inquizitive=$Inquizitive,ArtAttack=$ArtAttack,ClashOfCodes=$ClashOfCodes,TerminalOfSecrets=$TerminalOfSecrets,PresentationHub=$PresentationHub,TechnoFair=$TechnoFair,InterruptChallenge=$InterruptChallenge,PipeThePiper=$PipeThePiper,Datafication=$Datafication,WorkshopAWS=$WorkshopAWS WHERE mobileNo='$mobile';";

			
			//sending those queries to db and if query successful, redirect to login/index.php
			if(mysqli_query($connect,$sql))
			{
				$_SESSION['message'] = "Your changes have been updated! Thanks!";
				echo "<script>alert('Your changes have been saved!');</script>";
				echo "<script>window.location.href='../'</script>";
			} else {
		    	echo "<script>alert('Sorry for the inconvenience! Please try again!');</script>";
			} 
		} 

		// if user is logged in stay here, else go to login/index.php
		if(isset($_SESSION['mobile'])) {
			
		} else {
			header('Location: ../login');
		}
	?>
	
	<body>
		
		<pre><span id="title">
  ______               _       
 |  ____|             | |      
 | |____   _____ _ __ | |_ ___ 
 |  __\ \ / / _ \ '_ \| __/ __|
 | |___\ V /  __/ | | | |_\__ \
 |______\_/ \___|_| |_|\__|___/
                               
 
		</span></pre>
	
			
		<form id='register-form' action="events.php" method='post'>	
			
			<p class='form-text'>Those events highlighted in yellow are the events you've already registered for! If you'd like to register for more events click on them, or click on the highlighted events again to deregister from that particular event! <span style='width:5%;' </span></p>

			<input type="hidden" id="input1" name='event1' value="0">
			<span class='home-links check orange top' id='check1'>Logician's Code</span>
			
			<input type="hidden" id="input2" name='event2' value="0">
			<span class='home-links check orange top' id='check2'>Pitch Perfect</span>
			
			<input type="hidden" id="input3" name="event3" value="0">
			<span class='home-links check orange top' id='check3'>Inquizitive</span>
			
			<input type="hidden" id="input4" name="event4" value="0">
			<span class='home-links check lilac' id='check4'>Art Attack</span>
			
			<input type="hidden" id="input5" name="event5" value="0">
			<span class='home-links check lilac' id='check5'>Clash Of Codes</span>
			
			<input type="hidden" id="input6" name="event6" value="0">
			<span class='home-links check lilac' id='check6'>Terminal Of Secrets</span>
			
			<input type="hidden" id="input7" name="event7" value="0">
			<span class='home-links check light-red' id='check7'>Presentation Hub</span>
			
			<input type="hidden" id="input8" name="event8" value="0">
			<span class='home-links check light-red' id='check8'>TechnoFair</span>
			
			<input type="hidden" id="input9" name="event9" value="0">
			<span class='home-links check light-red' id='check9'>Interrupt Challenge</span>
			
			<input type="hidden" id="input10" name="event10" value="0">
			<span class='home-links check cyan' id='check10'>Pipe The Piper</span>
			
			<input type="hidden" id="input11" name="event11" value="0">
			<span class="home-links check cyan" id="check11">Datafication</span>

			<input type="hidden" id="input12" name="event12" value="0">
			<span class="home-links check cyan" id="check12">Workshop AWS</span>

			<input type='submit' name='submit' value="Save" class='home-links submit-butt'>

			
		</form>
									
		<a href="http://www.interrupt2k18.in/" class="home-links below">Go Back To Home &crarr;</a>
		<a href="../cmd/loading.html" class="home-links below">Go To Command Prompt &crarr;</a>
								
									
		
	</body>


	<script>

			// check{#} represents whether event{#} is selected while registering
			var check1=<?php echo $_SESSION['ev'][0] ?>;
			var check2=<?php echo $_SESSION['ev'][1] ?>;
			var check3=<?php echo $_SESSION['ev'][2] ?>;
			var check4=<?php echo $_SESSION['ev'][3] ?>;
			var check5=<?php echo $_SESSION['ev'][4] ?>;
			var check6=<?php echo $_SESSION['ev'][5] ?>;
			var check7=<?php echo $_SESSION['ev'][6]?>;
			var check8=<?php echo $_SESSION['ev'][7]?>;
			var check9=<?php echo $_SESSION['ev'][8]?>;
			var check10=<?php echo $_SESSION['ev'][9] ?>;
			var check11=<?php echo $_SESSION['ev'][10] ?>;
			var check12=<?php echo $_SESSION['ev'][11] ?>;

			// if event is already selected in db, highlight event
			if (check1 == 1) {
				document.getElementById("check1").classList.add("yellow");
				document.getElementById("input1").value = '1';
			}

			if (check2 == 1) {
				document.getElementById("check2").classList.add("yellow");
				document.getElementById("input2").value = '1';
			}

			if (check3 == 1) {
				document.getElementById("check3").classList.add("yellow");
				document.getElementById("input3").value = '1';
			}

			if (check4 == 1) {
				document.getElementById("check4").classList.add("yellow");
				document.getElementById("input4").value = '1';
			}

			if (check5 == 1) {
				document.getElementById("check5").classList.add("yellow");
				document.getElementById("input5").value = '1';
			}

			if (check6 == 1) {
				document.getElementById("check6").classList.add("yellow");
				document.getElementById("input6").value = '1';
			}

			if (check7 == 1) {
				document.getElementById("check7").classList.add("yellow");
				document.getElementById("input7").value = '1';
			}

			if (check8 == 1) {
				document.getElementById("check8").classList.add("yellow");
				document.getElementById("input8").value = '1';
			}

			if (check9 == 1) {
				document.getElementById("check9").classList.add("yellow");
				document.getElementById("input9").value = '1';
			}

			if (check10 == 1) {
				document.getElementById("check10").classList.add("yellow");
				document.getElementById("input10").value = '1';
			}

			if (check11 == 1) {
				document.getElementById("check11").classList.add("yellow");
				document.getElementById("input11").value = '1';
			}
			if (check12 == 1) {
				document.getElementById("check12").classList.add("yellow");
				document.getElementById("input12").value = '1';
			}

			document.getElementById("check1").addEventListener("click", function(){

				if(check1==0){
					document.getElementById("check1").classList.add("yellow");
					document.getElementById("input1").value = '1';
					check1=1;
				}
				else{
					document.getElementById("check1").classList.remove("yellow");
					document.getElementById("input1").value = '0';
					check1=0;
				}
			});
		
			document.getElementById("check2").addEventListener("click", function(){
				if(check2==0){
					document.getElementById("check2").classList.add("yellow");
					document.getElementById("input2").value = '1';
					check2=1;
				}
				else{
					document.getElementById("check2").classList.remove("yellow");
					document.getElementById("input2").value = '0';
					check2=0;
				}
			});
		
			document.getElementById("check3").addEventListener("click", function(){
				if(check3==0){
					document.getElementById("check3").classList.add("yellow");
					document.getElementById("input3").value = '1';
					check3=1;
				}
				else{
					document.getElementById("check3").classList.remove("yellow");
					document.getElementById("input3").value = '0';
					check3=0;
				}
			});
	
			document.getElementById("check4").addEventListener("click", function(){
				if(check4==0){
					document.getElementById("check4").classList.add("yellow");
					document.getElementById("input4").value = '1';
					check4=1;
				}
				else{
					document.getElementById("check4").classList.remove("yellow");
					document.getElementById("input4").value = '0';
					check4=0;
				}
			});
		
			document.getElementById("check5").addEventListener("click", function(){
				if(check5==0){
					document.getElementById("check5").classList.add("yellow");
					document.getElementById("input5").value = '1';
					check5=1;
				}
				else{
					document.getElementById("check5").classList.remove("yellow");
					document.getElementById("input5").value = '0';
					check5=0;
			
				}
			});
							
			document.getElementById("check6").addEventListener("click", function(){
				if(check6==0){
					document.getElementById("check6").classList.add("yellow");
					document.getElementById("input6").value = '1';
					check6=1;
				}
				else{
					document.getElementById("check6").classList.remove("yellow");
					document.getElementById("input6").value = '0';
					check6=0;
				}
			});
		
			document.getElementById("check7").addEventListener("click", function(){
				if(check7==0){
					document.getElementById("check7").classList.add("yellow");
					document.getElementById("input7").value = '1';
					check7=1;
				}
				else{
					document.getElementById("check7").classList.remove("yellow");
					document.getElementById("input7").value = '0';
					check7=0;
				}
			});
		
			document.getElementById("check8").addEventListener("click", function(){
				if(check8==0){
					document.getElementById("check8").classList.add("yellow");
					document.getElementById("input8").value = '1';
					check8=1;
				}
				else{
					document.getElementById("check8").classList.remove("yellow");
					document.getElementById("input8").value = '0';
					check8=0;
				}
			});
		
			document.getElementById("check9").addEventListener("click", function(){
				if(check9==0){
					document.getElementById("check9").classList.add("yellow");
					document.getElementById("input9").value = '1';
					check9=1;
				}
				else{
					document.getElementById("check9").classList.remove("yellow");
					document.getElementById("input9").value = '0';
					check9=0;
				}
			});
		
			document.getElementById("check10").addEventListener("click", function(){
				if(check10==0){
					document.getElementById("check10").classList.add("yellow");
					document.getElementById("input10").value = '1';
					check10=1;
				}
				else{
					document.getElementById("check10").classList.remove("yellow");
					document.getElementById("input10").value = '0';
					check10=0;
				}
			});
			document.getElementById("check11").addEventListener("click", function(){
				if(check11==0){
					document.getElementById("check11").classList.add("yellow");
					document.getElementById("input11").value = '1';
					check11=1;
				}
				else{
					document.getElementById("check11").classList.remove("yellow");
					document.getElementById("input11").value = '0';
					check11=0;
				}
			});
			document.getElementById("check12").addEventListener("click", function(){
				if(check12==0){
					document.getElementById("check12").classList.add("yellow");
					document.getElementById("input12").value = '1';
					check12=1;
				}
				else{
					document.getElementById("check12").classList.remove("yellow");
					document.getElementById("input12").value = '0';
					check12=0;
				}
			});
	</script>

</html>
