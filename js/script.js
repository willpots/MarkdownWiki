$(document).ready(function() {
	$("a[href^='http:']:not([href*='" + window.location.host + "'])").each(function() {
	        $(this).attr("target", "_blank");
    });
	$("a[href^='https:']:not([href*='" + window.location.host + "'])").each(function() {
	        $(this).attr("target", "_blank");
    });
});
