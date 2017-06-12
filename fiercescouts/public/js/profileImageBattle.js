$(function() {
	var cGender = $('#userOneImage').data('charactergender');
	var cClass = $('#userOneImage').data('characterclass');

	var oGender = $('#userTwoImage').data('opponentgender');
	var oClass = $('#userTwoImage').data('opponentclass');

	if (cGender == "M") {
		if (cClass == "warrior") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/male_warrior.png")');
		} else if (cClass == "mage") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/male_mage.png")');
		} else if (cClass == "assassin") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/male_assassin.png")');
		} else if (cClass == "monk") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/male_monk.png")');
		} else if (cClass == "demon") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/male_demon.png")');
		}

	} else {
		if (cClass == "warrior") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/female_warrior.png")');
		} else if (cClass == "mage") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/female_mage.png")');
		} else if (cClass == "assassin") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/female_assassin.png")');
		} else if (cClass == "monk") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/female_monk.png")');
		} else if (cClass == "demon") {
			$('#userOneImage').css('background-image', 'url("../../images/characters/female_demon.png")');
		}
	}

	if (oGender == "M") {
		if (oClass == "warrior") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/male_warrior.png")');
		} else if (oClass == "mage") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/male_mage.png")');
		} else if (oClass == "assassin") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/male_assassin.png")');
		} else if (oClass == "monk") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/male_monk.png")');
		} else if (oClass == "demon") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/male_demon.png")');
		}

	} else {
		if (oClass == "warrior") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/female_warrior.png")');
		} else if (oClass == "mage") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/female_mage.png")');
		} else if (oClass == "assassin") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/female_assassin.png")');
		} else if (oClass == "monk") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/female_monk.png")');
		} else if (oClass == "demon") {
			$('#userTwoImage').css('background-image', 'url("../../images/characters/female_demon.png")');
		}
	}
});