$('#form-tabs a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#form-tabs a[href="' + hash + '"]').tab('show');

window.addEventListener('load', pageRefreshed, false);

function pageRefreshed() {
	var tab = window.location.hash.substr(1);
	if (tab == "Director") {
		$('#director-link')[0].click();
	}
}
