$(function() {

	console.log(battleData);
	
	// for (var i = 0; i < battleData.length; i++) {
	// 	var targetUserId = battleData[i].offender;
	// 	var targetUserHP = battleData[i].offenderHP;

	// 	var turnDescription = battleData[i].desc;

	// 	// COMBAT LOG
	// 	//$("#logBox").append("<div>" + turnDescription + "</div");

	// 	updateHPBar(targetUserId, targetUserHP);

	// }

	var i = 0;
	var colorText = 1;

	function manageTurn() {
		var targetUserId = battleData[i].offender;
		var targetUserHP = battleData[i].offenderHP;
		var targetOpponentId = battleData[i].defender;
		var targetOpponentHP = battleData[i].defenderHP;

		var turnDescription = battleData[i].desc;

		if (colorText % 2 != 0) {
			$("#logBox").append("<p class=\"battleLogText logTextG\">" + turnDescription + "</p");
		} else {
			$("#logBox").append("<p class=\"battleLogText logTextR\">" + turnDescription + "</p");
		}

		colorText++;
		console.log(colorText);

		// COMBAT LOG
		//$("#logBox").append("<div>" + turnDescription + "</div");
		
		updateHPBar(targetUserId, targetUserHP);
		updateHPBar(targetOpponentId, targetOpponentHP);
		// updateHPText(targetUserId, targetOpponentHP);

		if (i < battleData.length){
			i++;
			setTimeout(manageTurn, 1000);
		}
	}

	manageTurn();
	
});

function updateHPBar (userId, hp) {
	var bar = $("[data-uid=" + userId + "]");
	var maxHP = bar.data("maxhp");
	var parent = bar.parent();
	var parW = parent.width();

	var newWidth = (hp / maxHP) * parW;

	bar.width(newWidth);
}

// function updateHPText (userId, hpText){
// 	var span = $("[data-uid=" + userId + "]");
// 	span.text(hpText);
// }

