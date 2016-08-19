<style>
.chronos {
  /*arrondir les coins*/
border-radius:10px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
background-color: lightyellow; font-size: smaller;
	padding: 5px;
	position: relative;
	left: 20px;
	top: 10px;
	margin-left: 40%;
	margin-right: 40px
}
.chronoslib {
font-style: italic;
}
</style>
<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

//echo "<div class='chronos'><span class='chronoslib'>hello worldx!</span></div>";
$db = Loader::db();

$blocks = array();

$aujourdhui=date("m-d");
$sql="SELECT * FROM chronologies WHERE date LIKE '%".$aujourdhui."' ORDER BY Rand() LIMIT 0,1";
//echo "<hr>sql:<br>".$sql."<hr>"; //tests
$blocks = $db->Execute($sql);
$numrows = count($blocks); // result of count query
$lebon=rand(0, $numrows);

foreach ($blocks as $anniversaire) {
//	print_r($anniversaire);
	$date=$anniversaire['date'];
	$an=substr($date,0,4);
	$mois=substr($date,5,2);
	$jour=substr($date,8,2);
	$year=date("Y");
	$ecart=$year-$an;

	echo "<div class=\"chronos\">
	<span class=\"chronoslib\">
	Il y a " .$ecart ." ans, le " .$jour ." ";
	echo $controller->mois_texte($mois);
	echo  " " .$an .": </span>" .$anniversaire['lib'];
	echo "</div>";
}
