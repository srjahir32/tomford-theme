<?php 
/** 
 * Template Name: Login
 */

get_header();

if (isset($_POST) && $_POST){
	global $login_errors;
	$login_errors = new WP_Error;
	
	//We shall SQL escape all inputs
	$username = isset($_REQUEST['username']) ? esc_sql($_REQUEST['username']) : "";
	$password = isset($_REQUEST['password']) ? esc_sql($_REQUEST['password']) : "";
	$remember = isset($_REQUEST['rememberme']) ? esc_sql($_REQUEST['rememberme']) : "";

	if ($remember) $remember = "true";
	else $remember = "false";

	$login_data = array();
	$login_data['user_login'] = $username;
	$login_data['user_password'] = $password;
	$login_data['remember'] = $remember;
	
	$user_verify = wp_signon( $login_data, false );
	
	if ( is_wp_error($user_verify) ) {
		$error = "Invalid login details";
		$loginError='<p id="valid-error" style="color:#FF0000; text-aling:left;"><strong>ERROR</strong>: '.$error . '<br /></p>';
	} else {
		wp_redirect('user-dashboard');
		exit();
	}
} else {}

global $user_ID;
if (!$user_ID) {
?>
<style>
.error {color: red !important}
</style>
<div class="user-register">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="user-login-form">
					<h2>Submission Portal</h2>
					<form id="login-form" name="login-form" action="<?php echo home_url(); ?>/login/" method="post" id="login-form">
						<?php if(isset($loginError)){echo '<div>'.$loginError.'</div>';}?>
						<div class="form-group">
							<label>Your Email address</label>
							<input type="email" name="username" class="form-control" placeholder="Enter Email Address" required="required">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Enter Password" required="required" id="password">
							<a href="#" id ="toggleText" class="field-show" onclick="myFunction()">Show</a>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="">
									<label class="form-check-label">Remember me</label>
								</div>
							</div>
							<div class="form-group col-md-6">
								<a href="<?php echo site_url('forgot-password')?>" class="forgot-password">Forgot password?</a>
							</div>
						</div>
						<div class="user-login-buttons">
							<a href="<?php echo site_url('registration')?>">Create Account</a>
							<input type="submit" value="Sign In" name="login_user" class="submit-btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} else {
	wp_redirect( home_url('user-dashboard') );
	exit;
}
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1000).delay(3000).hide(1000);
	$("#login-form").validate({
		rules: {
			username : {
				required: true,
				email: true
			},
			password : {
				required: true,
				minlength: 8
			},
		},
		messages : {
			password: {
				required: "Please enter your password",
				min: "The password you entered did not meet the requirement. Please use a password has 8 or more characters."
			},
			username: {
				required: "Please enter your email",
				email: "The email should be in the format: abc@domain.tld"
			},
		}
	});
});
</script>
<?php get_footer();