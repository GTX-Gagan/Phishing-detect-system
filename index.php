<?php
session_start();

require_once 'include/config.php';
date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Policestation - Login</title>
    <style>
        
			* {
				box-sizing: border-box;
			}

			body {
				background: #1f233e;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				font-family: 'Montserrat', sans-serif;
				height: 100vh;
				margin: -20px 0 50px;
			}

			h1 {
				font-weight: bold;
				margin: 0;
			}

			p {
				font-size: 14px;
				font-weight: 100;
				line-height: 20px;
				letter-spacing: 0.5px;
			}

			span {
				font-size: 12px;
			}

			a {
				color: #333;
				font-size: 14px;
				text-decoration: none;
				margin: 15px 0;
			}

			button {
				border-radius: 20px;
				border: 1px solid #2561db;
				background-color: #2561db;
				color: #FFFFFF;
				font-size: 12px;
				font-weight: bold;
				padding: 12px 45px;
				letter-spacing: 1px;
				text-transform: uppercase;
				transition: transform 80ms ease-in;
			}

			form {
				background-color: #FFFFFF;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-direction: column;
				padding: 0 50px;
				height: 100%;
				text-align: center;
			}

			input {
				background-color: #eee;
				border: none;
				padding: 12px 15px;
				margin: 8px 0;
				width: 100%;
			}

			.container {
				background-color: #fff;
				border-radius: 10px;
				box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
				position: relative;
				overflow: hidden;
				width: 768px;
				max-width: 100%;
				min-height: 480px;
			}

			.form-container {
				position: absolute;
				top: 0;
				height: 100%;
			}

			.log-in-container {
				left: 0;
				width: 50%;
				z-index: 2;
			}


			.overlay-container {
				position: absolute;
				top: 0;
				left: 50%;
				width: 50%;
				height: 100%;
			}


			.overlay {
				background: #2561db;
				background: -webkit-linear-gradient(to right, ##81c408, ##81c408);
				background: linear-gradient(to right, ##81c408, ##81c408);
				background-repeat: no-repeat;
				background-size: cover;
				background-position: 0 0;
				color: #FFFFFF;
				position: relative;
				left: -100%;
				height: 100%;
				width: 200%;
			}

			.overlay-panel {
				position: absolute;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-direction: column;
				padding: 0 40px;
				text-align: center;
				top: 0;
				height: 100%;
				width: 50%;
			}


			.overlay-right {
				right: 0;
			}


			.social-container {
				margin: 50px 0;
			}

			.social-container a {
				border: 1px solid #DDDDDD;
				border-radius: 50%;
				display: inline-flex;
				justify-content: center;
				align-items: center;
				margin: 0 5px;
				height: 40px;
				width: 40px;
			}
    </style>
</head>
<body>
<?php

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE Email = '$email' AND Password = '$password'";

    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['isLogin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $row['User_type'];

        echo "<script>alert('You have logged in successfully');location.href='home.php'</script>";
    } else{
        
        echo "<script>alert('Invalid credentials you have entered')</script>";
    }
}
?>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form method="post">
				<h1>Login</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
				</div>
				<span>or use your account</span>
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Password" />
				<a href="register.php">New User?..Click here to Register</a>
				<button type="submit" name="login">Log In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Police Station Administration</h1>

					<?php
					$sqlser = "SELECT * FROM public_service";

					$resultser = mysqli_query($conn, $sqlser);
					
					if(mysqli_num_rows($resultser)>0){
						while($rowser = mysqli_fetch_assoc($resultser)){
					
					?>
					<p><?php echo $rowser['Name'];?> : <?php echo $rowser['Contact_no'];?></p>
					
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>