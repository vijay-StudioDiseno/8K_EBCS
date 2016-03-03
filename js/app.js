//<![CDATA[
	$(window).load(function() { // makes sure the whole site is loaded
		$('#status').fadeOut(); // will first fade out the loading animation
		$('#preloader').delay(50).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(50).css({'overflow':'visible'});
	})
//]]>

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 60) {
        $(".navbar-fixed-top-scroll").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top-scroll").removeClass("top-nav-collapse");
    }
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

$("#menu-toggle, .list-login01, .list-singup01").click(function(e) {
	$("#sidebar-wrapper").toggleClass("active");
	$(".wrapper").toggleClass("active");
	$('body').css("overflow-x","hidden");
});



//Collapse icon changes
$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().find(".plusBtn").removeClass("plusBtn").addClass("minusBtn");
}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".minusBtn").removeClass("minusBtn").addClass("plusBtn");
});
