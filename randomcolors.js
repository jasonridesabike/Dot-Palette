var inputBox = document.getElementById('input-box');

// Generates a 1 digit hex number
function getDigit() {

	num = Math.floor(Math.random() * (16));

	if (num < 10) {

		return num;

	}

	else {

		return hexList[num];

	}

}

// Creates a full hex number as a string
function getHex() {

	var hexColor = "";

	for(var i = 0; i < 6; i++) {

		hexColor+= getDigit();

	}

	lastColor = hexColor;

	return hexColor;

}

// Shows the given hex color on the given object
function showHex(hexColor) {

	if (inputBox.value.length > 0) {

		inputBox.value += ";"+hexColor;

	}

	inputBox.value += "#"+hexColor;

}

// Encompasses functions to generate new hex and show it on screen
function GenerateNewRandomColor() {

	var newColor = getHex();

	showHex(newColor);

}