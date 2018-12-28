<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//check whether user ID is available in cookie
if(!empty($_COOKIE['rememberUserId'])){
	$_SESSION['sessData']['userLoggedIn'] = TRUE;
	$_SESSION['sessData']['userId'] = $_COOKIE['rememberUserId'];
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
	<title>PHP Login System by CodexWorld</title>
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
	<?php
	if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
		include_once 'user.php';
		$user = new User();
		$conditions['where'] = array(
			'id' => $sessData['userID'],
		);
		$conditions['return_type'] = 'single';
		$userData = $user->getRows($conditions);
		
		$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'images/no-profile-pic.png';
		$userName = $userData['first_name'].' '.$userData['last_name'];
	?>
	<div class="menu">
		<span class="menu-icon"><a href="javascript:void(0);"><i></i><i></i><i></i></a></span>	
		<ul class="nav1">
			<li><a href="profile.php">Profile</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="userAccount.php?logoutSubmit=1">Logout</a></li>
		</ul>
	</div>
	<div class="regisFrm">
		<div class="content-wrap">
			<div class="left">
				<img src="<?php echo $userPicture; ?>" alt="<?php echo $userName; ?>" class="img-responsive">
			</div>
			<div class="right">
				<p><b>Name: </b><?php echo $userName; ?></p>
				<p><b>Email: </b><?php echo $userData['email']; ?></p>
				<p><b>Username: </b><?php echo $userData['username']; ?></p>
				<p><b>Date of Birth: </b><?php echo $userData['dob']; ?></p>
				<p><b>Affiliation: </b><?php echo $userData['affiliation']; ?></p>
			</div>
		</div>
	</div>
	<?php }else{ ?>
	<h2>Login to Your Account</h2>
	<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
		<form action="userAccount.php" method="post">
			<input type="text" name="username" placeholder="Username" required="">
			<input type="password" name="password" placeholder="Password" required="">
			<div class="cw_remember">
				<div class="cw_remember_left">
				<div class="check">
					<label class="checkbox"><input type="checkbox" name="rememberMe" value="1"><i> </i>remember me</label>
				</div>
				</div>
				<div class="cw_remember_right">
				<a href="forgotPassword.php">Forgot Password?</a>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="send-button">
				<input type="submit" name="loginSubmit" value="LOGIN">
			</div>
		</form>
		<p class="mrt-10">Don't have an account? <a href="registration.php">Sign Up</a></p>
	</div>
	<?php } ?>
</div>

<!-- render footer view -->
<div class="cw_copyright">
	<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
</div>
</body>
</html>