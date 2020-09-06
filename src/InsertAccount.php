<?php
	include 'Connect.php';
	
	$fName = mysqli_real_escape_string($connect,$_REQUEST["fName"]);
	$lName = mysqli_real_escape_string($connect,$_REQUEST["lName"]);
	$userName = mysqli_real_escape_string($connect,$_REQUEST["userName"]);
	$contactNo = mysqli_real_escape_string($connect,$_REQUEST["number"]);
	$email = mysqli_real_escape_string($connect,$_REQUEST["email"]);
	$password = mysqli_real_escape_string($connect,$_REQUEST["password"]);
	if($_REQUEST["gender"] == "male") {
		$gender = "Male";
	} else {
		$gender = "Female";
	}
	if(strtotime($_REQUEST["dob"])) {
		$dob = date('Y-m-d', strtotime($_REQUEST["dob"]));
	} else {
		echo "Wrong date";
	}
	
	$insertQuery = "INSERT INTO performer(F_Name,L_Name,Username,Email,Password,Phone_No,Gender,Dob) 
					VALUES ('$fName','$lName','$userName','$email','$password','$contactNo','$gender','$dob')";
	$queryResult = mysqli_query($connect,$insertQuery) 
					 or die(mysqli_error($connect));
			
	$select = "SELECT * FROM performer WHERE Email = '$email' AND Password = '$password'";
	$sResult = mysqli_query($connect,$select);
	$row1 = mysqli_fetch_assoc($sResult);
	$p = $row1['P_Id'];
			
	$selectQ = "SELECT * FROM media";
	$selectR = mysqli_query($connect,$selectQ);
	while($row = mysqli_fetch_assoc($selectR)) {
		$m = $row['M_Id'];
		$l = 0;
		$insertQuery = "INSERT INTO likes (P_Id, M_Id,Has_Liked) VALUES ('$p','$m','$l')";
		$insertResult = mysqli_query($connect,$insertQuery);
	}
					 
	header("Location:Login.php");
	exit;
?>