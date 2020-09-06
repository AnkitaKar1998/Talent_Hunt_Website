<?php
	include 'Connect.php';
	
	$pid = $_POST['pid'];
	$mid = $_POST['mid'];

	$query = "SELECT * FROM likes WHERE P_Id = '$pid' AND M_Id = '$mid'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_assoc($result);
	$flag = $row['Has_Liked'];
	
	echo $flag;
	
?>