<?php
/*
 * Reset new password email sender function
 */
if(! function_exists('forgotPassEmail')){
	function forgotPassEmail($userData){
        $resetPassLink = 'http://codexworld.com/resetPassword.php?fp_code='.$userData['forgot_pass_identity'];
        $to = $userData['email'];
		$subject = "Password Update Request | CodexWorld";
        $mailContent = '<p>Dear <strong>'.$userData['first_name'].'</strong>,</p>
        <p>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.</p>
        <p>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a></p>
        <p>Let us know at contact@example.com in case of any query or feedback.</p>
        <p>Regards,<br/><strong>Team CodexWorld</strong></p>';
        
        //set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //additional headers
        $headers .= 'From: CodexWorld<sender@codex.com>' . "\r\n";
        //send email
        mail($to,$subject,$mailContent,$headers);
        return true;
    }
}

/*
 * Account verification email sender function
 */
if(! function_exists('emailVerification')){
	function emailVerification($userData){
        $emailVerifyLink = 'http://codexworld.com/userAccount.php?verifyEmail=1&ac_code='.$userData['activation_code'];
        $to = $userData['email'];
		$subject = "Please Confirm Your Email | CodexWorld";
        $mailContent = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-radius:6px;background-color:#ffffff;padding-top:15px;border-collapse:separate">
			<tbody>
				<tr>
					<td style="color:#616471;font-weight:400;text-align:left;line-height:190%;padding-top:15px;padding-right:40px;padding-bottom:30px;padding-left:40px;font-size:15px">
					<h1 style="font-weight:500;font-size:22px;letter-spacing:-1px;line-height:115%;margin:18px 0 0;padding:0;text-align:left;color:#3c7bb6">Email Confirmation</h1>
					<br>
					Thank you for signing up with CodexWorld! Please confirm your email address by clicking the link below.
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
						<tr>
							<td align="center" valign="middle" style="padding-top:25px;padding-right:15px;padding-bottom:25px;padding-left:15px">
								<table border="0" cellpadding="0" cellspacing="0" style="border-radius:.25em;background-color:#4582e8;border-collapse:separate">
								<tbody>
									<tr>
										<td align="center" valign="middle" style="border-radius:.25em;background-color:#4582e8;font-weight:400;min-width:180px;font-size:16px;line-height:100%;padding-top:18px;padding-right:30px;padding-bottom:18px;padding-left:30px;color:#ffffff">
											<a href="'.$emailVerifyLink.'" style="font-weight:500;color:#ffffff;text-decoration:none">Confirm Email</a>
										</td>
									</tr>
								</tbody>
								</table>
							</td>
						</tr>
					</tbody>
					</table>
					We look forward to serving you,<br><strong>CodexWorld Team</strong>
					</td>
				</tr>
			</tbody>
		</table>';
        //set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //additional headers
        $headers .= 'From: CodexWorld<sender@codex.com>' . "\r\n";
        //send email
        mail($to,$subject,$mailContent,$headers);
        return true;
    }
}