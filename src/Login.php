<?php
	include 'Connect.php';
	
	if(isset($_POST['loginButton'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query = "SELECT Password FROM performer WHERE Email = '$email'";
		$result = mysqli_query($connect,$query);
		if(mysqli_num_rows($result) == 0){
			echo "<script type = 'text/javascript'> alert('Incorrect email') </script>";
		} else {
			$dataPassword = mysqli_fetch_assoc($result)["Password"];
			if($password == $dataPassword){
				$selectQuery = "SELECT P_Id FROM performer WHERE Email = '$email' AND Password = '$password'";
				$selectResult = mysqli_query($connect,$selectQuery);
				$pid = mysqli_fetch_assoc($selectResult)["P_Id"];
				session_start();
				$_SESSION['pid'] = $pid;
				
				header('Location:PerProfile.php');
				exit;
			} else {
				echo "<script type = 'text/javascript'> alert('Incorrect password') </script>";
			}
		}
		
	}
?>


<html>
	<head>
		<title> Login Page </title>
		<link rel = "stylesheet" href="CSS_Files\cssSheet1.css" type="text/css"/>
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
				position: fixed;
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
                <li> <a href = "Home.php"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
                <li> <a href = "SignUp.html"><i class="glyphicon glyphicon-user"></i> Sign Up </a> </li>
                <li> <a href = "Login.html" class="activeTab"><i class="glyphicon glyphicon-log-in"></i> Login </a> </li>
                <li> <a href = "Ranklist.php"><i class="glyphicon glyphicon-list-alt"></i> Rank list </a> </li>
            </ul>
        </div>
		
		<center>
            <form name="LoginForm"
					method = "POST"
					action = "Login.php">
                <table style = "border-spacing: 10px;
								border-collapse: separate;">
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email" required></td>
                    </tr>
                    <tr>
						<td>Password:</td>
						<td><input type="password" name="password" required></td>
                     </tr>
                     <tr>
                         <td></td>
                        <td colspan="2" align="center">
                            <input type="submit" value="Login" name="loginButton" class = "buttonDesign">
                            
                        </td>
                     </tr>
                </table>
             </form>

	</center>
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