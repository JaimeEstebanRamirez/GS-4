<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// redirect to homepage if user logged in
if(!empty($sessData['userLoggedIn']) && $sessData['userLoggedIn'] == true){
	header("Location: index.php");
}

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP Login System by CodexWorld</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$( ".menu-icon" ).on('click', function() {
			$( "ul.nav1" ).slideToggle( 300 );
		});
	});
	</script>
</head>
<body>
<h1>PHP USER REGISTRATION AND LOGIN SYSTEM</h1>
<div class="container">
	<h2>Create a New Account</h2>
	<!-- render main page content view -->
	<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
	<div class="regisFrm">
		<form action="userAccount.php" method="post">
			<input type="email" name="email" placeholder="Email" required>
			<input type="text" name="first_name" placeholder="Name" required>
			<input type="text" name="last_name" placeholder="Surname" required>
			<input type="text" name="dob" placeholder="Date of Birth (e.g. 19/09/1994)">
			<input type="text" name="affiliation" placeholder="Affiliation">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="confirm_password" placeholder="Confirm Password" required>
			<div class="send-button">
				<input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
			</div>
		</form>
		<p class="mrt-10">Already a member? <a href="index.php">Sign In</a></p>
	</div>
</div>
<!-- render footer view -->
<div class="cw_copyright">
	<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
</div>
</body>
</html>