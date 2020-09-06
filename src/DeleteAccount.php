<?php
	include 'Connect.php';
	session_start();
	$email = $_SESSION["email"];
	echo $email."<br>";

	$deleteQuery = "DELETE FROM performer WHERE Email = '$email'";
	$result = mysqli_query($connect,$deleteQuery);
	if($result) {
		echo "Account deleted";
	} else {
		echo "not";
	}
	
?>