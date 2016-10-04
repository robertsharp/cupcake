<?php

function showacardslot($slotvalue)	{
	
	echo "<div class=\"slot bg" . $slotvalue . "\">";		
		if ($slotvalue == 0) { echo "empty"; }	
		else { 
		
		echo "<img src=\"images/cupcake" . $slotvalue . ".jpg\" alt=\"Cupcake " . $slotvalue . "\" width=\"50px\" height=\"50px\">\n"; 
		
		echo $slotvalue; }
	echo "</div>\n"; 

}

?>
<html>
<head>
<title>Where's My Cupcake - Verbose simulator</title>

<style>
	body { }
	h1 {}
	h2 {}
	h2, p {clear:both}
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
	.bg0 {background-color: #EEEEEE; }
	
	td {text-align: center; width: 700px;}
	
</style>



</head>



<body>
<h1>Where's My Cupcake - Verbose simulator</h1>
<?php

// See if the number of games to run has been passed
$games = $_POST["games"];

// if there is no 'games' variable then set the number of games to 1
if ($games == 0) { $games++; }
elseif ($games > 10) {$games = 10;}
else {}

// Prepare the game tally

$wincount = array(0,0,0,0);

for ($game=1; $game <= $games; $game++) {


echo "<h1>Game " . $game . "</h1>\n";


// Prepare the deck
$thedeck = range(11, 40);
shuffle($thedeck);

// Show me the deck

	echo "<h2>The Deck</h2>\n";
	foreach ($thedeck as $position) { showacardslot($position); }
	
	
// prepare the mat
	$themat = range(1, 10);

// show me the mat	
	echo "<h2>The Mat</h2>\n";
	foreach ($themat as $position) { showacardslot($position); }
	
// prepare the plates

	$theplatescakecount = array(0,0,0,0);
	$theplatestopcard = array(0,0,0,0);
	
// show me the plates
echo "<h2>The Plates</h2>\n";

// Headers
echo "<table border=\"1\">\n<tr>\n<th>&nbsp;</th><th>Player A</th><th>Player B</th><th>Player C</th><th>Player D</th></tr>\n";

// current scores
echo "<tr><td>Count</td>\n";
foreach ($theplatescakecount as $currentscore) { echo "<td>" . $currentscore . "</td>\n"; }
echo "</tr>";

// top cards
echo "<tr><td>Top card</td>";
foreach ($theplatestopcard as $topcard) { 

	echo "<td>";		
		if ($topcard == 0) { echo "empty"; }	
		else { showacardslot($topcard); }
	echo "</td>"; 

}
echo "</tr>\n</table></hr>";

// Now let's play

// The game loop begins
for ($round=0; $round <= 29; $round++) {

// Whose turn is it?

if ($round == 0 || $round == 4 || $round == 8 || $round == 12 || $round == 16 || $round == 20 || $round == 24 || $round == 28) { $playerid = 0;}
elseif ($round == 1 || $round == 5 || $round == 9 || $round == 13 || $round == 17 || $round == 21 || $round == 25 || $round == 29) { $playerid = 1;}
elseif ($round == 2 || $round == 6 || $round == 10 || $round == 14 || $round == 18 || $round == 22 || $round == 26) { $playerid = 2;}
elseif ($round == 3 || $round == 7 || $round == 11 || $round == 15 || $round == 19 || $round == 23 || $round == 27) { $playerid = 3;}
else {}

if ($playerid == 0) { $player = 'A'; }
elseif ($playerid == 1) { $player = 'B'; } 
elseif ($playerid == 2) { $player = 'C'; } 
elseif ($playerid == 3) { $player = 'D'; } 
else {}

echo "<h2>Round " . $round . "</h2>";
echo "<p>Player " . $player . " takes top card from deck</p>";



$currentcard = $thedeck[$round];

showacardslot($currentcard);

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

echo "<p>To be clear, this is of the following kind</p>\n";

showacardslot($currentkind);

// Now see if there is a match on the current players plate

	if ($currentkind == $theplatestopcard[$playerid]) { 

		echo "<p>match on Player " . $player . "'s plate! The cake goes stright onto their pile</p>"; 
		
		// increment the player's plate with one cake
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]++;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		
		}
	elseif ($currentkind == $theplatestopcard[0]) { 

		echo "<p>match on Player A's plate! The cake goes stright onto their pile</p>"; 
				// increment the player's plate with one cake
		echo "<p>Player A's cake count was ";
		echo $theplatescakecount[0];
		$theplatescakecount[0]++;
		echo " and is now ";
		echo $theplatescakecount[0];
		echo "</p>"; }
	
	elseif ($currentkind == $theplatestopcard[1]) { 

		echo "<p>match on Player B's plate! <strong>Would you like a cupcake?</strong></p>"; 
				// increment the player's plate with one cake
		echo "<p>Player B's cake count was ";
		echo $theplatescakecount[1];
		$theplatescakecount[1]++;
		echo " and is now ";
		echo $theplatescakecount[1];
		echo "</p>"; }
	
	elseif ($currentkind == $theplatestopcard[2]) { 

		echo "<p>Match on Player C's plate! <strong>Would you like a cupcake?</strong></p>"; 
				// increment the player's plate with one cake
		echo "<p>Player C's cake count was ";
		echo $theplatescakecount[2];
		$theplatescakecount[2]++;
		echo " and is now ";
		echo $theplatescakecount[2];
		echo "</p>"; }
	
	elseif ($currentkind == $theplatestopcard[3]) { 

		echo "<p>match on Player D's plate! <strong>Would you like a cupcake?</strong></p>"; 
				// increment the player's plate with one cake
		echo "<p>Player D's cake count was ";
		echo $theplatescakecount[3];
		$theplatescakecount[3]++;
		echo " and is now ";
		echo $theplatescakecount[3];
		echo "</p>"; }		
		
	else {
	
	// if there is no match on the plates then compare to the mat

	if ($currentkind == $themat[0]) { 
	
		echo "<p>Match on mat slot 1</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[0] = 0;
	}
	
	elseif ($currentkind == $themat[1]) { 
	
		echo "<p>Match on mat slot 2</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[1] = 0;
	}
	elseif ($currentkind == $themat[2]) { 
	
		echo "<p>Match on mat slot 3</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[2] = 0;
	}
	elseif ($currentkind == $themat[3]) { 
	
		echo "<p>Match on mat slot 4</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[3] = 0;
	}
	elseif ($currentkind == $themat[4]) { 
	
		echo "<p>Match on mat slot 5</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[4] = 0;
	}
	elseif ($currentkind == $themat[5]) { 
	
		echo "<p>Match on mat slot 6</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[5] = 0;
	}
	elseif ($currentkind == $themat[6]) { 
	
		echo "<p>Match on mat slot 7</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[6] = 0;
	}
	elseif ($currentkind == $themat[7]) { 
	
		echo "<p>Match on mat slot 8</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[7] = 0;
	}
	elseif ($currentkind == $themat[8]) { 
	
		echo "<p>Match on mat slot 9</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[8] = 0;
	}
	elseif ($currentkind == $themat[9]) { 
	
		echo "<p>Match on mat slot 10</p>"; 
		
		// increment the player's plate with two cakes
		echo "<p>Player " . $player . "'s cake count was ";
		echo $theplatescakecount[$playerid];
		$theplatescakecount[$playerid]+=2;
		echo " and is now ";
		echo $theplatescakecount[$playerid];
		echo "</p>";
		
		// Now update what the top card looks like
		echo "<p>Player " . $player . "'s top cake was this:</p>";
		showacardslot($theplatestopcard[$playerid]);
		echo "<p>Now it is this:</p>";
		$theplatestopcard[$playerid] = $currentkind;
		showacardslot($theplatestopcard[$playerid]);
		
		// Now update the mat
		$themat[9] = 0;
	}
	else { 

		// if there is no match on the mat or the plates then we add the card to the mat

		echo "<p>No match on the plates or the mat, so we add it to the mat.</p>";

		if ($themat[0] == 0) { 
		
			echo "<p>Put this card in mat slot 1</p>";
			$themat[0] = $currentkind;
			showacardslot($currentkind);
			}
			
		elseif ($themat[1] == 0) { 
		
			echo "<p>Put this card in mat slot 2</p>";
			$themat[1] = $currentkind;
			showacardslot($currentkind);			
			}
		
		elseif ($themat[2] == 0) { 
		
			echo "<p>Put this card in mat slot 3</p>";
			$themat[2] = $currentkind;
			showacardslot($currentkind);
			}
			
			
		elseif ($themat[3] == 0) { 
		
			echo "<p>Put this card in mat slot 4</p>";
			$themat[3] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[4] == 0) { 
		
			echo "<p>Put this card in mat slot 5</p>";
			$themat[4] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[5] == 0) { 
		
			echo "<p>Put this card in mat slot 6</p>";
			$themat[5] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[6] == 0) { 
		
			echo "<p>Put this card in mat slot 7</p>";
			$themat[6] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[7] == 0) { 
		
			echo "<p>Put this card in mat slot 8</p>";
			$themat[7] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[8] == 0) { 
		
			echo "<p>Put this card in mat slot 9</p>";
			$themat[8] = $currentkind;
			showacardslot($currentkind);
			}
		elseif ($themat[9] == 0) { 
		
			echo "<p>Put this card in mat slot 10</p>";
			$themat[9] = $currentkind;
			showacardslot($currentkind);
			}
		else {}
	}

}

// Now remove the card from the deck
$thedeck[$round] = 0;


// end of round

	// Show me the deck
	echo "<h2>The Deck at the end of Round " . $round . "</h2>\n";
	foreach ($thedeck as $position) { showacardslot($position); }

	// show me the mat	
	echo "<h2>The Mat at the end of Round " . $round . "</h2>\n";
	foreach ($themat as $position) { showacardslot($position); }
	
	// show me the plates
	echo "<h2>The Plates at the end of Round " . $round . "</h2>\n";

		// Headers
		echo "<table border=\"1\">\n<tr>\n<th>&nbsp;</th><th>Player A</th><th>Player B</th><th>Player C</th><th>Player D</th></tr>\n";

		// current scores
		echo "<tr><td>Count</td>\n";
		foreach ($theplatescakecount as $currentscore) { echo "<td>" . $currentscore . "</td>\n"; }
		echo "</tr>";
		// top cards
		echo "<tr><td>Top card</td>";
		foreach ($theplatestopcard as $topcard) { 

			echo "<td class=\"bg" . $topcard . "\">";		
			if ($topcard == 0) { echo "empty"; }	
			else { echo $topcard; }
		echo "</td>"; 
		}

echo "</tr>\n</table>\n<hr/>";

// end of the loop 
}
	
echo "<h2>Final Standing</h2>";

// show me the plates
	
// Headers
echo "<table border=\"1\">\n<tr>\n<th>Player A</th><th>Player B</th><th>Player C</th><th>Player D</th></tr>\n";

// final scores
foreach ($theplatescakecount as $currentscore) { echo "<td>" . $currentscore . "</td>\n"; }
echo "</tr>";

echo "</tr>\n</table></hr>";

// Get the winning score
$winnerid = array_search(max($theplatescakecount), $theplatescakecount);
$winningscore = $theplatescakecount[$winnerid];

// Assign points
if ($theplatescakecount[0] == $winningscore) { echo "<p>1 point for Player A</p>"; $wincount[0]++; } else { }
if ($theplatescakecount[1] == $winningscore) { echo "<p>1 point for Player B</p>"; $wincount[1]++; } else { }
if ($theplatescakecount[2] == $winningscore) { echo "<p>1 point for Player C</p>"; $wincount[2]++; } else { }
if ($theplatescakecount[3] == $winningscore) { echo "<p>1 point for Player D</p>"; $wincount[3]++; } else { }

echo "<h2>Current League Tables</h2>";

// Headers
echo "<table border=\"3\">\n<tr>\n<th>Player A</th><th>Player B</th><th>Player C</th><th>Player D</th></tr>\n";

// final scores
foreach ($wincount as $leaguescore) { echo "<td>" . $leaguescore . "</td>\n"; }
echo "</tr>";

echo "</tr>\n</table></hr>";


// end of the game loop
}

echo "<h2>Final League Tables</h2>";

// Headers
echo "<table border=\"5\">\n<tr>\n<th>Player A</th><th>Player B</th><th>Player C</th><th>Player D</th></tr>\n";

// final scores
foreach ($wincount as $finalscores) { echo "<td>" . $finalscores . "</td>\n"; }
echo "</tr>";

echo "</tr>\n</table></hr>";



	?>


	
	
	
</body>
</html>