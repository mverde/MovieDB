$( document ).ready(function() {
    $('.alphabet').on("click", function(e) {
	  e.preventDefault();
	  
	  $(this).toggleClass('nav-close');
	});
});