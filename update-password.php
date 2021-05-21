<?php
/**
 * Template Name: Password 3 - Update
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

	if( isset( $_POST['action'] ) && $_POST['action'] == 'update' ) {
		$email = trim($_POST['email']);
		$password = $_POST['new_password'];

		$user_role = "";
		
		if( empty( $email ) ) {
			$error = 'Enter an e-mail address.';
		} else if( ! is_email( $email )) {
			$error = 'Invalid e-mail address.';
		} else if( ! email_exists( $email ) ) {
			$error = 'There is no user registered with that email address.';
		} else {
			$user = get_user_by( 'email', $email );
			$user_roles = $user->roles;
			$user_role = (in_array('team', $user_roles)) ? 'team' : (in_array('judge', $user_roles) ? 'judge' : 'submission');
			wp_set_password($password, $user->ID);
			
			$to = $email;
			$subject = 'Password is reset';
			$sender = 'admin@tomford.com';
			$message = 'Your password is reset.';
			
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = 'From: Tom Ford < ' . $sender . '>' . "\r\n";
			
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail )
				$success = 'Your password is reset.';
			else
				$error = 'Oops! Something went wrong sending mail.';
		}
		
		if( ! empty( $error ) )
			$resetError = '<p id="valid-error" style="color: #FF0000; text-aling: left;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
		else {
			if( ! empty( $success ) ) {
				if ($user_role == "team")
					wp_redirect( home_url('team-login') );
				else if ($user_role == "judge")
					wp_redirect( home_url('judge-login') );
				else
					wp_redirect( home_url('login') );
			}
			$resetError = '<p style="color:green; text-aling:left;"><strong>SUCCESS</strong>: ' . $success . '<br /></p>';
		}
	}
?>
<section class="reset-password">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="update-password-form">
					<h2>Reset Password</h2>
					<form name="update-password-form" id="update-password-form" action="" method="post">
						<?php if(isset($resetError)) { echo '<div>' . $resetError . '</div>'; } ?>
						<input type="hidden" name="action" value="update" />
						<div class="form-group">
							<label>Your Email address</label>
							<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly>
						</div>
						<div class="form-group">
							<label>New password</label>
							<input type="password" id="new_password" name="new_password" class="form-control">
						</div>
						<div class="form-group">
							<label>Confirm new password</label>
							<input type="password" id="confirm_password" name="confirm_password" class="form-control">
						</div>
						<button type="submit" class="update-password">Update<br> Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1000).delay(3000).hide(1000);
	$("#update-password-form").validate({
		rules: {
			new_password : {
				required: true,
				minlength: 8
			},
			confirm_password : {
				required: true,
				equalTo: "#new_password"
			},
		},
		messages : {
			new_password: {
				required: "Please enter your new password.",
				minlength: "The password you entered is less than 8 charaters"
			},
			confirm_password: {
				required: "Please enter your new password.",
				equalTo: "The password you entered did not match the new password."
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