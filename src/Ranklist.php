<html>
	<head>
        <title> Online Talent Hunt </title>
        <link rel = "stylesheet" href="CSS_Files\cssSheet1.css" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
	
	<body>
	
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
				position: fixed;
				left: 0;
				bottom: 0;
				width: 100%;
				background-color: red;
				color: white;
				text-align: center;
			}
        </style>
		
		<div>
            <h1 style = "font-family: cursive;
				padding-left: 50">
				<i><b> The Shining Stars </b></i>
			</h1>
            <ul style = "list-style-type: none;
                padding: 0;
                background-color: #FA3C3C;
                overflow: hidden;">
                <li> <a href = "Home.php"> <i class="glyphicon glyphicon-home"></i> Home </a> </li>
                <li> <a href = "SignUp.html"><i class="glyphicon glyphicon-user"></i> Sign Up </a> </li>
                <li> <a href = "Login.php"><i class="glyphicon glyphicon-log-in"></i> Login </a> </li>
                <li> <a href = "#" class = "activeTab"><i class="glyphicon glyphicon-list-alt"></i> Rank list </a> </li>
            </ul>
        </div>
		
		<?php
			
			include 'Connect.php';
			
			echo "<center> <div>
					<table border='1'>
						<tr style = 'color: #ffffff; background-color: #fa3c3c;'>
							<th style='text-align: center'> Rank </th>
							<th style='text-align: center'> Video Title </th>
							<th style='text-align: center'> Performer Name </th>
							<th style='text-align: center'> Likes </th>
						</tr>";
						
			$rank = 1;
			
			$select = "SELECT * FROM media ORDER BY Likes DESC";
			$result = mysqli_query($connect,$select);
			while($row = mysqli_fetch_assoc($result)) {
				echo "
						<tr>
							<td width = '5%' align='center'> <p> ".$rank." <p> </td>
							<td width = '25%' align='center'> <p> ".$row["Title"]." <p> </td>
							<td width = '25%' align='center'> <p> ".$row["P_Name"]." </p> </td>
							<td width = '20%' align='center'> <p> ".$row["Likes"]." Likes </p> </td>
						</tr>";
				$rank = $rank + 1;
			}
			
			echo "</table> </div> </center>";
			
		?>
		
		
		<div class="footer">
            <div class="wrapper">
    
                <ul style = "list-style-type: none;
							overflow: hidden;
							background-color: #FA3C3C;">
					<li> <a href="Home.php">Home</a> <li>
					<li> <a href="SignUp.html">Sign Up</a> </li>
					<li> <a href="Ranklist.php">Rank List</a> </li>
                </ul>
            </div>
		</div>
		
	</body>
	
</html>