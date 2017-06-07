$(function() {

	console.log(battleData);
	
	for (var i = 0; i < battleData.length; i++) {
		var targetUserId = battleData[i].offender;
		var targetUserHP = battleData[i].offenderHP;

		var turnDescription = battleData[i].desc;

		$("#logBox").append("<div>" + turnDescription + "</div");

		updateHPBar(targetUserId, targetUserHP);

	}
	
});

function updateHPBar (userId, hp) {
	var bar = $("[data-uid=" + userId + "]");
	var maxHP = bar.data("maxhp");
	var parent = bar.parent();
	var parW = parent.width();

	var newWidth = (hp / maxHP) * parW;

	bar.width(newWidth);

}