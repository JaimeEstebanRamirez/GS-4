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
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
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
<div class="main">
	<!-- render main page content view -->
	<div class="cwld_top_forms">
		<div class="cw-info_codex hvr-buzz-out">
			<h3>Create a New Account</h3>
			<div class="cw-info_codex_grid">
				<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
				<form action="userAccount.php" method="post">
					<input type="text" name="first_name" placeholder="First Name" required=" ">
					<input type="text" name="last_name" placeholder="Last Name" required=" ">
					<input type="email" name="email" placeholder="Email" required=" ">
					<input type="password" name="password" placeholder="Password" required=" ">
					<input type="password" name="confirm_password" placeholder="Confirm Password" required=" ">
					<input type="text" name="phone" class="single-input" placeholder="Phone">
					<input type="text" name="address" placeholder="Address">
					<input type="submit" name="signupSubmit" value="Sign Up">
				</form>
				<h5>Already a member? <a href="index.php">Sign In</a></h5>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
	<!-- render footer view -->
	<div class="cw_copyright">
		<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
	</div>
</div>
</body>
</html>