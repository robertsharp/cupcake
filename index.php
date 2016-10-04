<!DOCTYPE html>
<html>
<head>
<title>Where's My Cupcake? simulator</title>
</head>
<body>

<h1>Where's My Cupcake? simulator</h1>
<hr/>
<h2>Two player game</h2>
<form method="post" action="twoplayer.php">
 <label for="games">Number of games (max 10,000)</label>
 <input type="text" name="games">
 <input type="submit" value="Simulate!">
</form>


<h2>Three player game</h2>
<form method="post" action="threeplayer.php">
 <label for="games">Number of games (max 10,000)</label>
 <input type="text" name="games">
 <input type="submit" value="Simulate!">
</form>


<h2>Four player game</h2>
<form method="post" action="fourplayer.php">
 <label for="games">Number of games (max 10,000)</label>
 <input type="text" name="games">
 <input type="submit" value="Simulate!">
</form>

<h2>Verbose simulator</h2>
<form method="post" action="verbose.php">
 <label for="games">Number of games (max 10)</label>
 <input type="text" name="games">
 <input type="submit" value="Simulate!">
</form>

<hr/>

<p><a href="http://www.orchardtoys.com/product/wheres-my-cupcake" title="Orchard Games">Where's My Cupcake at Orchard Toys</a></p>


</body>
</html>