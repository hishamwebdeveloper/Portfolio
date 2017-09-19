$(document).ready(function() {
	$("#hamburger").click(function() {		
		if ($("#hamburger").css("margin-left")=="0px")
		{
			//Change body to the document after header.
			$("body").css("margin-left", "6em");
			$("#hamburger").css("margin-left", "6.5em");
			$("#sidenav").css("width", "13em");
			$("#welcome").css("margin-left", "6em");
		}
		else
		{
			$("body").css("margin-left", "0");
			$("#hamburger").css("margin-left", "0");
			$("#sidenav").css("width", "0");
			$("#welcome").css("margin-left", "0");
		}
	});
	
	$("ul.first").click(function(event){
		var $link = $(event.target).closest('ul').children('ul.second');
		
		if ($link.css('display')=='none')
		{
			$link.fadeIn();
		}
		else
		{
			$link.fadeOut();
		}
	});
});