<?php




//----Functions:---------------------------------------------------------------------------------------------------

function inputParcer($input) {
	
		global $entries;
		
		$input = preg_replace('/\.$/', '', $input); //Remove dot at end if exists + sanitize a bit
		
		$entries = explode(';', $input, 16); //seperates each entry and adds them to the entries array. Limits to 16 entries for security

		
		foreach ($entries as $entry) {
			
			$entry = trim($entry);
			
			
		}
	}
	
	// Sort HEX, RGB, junk				
	function entrySorter($entries) {
		
		global $entries;
		
		global $colors;
		
		$colors = array();
		
		foreach ($entries as $entry) {
		
			if  (preg_match('/#/', $entry)) {  //is the first char #? TODO: does the entry consist of 7 chars?
			
				$entry = preg_replace('/#/', '', $entry);
				
				
				$rHex = substr($entry, 0, 2);
				$gHex = substr($entry, 2, 2);
				$bHex = substr($entry, 4, 2);
				
				
				$rDec = hexdec($rHex);
				$gDec = hexdec($gHex);
				$bDec = hexdec($bHex);
				
				
				$rgbColor = $rDec . ',' . $gDec . ',' . $bDec;
				
				
				$colors[] = "$rgbColor";
			
				}
				
					
			elseif (strlen($entry) <= 13) {
				
				$vals = explode(',', $entry, 3); //seperates each rgb and trims whitespace

				$entry = "";

				foreach ($vals as $val) {

					$entry .= trim($val).","; // concatenate the new values
			
				}

				$entry = substr($entry, 0, strlen($entry)-1); // remove the trailing comma
				
				$colors[] = "$entry";
			
			}
			
			else {
				
				echo "You fed me something awful: $entry";
				
			}
		}
	}
	
		
				
	
	// The description writer and it's parts: ---------------------------------------------------------

	function descriptionWriter($color) {
	
		decWriter($color);
		
		decToHexWriter($rDec,$gDec,$bDec);
		
	}
	
	
	function decWriter($color) {
		
		global $rDec;
		global $gDec;
		global $bDec;

		
		list($rDec, $gDec, $bDec) = sscanf($color, "%d ,%d ,%d");
		
		echo 'RGB: ' . $rDec . ',' . $gDec . ',' . $bDec . '<br />';
		
		
		
	}
	
	
	function decToHexWriter($rDec,$gDec, $bDec) {
		
		global $rDec;
		global $gDec;
		global $bDec;

		
		$rHex = dechex($rDec);
		$gHex = dechex($gDec);
		$bHex = dechex($bDec);
		

		If (strlen($rHex)<2) {
			$rHex = '0' . $rHex;
		}

		If (strlen($gHex)<2) {
			$gHex = '0' . $gHex;
		}

		If (strlen($bHex)<2) {
			$bHex = '0' . $bHex;
		}
		 
		echo 'Hex: #' . $rHex . $gHex . $bHex;

	}
	
	// DotPainter takes the color, paints the dot, and places the description in the center of it -----------------------
	
	function dotPainter($color) {
		
		echo "
				<figure class=\"dot\" style=\"background: rgb($color);\">
					<figcaption class=\"dot-caption\">";
		echo			descriptionWriter($color); 
		echo		"</figcaption>
				</figure>";
		}
	
	
	
	function dotPrinter($colors) {
	
		global $colors;
		
		echo '<div class="dot-table">';
		
		foreach ($colors as $color) {
		
			echo dotPainter($color);
		}
		
		echo '</div>';
		
	}
	
	 
	
		
	?>

<!----Page Setup:---------------------------------------------------------------------------------------------------------
=======================================================================================================================-->

<head>

<link href='http://fonts.googleapis.com/css?family=Anonymous+Pro:700' rel='stylesheet' type='text/css' />
<link href="style.css" rel="stylesheet" type="text/css" />
	
	<title>Dot Palette</title>

</head>

<body>
	<div class="wrap">
		<header>
			<h1>Dot Palette</h1>
			<h4>hover over a dot for rgb and hex values</h4>
		</header>
<?php

foreach (array_merge($_GET, $_POST) as $key => $val) {
  global $$key;
  $$key = addslashes($val);
}



inputParcer($input);

entrySorter($entries);
	
dotPrinter($colors);






?>

	</div>
</body>











