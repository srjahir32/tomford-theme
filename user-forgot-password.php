<?php
/**
 * Template Name: Password 1 - Forgot
 */

get_header();

global $user_ID;
if (!$user_ID) {
	$error = '';
	$success = '';
	$email = '';
	$resend = false;

	if( isset( $_GET['email'] )) {
		$email = trim($_GET['email']);
		$resend = true;
	}

	if( isset( $_POST['action'] ) && $_POST['action'] == 'reset' ) {
		$email = trim($_POST['user_login']);
		
		if( empty( $email ) ) {
			$error = 'Enter an e-mail address.';
		} else if( ! is_email( $email )) {
			$error = 'Invalid e-mail address.';
		} else if( ! email_exists( $email ) ) {
			$error = 'There are no user registered with that email address.';
		} else {
			$user = get_user_by( 'email', $email );
			$nineRandomDigit = rand(100000000, 999999999);
			
			$update_user = wp_update_user( array (
					'ID' => $user->ID,
					'user_activation_key' => $nineRandomDigit
				)
			);
			// if update user return true then lets send user an email containing the new password
			if( $update_user ) {
				$to = $email;
				$subject = 'Verification Code';
				$message = 'Your verification code: ' . $nineRandomDigit;
				$sender = 'admin@tomford.com';
				
				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = 'From: Tom Ford <' . $sender . '>' . "\r\n";
				
				$mail = wp_mail( $to, $subject, $message, $headers );
				if( $mail )
					$success = 'Check your email address for code.';
				else
					$error = 'Oops! Something went wrong sending mail.';
			} else {
				$error = 'Oops! Something went wrong updating your account.';
			}
		}
		
		if( ! empty( $error ) )
			$resetError = '<p id="valid-error" style="color: #FF0000; text-aling: left;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
		else {
			if( ! empty( $success ) )
				wp_redirect( 'reset-password-confirmation' . '?email=' . $email );
			$resetError = '<p style="color: green; text-aling: left;"><strong>SUCCESS</strong>: ' . $success . '<br /></p>';
		}
	}
?>
<section class="reset-password" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="reset-password-form">
					<h2>Reset Password</h2>
					<p>We will send you an email to confirm your password reset.</p>
					<form name="reset-password-form" id="reset-password-form" action="" method="post">
						<?php if(isset($resetError)) { echo '<div>' . $resetError . '</div>'; } ?>
						<input type="hidden" name="action" value="reset">
						<div class="form-group">
							<label>Your Email address</label>
							<input type="email" name="user_login" id="user_login" class="form-control" value="<?php echo $email; ?>" placeholder="myemail@google.com"<?php if ($resend) echo ' readonly'; ?>>
						</div>
						<div class="user-login-buttons">
							<button type="submit" class="reset-password-submit"><?php echo $resend ? 'Send Again' : 'Reset'; ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1000).delay(3000).hide(1000);
	$("#reset-password-form").validate({
		rules: {
			user_login: {
				required: true,
				email: true
			},
		},
		messages: {
			user_login: {
				required: "Please enter your email",
				email: "The email should be in the format: abc@domain.tld"
			},
		}
	});
});
</script>
<?php
} else {
	wp_redirect( home_url('user-dashboard') );
	exit;
}

get_footer();