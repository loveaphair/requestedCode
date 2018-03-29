<!DOCTYPE html>
<html>
<head>
<title>Count with Chicken and Steak</title>
</head>
<body>
<div id="container">

<?php

$minN = 1;
$maxN = 120;

if (isset($_POST['submit'])) {
		$alwaysShow = strip_tags(trim($_POST["aShow"]));
		$aShow = explode(" ", $alwaysShow);
		if (max($aShow) > 120 || min($aShow) < 1){
			$numErr = "Please enter a number between 1-120";
			$alwaysShow = null;
		}
		if (!empty($alwaysShow) && preg_match("/[a-z]/i", $alwaysShow)){
			$numErr = "Please enter only numbers";
			$alwaysShow = null;
		}

	if (empty($_POST["cMultiplier"]) || filter_var($_POST["cMultiplier"], FILTER_VALIDATE_INT, array(
		"options" => array(
			"min_range" => $minN,
			"max_range" => $maxN
		)
	)) === false) {
		$numErr = "Please enter a valid number for ChiCken <br>";
		$c = null;

	}
	else {
		$c = $_POST["cMultiplier"];
	}

	if (empty($_POST["sMultiplier"]) || filter_var($_POST["sMultiplier"], FILTER_VALIDATE_INT, array(
		"options" => array(
			"min_range" => $minN,
			"max_range" => $maxN
		)
	)) === false || preg_match("/[a-z]/i", $_POST["sMultiplier"])) {
		$numErr = "Please enter a valid number for SteAk <br>";
		$s = null;
	}
	else {
		$s = $_POST["sMultiplier"];
	}

	if ($c == $s) {
		$numErr = "Please enter different numbers for ChiCken and SteAk";
	}
}

function fancyFunction($c, $s, $aShow)
{
	// Count 1 through 120
	for ($i = 1; $i <= 120; $i++) {
		if ($i %2 == 0 && !in_array($i, $aShow)){
			if ($i % $c == 0 && $i % $s == 0) {
				echo "ChiCken and SteAk <br />";
			}
			else if ($i % $c == 0) {
				echo "ChiCken <br />";
			}
			else if ($i % $s == 0) {
				echo "SteAk <br />";
			}
			else {
				echo $i . "<br />";
			}
		} else{ echo $i."<br>";}
	} 
}

?>

<form method="post" action="" name="mVariables">
Please enter a multipler value for ChiCken and SteAk.<br />
<table>
<tr><td>Multiplier for ChiCken</td>
<td><input name="cMultiplier" type="text" style="width: 50px;" value="<?php if (isset($c)){echo $c;}?>"></td>
<td><?php if(isset($c) && !isset($numErr)){ echo "Current ChiCken Number: ".$c;} ?></td>
</tr>
<tr><td>Multiplier for SteAk</td>
<td><input name="sMultiplier" type="text" style="width: 50px;" value="<?php if (isset($c)){echo $s;}?>"></td>
<td><?php if(isset($s) && !isset($numErr)) {echo "Current SteAk Number: ".$s; }?></td>
</tr>
<tr><td>
Numbers (1-120) that will always show<br>(put a space between each number)</td>
<td><input name="aShow" type="text" style="width: 100px;" value="<?php if (isset($c)){echo $alwaysShow;}?>"></td>
<td>

<?php 
if(isset($alwaysShow) && !isset($numErr)) {
	$uNumberOutput = "Selected Number(s): ";
	foreach ($aShow as $Numbers){
		if($Numbers === end($aShow)){
			$uNumberOutput .= $Numbers; 
		}else {
			$uNumberOutput .= $Numbers.", ";
		}
	}
	echo $uNumberOutput;
}
?>
</td>
</tr>
<tr><td></td>
<td><input style="width:100px; height:30px;" type="submit" name="submit" value="Submit Values">
</td>
</tr>

</table>
</form>

<?php

if (isset($_POST['submit'])){
	if (!isset($numErr)){
		fancyFunction($c, $s, $aShow);
	} else{ echo '<span style="color:red; font-weight:bold;">'.$numErr.'</span>'; }
} ?>

</div>
</body>
</html>