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

$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'images/no-profile-pic.png';
$userName = $userData['first_name'].' '.$userData['last_name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Update | PHP Login System by GroupSwitzerland</title>
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
	<h4>Update Password</h4>
	<div class="menu">
		<span class="menu-icon"><a href="javascript:void(0);"><i></i><i></i><i></i></a></span>	
		<ul class="nav1">
			<li><a href="profile.php">Profile</a></li>
			<li><a href="settings.php">Settings</a></li>
            <li><a href="modeler.php">Modeler</a></li>
			<li><a href="userAccount.php?logoutSubmit=1">Logout</a></li>
		</ul>
	</div>
	<div class="regisFrm">
		<div class="content-wrap">
			<div class="left">
				<img src="<?php echo $userPicture; ?>" alt="<?php echo $userName; ?>" class="img-responsive">
			</div>
			<div class="right">
				<?php echo !empty($statusMsg)?'<p class="statusMsg '.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
				<form action="userAccount.php" method="post">
				<input type="password" name="old_password" placeholder="Current password" value="" required=" ">
				<input type="password" name="password" placeholder="New password" value="" required=" ">
				<input type="password" name="confirm_password" placeholder="Confirm new password" value="" required=" ">
				<div class="send-button">
					<input type="submit" name="updatePassword" value="Update">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>	
<!-- render footer view -->
<div class="cw_copyright">
	<p>&copy; <?php echo date("Y"); ?> GroupSwitzerland. All rights reserved</p>
</div>
</body>
</html>