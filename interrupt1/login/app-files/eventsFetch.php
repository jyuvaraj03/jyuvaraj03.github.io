<?php

header("Content-Type: application/json");

class Events{
	var $LogiciansCode = "0";
	var $PitchPerfect = "0";
	var $Inquizitive = "0";
	var $ArtAttack = "0";
	var $ClashOfCodes = "0";
	var $TerminalOfSecrets = "0";
	var $PresentationHub = "0";
	var $TechnoFair = "0";
	var $InterruptChallenge = "0";
	var $PipeThePiper = "0";
	var $Datafication = "0";
	var $WorkshopAWS = "0";
}
$servername = "localhost";
$username = "arjun1001";
$password = "";
$db_name = "INTERRUPT";
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_conenct_error());
} 
$mobile = $_POST['mobile'];
$sql = "SELECT * from events where mobileNo=$mobile";
$resultFromDB = mysqli_query($conn, $sql);
$obj = new Events();
if(mysqli_num_rows($resultFromDB) > 0){
	while($row = mysqli_fetch_assoc($resultFromDB)){
		$obj->LogiciansCode = $row['LogiciansCode'];
		$obj->PitchPerfect = $row['PitchPerfect'];
		$obj->Inquizitive = $row['Inquizitive'];$obj->ArtAttack = $row['ArtAttack'];
		$obj->ClashOfCodes = $row['ClashOfCodes'];$obj->TerminalOfSecrets = $row['TerminalOfSecrets'];
		$obj->PresentationHub = $row['PresentationHub'];$obj->TechnoFair = $row['TechnoFair'];
		$obj->InterruptChallenge = $row['InterruptChallenge'];$obj->PipeThePiper = $row['PipeThePiper'];
		$obj->Datafication = $row['Datafication'];$obj->WorkshopAWS = $row['WorkshopAWS'];
	}
	
	$myJSON = json_encode($obj);
		echo ($myJSON);
}
else{
	return "no results";
}
?>
