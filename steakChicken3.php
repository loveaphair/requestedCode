<!DOCTYPE html>
<html>
<head>
<title>Count with Chicken and Steak</title>
</head>
<body>
<div id="container">
<?php

function fancyFunction($c, $s)
{
echo 34 % $c;
	// Count 1 through 120

	for ($i = 1; $i <= 120; $i++) {
		if ($i % $c == 0 && $i % $s == 0 && $i %2 == 0) {
			echo "ChiCken and SteAk <br />";
		}
		else if ($i % $c == 0 && $i %2 == 0) {
			echo "ChiCken <br />";
		}
		else if ($i % $s == 0 && $i %2 == 0) {
			echo "SteAk <br />";
		}
		else {
			echo $i . "<br />";
		}
	}
}

$c = $s = "";
$minN = 1;
$maxN = 120;

if (isset($_POST['submit'])) {

	// define variables from form and check if empty

	if (empty($_POST["cMultiplier"]) || filter_var($_POST["cMultiplier"], FILTER_VALIDATE_INT, array(
		"options" => array(
			"min_range" => $minN,
			"max_range" => $maxN
		)
	)) === false) {
		$numErr = "Please enter a valid number for ChiCken";
	}
	else {
		$c = $_POST["cMultiplier"];
	}

	if (empty($_POST["sMultiplier"]) || filter_var($_POST["sMultiplier"], FILTER_VALIDATE_INT, array(
		"options" => array(
			"min_range" => $minN,
			"max_range" => $maxN
		)
	)) === false) {
		$numErr = "Please enter a valid number for SteAk";
	}
	else {
		$s = $_POST["sMultiplier"];
	}

	if ($c == $s) {
		$numErr = "Please enter different numbers for ChiCken and SteAk";
		$c = $s = "";
	}
}

?>

<form method="post" action="" name="mVariables">
Please enter a multipler value for ChiCken and SteAk.<br />
<span style="color:red;"> <?php
echo $numErr; ?></span><br />
<table>
<tr><td>Multiplier for ChiCken</td>
<td><input name="cMultiplier" type="text" style="width: 50px;"></td>
</tr>
<tr><td>Multiplier for SteAk</td>
<td><input name="sMultiplier" type="text" style="width: 50px;"></td>
</tr>
<tr><td></td>
<td><input style="width:100px; height:30px;" type="submit" name="submit" value="Submit Values">
</td>
</tr>
</table>
</form>

<?php

if ($c != "" || $s != "") {
	fancyFunction($c, $s);
} ?>

</div>
</body>
</html>