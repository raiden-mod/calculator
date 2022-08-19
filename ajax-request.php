<?php
if (isset($_POST['strings'], $_POST['firstNumber'], $_POST['secondNumber'])) {
	$x = $_POST['firstNumber'];
	$operator = $_POST['strings'];
	$y = $_POST['secondNumber'];
	if ($operator == "+") :
		$total = $x + $y;
	elseif ($operator == "-") :
		$total = $x - $y;
	elseif ($operator == "*") :
		$total = $x * $y;
	elseif ($operator == "/") :
		$total = $x / $y;
	endif;
	echo $total;
}
