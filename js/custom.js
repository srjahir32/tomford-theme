jQuery(document).ready(function($) {
	"use strict";
	
	$(".nav-item").click(function() {
		$(".mobile-dropdown").removeClass("show")
	});
	
	//Dropdown Menu
	$(document).on('click', '.dropdown', function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
		$(this).find('.dropdown-toggle').addClass('hover');
	});
	$(document).on('click', '.dropdown', function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
		$(this).find('.dropdown-toggle').removeClass('hover');
	});

	// used in team portal pages
	$(document).on('click', '.change-status', function(e) {
		e.preventDefault();
		$(this).parent().find('.sub-dropdown-item').toggleClass('show');
	});
	$(document).on('click', '#select-all-products', function() {
		$('input.select-product').not(this).prop('checked', this.checked);
	});

	if (Modernizr.mq('(min-width: 992px)')) {
		$("ul li a").click(function() {
			var pageId = $(this).attr("href");
			if (pageId && $(pageId).length) {
				$("html, body").animate({ scrollTop: $(pageId).offset().top - 145 }, 1000);
			}
		});
	} else {
		$("ul li a").click(function() {
			var pageId = $(this).attr("href");
			if (pageId && $(pageId).length) {
				$("html, body").animate({ scrollTop: $(pageId).offset().top - 100 }, 1000);
			}
		});
	}
	
	// Top Scroll
	$(document).scroll(function() {
		var scroll = $(this).scrollTop();
		if (scroll > 600) {
			jQuery('.navbar-brand').addClass('scroll_logo');
			jQuery('.scroll_logo').on('click',function(ev){
				ev.preventDefault();
				jQuery('html, body').stop().animate({scrollTop:0}, 1000);
			});
		} else if (scroll < 600) {
			jQuery('.navbar-brand').removeClass('scroll_logo');
			$('.navbar-brand').unbind();	
		}
	});

	// Judge Profile Modal
	$("div[id^='judgesModal']").each(function() {
		var currentModal = $(this);
		currentModal.find('.btn-next').click(function() {
			currentModal.modal('hide');
			currentModal.closest("div[id^='judgesModal']").one('hidden.bs.modal', function (e) {
				$(this).nextAll("div[id^='judgesModal']").first().modal('show');
			})
		});
		//PREV
		currentModal.find('.btn-prev').click(function() {
			currentModal.modal('hide');
			currentModal.closest("div[id^='judgesModal']").one('hidden.bs.modal', function (e) {
				$(this).prevAll("div[id^='judgesModal']").first().modal('show');
			})
		});
	});

	//Remove Padding
	if (!$(".tab-pane").hasClass("show")) {
		$(".tab-content").addClass("p-0");
	}
	$('.nav-tabs .nav-link').click(function() {
		$(".tab-content").removeClass("p-0");
		$('.submission-form').hide();
	});

	//Initialize Tooltip
	$('[data-toggle="tooltip"]').tooltip({ 
		boundary: 'window',
		container: false,
		animation: true,
		trigger: 'hover',
		placement: 'bottom'
	});

	//Hide Judge Submission Detail View
	$('.nav-tabs .nav-link').click(function() {
		$(".submission-detail-page").fadeOut();
	});

	setTimeout(function() {
		$('#deadline-timer').fadeIn('slow');
	}, 1000);

	// Input Mask
	$(":input").inputmask();

	$('.information-box input[type=radio]').change(function() {
		if (this.value == 'Yes') {
			$(this).parent().parent().find('.conditional-notes').show();
			$(this).parent().parent().find('.conditional-notes .yes-notes').show();
			$(this).parent().parent().find('.conditional-notes .no-notes').hide();
		}
		else if (this.value == 'No') {
			$(this).parent().parent().find('.conditional-notes').show();
			$(this).parent().parent().find('.conditional-notes .no-notes').show();
			$(this).parent().parent().find('.conditional-notes .yes-notes').hide();
		}
	});
	
	$('#add-team-member').click(function(){
		$('#add_new_team_member').append(`
		<h2>Add New Team Member </h2>
		<div  class="step-form" >
		<div class="form-row">
			<div class="form-group col">
				<div class="conditional-notes1">

				<label>First Name</label>
				<input type="text" name="first_name[]" class="form-control">
			</div>
			</div>
			<div class="form-group col">
				<div class="conditional-notes1">

				<label>Last Name</label>
				<input type="text" name="last_name[]" class="form-control">
			</div>
			</div>
		</div>
		<div class="form-group">
			<div class="conditional-notes1">

			<label>Title</label>
			<input type="text" name="title[]" class="form-control">
		</div>


		</div>
		<div class="form-group">
			<div class="conditional-notes1">

			<label>Email</label>
			<input type="email" name="email[]" class="form-control">
		</div>
		</div>
		</div>`);
	});

	// No Mobile Preview JS
	if (Modernizr.mq('(max-width: 767px)')) {
		$('.no-mobile').empty();
		var mobile_preview = '<div class="mobile-notification">' + '<h1>This page doesn\'t support <strong>Mobile</strong> preview. Please visit page through <strong>Laptop</strong> or <strong>Tablet</strong>.</h1>' + '</div>';
		$('.no-mobile').append(mobile_preview);
	} else {
		$('.no-mobile').show();
	}
});

function openEmailmodal() {
	jQuery("#exampleModal").modal('show');
}

function openInvestmentAlliancemodal(){
	jQuery("#openInvestmentAllianceModal").modal('show');
}

// Deadline Timer JS

// Set the date we're counting down to
var countDownDate = new Date("Jan 15, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

	// Get today's date and time
  	var now = new Date().getTime();
	
  	// Find the distance between now and the count down date
  	var distance = countDownDate - now;
	
  	// Time calculations for days, hours, minutes and seconds
  	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	
  	// Output the result in an element with id="demo"
  	jQuery('#days').html(days + " : ");
  	jQuery('#hours').html(hours + " : ");
  	jQuery('#minutes').html(minutes + " : ");
  	jQuery('#seconds').html(seconds);
	
  	// If the count down is over, write some text 
  	if (distance < 0) {
		clearInterval(x);
		jQuery('#deadline-timer').html("<h2>Submit Your Submission Now</h2>");
  	}
}, 	1000);

function myFunction() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
		jQuery("#toggleText").text("Hide");
	} else {
		x.type = "password";
		jQuery("#toggleText").text("show");
	}
}