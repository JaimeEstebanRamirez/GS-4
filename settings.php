<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//redirect to homepage if user not logged in
if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
	include_once 'user.php';
	$user = new User();
	$conditions['where'] = array(
		'id' => $sessData['userID'],
	);
	$conditions['return_type'] = 'single';
	$userData = $user->getRows($conditions);
}else{
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
	<title>Password Update | PHP Login System by CodexWorld</title>
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
            	<a href="index.php">
				<?php
					$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'images/no-profile-pic.png';
					$userName = $userData['first_name'].' '.$userData['last_name'];
				?>
				<img src="<?php echo $userPicture; ?>" alt="<?php echo $userName; ?>" class="img-responsive">
				<h2><?php echo $userName; ?></h2>
                </a>
			</div>
		</div>
		
		<div class="cw_main_grid2">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<div class="resp-tabs-container">
						<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-3"><span class="resp-arrow"></span> </h2>
						<div class="tab-4 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-3" style="display:block">
							<div class="codex_tab_grid">
								<h4>Update Password</h4>
								<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
								<form action="userAccount.php" method="post">
								<ul class="codex_tab_grid_list">
									<li>
										Old Password
										<span><input type="password" name="old_password" placeholder="Current password" value="" required=" "></span>
									</li>
								</ul>
								<ul class="codex_tab_grid_list">
									<li>
										New Password
										<span><input type="password" name="password" placeholder="New password" value="" required=" "></span>
									</li>
								</ul>
								<ul class="codex_tab_grid_list">
									<li>
										Confirm Password
										<span><input type="password" name="confirm_password" placeholder="Confirm new password" value="" required=" "></span>
									</li>
								</ul>
								<ul class="codex_tab_grid_list sub">
									<li><input type="submit" name="updatePassword" value="Update"></li>
								</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- render footer view -->
	<div class="cw_copyright">
		<p>&copy; <?php echo date("Y"); ?> CodexWorld. All rights reserved</p>
	</div>
</div>
</body>
</html>