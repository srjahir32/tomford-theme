<?php
/**
 * Template Name: User Register
 */

get_header();

if (isset($_POST['mycregisterbtn'])){
	global $reg_errors;
	$reg_errors = new WP_Error;

	$useremail=$_POST['useremail'];
	$password=$_POST['password'];

	if(empty( $useremail ) || empty($password)){
		$reg_errors->add('field', 'Required form field is missing');
	}
	if ( !is_email( $useremail ) ){
		$reg_errors->add( 'email_invalid', 'Email id is not valid!' );
	}
	if ( email_exists( $useremail ) ){
		$reg_errors->add( 'email', 'Email Already exist!' );
	}
	if ( 5 > strlen( $password ) ) {
		$reg_errors->add( 'password', 'Password length must be greater than 5!' );
	}
	if (is_wp_error( $reg_errors )){ 
		foreach ( $reg_errors->get_error_messages() as $error ){
			$signUpError='<p id="valid-error" style="color:#FF0000; text-aling:left;"><strong>ERROR</strong>: '.$error . '<br /></p>';
		} 
	}
	
	if ( 1 > count( $reg_errors->get_error_messages() ) ){
		global $useremail;
		
		$useremail = sanitize_email( $_POST['useremail'] );
		$password = esc_attr( $_POST['password'] );
	
		$userdata = array(
			'user_email' => $useremail,
			'user_pass' => $password,
			'user_login' => $useremail,
		);
		$user = wp_insert_user( $userdata );
		$login_data = array();
		$login_data['user_login'] = $useremail;
		$login_data['user_password'] = $password;
		$login_data['remember'] = "true";

		$user_verify = wp_signon( $login_data, false );
		if($user){
			wp_redirect('user-dashboard');
		}
	}
}

global $user_ID;
if (!$user_ID) {
?>
<style >
.error
 {color: red !important}
</style>
<div class="user-register">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="user-register-form">
					<h2>Create an account</h2>
					<form method="post" id="registration-form">
						<?php if (isset($signUpError) && $signUpError) echo $signUpError; ?>
						<div class="form-group">
							<label>Your Email address<span class="error">*</span></label>
							<input type="email" class="form-control" name="useremail" placeholder="Enter Email Address" required="required">
						</div>
						<div class="form-group">
							<label>Password <span class="error">*</span></label>
							<input type="password" name="password" class="form-control" placeholder="Enter Password" required="required" id="password">
							<a href="#" id ="toggleText" class="field-show" onclick="myFunction()">Show</a>
						</div>
						<div class="user-register-note">
							<p>By clicking the "Register" button, you agree to 52Hz's <a href="/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">Terms of Use</a> and <a href="/wp-content/uploads/2021/01/terms-and-conditions-template.pdf" target="_blank">Privacy Policy.</a></p>
						</div>
						<input type="submit" value="Register" class="submit-btn ml-auto" name="mycregisterbtn">
						<a href="<?php echo site_url('login')?>" class="sign-in-btn">Sign In</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} else {
	wp_redirect( home_url() );
	exit;
}
?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
jQuery(document).ready(function($) {
	$('#valid-error').show(1).delay(1500).hide(1);
	$("#registration-form").validate({
		rules: {
			useremail: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 8
			},
		},
		messages : {
			password: {
				required: "Please enter your password",
				min: "The password you entered did not meet the requirement. Please use a password has 8 or more characters."
			},
			useremail: {
				required: "Please enter your email",
				email: "The email should be in the format: abc@domain.tld"
			},
		}
	});
});
</script>
<?php get_footer();