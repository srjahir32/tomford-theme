<?php
/**
 * Template Name: Password 2 - Confirm
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

	if( isset( $_POST['action'] ) && $_POST['action'] == 'reset-confirmation' ) {
		$email = trim($_POST['email']);
		
		if( empty( $email ) ) {
			$error = 'Enter an e-mail address.';
		} else if( ! is_email( $email )) {
			$error = 'Invalid e-mail address.';
		} else if( ! email_exists( $email ) ) {
			$error = 'There is no user registered with that email address.';
		} else {
			$confirmation_code = $_POST['confirmation_code'];
			$user = get_user_by( 'email', $email );
			$activation_key = $user->data->user_activation_key;
			if ($confirmation_code != $activation_key) {
				$error = 'The confirmation code is incorrect.';
			} else {
				$success = 'Input your new password.';
			}
		}
		
		if( ! empty( $error ) )
			$resetError = '<p id="valid-error" style="color: #FF0000; text-aling: left;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
		else {
			if( ! empty( $success ) )
				wp_redirect( 'update-password' . '?email=' . $email );
			$resetError = '<p style="color:green; text-aling:left;"><strong>SUCCESS</strong>: ' . $success . '<br /></p>';
		}
	}
?>
<section class="reset-password">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="reset-password-confirmation-form">
					<h2>Reset Password</h2>
					<form name="reset-confirmation-password-form" id="reset-confirmation-password-form" action="" method="post">
						<?php if(isset($resetError)) { echo '<div>' . $resetError . '</div>'; } ?>
						<input type="hidden" name="action" value="reset-confirmation" />
						<div class="form-group">
							<label>Your Email address</label>
							<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly>
						</div>
						<div class="form-row">
							<div class="form-group col-8 mb-0">
								<label>Confirmation code</label>
								<input type="text" name="confirmation_code" class="form-control">
							</div>
							<div class="form-group col-4 mb-0">
								<button type="submit" class="reset-password-confirmation-submit">Reset<br> Password</button>
							</div>
						</div>
						<div class="not-get-email">
							<a href="<?php echo site_url('resend-code') . '?email=' . $email; ?>">Didn’t get the email?</a>
						</div>
						<div class="reset-password-confirmation-note">
							<p>Please check your email for the confirmation code.</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1000).delay(3000).hide(100);
	$("#reset-confirmation-password-form").validate({
		rules: {
			email: {
				required: true,
			},
			confirmation_code: {
				required: true,
			},
		},
	});
});
</script>
<?php
} else {
	wp_redirect( home_url('user-dashboard') );
	exit;
}

get_footer();