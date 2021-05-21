<?php
/**
 * Template Name: Team Portal Login
 */

get_header();

if (isset($_POST) && $_POST) {
	global $login_errors;
	$login_errors = new WP_Error;
	
	//We shall SQL escape all inputs
	$username = isset($_REQUEST['username']) ? esc_sql($_REQUEST['username']) : "";
	$password = isset($_REQUEST['password']) ? esc_sql($_REQUEST['password']) : "";
	$remember = isset($_REQUEST['rememberme']) ? esc_sql($_REQUEST['rememberme']) : "";

	if($remember) $remember = "true";
	else $remember = "false";

	$login_data = array();
	$login_data['user_login'] = $username;
	$login_data['user_password'] = $password;
	$login_data['remember'] = $remember;

	if ($username) {
		$user = get_user_by( 'email', $login_data['user_login'] );
		$role = $user->roles;
		if ( !in_array('team', $role) ) {
			$error = "Invalid login details";
			$loginError = '<p style="color:#FF0000;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
		} else {
			$user_verify = wp_signon( $login_data, false );
			if ( is_wp_error($user_verify) ) {
				$error = "Invalid login details";
				$loginError = '<p style="color:#FF0000;"><strong>ERROR</strong>: ' . $error . '<br /></p>';
			} else {
				wp_redirect('/team-dashboard/');
				exit();
			}
		}
	}
}

global $user_ID;
if (!$user_ID) {
?>
<div class="user-register">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="user-login-form">
					<h2>52HZ Team Portal</h2>
					<form id="login-form" name="login-form" action="<?php echo home_url(); ?>/team-login/" method="post">
						<?php if (isset($loginError)) { echo '<div>' . $loginError . '</div>'; } ?>
						<div class="form-group">
							<label>Your Email address</label>
							<input type="email" name="username" class="form-control" placeholder="Enter Email Address" required="required">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="required">
							<a href="#" id ="toggleText" class="field-show" onclick="myFunction()">Show</a>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="form-check">
									<label class="form-check-label" for="form-check-input">
										<input name="form-check-input" id="form-check-input" class="form-check-input" type="checkbox" value=""> Remember me
									</label>
								</div>
							</div>
							<div class="form-group text-right col-md-6">
								<a href="<?php echo site_url('forgot-password')?>" class="forgot-password">Forgot password?</a>
							</div>
						</div>
						<div class="user-login-buttons">
							<input type="submit" value="Sign In" class="submit-btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} else {
	wp_redirect('/team-dashboard/');
	exit;
}

get_footer();