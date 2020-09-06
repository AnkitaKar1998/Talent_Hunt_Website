<?php
	include 'Connect.php';
        
        error_reporting(0);
	
	session_start();
	$pid = $_SESSION["pid"];
	
	$selectQuery = "SELECT * FROM performer WHERE P_Id='$pid'";
	$selectResult = mysqli_query($connect,$selectQuery);
	$row = mysqli_fetch_assoc($selectResult);
	$first = $row["F_Name"];
	$last = $row["L_Name"];
	
	$pname = $first." ".$last;
	$dateTime = date("Y-m-d h-i-s");
	$videoTitle = $_REQUEST["videoTitle"];
	$videoDesc = $_REQUEST["videoDesc"];
	if($_REQUEST["category"] == "Dance") {
		$category = "Dance";
	} else {
		$category = "Music";
	}
	$likes = 0;
	
	$name = $_FILES['videoFile']['name'];
	$temp = $_FILES['videoFile']['tmp_name'];
	
	$url = "http://theshiningstars.atwebpages.com/Videos/".$name;
		
	move_uploaded_file($temp,"videos/".$name);
	
	$query = "INSERT INTO media (P_Id,P_Name,Title,Date_Time,Category,Description,File,Likes) VALUES('$pid','$pname','$videoTitle','$dateTime','$category','$videoDesc','$url','$likes')";
	$result = mysqli_query($connect,$query);
	
	$select = "SELECT * FROM media WHERE Date_Time = '$dateTime'";
	$sResult = mysqli_query($connect,$select);
	$row1 = mysqli_fetch_assoc($sResult);
	$m = $row1['M_Id'];
	
	$selectQuery = "SELECT * FROM performer";
	$selectResult = mysqli_query($connect,$selectQuery);
	while($row = mysqli_fetch_assoc($selectResult)) {
		$p = $row['P_Id'];
		$l = 0;
		$insertQuery = "INSERT INTO likes (P_Id, M_Id,Has_Liked) VALUES ('$p','$m','$l')";
		$insertResult = mysqli_query($connect,$insertQuery);
	}
	
	header("Location:PerProfile.php");
	exit;
	
?>