var inputBox = document.getElementById('input-box');

var randomButton = document.getElementById('random-color');

var submitButton = document.getElementById('submit');

var hexList = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];

var colorKey = {"maroon":"800000","red":"FF0000","orange":"FFA500","yellow":"FFFF00","olive":"808000","green":"008000","purple":"800080","fuchsia":"FF00FF","lime":"00FF00","teal":"008080","aqua":"00FFFF","blue":"0000FF","navy":"000080","black":"000000","gray":"808080","silver":"C0C0C0","white":"FFFFFF"};

// Optional function to set the button id
function setID(id) {

	inputBox = document.getElementById(id);

}

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

		inputBox.value += ";";

	}

	inputBox.value += "#"+hexColor;

}

// Encompasses functions to generate new hex and show it on screen
function GenerateNewRandomColor() {

	var newColor = getHex();

	showHex(newColor);

}

// Event listener for adding random colors
randomButton.onclick = function() {

	GenerateNewRandomColor();

}

// Parse input-box to keep some load off the server
submitButton.onclick = function() {

	if(inputBox.value.length === 0) {

		for(var i = 0; i < 3; i++) {

			GenerateNewRandomColor();

		}

	}

	// Allow for some keywords and convert them before submitting
	else {

		var temp = inputBox.value.split(";");

		inputBox.value = "";

		for(var i = 0; i < temp.length; i++) {

			temp[i] = temp[i].trim().toLowerCase();

			if(colorKey[temp[i]]) {

				temp[i] = "#"+colorKey[temp[i]];

			}

<<<<<<< HEAD
			else if(temp[i].indexOf(',') !== -1) {

				var rgb = temp[i].split(',');

				if(rgb.length === 3) {

					temp[i] = "";

					for (var j = 0; j < 3; j++) {

						if(rgb[j] !== "") {

							temp[i] += rgb[j].trim()+","; // concatenate the new values
						
						}

						else {

							$temp[i] += "0,"; // concatenate the new values

						}

					}

					temp[i] = temp[i].substring(0, temp[i].length-1); // remove the trailing comma

				}

				else {

					temp[i] = "#000000";

				}

			}

=======
>>>>>>> 4a6e231e38eda93b31373c546e90f578a092a07e
			if(i > 0) {

				inputBox.value += ";";

			}

			inputBox.value += temp[i];

		}

	}
<<<<<<< HEAD

=======
>>>>>>> 4a6e231e38eda93b31373c546e90f578a092a07e
}