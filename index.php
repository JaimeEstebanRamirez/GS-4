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
	<h1>PHP USER REGISTRATION AND LOGIN SYSTEM</h1>
	<!-- render main page content view -->
	<?php
	if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
		include_once 'user.php';
		$user = new User();
		$conditions['where'] = array(
			'id' => $sessData['userID'],
		);
		$conditions['return_type'] = 'single';
		$userData = $user->getRows($conditions);
	?>
	<div class="cwld_top_forms cw_main_grid">
		<div class="cw_main_grid1">
			<div class="cw_main_grid1_left">
				<img src="images/star.png" alt=" " class="img-responsive">
			</div>
			<div class="cw_main_grid1_right">
				<div class="menu">
					<span class="menu-icon"><a href="javascript:void(0);"><i></i><i></i><i></i></a></span>	
					<ul class="nav1">
						<li><a href="profile.php">Profile</a></li>
						<li><a href="settings.php">Settings</a></li>
						<li><a href="userAccount.php?logoutSubmit=1">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="clear"> </div>
			<div class="cw_main_grid1_sub">
				<?php
					$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'images/no-profile-pic.png';
					$userName = $userData['first_name'].' '.$userData['last_name'];
				?>
				<img src="<?php echo $userPicture; ?>" alt="<?php echo $userName; ?>" class="img-responsive">
				<h2><?php echo $userName; ?></h2>
			</div>
		</div>
		
		<div class="cw_main_grid2">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<div class="resp-tabs-container">
						<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-3"><span class="resp-arrow"></span> </h2>
						<div class="tab-4 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-3" style="display:block">
							<div class="codex_tab_grid">
								<h4>Contact Me</h4>
								<ul class="codex_tab_grid_list">
									<li><img src="images/call.png" alt=" " class="img-responsive"></li>
									<li>Mobile<span><?php echo $userData['phone']; ?></span></li>
								</ul>
								<ul class="codex_tab_grid_list">
									<li><img src="images/mail.png" alt=" " class="img-responsive"></li>
									<li>Mail Me<span><a href="mailto:<?php echo $userData['email']; ?>"><?php echo $userData['email']; ?></a></span></li>
								</ul>
								<ul class="codex_tab_grid_list">
									<li><img src="images/address.png" alt=" " class="img-responsive"></li>
									<li>Address<span><?php echo $userData['address']; ?></span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }else{ ?>
    <div class="cwld_top_forms">
		<div class="cw-info_codex cw-info_codex_sub hvr-buzz-out">
			<h3>Login</h3>
			<div class="cw-info_codex_grid second">
				<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
				<form action="userAccount.php" method="post">
					<input type="email" name="email" placeholder="Email" required="">
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
					<input type="submit" name="loginSubmit" value="Sign In">
				</form>
				<h5>Don't have an account? <a href="registration.php">Sign Up</a></h5>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
	<?php } ?>
	<!-- render footer view -->
	<div class="cw_copyright">
		<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
	</div>
</div>
</body>
</html>