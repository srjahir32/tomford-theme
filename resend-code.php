<?php
/**
 * Template Name: Password 4 - Resend
 */

get_header();

global $user_ID;
if (!$user_ID) {
	$error = '';
	$success = '';
	$email = '';

	if( isset( $_GET['email'] )) {
		$email = trim($_GET['email']);
	}

	if( isset( $_POST['action'] ) && $_POST['action'] == 'resend' ) {
		$email = trim($_POST['email']);
		
		if( empty( $email ) ) {
			$error = 'Enter an e-mail address..';
		} else if( ! is_email( $email )) {
			$error = 'Invalid e-mail address.';
		} else if( ! email_exists( $email ) ) {
			$error = 'There is no user registered with that email address.';
		} else {
			$user = get_user_by( 'email', $email );
			
			if( $update_user ) {
				$to = $email;
				$subject = 'Verification Code';
				$sender = 'admin@tomford.com';
				
				$message = 'Your verification code: '.$nineRandomDigit;
				
				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = 'From: Tom Ford < ' . $sender . '>' . "\r\n";
				
				$mail = wp_mail( $to, $subject, $message, $headers );
				if( $mail )
					$success = 'Check your email address for code.';
			} else {
				$error = 'Oops something went wrong updaing your account.';
			}
		}
		
		if( ! empty( $error ) )
			$resetError = '<p id="valid-error" style="color: #FF0000; text-aling: left;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
					
		if( ! empty( $success ) )
			wp_redirect( 'reset-password-confirmation' . '?email=' . $email );
		$resetError = '<p style="color:green; text-aling:left;"><strong>SUCCESS</strong>: ' . $success . '<br /></p>';
	}
?>
<section class="reset-password">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="again-reset-password-form">
					<h2>Reset Password</h2>
					<div class="form-group mb-0">
						<label>Your Email address</label>
						<input type="email" class="form-control" value="<?php echo $email; ?>" readonly>
					</div>
					<div class="contact-to-reset">
						<a href="mailto:admin@tomford.com">Contact us to reset your password</a>
					</div>
					<div class="timer-to-reset">
						<p><span id="reset-password-timer">05:00</span> before we can send you a new confirmation code</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1000).delay(3000).hide(1000);
});

// Reset Password Timer
function startTimer(duration, display) {
	var timer = duration, minutes, seconds;
	setInterval(function () {
		minutes = parseInt(timer / 60, 10)
		seconds = parseInt(timer % 60, 10);

		minutes = minutes < 10 ? "0" + minutes : minutes;
		seconds = seconds < 10 ? "0" + seconds : seconds;

		display.textContent = minutes + ":" + seconds;

		if (--timer < 0) {
			timer = duration;
			window.location = "/forgot-password/?email=<?php echo $email; ?>";
		}
	}, 1000);
}

window.onload = function () {
	var fiveMinutes = 60 * 5,
	display = document.querySelector('#reset-password-timer');
	if (display) {
		startTimer(fiveMinutes, display);
	}
};

</script>
<?php
} else {
	wp_redirect( home_url('user-dashboard') );
	exit;
}

get_footer();