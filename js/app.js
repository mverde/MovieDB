$( document ).ready(function() {

    $('.alphabet').on("click", function(e) {
    	console.log("hi");
    	$.ajax({
		   type: "GET",
		   url: "searchbyletter.php",
		   data: 'A',
		   success: function(){
		     alert( "Data Saved:");
		   }
		 });
    
		$('.show-results').show();
		return false;

	});

});