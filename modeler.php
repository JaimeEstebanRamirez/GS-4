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



<html><head>
	<title>Profile Update | PHP Login System by GroupSwitzerland</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
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
	<h4>Modeler</h4>
	<div class="menu">
		<span class="menu-icon"><a href="javascript:void(0);"><i></i><i></i><i></i></a></span>	
		<ul class="nav1">
			<li><a href="profile.php">Profile</a></li>
			<li><a href="settings.php">Settings</a></li>
            <li><a href="modeler.php">Modeler</a></li>
			<li><a href="userAccount.php?logoutSubmit=1">Logout</a></li>
		</ul>
	</div>
    
    </div><iframe src="https://demo.bpmn.io" height="500" width="800"></iframe>

	

<!-- render footer view -->
<div class="cw_copyright">
	<p>© 2019 GroupSwitzerland. All rights reserved</p>
</div>

</body></html>