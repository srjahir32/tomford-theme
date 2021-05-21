<?php
/**
 * Template Name: User Submission Step7
 */

get_header();

//require_once 'stripe-php/init.php';
$STRIPE_PUBLISHABLE_KEY = 'pk_test_nwX5FT7TvJXEXqewpMnklpa4';

$payment_id = '';
$statusMsg = '';
$ordStatus = '';
$payment_status = '';
global $current_user, $user_ID;

if (isset($_POST) && $_POST) {
	$billing_address = $_POST['billing_address'];
	$city = $_POST['city'];
	$zip_code = $_POST['zip_code'];
	$country = $_POST['country'];
}

if (!empty($_POST['stripeToken'])) {

	$ordStatus = 'error';
	
	// Retrieve stripe token, card and user info from the submitted form data
	$token = $_POST['stripeToken'];

	// Include Stripe PHP library
	require_once 'stripe/init.php';
	
	// Set API key 
	\Stripe\Stripe::setApiKey('sk_test_fBILoD7ScttX0KLiHI39WktP');
	
	// Add customer to stripe
	try {
		$customer = \Stripe\Customer::create(array(
			'email' => $current_user->data->user_login,
			'source' => $token
		));
	} catch(Exception $e) {
		$api_error = $e->getMessage();
	}
	
	if (empty($api_error) && $customer) {
		$itemPrice = 100;
		$currency = 'USD';
		// Convert price to cents
		$itemPriceCents = ($itemPrice * 100);
		
		// Charge a credit or a debit card
		try {
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount' => $itemPriceCents,
				'currency' => $currency,
				'description' => 'Judge fee'
			));
		} catch (Exception $e) {
			$api_error = $e->getMessage();
		}
		
		if (empty($api_error) && $charge) {
		
			// Retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			// Check whether the charge is successful 
			if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
				// Transaction details
				$transactionID = $chargeJson['balance_transaction'];
				$paidAmount = $chargeJson['amount'];
				$paidAmount = $paidAmount / 100;
				$paidCurrency = $chargeJson['currency'];
				$payment_status = $chargeJson['status'];
				
				$post_id = wp_insert_post( array(
					'post_status' => 'publish',
					'post_type' => 'user_payments',
					'post_title' => $_POST['title'],
					'post_author' => $user_ID
				) );
				
				update_post_meta($post_id, 'transaction_id', $transactionID);
				update_post_meta($post_id, 'amount', $paidAmount);
				update_post_meta($post_id, 'currency', $paidCurrency);
				update_post_meta($post_id, 'payment_status', $payment_status);
				update_post_meta($post_id, 'billing_address', $billing_address);
				update_post_meta($post_id, 'city', $city);
				update_post_meta($post_id, 'zip_code', $zip_code);
				update_post_meta($post_id, 'country', $country);
				update_post_meta($post_id, 'user_email', $current_user->data->user_login);
				update_post_meta($post_id, 'user_id', $user_ID);

				$updated = update_user_meta($user_ID, 'current_step', 7);
				// If the order is successful
				if ($payment_status == 'succeeded') {
					$ordStatus = 'success';
					$statusMsg = 'Your Payment has been Successful!';
				} else {
					$statusMsg = "Your Payment has Failed!";
				}
			}else{
				$statusMsg = "Transaction has been failed!";
			}
		} else {
			$statusMsg = "Charge creation failed! $api_error";
		}
	} else {
		$statusMsg = "Invalid card details! $api_error";
	}
} else {
	$statusMsg = "Error on form submission.";
}

if (isset($_POST['currentStep']) && $_POST['currentStep'] == 7) {
	$args = array(
		'author' => $current_user->ID,
		'post_type' => 'user_submission',
		'posts_per_page' => -1,
		'orderby' => 'post_date',
		'order' => 'ASC',
	);
	$current_user_posts = get_posts($args);
	$post_id = $current_user_posts[0]->ID;

	//$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	update_post_meta($post_id, 'billing_address', $billing_address);
	update_post_meta($post_id, 'billing_city', $city);
	update_post_meta($post_id, 'billing_zipcode', $zip_code);
	update_post_meta($post_id, 'billing_country', $country);
}

if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	/*if ($user_current_step == 7) {
		wp_redirect( home_url('user-dashboard'));
	}*/
?>
<section class="portal-tabs">
	<div class="container-fluid">
		<?php get_template_part( 'template-parts/tab-content' );?>
		<div class="submission-form">
			<div class="submission-form-title">
				<h2>Submitting documents</h2>
			</div>
			<!-- Step 7 -->
			<div class="submission-step active">
				<form action="" method="POST" id="paymentFrm">
					<div class="steps-progress">
						<h3>Payment & Submit</h3>
						<div class="step-progress-box">
							<ul>
								<li id="step-1" class="active"><a href="/user-submission-step1/"></a></li>
								<li id="step-2" class="active"><a href="/user-submission-step2/"></a></li>
								<li id="step-3" class="active"><a href="/user-submission-step3/"></a></li>
								<li id="step-4" class="active"><a href="/user-submission-step4/"></a></li>
								<li id="step-5" class="active"><a href="/user-submission-step5/"></a></li>
								<li id="step-6" class="active"><a href="/user-submission-step6/"></a></li>
								<li id="step-7" class="active"></li>
							</ul>
						</div>
					</div>
					<div class="payment-info">
						<h3>you are about to submit your documents</h3>
						<h3>Why the fee</h3>
						<p>we will judge your documents base on the following areas. Atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per. Dicta omnes ius ut, ei atomorum voluptatum definitionem per. Zril petentium sit at, vel at quis corrumpit. At facilisi contentiones per.</p>
					</div>
					<input type="hidden" name="currentStep" value="7">
					<div class="billing-form step-form">
						<h2>Billing information</h2>
						<div class="form-group">
							<label>Billing address</label>
							<input type="text" class="form-control" name="billing_address" id="billing_address" value="<?php if (isset($billing_address)) echo $billing_address; ?>">
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="text" class="form-control" name="city" id="city" value="<?php if (isset($city)) echo $city; ?>">
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label>Zip Code</label>
								<input type="text" class="form-control" name="zip_code" id="zip_code" value="<?php if (isset($zip_code)) echo $zip_code; ?>">
							</div>
							<div class="form-group col">
								<label>Country</label>
								<input type="text" class="form-control" name="country" id="country" value="<?php if (isset($country)) echo $country; ?>">
							</div>
						</div>
					</div>
					<div id="card-element">
						<div class="payment-form step-form">
							<h2>Payment information</h2>
							<div class="form-group">
								<label>Card Number</label>
								<div class="form-control" id="card_number" data-inputmask="'mask': '9999-9999-9999-9999'"></div>
								<div id="paymentResponse" class="error"></div>
							</div>
							<div class="form-row">
								<div class="form-group col">
									<label>Expires On</label>
									<div id="card_expiry" class="form-control" data-inputmask="'mask': '99/99'"></div>
									<div id="expiryResponse" class="error"></div>
								</div>
								<div class="form-group col">
									<label>Security Code</label>
									<div id="card_cvc" class="form-control" data-inputmask="'mask': '999'"></div>
									<div id="cvcResponse" class="error"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-agreement">
						<p>please note that you <strong>won’t be able to edit</strong> you document once you hit the submit button.</p>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" name="formAgreement" id="formAgreement">
							<label class="form-check-label">By clicking the submit button I understand and agree to the <a href="<?php echo site_url('wp-content/uploads/2021/01/terms-and-conditions-template.pdf') ?>" target="_blank">terms</a> and <a href="<?php echo site_url('wp-content/uploads/2021/01/terms-and-conditions-template.pdf') ?>" target="_blank">conditions</a> set forth for the competition</label>
						</div>
					</div>
					<div class="step-buttons">
						<button type="button" id="back-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Back</button>
						<button type="submit" id="submit-btn" class="step-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<div class="modal fade action-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="action-modal-content">
					<h2>Exiting document submission page</h2>
					<p>Exiting document submission page without saving will lose all information you filled in.</p>
					<div class="action-modal-button">
						<button data-dismiss="modal" aria-label="Close">Cancel</button>
						<button type="submit">Okay</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="successfullySubmissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="successfully-submission-content">
					<h2>Submission Completed</h2>
					<p>You’ll get an email update about the status of your submission. You do not need to come back here.</p>
					<button data-dismiss="modal" id="submit-ok" aria-label="Close">Okay</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="failedSubmissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="successfully-submission-content">
					<h2>Payment Failed</h2>
					<p>Please double check your payment information and try again</p>
					<button data-dismiss="modal" id="failed-button" aria-label="Close">Okay</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} else {
	wp_redirect( home_url('login') );
	exit;
}
?>

<?php if ($payment_status == 'succeeded') { ?>
<script type="text/javascript">
$ = jQuery;
$(window).on('load', function() {
	$('#successfullySubmissionModal').modal('show').on('hidden.bs.modal', function (e) {
		location.href = 'user-dashboard';
	});
});
</script>
<?php } else if ($ordStatus == "error") { ?>
<script type="text/javascript">
$ = jQuery;
$(window).on('load', function() {
	$('#failedSubmissionModal').modal('show');
});
</script>
<?php } ?>

<script src="https://js.stripe.com/v3/"></script>
<script>
jQuery(document).ready(function($) {
	// Create an instance of the Stripe object
	// Set your publishable API key
	var stripe = Stripe('<?php echo $STRIPE_PUBLISHABLE_KEY; ?>');

	// Create an instance of elements
	var elements = stripe.elements();

	var style = {
		base: {
			fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
			fontSize: '16px',
			fontWeight: 400,
			lineHeight: '1.4',
			backgroundColor: '#fff',
			color: '#555',
			'::placeholder': {
				color: '#888',
			},
		},
		invalid: {
			color: '#eb1c26',
		}
	};

	var cardElement = elements.create('cardNumber', {
		style: style,
	});
	cardElement.mount('#card_number');

	var exp = elements.create('cardExpiry', {
		'style': style
	});
	exp.mount('#card_expiry');

	var cvc = elements.create('cardCvc', {
		'style': style
	});
	cvc.mount('#card_cvc');

	// Validate input of the card elements
	var resultContainer = document.getElementById('paymentResponse');
	cardElement.addEventListener('change', function(event) {
		if (event.error) {
			resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
			$("#submit-btn").prop('disabled', true);
			$("#submit-btn").addClass("disabled-button");
		} else {
			resultContainer.innerHTML = '';
			if (allFilled1()) {console.log('-yes-');
				if ($('#card_expiry').hasClass('StripeElement--complete') && $('#card_cvc').hasClass('StripeElement--complete')) {
					$("#submit-btn").prop('disabled', false);
					$("#submit-btn").removeClass("disabled-button");
				}
			} else {console.log('-no-');
				$("#submit-btn").prop('disabled', true);
				$("#submit-btn").addClass("disabled-button");
			}
		}
	});

	var resultContainer1 = document.getElementById('expiryResponse');
	exp.addEventListener('change', function(event) {
		if (event.error) {
			resultContainer1.innerHTML = '<p>' + event.error.message + '</p>';
			$("#submit-btn").prop('disabled', true);
			$("#submit-btn").addClass("disabled-button");
		} else {
			resultContainer1.innerHTML = '';
			if (allFilled1()) {console.log('-yes-');
				if ($('#card_number').hasClass('StripeElement--complete') && $('#card_cvc').hasClass('StripeElement--complete')) {
					$("#submit-btn").prop('disabled', false);
					$("#submit-btn").removeClass("disabled-button");
				}
			} else {console.log('-no-');
				$("#submit-btn").prop('disabled', true);
				$("#submit-btn").addClass("disabled-button");
			}
		}
	});

	var resultContainer2 = document.getElementById('cvcResponse');
	cvc.addEventListener('change', function(event) {
		if (event.error) {
			resultContainer2.innerHTML = '<p>' + event.error.message + '</p>';
			$("#submit-btn").prop('disabled', true);
			$("#submit-btn").addClass("disabled-button");
		} else {
			resultContainer2.innerHTML = '';
			if (allFilled1()) {console.log('-yes-');
				if ($('#card_number').hasClass('StripeElement--complete') && $('#card_expiry').hasClass('StripeElement--complete')) {
					$("#submit-btn").prop('disabled', false);
					$("#submit-btn").removeClass("disabled-button");
				}
			} else {console.log('-no-');
				$("#submit-btn").prop('disabled', true);
				$("#submit-btn").addClass("disabled-button");
			}
		}
	});

	// Get payment form element
	var form = document.getElementById('paymentFrm');

	// Create a token when the form is submitted.
	form.addEventListener('submit', function(e) {
		e.preventDefault();
		createToken();
	});

	// Create single-use token to charge the user
	function createToken() {
		stripe.createToken(cardElement).then(function(result) {
			if (result.error) {
				// Inform the user if there was an error
				resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
			} else {
				// Send the token to your server
				stripeTokenHandler(result.token);
			}
		});
	}

	// Callback to handle the response from stripe
	function stripeTokenHandler(token) {
		// Insert the token ID into the form so it gets submitted to the server
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);
		
		// Submit the form
		form.submit();
	}

	$("#submit-btn").prop('disabled', true);
	$("#submit-btn").addClass('disabled-button');

	$("#submit-btn").click(function(e) {
		if (!allFilled()) {
			e.preventDefault();
			return false;
		}
	});

	$("#paymentFrm").validate({
		rules: {
			billing_address: {
				required: true
			},
			city: {
				required: true
			},
			zip_code: {
				required: true
			},
			country: {
				required: true
			},
			formAgreement: {
				required: true
			}
		}
	});

	$(".steps-progress ul li#step-1").hover(function(){
		$( ".steps-progress h3" ).text( "General Information" );
	}, function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	});

	$(".steps-progress ul li#step-2").hover(function(){
		$( ".steps-progress h3" ).text( "Product Information" );
	}, function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	});

	$(".steps-progress ul li#step-3").hover(function(){
		$( ".steps-progress h3" ).text( "Team Information" );
	}, function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	});

	$(".steps-progress ul li#step-4").hover(function(){
		$( ".steps-progress h3" ).text( "Requirements" );
	}, function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	});

	$(".steps-progress ul li#step-5").hover(function(){
		$( ".steps-progress h3" ).text( "Legal Document & Competitive Agreement" );
	}, function(){
		$(".steps-progress h3").text( "Pay Registration Fee & Submit" );
	});

	$(".steps-progress ul li#step-6").hover(function(){
		$( ".steps-progress h3" ).text( "Upload Files" );
	}, function(){
		$(".steps-progress h3").text("Pay Registration Fee & Submit");
	});

	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-submission-step6/';
	});

	$('#submit-ok').click(function(){
		location.href = 'user-dashboard';
	});

	$('#paymentFrm input').bind('keyup', function() {
		if (allFilled()) {
			$("#submit-btn").prop('disabled', false);
			$("#submit-btn").removeClass("disabled-button");
		} else {
			$("#submit-btn").prop('disabled', true);
			$("#submit-btn").addClass("disabled-button");
		}
	});

	$("#formAgreement").change(function() {
		if (allFilled()) {
			$("#submit-btn").prop('disabled', false);
			$("#submit-btn").removeClass("disabled-button");
		} else {
			$("#submit-btn").prop('disabled', true);
			$("#submit-btn").addClass("disabled-button");
		}
	});

	function allFilled() {
		var filled = true;
		$('#paymentFrm input[type=text]').each(function() {
			if ($(this).val() == '') {
				filled = false;
				return false;
			}
		});
		$('.payment-form .form-control').each(function() {
			if (!$(this).hasClass('StripeElement--complete')) {
				filled = false;
				return false;
			}
		});
		if (!$('#formAgreement').is(":checked")) {
			filled = false;
		}
		return filled;
	}

	function allFilled1() {
		var filled = true;
		$('#paymentFrm input[type=text]').each(function() {
			if ($(this).val() == '') {
				filled = false;
				return false;
			}
		});
		if (!$('#formAgreement').is(":checked")) {
			filled = false;
		}
		return filled;
	}
});
</script>
<?php
get_footer();