<html>
    <head>
        <title> Online Talent Hunt </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
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
            .footer {
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: red;
                color: white;
                text-align: center;
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
				<li> <a href = "PerHome.php"> <i class="glyphicon glyphicon-home"></i> Home </a> </li>
                <li> <a href = "#" class = "activeTab"> <i class="glyphicon glyphicon-user"></i> Profile </a> </li>
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
			
			$pid = $_SESSION['pid'];
			
			$selectQuery = "SELECT * FROM media WHERE P_Id = '$pid'";
			$selectResult = mysqli_query($connect,$selectQuery);
			
			if(mysqli_num_rows($selectResult) > 0) {
				while($row = mysqli_fetch_assoc($selectResult)) {
					echo "<div>
							<table style = 'border-spacing: 10px;
											border-collapse: seperate;' >
								<tr>
									<td> <h4> <strong> ".$row["Title"]." </strong> </h4> </td>
								</tr>
								<tr>
									<td>
										<video width = '650' height = '420' controls>
											<source src='".$row["File"]."' type = 'video/webm'>
										</video>
									</td>
									<td valign='top'> <p> ".$row["Description"]." </p> </td>
								</tr>
								<tr>
									<td> ".$row["Likes"]." Likes </p> </td>
								</tr>
							</table>
						</div>";
				}
			} else {
				echo "You have not uploaded any videos till now";
			}
			
		?>
		
        
        <div class = "footer">
            <div class="wrapper">
                <ul style = "list-style-type: none;
                    overflow: hidden;
                    background-color: #FA3C3C;">
                  <li> <a href="PerProfile.php">Profile</a> <li>
                  <li> <a href="PerRanklist.php">Rank List</a> </li>
				  <li> <a href="Login.html">Logout</a> </li>
                </ul>
            </div>
        </div>
        
    </body>
</html>