<?php
/**
 * Template Name: User Submission Step6
 */

// Handle AJAX request (start)
if (isset($_POST['ajax']) && isset($_POST['number'])) {
	$field = 'uploaded_document_'.$_POST['number'];
	update_post_meta($_POST['post_id'] , $field ,'');
	echo "File has been deleted successfully!";
	exit;
}

get_header();

global $current_user, $user_ID;

$args = array(
	'author' => $current_user->ID,
	'post_type' => 'user_submission',
	'posts_per_page' => -1,
	'orderby' => 'post_date',
	'order' => 'ASC',
);
$current_user_posts = get_posts($args);
$post_id = $current_user_posts[0]->ID;
$total = count($current_user_posts);

$error = false;

$file1 = '';
$file2 = '';
$file3 = '';
if ($total > 0) {

	$file1 = get_field('uploaded_document_1', $post_id);
	if (!empty($file1)) {
		$file1_title = get_the_title($file1);
		$file1_url = wp_get_attachment_url($file1);
		$file1_size = filesize(get_attached_file($file1));
		$file1_size = formatSizeUnits($file1_size);
	}

	$file2 = get_field('uploaded_document_2', $post_id);
	if (!empty($file2)) {
		$file2_title = get_the_title($file2);
		$file2_url = wp_get_attachment_url($file2);
		$file2_size = filesize(get_attached_file($file2));
		$file2_size = formatSizeUnits($file2_size);
	}

	$file3 = get_field('uploaded_document_3', $post_id);
	if (!empty($file3)) {
		$file3_title = get_the_title($file3);
		$file3_url = wp_get_attachment_url($file3);
		$file3_size = filesize(get_attached_file($file3));
		$file3_size = formatSizeUnits($file3_size);
	}
}

if (isset($_POST['next'])) {
	$pdfs = 0;
	if (!empty($file1) && get_post_mime_type($file1) == 'application/pdf') $pdfs++;
	if (!empty($file2) && get_post_mime_type($file2) == 'application/pdf') $pdfs++;
	if (!empty($file3) && get_post_mime_type($file3) == 'application/pdf') $pdfs++;
	if ($pdfs == 0)
		$error = true;
} else {
	if (isset($_POST['document_number']) && $_POST['document_number'] != '') {
		$file_number = $_POST['document_number'];
		
		if ($file_number > 0) {
			$uploaddir = wp_upload_dir();
			$file = $_FILES["files"]["name"];
			$uploadfile = $uploaddir['path'] . '/' . basename($file);
			move_uploaded_file($_FILES["files"]["tmp_name"], $uploadfile);
			$filename = basename($uploadfile);
			$wp_filetype = wp_check_filetype(basename($filename), null);
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/.[^.]+$/', '', $filename),
				'post_content' => '',
				'post_status' => 'inherit',
			);
			$attach_id = wp_insert_attachment($attachment, $uploadfile);

			if ($file_number == 1) {
				update_post_meta($post_id , 'uploaded_document_1', $attach_id);
				$file1 = get_field('uploaded_document_1', $post_id);
				$fileurl = wp_get_attachment_url($file1);
				echo $fileurl;
			} else if ($file_number == 2) {
				update_post_meta($post_id , 'uploaded_document_2', $attach_id);
				$file2 = get_field('uploaded_document_2', $post_id);
				$fileurl = wp_get_attachment_url($file2);
				echo $fileurl;
			} else if ($file_number == 3) {
				update_post_meta($post_id , 'uploaded_document_3', $attach_id);
				$file3 = get_field('uploaded_document_3', $post_id);
				$fileurl = wp_get_attachment_url($file3);
				echo $fileurl;
			} else {
				$msg = "Only 3 files allowed!";
			}
		}
	}
}

if (isset($_POST['currentStep']) && $_POST['currentStep'] == 6) {
	$updated = update_user_meta($user_ID, 'current_step', $_POST['currentStep']);
	update_post_meta($post_id, 'video_link', $_POST['video_link']);
	if (isset($_POST['next']) && !$error) {
		wp_redirect(home_url('user-submission-step7'));
	}
}

if ($user_ID) {
	$user_current_step = get_user_meta($user_ID, 'current_step', true);
	?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dropzone/dist/dropzone.css">
<style type="text/css">
	.dz-progress {
		display: none !important;
	}
	#dropzone {
		width: 100%;
		background-color: transparent;
		height: 200px;
		cursor: pointer;
	}
	#fileupload {
		display: none;
	}
</style>
<section class="portal-tabs">
	<div class="container-fluid">
		<?php get_template_part( 'template-parts/tab-content' );?>
		<div class="submission-form">
			<div class="submission-form-title">
				<h2>Submitting documents</h2>
			</div>
			<!-- Step 6 -->
			<div class="submission-step active">
				<form id="step6-form" action="" enctype="multipart/form-data" class="form-horizontal" method="post">
					<input type="hidden" name="post_id" value="<?php echo $post_id?>" id="current_post_id">
					<input type="hidden" name="currentStep" value="6">
					<div class="steps-progress">
						<h3>Upload Files</h3>
						<div class="step-progress-box">
							<ul>
								<li id="step-1" class="active"><a href="/user-submission-step1/"></a></li>
								<li id="step-2" class="active"><a href="/user-submission-step2/"></a></li>
								<li id="step-3" class="active"><a href="/user-submission-step3/"></a></li>
								<li id="step-4" class="active"><a href="/user-submission-step4/"></a></li>
								<li id="step-5" class="active"><a href="/user-submission-step5/"></a></li>
								<li id="step-6" class="active"></li>
								<li id="step-7"></li>
							</ul>
						</div>
					</div>
					<div class="upload-file-requirements">
						<h3>Document requirements</h3>
						<ul>
							<li>(1) Follow the submission template <a href="<?php echo home_url() . '/wp-content/uploads/pdf/mytest.pdf'; ?>" target="_blank">(download template)</a></li>
							<li>(2) Any additional documents, such as financials, team composition, patent/IP declaration, business plan /growth strategy, list of customers and contracts (over what time frame), etc</li>
							<li<?php if ($error) echo " style='color:red;font-weight:700'"; ?>>(3) Please upload at least one pdf</li>
							<li>(4) You can upload up to 3 files</li>
						</ul>
					</div>
					<div class="document-file-form">
						<div class="upload-file-button">
							<label class="custom-file">
								<input id="fileupload" type="file" name="files" data-url="" multiple>
								<label class="custom-file-label fileupload">Add File</label>
							</label>
						</div>
						<p>Accepted formats pdf, jpg, png, mp4, mov(up to 50mb each).</p>
						<div id="file-upload-filename"></div>
					</div>
					<div id="response"></div>
					<div class="upload-file-zone">
						<ul>
						<?php if( !empty($file1) ) { ?>
							<li data-file-index="" id="row1">
								<div class="file-icon"><i class="far fa-file-alt"></i></div>
								<div class="file-upload-preview">
									<div class="file-data">
										<h6 class="file-name"><?php echo $file1_title ?></h6>
										<p class="file-size"><?php echo $file1_size ?></p>
									</div>
									<div class="file-upload-actions">
										<a class="file-view" href="<?php echo $file1_url; ?>" id="file1" target="_blank">View</a>
										<button class="file-delete" onclick="deleteFile(1)">Delete</button>
										<button class="progress-success" id="progress-success1"></button>
									</div>
									<div class="file-upload-progress">
										<div class="upload-progress-bar">
											<div class="upload-progress" id="upload-progress1"></div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						<?php if( !empty($file2) ) { ?>
							<li data-file-index="" id="row2">
								<div class="file-icon"><i class="far fa-file-alt"></i></div>
								<div class="file-upload-preview">
									<div class="file-data">
										<h6 class="file-name"><?php echo $file2_title ?></h6>
										<p class="file-size"><?php echo $file2_size ?></p>
									</div>
									<div class="file-upload-actions">
										<a class="file-view" href="<?php echo $file2_url; ?>" id="file2" target="_blank">View</a>
										<button class="file-delete" onclick="deleteFile(2)">Delete</button> 
										<button class="progress-success" id="progress-success2"></button>
									</div>
									<div class="file-upload-progress" >
										<div class="upload-progress-bar" >
											<div class="upload-progress" id="upload-progress2"></div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						<?php if( !empty($file3) ) { ?>
							<li data-file-index="" id="row3">
								<div class="file-icon"><i class="far fa-file-alt"></i></div>
								<div class="file-upload-preview">
									<div class="file-data">
										<h6 class="file-name"><?php echo $file3_title ?></h6>
										<p class="file-size"><?php echo $file3_size ?></p>
									</div>
									<div class="file-upload-actions">
										<a class="file-view" href="<?php echo $file3_url; ?>" id="file3" target="_blank">View</a>
										<button class="file-delete" onclick="deleteFile(3)">Delete</button> 
										<button class="progress-success" id="progress-success3"></button>
									</div>
									<div class="file-upload-progress" >
										<div class="upload-progress-bar" >
											<div class="upload-progress" id="upload-progress3"></div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>

					<div class="upload-file-drag">
						<div class="custom-file">
							<div id="dropzone"></div>
						</div>
					</div>

					<div class="external-video-link">
						<div class="form-group">
							<label>Add an external link for video to show case your production process and explain more about your product</label>
							<input type="hidden" name="document_number" id="document_number" value="0">
							<input type="text" class="form-control" name="video_link" value="<?php the_field("video_link", $post_id); ?>">
						</div>
					</div>

					<div class="step-buttons">
						<button type="button" id="back-btn" class="step-btn" data-toggle="modal" data-target="#cancelModal">Back</button>
						<button type="submit" id="save-btn" class="step-btn upload-image">Save</button>
						<button type="submit" id="next-btn" name="next" class="step-btn">Next</button>
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
<?php
} else {
	wp_redirect( home_url('login') );
	exit;
}
get_footer();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/form.js"></script>
<!--<script src="--><?php //echo get_template_directory_uri(); ?><!--/dropzone/dist/dropzone.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-widgets-ui.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fileupload.js"></script>
<script>
$ = jQuery;
var input = document.getElementById( 'fileupload' );
var infoArea = document.getElementById( 'file-upload-filename' );
input.addEventListener( 'change', showFileName );
function showFileName( event ) {
	// the change event gives us the input it occurred in
	var input = event.srcElement;
	// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
	var fileName = input.files[0].name;
	// use fileName however fits your app best, i.e. add it into a div
	infoArea.textContent = 'File name: ' + fileName;
}
$(document).ready(function() {
	var progressbar = $('.upload-progress');
	$(".upload-image").click(function(){
		$(".form-horizontal").ajaxForm({
			target: '.preview',
			beforeSend: function() {
				progressbar.width('0%');
				progressbar.text('0%');
			},
			uploadProgress: function (event, position, total, percentComplete) {
				progressbar.width(percentComplete + '%');
				progressbar.text(percentComplete + '%');
			},
		}).submit();
	});
});

function deleteFile(number){
	event.preventDefault();
	var post_id = $("#current_post_id").val();
	$.ajax({
		type: 'post',
		data: {ajax: 1, number: number, post_id: post_id},
		success: function(response){
			$('#row'+number).remove();
			$('#response').text(response);
		}
	});
}

$(document).ready(function() {
	$("#save-btn").prop('disabled', true);
	$("#save-btn").addClass('disabled-button');
	//$("#next-btn").prop('disabled', true);
	//$("#next-btn").addClass('disabled-button');

	/*if (allFilled()){
		$("#next-btn").prop('disabled', false);
		$("#next-btn").removeClass("disabled-button");
	} else {
		$("#next-btn").prop('disabled', true);
		$("#next-btn").addClass("disabled-button");
	}*/

	$(".steps-progress ul li#step-1").hover(function() {
		$(".steps-progress h3").text("General Information");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$(".steps-progress ul li#step-2").hover(function() {
		$(".steps-progress h3").text("Product Information");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$(".steps-progress ul li#step-3").hover(function() {
		$(".steps-progress h3").text("Team Information");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$(".steps-progress ul li#step-4").hover(function() {
		$(".steps-progress h3").text("Requirements");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$(".steps-progress ul li#step-5").hover(function() {
		$(".steps-progress h3").text("Legal Document & Competitive Agreement");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$(".steps-progress ul li#step-7").hover(function() {
		$(".steps-progress h3").text("Pay Registration Fee & Submit");
	}, function() {
		$(".steps-progress h3").text("Upload Files");
	});

	$('#cancelModal button[type=submit]').click(function(e) {
		window.location.href = '/user-submission-step5/';
	});

	$('#next-btn').click(function() {
		location.href = 'user-submission-step7';
	});

	$("#fileupload").on("change", function(){
		$("#save-btn").prop('disabled', false);
	});

	$('#step6-form input').bind('keyup', function() {
		//if (allFilled()) {
			$("#next-btn").prop('disabled', false);
			$("#next-btn").removeClass("disabled-button");
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass("disabled-button");
		/*} else {
			$("#save-btn").prop('disabled', false);
			$("#save-btn").removeClass("disabled-button");
			$("#next-btn").prop('disabled', true);
			$("#next-btn").addClass("disabled-button");
		}*/
	});
});

function allFilled() {
	var filled = true;
	$('#step6-form input').each(function() {
		if ($(this).val() == '')
			filled = false;
	});
	$('#step6-form input[type="file"]').each(function() {
		if ($(this).val() == '')
			filled = false;
	});
	return filled;
}

// fileupload
var maxFiles = 3,
	filesCounter = <?php echo (!empty($file3) ? 3 : (!empty($file2) ? 2 : (!empty($file1) ? 1 : 0))); ?>;
$('#fileupload').fileupload({
	dropZone: $('#dropzone'),
	add: function(e, data) {
		if (filesCounter + 1 > maxFiles) {
			alert("Max 3 files are allowed");
			return false;
		}
		filesCounter = filesCounter + 1;
		$("#document_number").val(filesCounter);
	
		var uploadErrors = [];
		var acceptFileTypes = /(\.|\/)(pdf|mov|mp4|jpe?g|png)$/i;
		if(data.files[0]['type'].length && !acceptFileTypes.test(data.files[0]['type'])) {
			uploadErrors.push('Not an accepted file type, please upload valid file type!');
		} else if(data.files[0]['size'] > 50000000) {
			uploadErrors.push('Filesize is too big');
		}
		console.log(data);
		if(uploadErrors.length > 0) {
			alert(uploadErrors.join("\n"));
		} else {
			var fileSize = data.files[0]["size"]/1048576;
			var fileHtml = '<li data-file-index="" id="row'+filesCounter+'">\n' +
				'			<div class="file-icon">\n' +
				'				<i class="far fa-file-alt"></i>\n' +
				'			</div>\n' +
				'			<div class="file-upload-preview">\n' +
				'				<div class="file-data">\n' +
				'					<h6 class="file-name">'+data.files[0]["name"]+'</h6>\n' +
				'					<p class="file-size">'+fileSize.toFixed(2)+' mb</p>\n' +
				'				</div>\n' +
				'				<div class="file-upload-actions">\n' +
				'					<a class="file-view" href="" id="file'+filesCounter+'" target="_blank">View</a>\n' +
				'					<button class="file-delete" onclick="deleteFile('+filesCounter+')">Delete</button>\n' +
				'					<button class="progress-success" id="progress-success'+filesCounter+'"></button>\n' +
				'				</div>\n' +
				'				<div class="file-upload-progress" >\n' +
				'					<div class="upload-progress-bar" >\n' +
				'						<div class="upload-progress" id="upload-progress'+filesCounter+'"></div>\n' +
				'					</div>\n' +
				'				</div>\n' +
				'			</div>\n' +
				'		</li>';
			$('.upload-file-zone ul').append(fileHtml);
			data.submit();
		}
	},
	progress: function(e, data) {
		var progress = parseInt((data.loaded / data.total) * 100, 10);
		$("#upload-progress"+filesCounter).css('width', progress+'%');
		$("#progress-success"+filesCounter).html(progress+'%');
		if(progress == 100) {
			$("#progress-success"+filesCounter).html('Success');
		}
	},
	drop: function(e, data) {

	},
	done: function(e, data) {
		$("#file"+filesCounter).attr('href', data.result);
		$("#save-btn").prop('disabled', false);
		$("#save-btn").removeClass("disabled-button");
		$("#next-btn").prop('disabled', false);
		$("#next-btn").removeClass("disabled-button");
	}
});

$(document).on('click', '.fileupload, #dropzone', function () {
	$('#fileupload').click();
});
</script>