<!DOCTYPE html>

<head>

<link href='http://fonts.googleapis.com/css?family=Anonymous+Pro:700' rel='stylesheet' type='text/css' />
<link href="style.css" rel="stylesheet" type="text/css" />
	
	<title>the Dot palette</title>
	
	<!-- 	
	// A quick, palette generating PHP script:
	// By me, Jason Crawford
	// If you'd like a copy of the source, email me @
	// contact@jasonridesabike.com
	-->
	
	<?php
	
	

	
	// Set your colors here ------------------------------------
	/*
	$colors = array();
	
	$colors["c1"] = "252,245,84"; 
	
	$colors["c2"] = "0,156,45";
	
	$colors["c3"] = "0,58,11";
	
	$colors["c4"] = "255,11,0";
	
	$colors["c5"] = "120,0,0";
	
	$colors["c6"] = "55,0,0";
	
	$colors["c8"] = "22,200,150";
	*/
	//Functions -------------------------------------------------
	
	//declarations:
	
	// User inputs a string of hex and/or dec color values seperated by some arbitrary symbol
	
		//* foreach: Extract each entry from the input string and pass to a global array eN => 'entry-value'
		
			//* foreach: Determine whether each entry is Dec, Hex, or invalid
	
				//if Hex (contains a # and 6 alphanumerics)
				
					// Process into dec
					// output to array entry $cN => 'x,y,z'
				
				//elif Dec (contains commas and only numbers)
				
					// Output to array entry $cN => 'x,y,z'
					
				//else 
				
					//do something ridiculous
			
					
	
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
				
				
				$rHex = substr($entry, 1, 2);
				$gHex = substr($entry, 3, 2);
				$bHex = substr($entry, 5, 2);
				
				
				$rDec = hexdec($rHex);
				$gDec = hexdec($gHex);
				$bDec = hexdec($bHex);
				
				
				$rgbColor = $rDec . ',' . $gDec . ',' . $bDec;
				
				
				$colors[] = "$rgbColor";
			
				}
				
					
			elseif ((strlen($entry) <= 13)) {
				
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
	
	<!-- CSS: --------------------------------------------------->

	<style>
		/* Colors: */
		
		#c1 {
			background: rgb(<?php echo $colors['c1']; ?>);
			color: rgb(<?php echo $colors['c1']; ?>);
			
		}
		
		#c2 {
			background: rgb(<?php echo $colors['c2']; ?>);
			color: rgb(<?php echo $colors['c2']; ?>);
		}
		
		#c3 {
			background: rgb(<?php echo $colors['c3']; ?>);
			color: rgb(<?php echo $colors['c3']; ?>);
		}
		
		#c4 {
			background: rgb(<?php echo $colors['c4']; ?>);
			color: rgb(<?php echo $colors['c4']; ?>);
		}
		
		#c5 {
			background: rgb(<?php echo $colors['c5']; ?>);
			color: rgb(<?php echo $colors['c5']; ?>);
		}
		
		#c6 {
			background: rgb(<?php echo $colors['c6']; ?>);
			color: rgb(<?php echo $colors['c6']; ?>);
		}
		
		

		
		
	</style>
</head>

<body>
	<div class="wrap">
	
		<header>
			<h1>Dot Palette</h1>
			<h4>hover over a dot for rgb and hex values</h4>
		</header>
		
		
		
		<?php
		/*
		
		inputParcer("252,245,84; 0,58,11;22,200,150; #fcf554; 120,0,0");
		?><br /><?php
		entrySorter($entries);
		echo '<br />';
		dotPrinter($colors);
		*/
		?>
		
		<p>
		
		<form action="dot-palette.php" method="get">
		<p style="font-size:1.3rem; width: 40rem; margin: 0 auto; line-height: 1.2rem">hi<br />
		this is a color palette generator I put together in a pinch to make working with graphics designers easier. It takes color values and ouputs them into a dot palette grid like the one below. To use it, just enter a bunch of colors in the input box seperated with semicolons, like this "#6FFF62; #EB8D00; 25, 245, 84; 0, 58, 11". 
		As of right now, it accepts RGB or hex values and you can intermix them to your hearts content. 
		You can bookmark your generated palette to save it, or email the link to share it.
		If you have questions, comments, or whatever else, email me at contact@jasonridesabike.com.</p><br />
		<p>here's an example: #ff0000; #009999; 0, 204, 0; #ff7373; #ffb273; #5ccccc; #67e667</p>
		<input type="text" name="input" id="input-box"><br />
		<input type="submit" value="dot me right now" id="submit"><br />
		
		
		</p>
		<?php
		inputParcer("252,245,84; 0,58,11;22,200,150");
		?><br /><?php
		entrySorter($entries);
		echo '<br />';
		dotPrinter($colors);
		?>

		
	
	</div>

</body>
