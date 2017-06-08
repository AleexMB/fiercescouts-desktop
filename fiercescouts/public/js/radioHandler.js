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

	$("#monk").on('click', function () {
	    $(this).find("input").prop("checked", true);

	    //$('#monk').removeClass('selected');
	    $('#assassin').removeClass('selected');
	    $('#warrior').removeClass('selected');
	    $('#demon').removeClass('selected');
	    $('#wizard').removeClass('selected');

	    $(this).addClass('selected');
	});

	$("#wizard").on('click', function () {
	    $(this).find("input").prop("checked", true);

	    $('#monk').removeClass('selected');
	    $('#assassin').removeClass('selected');
	    $('#warrior').removeClass('selected');
	    $('#demon').removeClass('selected');
	    //$('#wizard').removeClass('selected');

	    $(this).addClass('selected');
	});

	$("#warrior").on('click', function () {
	    $(this).find("input").prop("checked", true);

	    $('#monk').removeClass('selected');
	    $('#assassin').removeClass('selected');
	    //$('#warrior').removeClass('selected');
	    $('#demon').removeClass('selected');
	    $('#wizard').removeClass('selected');

	    $(this).addClass('selected');
	});

	$("#demon").on('click', function () {
	    $(this).find("input").prop("checked", true);

	    $('#monk').removeClass('selected');
	    $('#assassin').removeClass('selected');
	    $('#warrior').removeClass('selected');
	    //$('#demon').removeClass('selected');
	    $('#wizard').removeClass('selected');

	    $(this).addClass('selected');
	});

	$("#assassin").on('click', function () {
	    $(this).find("input").prop("checked", true);

	    $('#monk').removeClass('selected');
	    //$('#assassin').removeClass('selected');
	    $('#warrior').removeClass('selected');
	    $('#demon').removeClass('selected');
	    $('#wizard').removeClass('selected');

	    $(this).addClass('selected');
	});

});