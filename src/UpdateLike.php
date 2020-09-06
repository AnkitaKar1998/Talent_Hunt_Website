<?php
	include 'Connect.php';

	$pid = $_POST['pid'];
	$mid = $_POST['mid'];
	$imageFlag = $_POST['flag'];
	
	$updateQuery = "UPDATE likes SET ";
	if($imageFlag == 1) {
		$hasLiked = 1;
	} else {
		$hasLiked = 0;
	}
	$updateQuery = $updateQuery."Has_Liked = '$hasLiked' WHERE P_Id = '$pid' AND M_Id = '$mid'";
	$updateResult = mysqli_query($connect,$updateQuery);	
	
	$select = "SELECT * FROM media WHERE M_Id = '$mid'";
	$selectResult = mysqli_query($connect,$select);
	$row = mysqli_fetch_assoc($selectResult);
	if($imageFlag == 1) {
		$likes = $row['Likes'] + 1;
	} else {
		$likes = $row['Likes'] - 1;
	}
	$update = "UPDATE media SET Likes = '$likes' WHERE M_Id = '$mid'";
	$result = mysqli_query($connect,$update);
	if($result) {
		echo $likes;
	} else {
		echo "not success";
	}

?>