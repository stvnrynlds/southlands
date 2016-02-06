jQuery(document).ready(function($) {


	// SITE NAV

	$('.toggle-menu').click(function() {
		$(this).toggleClass('is-toggled');
		$('.menu-wrapper').stop().slideToggle('500ms');
		return false;
	});


	// CAMPUS SELECTOR 
	
	console.log(localStorage.getItem('campusSelection'));
	
	$('.close-campus, [data-campus="current"]').click(function() {
		$('#campuses').removeClass('is-visible');
		localStorage.setItem('campusSelection', 'exited');
	});

	if (localStorage.getItem('campusSelection') === null) {
		$('#campuses').addClass('is-visible');
	}

	$('.menu-item [href="#campuses"]').on('click', function() {
		$('#campuses').addClass('is-visible');
	});


});