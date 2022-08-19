<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calculator</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
			font-family: "Roboto", sans-serif;
		}

		body {
			font-size: 0.8rem;
			background: white;
			user-select: none;
			overflow-x: hidden;
			font-family: "Roboto", "sans-serif";
		}

		.about-block {
			position: fixed;
			width: 350px;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: white;
			padding: 10px;
			box-shadow: 4px 4px 12px rgb(13 39 80 / 25%), -4px -4px 12px white;
		}

		.about-block h3 span,
		.about-block p span {
			font-weight: 600;
			font-size: 14px;
			margin-right: 10px;
		}

		.about-block p {
			margin: 20px 0;
		}

		.answer-display {
			width: 100%;
			height: 120px;
			border: 1px solid black;
		}

		.rows {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			width: 100%;
			margin: 20px 0;
		}

		.rows span {
			background-color: white;
			padding: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			box-shadow: 4px 4px 12px rgb(13 39 80 / 25%), -4px -4px 12px white;
			margin: 5px;
			font-size: 17px;
			font-weight: bold;
			cursor: pointer;
		}

		.answer-display {
			padding: 10px;
		}

		.answer-display .logic {
			width: 100%;
			font-size: 25px;
		}

		.answer-display .answer {
			font-size: 35px;
			display: flex;
			justify-content: end;
		}

		.inputs {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			margin: 20px 0;
			gap: 0.9rem;
		}

		.inputs .input input {
			margin: 10px 0;
			width: 100%;
			padding: 10px;
			outline: none;
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<?php
	?>
	<div class="about-block">
		<div class="answer-display">
			<div class="logic"></div>
			<div class="answer"></div>
		</div>
		<div class="inputs">
			<div class="input">
				<h5>First Number</h5>
				<input type="number" name="first" id="one">
			</div>
			<div class="input">
				<h5>Last Number</h5>
				<input type="number" name="last" id="two">
			</div>
		</div>
		<h5>Operator</h5>
		<div class="rows">
			<span onclick="getString('+')">+</span>
			<span onclick="getString('-')">-</span>
			<span onclick="getString('/')">/</span>
			<span onclick="getString('*')">*</span>
		</div>
	</div>
</body>
<script src="jquery-3.5.1.js"></script>
<script>
	function getString(string) {
		const numberOne = document.getElementById("one").value;
		const numberTwo = document.getElementById("two").value;

		$('.logic').html(numberOne + string + numberTwo);
		$.ajax({
			url: "ajax-request.php",
			method: "POST",
			data: {
				strings: string,
				firstNumber: numberOne,
				secondNumber: numberTwo
			},
			success: function(data) {
				$('.answer').html(data);
			},
		});
	}
</script>

</html>