<html>
    <head>
        <title> Online Talent Hunt </title>
        <link rel = "stylesheet" href="CSS_Files\cssSheet1.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src = "jQuery/jquery.js"> </script>
		<script>
			function getFlag(a,b,c) {
				var p = a;
				var m = b;
				var i = c;
								
				$.post("GetFlag.php",{pid: p,mid: m},
				function (flag) {
					changeLikes(p,m,flag,i);
				});
			}
			
			function changeLikes(a,b,c,d) {
				var p = a;
				var m = b;
				var imageFlag = c;
				var i = d;
				
				var image = document.getElementById("likeImage"+i);
				if(imageFlag == 0) {
					image.src = "Images/like_image.png";
					imageFlag = 1;
				} else {
					image.src = "Images/unlike_image.png";
					imageFlag = 0;
				}

				$.post("UpdateLike.php",{pid: p,mid: m,flag: imageFlag},
				function (likes) {
					$("#likes"+i).html(likes+" Likes");
				});
			}
		</script>

        <style>
            li{
                float: left;
                
            }
            li:last-child{
                border-right: none;
            }
            li a{
                display: block;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                color: #F5BCFF;
            }
            li a:hover{
                color: #ffffff;
            }
            .activeTab{
                color: #ffffff;
                background-color: #111;
            }
        </style>
        
    </head>
    <body>
        <div>
            <h1 style = "font-family: cursive;
				padding-left: 50">
				<i><b> The Shining Stars </b></i>
			</h1>
            <ul style = "list-style-type: none;
                padding: 0;
                background-color: #FA3C3C;
                overflow: hidden;">
                <li> <a href = "#" class = "activeTab"> <i class="glyphicon glyphicon-home"></i> Home </a> </li>
                <li> <a href = "PerProfile.php"> <i class="glyphicon glyphicon-user"></i> Profile </a> </li>
                <li> <a href = "UploadVideo.html"><i class="glyphicon glyphicon-film"></i> Upload Video </a> </li>
				<li> <a href = "PerRanklist.php"><i class="glyphicon glyphicon-list-alt"></i> Rank List </a> </li>
				<!--<li> <a href = "Settings.html"><i class="glyphicon glyphicon-list-alt"></i> Settings </a> </li>-->
                <li> <a href = "Logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout </a> </li>
            </ul>
        </div>
		
		
		
		<?php
			include 'Connect.php';
                        
                        error_reporting(0);
			
			session_start();
			$pid = $_SESSION["pid"];
			
			$i=0;
			
			$selectQuery = "SELECT * FROM media ORDER BY Likes DESC";
			$selectResult = mysqli_query($connect,$selectQuery);
			if(mysqli_num_rows($selectResult) > 0) {
				while($row = mysqli_fetch_assoc($selectResult)) {
					$mid = $row['M_Id'];
					$query = "SELECT * FROM likes WHERE P_Id = '$pid' AND M_Id = '$mid'";
					$result = mysqli_query($connect,$query);
					$innerRow = mysqli_fetch_assoc($result);
					$flag = $innerRow['Has_Liked'];
					
					if($flag == 1) {
						$source = "Images/like_image.png";
					} else {
						$source = "Images/unlike_image.png";
					}
					
					echo "<div>
							<table style = 'border-spacing: 10px;
								border-collapse: separate;'>
								<tr>
									<td> <h3> <strong> ".$row["P_Name"]." </strong> </h3> </td>
								</tr>
								<tr>
									<td> <h4> <strong> ".$row["Title"]." </strong> </h4> </td>
								</tr>
								<tr>
									<td>
										<video width = '650' height = '420' controls>
											<source src='".$row["File"]."' type='video/webm'>
										</video>
									</td>
									<td valign='top'> <p> ".$row["Description"]." </p> </td>
								</tr>
								<tr>
									<td> <img src = '".$source."' id = 'likeImage".$i."' onclick = 'getFlag(".$pid.",".$mid.",".$i.")' /> </td>
									<td> <p id = 'likes".$i."'> ".$row["Likes"]." Likes </p></td>
								</tr>
							</table>
				
						</div>";
						
					$i = $i+1;
				}
			}
			
		?>
		
		
        <div class = "footer">
            <div class="wrapper">
                <ul style = "list-style-type: none;
                    overflow: hidden;
                    background-color: #FA3C3C;">
                  <li> <a href="PerProfile.php">Profile</a> <li>
                  <li> <a href="PerRanklist.php">Rank List</a> </li>
				  <li> <a href="Logout.php">Logout</a> </li>
                </ul>
            </div>
        </div>
        
           
                    
      
    </body>
</html>
