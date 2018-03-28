<!DOCTYPE html>
<html>
<head>
<title>Count with Chicken and Steak</title>
</head>
<body>
<div id="container">
<?php

function fancyFunction(){
	// Count 1 through 120
	for ($i = 1; $i <= 120; $i++)
		{
		// check if divisible by 4 and 7
		if ($i % 4 == 0 && $i % 7 == 0)
			{
			echo "ChiCken and SteAk <br />";
			}
		  else
		//check if divisible by 4
		if ($i % 4 == 0)
			{
			echo "ChiCken <br />";
			}
		  else	
		//check if divisible by 7
		if ($i % 7 == 0)
			{
			echo "SteAk <br />";
			}
		  else
		//echo the number
			{
			echo $i . "<br />";
			}
		}
	}

fancyFunction();
?>
</div>
</body>
</html>