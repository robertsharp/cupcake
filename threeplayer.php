<?php

function showacardslot($slotvalue)	{
	
	echo "<div class=\"slot bg" . $slotvalue . "\">";		
		if ($slotvalue == 0) { echo "empty"; }	
		else { 
		
		echo "<img src=\"cupcake" . $slotvalue . ".jpg\" alt=\"Cupcake " . $slotvalue . "\" width=\"50px\" height=\"50px\">\n"; 
		
		echo $slotvalue; }
	echo "</div>\n"; 

}

?>
<!DOCTYPE html>

<html>
<head>
<title>Where's My Cupcake - Simulator</title>

<style>
	body { }
	h1 {}
	h2, p {clear:both}
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
}
	
	div.slot { font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
		font-weight: bold;
		float:left; 
		width: 50px; 
		display: block; 
		margin:5px; 
		padding:0.5em; 
		border: 1px solid #333333; 
		text-align: center;
		}
		
	hr {clear: both;}
	.bg1, .bg11, .bg21, .bg31 {background-color: #9370D8; }	
	.bg2, .bg12, .bg22, .bg32 {background-color: #FA8072; }
	.bg3, .bg13, .bg23, .bg33 {background-color: #FFF8DC; }
	.bg4, .bg14, .bg24, .bg34 {background-color: #DC143C; }
	.bg5, .bg15, .bg25, .bg35 {background-color: #ADFF2F; }
	.bg6, .bg16, .bg26, .bg36 {background-color: #F4A460; }
	.bg7, .bg17, .bg27, .bg37 {background-color: #6495ED; }
	.bg8, .bg18, .bg28, .bg38 {background-color: #FF6347; }
	.bg9, .bg19, .bg29, .bg39 {background-color: #FFFF00; }
	.bg10, .bg20, .bg30, .bg40 {background-color: #8B4513; }
	.bg0, .tally {background-color: #EEEEEE; }
	.gamescore {background-color: #E6E6FA; }
	
	
	
	td {text-align: center; }
	
</style>



</head>



<body>

<h1>Where's My Cupcake - 3 player game simulator</h1>
<p><a href="index.php" title="Home">Home</a> | <a href="http://www.orchardtoys.com/product/wheres-my-cupcake" title="Orchard Games">Where's My Cupcake at Orchard Toys</a></p>

<?php

// See if the number of games to run has been passed from the URL
$games = $_POST["games"];

// if there is no 'games' variable then set the number of games to 1
if ($games == 0) { $games++; } 
elseif ($games > 10000) {$games = 10000;}
else {}

// Prepare the game tally
$wincount = array(0,0,0);

// Set up a table of results
echo "<h2>Results: " . $games . " games</h2>\n";
echo "<table>\n<tr>\n<th>&nbsp;</th><th>Player A</th><th>Player B</th><th>Player C</th></tr>\n";

for ($game=1; $game <= $games; $game++) {

	echo "<tr>\n<td><em><strong>Game " . $game . " score</strong></em></td>\n";

	// Prepare the deck
	$thedeck = range(11, 40);
	shuffle($thedeck);

	// prepare the mat
	$themat = range(1, 10);

	// prepare the plates
	$theplatescakecount = array(0,0,0);
	$theplatestopcard = array(0,0,0);
	
	// The game loop begins
	for ($round=0; $round <= 29; $round++) {

		// Whose turn is it?
		if ($round == 0 || $round == 3 || $round == 6 || $round == 9 || $round == 12 || $round == 15 || $round == 18 || $round == 21 || $round == 24 || $round == 27) { $playerid = 0;}
		elseif ($round == 1 || $round == 4 || $round == 7 || $round == 10 || $round == 13 || $round == 16 || $round == 19 || $round == 22 || $round == 25 || $round == 28) { $playerid = 1;}
		elseif ($round == 2 || $round == 5 || $round == 8 || $round == 11 || $round == 14 || $round == 17 || $round == 20 || $round == 23 || $round == 26 || $round == 29) { $playerid = 2;}
		else {}

		if ($playerid == 0) { $player = 'A'; }
		elseif ($playerid == 1) { $player = 'B'; } 
		elseif ($playerid == 2) { $player = 'C'; } 
		else {}
		
		// What card are we playing with this round?
		$currentcard = $thedeck[$round];

		// determine what kind of card
		$currentkind = 0;

		if ($currentcard == 11 || $currentcard == 21 || $currentcard == 31) { $currentkind = 1; }
		elseif ($currentcard == 12 || $currentcard == 22 || $currentcard == 32) { $currentkind = 2; }
		elseif ($currentcard == 13 || $currentcard == 23 || $currentcard == 33) { $currentkind = 3; }
		elseif ($currentcard == 14 || $currentcard == 24 || $currentcard == 34) { $currentkind = 4; }
		elseif ($currentcard == 15 || $currentcard == 25 || $currentcard == 35) { $currentkind = 5; }
		elseif ($currentcard == 16 || $currentcard == 26 || $currentcard == 36) { $currentkind = 6; }
		elseif ($currentcard == 17 || $currentcard == 27 || $currentcard == 37) { $currentkind = 7; }
		elseif ($currentcard == 18 || $currentcard == 28 || $currentcard == 38) { $currentkind = 8; }
		elseif ($currentcard == 19 || $currentcard == 29 || $currentcard == 39) { $currentkind = 9; }
		elseif ($currentcard == 20 || $currentcard == 30 || $currentcard == 40) { $currentkind = 10; }
		else {} 

		// Now see if there is a match on the current players plate
		if ($currentkind == $theplatestopcard[$playerid]) { 

			// increment the current player's plate with one cake
			$theplatescakecount[$playerid]++; }
		
		// Otherwise check the other players plates
		
		// Check Player A 
		elseif ($currentkind == $theplatestopcard[0]) { 
			// increment player A's plate with one cake
			$theplatescakecount[0]++; }
			
		// Check Player B
		elseif ($currentkind == $theplatestopcard[1]) { 
			//increment player B's plate with one cake
			$theplatescakecount[1]++; }
		
		// Check Player C
		elseif ($currentkind == $theplatestopcard[2]) { 

			// increment player C's plate with one cake
			$theplatescakecount[2]++; }
	
		
		else {
			
			// if there is no match on the plates, then compare to the mat
			
			if ($currentkind == $themat[0]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[0] = 0;	}
	
			elseif ($currentkind == $themat[1]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[1] = 0;	}
				
			elseif ($currentkind == $themat[2]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[2] = 0;	}
				
			elseif ($currentkind == $themat[3]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[3] = 0;	}
				
			elseif ($currentkind == $themat[4]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[4] = 0;	}
				
			elseif ($currentkind == $themat[5]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[5] = 0;	}
				
			elseif ($currentkind == $themat[6]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[6] = 0;	}
				
			elseif ($currentkind == $themat[7]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[7] = 0;	}
				
			elseif ($currentkind == $themat[8]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[8] = 0;	}
				
			elseif ($currentkind == $themat[9]) { 
		
				// increment the current player's plate with two cakes
				$theplatescakecount[$playerid]+=2;
			
				// Now update what the top card looks like
				$theplatestopcard[$playerid] = $currentkind;
				
				// Now update the mat
				$themat[9] = 0;	}
				
			else { 

				// if there is no match on the mat or the plates, then we add the card to the mat in the first available slot
				if ($themat[0] == 0) { $themat[0] = $currentkind; }
				elseif ($themat[1] == 0) { $themat[1] = $currentkind; }
				elseif ($themat[2] == 0) { $themat[2] = $currentkind; }
				elseif ($themat[3] == 0) { $themat[3] = $currentkind; }
				elseif ($themat[4] == 0) { $themat[4] = $currentkind; }
				elseif ($themat[5] == 0) { $themat[5] = $currentkind; }
				elseif ($themat[6] == 0) { $themat[6] = $currentkind; }
				elseif ($themat[7] == 0) { $themat[7] = $currentkind; }
				elseif ($themat[8] == 0) { $themat[8] = $currentkind; }
				elseif ($themat[9] == 0) { $themat[9] = $currentkind; }
				else {}
				// that's the end of adding card to the mat
					}
			}

// Now remove the card from the deck
$thedeck[$round] = 0;

// end of the loop 
}
	
// write the final scores to the results table
foreach ($theplatescakecount as $currentscore) { echo "<td class=\"gamescore\">" . $currentscore . "</td>\n"; }
echo "</tr>\n";

// Get the winning score
$winnerid = array_search(max($theplatescakecount), $theplatescakecount);
$winningscore = $theplatescakecount[$winnerid];

// Assign points
if ($theplatescakecount[0] == $winningscore) { $wincount[0]++; } else { }
if ($theplatescakecount[1] == $winningscore) { $wincount[1]++; } else { }
if ($theplatescakecount[2] == $winningscore) { $wincount[2]++; } else { }
		
// write league scores
echo "<tr>\n<td><em>Win count</em></td>\n";
foreach ($wincount as $leaguescore) { echo "<td class=\"tally\">" . $leaguescore . "</td>\n"; }
echo "</tr>\n";

// end of the game loop
}

echo "</table>";
echo "<h2>Tally</h2>\n";
// Headers
echo "<table border=\"1\">\n<tr>\n<th>Player A</th><th>Player B</th><th>Player C</th></tr>\n";

// final scores
echo "<tr>\n";
foreach ($wincount as $finalscores) { echo "<td>" . $finalscores . "</td>\n"; }
echo "</tr>\n";

echo "</tr>\n</table>\n"; 
?>
<p><a href="index.php" title="Home">Home</a> | <a href="http://www.orchardtoys.com/product/wheres-my-cupcake" title="Orchard Games">Where's My Cupcake at Orchard Toys</a></p>
	
</body>
</html>