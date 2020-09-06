<html>
    <head>
        <title> Online Talent Hunt </title>
        <link rel = "stylesheet" href="CSS_Files\cssSheet1.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script>
			
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
                <li> <a href = "SignUp.html"><i class="glyphicon glyphicon-user"></i> Sign Up </a> </li>
                <li> <a href = "Login.php"><i class="glyphicon glyphicon-log-in"></i> Login </a> </li>
                <li> <a href = "Ranklist.php"><i class="glyphicon glyphicon-list-alt"></i> Rank list </a> </li>
            </ul>
        </div>
        
        <center>
                <h4 style="color: #001FB0"> Login into your account to like and upload videos </h4>
        </center>
		
		
		
		<?php
			include 'Connect.php';
			
			$selectQuery = "SELECT * FROM media ORDER BY Likes DESC";
			$result = mysqli_query($connect,$selectQuery);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
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
									<td id='video'>
										<video width = '650' height = '420' controls>
											<source src='".$row["File"]."' type='video/webm'>
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
			}
			
		?>
		
		
		<p style="background-color: #FA3C3C;"><b><i>“Believe in yourself. You are braver than you think, more talented than you know, and capable of more than you imagine.” </i></b></p>
        <footer>
            <div class="wrapper">
                <ul style = "list-style-type: none;
                    overflow: hidden;
                    background-color: #FA3C3C;">
                  <li> <a href="Home.php">Home</a> <li>
                  <li> <a href="SignUp.html">Sign Up</a> </li>
                  <li> <a href="Ranklist.php">Rank List</a> </li>
                </ul>
            </div>
        </footer>
        
           
                    
      
    </body>
</html>
