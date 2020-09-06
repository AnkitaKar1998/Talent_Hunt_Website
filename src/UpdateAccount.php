<?php
	include 'Connect.php';
	
	$email = $_REQUEST["email"];
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	//$confirmPassword = $_REQUEST["confirmPassword"];
	$number = $_REQUEST["number"];	
	
	$updateQuery = "UPDATE performer SET ";
	
	if($username != "") {
		$updateQuery = $updateQuery."Username = '$username',";
	}
	if($password != ""){
		$updateQuery = $updateQuery."Password = '$password',";
	}
	if($number != ""){
		$updateQuery = $updateQuery."Phone_No = '$number'";
	}
	$updateQuery = $updateQuery." WHERE Email = '$email'";	
	$result = mysqli_query($connect,$updateQuery);
	if($result){
		echo " Details updated <br>";
	} else {
		echo "Details not updated <br>";
	}
?>