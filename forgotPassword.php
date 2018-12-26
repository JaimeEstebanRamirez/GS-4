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
	<title>Forgot Password | PHP Login System by CodexWorld</title>
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
	<div class="cwld_top_forms">
		<div class="cw-info_codex cw-info_codex_sub hvr-buzz-out">
			<h3>Recover Account Password</h3>
			<div class="cw-info_codex_grid second">
				<h5>Enter the email address you used to sign up and we'll send you a link to reset your password.</h5>
				<?php if(isset($_GET['frmDis']) && $_GET['frmDis'] == 0){ ?>
				<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
				<h5>Didn’t receive the email? <a href="forgotPassword.php">Request reset link</a></h5>
				<?php }else{ ?>
				<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
				<form action="userAccount.php" method="post">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="submit" name="forgotSubmit" value="Continue">
				</form>
				<?php } ?>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
	<div class="cw_copyright">
		<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
	</div>
</div>
</body>
</html>