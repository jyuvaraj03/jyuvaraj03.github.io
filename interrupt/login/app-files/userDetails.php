<?php

header("Content-Type: application/json");


class  User{
	var $college = "";
	var $email = "";
	var $name = "";
}
$servername = "localhost";
$username = "arjun1001";
$password = "";
$db_name = "INTERRUPT";
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
$mobile = $_POST['mobile'];
 
$sql = "SELECT email, college, name from users where mobileNo=$mobile";
$resultFromDB = mysqli_query($conn, $sql);
$obj = new User();
if(mysqli_num_rows($resultFromDB) > 0){
	$row = mysqli_fetch_assoc($resultFromDB);
	$obj->college = $row['college'];
	$obj->email = $row['email'];
	$obj->name = $row['name'];//------------------------------check db column here
	$myJSON = json_encode($obj);

	echo ($myJSON);

}
else{
	return "no results";
}
?>
