$(function() {

	$("#male").on('click', function () {
	    $(this).find("input").prop("checked", true);
	     $('#female').removeClass('selected');
	    $(this).addClass('selected');
	});

	

	$("#female").on('click', function () {
	    $(this).find("input").prop("checked", true);
	    $('#male').removeClass('selected');
	    $(this).addClass('selected');
	});

	

	

});