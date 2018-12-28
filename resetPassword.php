<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//redirect to homepage if user logged in
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
	<title>Reset Password | PHP Login System by CodexWorld</title>
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
	<h2>Reset Account Password</h2>
	<div class="regisFrm">
		<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<form action="userAccount.php" method="post">
			<input type="password" name="password" placeholder="Password" required=" ">
			<input type="password" name="confirm_password" placeholder="Confirm password" required=" ">
			<div class="send-button">
				<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
				<input type="submit" name="resetSubmit" value="Update Pasword">
			</div>
		</form>
		<p class="mrt-10">Don't want to reset? <a href="index.php">Sign In</a></p>
	</div>
</div>
<div class="cw_copyright">
	<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
</div>
</body>
</html>