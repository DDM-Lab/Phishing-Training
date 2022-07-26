<?php include_once('header.php'); ?>
<script type="text/javascript">
	///////// this code is for back button disable////////////// Exp2
	history.pushState(null, null, location.href);
	window.onpopstate = function() {
		history.go(1);
	};
</script>
<html>

<head>
	<script type="text/javascript">
		var slider_flag = 0;

		function validateForm() {
			var choice_array = document.getElementsByName('choice');
			var phishing_array = document.getElementsByName('phishing');

			var choice_filled = false;
			var phishing_filled = false;

			var terms = false;
			if (choice_array[0].checked || choice_array[1].checked || choice_array[2].checked || choice_array[3].checked || choice_array[4].checked || choice_array[5].checked) {
				choice_filled = true
			}
			if (phishing_array[0].checked || phishing_array[1].checked) {
				phishing_filled = true
			}
			if (!(choice_filled && phishing_filled)) {
				alert('Please select answers for given questions.');
				return false;
			}

			if (slider_flag != 1) {
				alert('Please select confidence level in Q2.');
				return false;
			}


		}
	</script>
	<script>
		function my_slider_Function() {
			slider_flag = 1;
		}
	</script>



	<style>
		#c1 {
			float:center;

		}
		.tooltip {
			position: relative;
			display: inline-block;

		}

		.tooltip .tooltiptext {
			visibility: hidden;
			width: 250px;
			background-color: #FFFF99;
			color: #FF5733;
			text-align: center;
			border-radius: 6px;
			padding: 10px;

			/* Position the tooltip */
			position: absolute;
			z-index: 1;
			bottom: 125%;
			left: -20%;
			margin-left: -60px;
		}


		.tooltip .tooltiptext::after {
			content: "";
			position: absolute;
			top: 100%;
			left: 50%;
			margin-left: -5px;
			border-width: 5px;
			border-style: solid;
			border-color: red transparent transparent transparent;
		}


		.tooltip:hover .tooltiptext {
			visibility: visible;
		}
	</style>
	<style>
		.tooltip1 {
			position: relative;
			display: inline-block;

		}

		.tooltip1 .tooltiptext {
			visibility: hidden;
			width: 200px;
			background-color: #4d4d4d;
			color: #ffffff;
			text-align: center;
			border-radius: 6px;
			padding: 10px;

			/* Position the tooltip */
			position: absolute;
			z-index: 1;
			bottom: 125%;
			left: 5%;
			margin-left: -60px;
		}

		.tooltip1 .tooltiptext::after {
			content: "";
			position: absolute;
			top: 100%;
			left: 50%;
			margin-left: -5px;
			border-width: 5px;
			border-style: solid;
			border-color: black transparent transparent transparent;
		}


		.tooltip1:hover .tooltiptext {
			visibility: visible;
		}
	</style>

	<style>
		div.ex1 {
			background-color: #FFFFFF;
			width: 98%;
			height: 530px;
			padding: 5px;
			overflow: scroll;
		}
	</style>

	<style>
		.slidecontainer {
			width: 100%;
		}

		.slider {
			-webkit-appearance: none;
			width: 70%;
			height: 20px;
			background: #d3d3d3;
			outline: none;
			opacity: 0.7;
			-webkit-transition: .2s;
			transition: opacity .2s;
		}

		.slider:hover {
			opacity: 1;
		}

		.slider::-webkit-slider-thumb {
			-webkit-appearance: none;
			appearance: none;
			width: 20px;
			height: 20px;
			background: #4CAF50;
			cursor: pointer;
		}

		.slider::-moz-range-thumb {
			width: 25px;
			height: 25px;
			background: #4CAF50;
			cursor: pointer;
		}
	</style>
	<style>
		.button {
			background-color: #555555;
			border: none;
			color: white;
			padding: 10px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
	<style>
		table.table1 {

			width: 100%;
			height: 550px;

		}

		table.table1,
		tr,
		td {
			border: 2px solid black;
			padding: 2px;
		}

		table.table1 th {
			text-align: center;
		}
	</style>
	<style>
		table.table2 {

			width: 100%;
			height: 200px;

		}

		table.table2,
		tr,
		td {
			border: 1px solid black;
			padding: 2px;
		}

		table.table2 th {
			text-align: center;
		}
	</style>

</head>
<header id="banner" class="body">
	&nbsp;
</header>

<?php
if (!isset($_POST["Mturkid"])) {

	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if ($pageWasRefreshed == 1) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
	}
} else {


	/////////////////////////////////////////////////////////////// Common Code during the questions and feedback///////////////////////////////////////////
	$servername = "localhost";
	$database = "phish_training";
	$username = "root";
	$password = "";

	// Create connection

	error_reporting(E_ALL & ~E_NOTICE);
	$conn = mysqli_connect($servername, $username, $password, $database) or die("connect_fail");

	// Check connection

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//$maxtrial;
	$t = $_POST["trial"];
	$pre = $_POST["pre"];
	$p = $_POST["p"];
	$num = $_POST["num"];
	$Mturkid = $_POST["Mturkid"];
	$Tscore = $_POST['Score1'];
	$email_repetation = unserialize($_POST["email_repetation"]);

	// echo "<h2> What is pre: " . $pre . "</h2>";
	if ($t == 1 && $t != $pre) {
		$score = 0;
		$array = array();
		// $a = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40);
		$a1 = array(1, 2, 3, 4);
		$arr = array_rand($a1, 1);
		$array[0] = $a1[$arr];
		// $index = 0;
		// for($i=0;$i<10;$i++)
		// {
		// 	$array[$i]=$a[$arr[$i]];
		// }
		// $array[10]=0;

		//$hamemail=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		// block score
		$block_score = 0;
		$pre_block_score = 0;
		$n_p = 0;
		$count = 0;
		// percentage to calculate position of checks.
		$check1 = mt_rand(5, 10);
		$check2 = mt_rand(15, 25);
		$pass = 0;
		$check_counter = 2;
		$current_score = 0;
		if ($check1 % 4 == 1){
			$check1 = $check1 + 1;
		}
		if ($check2 % 4 == 1){
			$check2 = $check2 + 1;
		}

		$phishing_clusters = array (
			array( 1,   2,   3,  13,  18,  20,  21,  22,  26,  27,  29,  30,  33,
			34,  36,  38,  42,  53,  55,  56,  57,  58,  59,  69,  74,  78,
			84,  86,  87,  88,  91,  95,  97, 101, 102, 110, 115, 116, 119,
		   121, 123, 126, 132, 133, 136, 137, 144, 151, 154, 157, 163, 170,
		   172, 174),
			array(5,   6,  11,  24,  54,  61,  66,  67,  75,  94, 106, 108, 117,
			120, 128, 129, 130, 131, 134, 158, 169, 173, 175),
			array(4,   7,  12,  16,  28,  43,  49,  51,  64,  73, 124, 146, 149,
			152, 161),
			array(8,  10,  15,  17,  19,  31,  46,  47,  48,  68,  70,  80,  81,
			82,  92,  98, 100, 105, 112, 113, 122, 127, 139, 140, 141, 142,
		   143, 159, 162, 164, 176),
		   array(32,  41,  50,  63,  65,  71,  76,  77,  96, 103, 111, 114, 135,
		   138, 155, 160),
		   array(9,  14,  23,  25,  35,  37,  39,  40,  44,  45,  52,  60,  62,
		   72,  79,  83,  85,  89,  90,  93,  99, 104, 107, 109, 118, 125,
		  145, 147, 148, 150, 153, 156, 165, 166, 167, 168, 171)
		  );

	} else {

		//$hamemail=$_POST["hamemail"];
		$score = $_POST["score"];
		$array = unserialize($_POST['array']);
		//print_r($array);
		$count = $_POST["count"];
		$check1 = $_POST["check1"];
		$check2 = $_POST["check2"];
		$pass = $_POST["pass"];
		$check_counter = $_POST["check_counter"];
		$check_value = $_POST["check_value"];
		$current_score = $_POST["current_score"];

		$phishing_clusters = unserialize($_POST['phishing_clusters']);



		$block_score = $_POST["block_score"];
		$pre_block_score = $_POST["pre_block_score"];
		$n_p = $_POST["n_p"];



		if ($t == 5 && $t != $pre) {
			$a1 = array($t, $t + 1, $t + 2, $t + 3);
			$arr = array_rand($a1, 1);
			$array[$count] = $a1[$arr];

			$pre_block_score = $block_score;
			// echo "<h2> Pre code ".$pre_block_score."</h2>";
			$block_score = 0;
		} else if (($t % 4 == 1 && $t > 5) && $t != $pre) {
			if ($block_score > $pre_block_score) {
				$n_p = min($n_p + 1, 5);
			}

			$a1 = array($t, $t + 1, $t + 2, $t + 3);
			$arr = array_rand($a1, 1);
			$array[$count] = $a1[$arr];


			// for ($x = $count; $x < count($array); $x++) {
			// 	if ($array[$x] == $check1) {
			// 		$check1 = $check1 + 1;
			// 	}
			// 	if ($array[$x] == $check2) {
			// 		$check2 = $check2 + 1;
			// 	}
			// }

			

			$pre_block_score = $block_score;
			// echo "<h2> Pre code ".$pre_block_score."</h2>";
			$block_score = 0;
		}
		// echo "<h2> Pre code ".$pre_block_score."</h2>";


	}

	// echo "<h2> Pre code ".$pre_block_score."</h2>";
	// echo "<h2> Block ".$block_score."</h2>";

	// for($i=$count;$i<count($array);$i++){
	// 	echo "<h3> " . $array[$i]."<br></h3>";
	// }
	// echo "<h3> " . $pre."<br></h3>";
	//echo "<h3> " . $n_p."<br></h3>";
	



	//echo $check1, $check2, $pass;
	//////////////////////////////////////////inserting check values in database///		
	if ($check_counter == 1) {
		$sql = "UPDATE demographics SET check1=$check_value WHERE Mturk_id='$Mturkid'";
		$result = $conn->query($sql);
	}
	if ($check_counter == 0) {
		$sql = "UPDATE demographics SET check2=$check_value WHERE Mturk_id='$Mturkid'";
		$result = $conn->query($sql);
		$check_counter = $check_counter - 1;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////		
	if (($t == $pre && $p == 1 && $num != 242) && ($t == $pre && $p == 1 && $num != 243)) {
		$count = $count - 1;
	}

	if ($check1 == $t) {
		$num = 242;
		// $sql = "SELECT * from emails where email_id='$num'";
		$p = 1;
	} else if ($check2 == $t) {
		$num = 243;
		$p = 1;
	}
	else if (($t == $array[$count] && ($count < 40))) {
		if ($t != $pre) {
			$ind = array_rand($phishing_clusters[$n_p],1);
			$num = $phishing_clusters[$n_p][$ind];
			// $num = mt_rand(1, 176);
			// code to avoid repetation of same emails
			for ($i = 0; $i < ($t + 15); $i++) {
				if ($email_repetation[$i] == $num) {
					// $num = mt_rand(1, 176);
					$ind = array_rand($phishing_clusters[$n_p],1);
					$num = $phishing_clusters[$n_p][$ind];
					$i = 0;
				}
			}
			$email_repetation[$t + 14] = $num;
		}

		// $sql = "SELECT * from emails where email_id='$num'";
		$p = 1;
		$count++;
	} else {
		if ($t != $pre) {
			$num = mt_rand(189, 239);
			// code to avoid repetation of same emails
			for ($i = 0; $i < ($t + 15); $i++) {
				if ($email_repetation[$i] == $num) {
					$num = $num + 1;
					if ($num > 239) {
						$num = mt_rand(189, 239);
					}
					$i = 0;
				}
			}
			$email_repetation[$t + 14] = $num;
		}
		//echo $num;
		// if ($check1 == $t) {
		// 	$num = 242;
		// } else if ($check2 == $t) {
		// 	$num = 243;
		// }
		// $sql = "SELECT * from emails where email_id='$num'";
		$p = 0;
		// if ($num == 242 || $num == 243) {
		// 	$p = 1;
		// }
	}
	$sql = "SELECT * from emails where email_id='$num'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);

?>

	<label align="left">
		<font size="5"> &nbsp;&nbsp;&nbsp;&nbsp; <b>Phase 2 </b></font>
	</label>


	<?php

	if ($t == 1 && $t != $pre) {
		$Tscore;
	} elseif (($t == $pre && $num != 242) && ($t == $pre && $num != 243)) {
		$phishing = $_POST['phishing']; //fetching data

		if (($p == 1 && $phishing == 1) || ($p == 0 && $phishing == 0)) {
			$Tscore = $Tscore + 1;
			$current_score = $current_score + 1;
			$score = 1;
			$block_score = $block_score + 1;
		} else {
			$Tscore = $Tscore;
			$current_score = $current_score;
			$score = 0;
			$block_score = $block_score;
		}

		$Tscore;
	} else {
		$Tscore;
	}

	?>

	<?php


	if ($t != $pre) {
	?>
		<br><br><label align="left">
			<font size="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				<b>Trial: <?php echo $t ?> </b>
			</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp

			<b>Total Score: <?php echo $Tscore;
						} ?> </b> <?php

										if (($t == $pre && $num != 242) && ($t == $pre && $num != 243)) {
										?>

				<br><br><label align="left">
					<font size="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp
						<b>Trial: <?php echo $t ?></b>
					</font>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


					<font color="black" align="right"><b> Trial score: <?php echo $score ?></b><br>

						<!-- <font color="black" align="right"><b> Block score: <?php echo $block_score ?></b><br>
							<font color="black" align="right"><b> Pre Block score: <?php echo $pre_block_score ?></b><br>
								<font color="black" align="right"><b> Number phising: <?php echo $n_p ?></b><br> -->



									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
									<font color="black" align="right"><b>Phase 2 score: <?php echo $current_score ?></b><br></font>

										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										
						
										<font color="black" align="right"><b>Total Score: <?php echo $Tscore;
																						}	?>
											</b>
										</font>

										</b>
				</label>

				<table class="table1" Align="center">

					<tr>
						<td align="center" width="70%">

							<div align="justify" class="ex1">
								<?php
								printf("<b>From:</b> %s", $row["source"]);
								echo "<br> <br>";
								printf("<b>Subject:</b> %s", $row["subject"]);
								echo "<br><br>";
								printf("%s", $row["body"]);

								?>
								<?php
								if ($t != $pre) {
								?>
							</div>

						</td>


						<td>

							<form id="actions" method="post" action="phase2.php" onsubmit="return validateForm()">
								<div align="left">

									<h3> Answer to the following Questions:</h3>
									<label style="color:#444499;">Q1. Is this a phishing email ?</label><br>
									<input type="radio" name="phishing" value="1">Yes
									<br>
									<input type="radio" name="phishing" value="0">No

									<br><br>
									<label style="color:#444499;">Q2. How confident are you on your answer in question 1?</label><br>
									<div align="center" class="slidecontainer">
										<input type="range" min="50" max="100" value="50" class="slider" id="myRange" name="myRange" onchange="my_slider_Function()"><br>
										<font size="2"><label> &nbsp;&nbsp;50 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100</label><br>
											<label> Not Confident at all &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fully Confident</label>
										</font>

										<b>
											<p>Confidence Level: <span id="demo"></span></p>
										</b>
									</div>

									<script>
										var slider = document.getElementById("myRange");
										var output = document.getElementById("demo");
										output.innerHTML = slider.value;

										slider.oninput = function() {
											output.innerHTML = this.value;
										}
									</script>


									<label align="justify" style="color:#444499;">Q3. What do you recommend that the person receiving this message should do: </label><br>
									<input type="radio" name="choice" value="1">Respond to this email
									<br>
									<input type="radio" name="choice" value="2">Click link/ open attachment
									<br>
									<input type="radio" name="choice" value="3">Check sender
									<br>
									<input type="radio" name="choice" value="4">Check link
									<br>
									<input type="radio" name="choice" value="5">Delete email
									<br>
									<input type="radio" name="choice" value="6">Report this email


									<br>
									<input type="hidden" name="Mturkid" value="<?php echo $Mturkid; ?>" />
									<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
									<input type="hidden" name="count" value="<?php echo $count; ?>" />
									<input type="hidden" name="trial" value="<?php echo $t; ?>" />
									<input type="hidden" name="score" value="<?php echo $score; ?>" />
									<input type="hidden" name="Score1" value="<?php echo $Tscore; ?>" />
									<input type="hidden" name="p" value="<?php echo $p; ?>" />
									<input type="hidden" name="pre" value="<?php echo $t; ?>" />
									<input type="hidden" name="num" value="<?php echo $num; ?>" />
									<input type="hidden" name="check1" value="<?php echo $check1; ?>" />
									<input type="hidden" name="check2" value="<?php echo $check2; ?>" />
									<input type="hidden" name="pass" value="<?php echo $pass; ?>" />
									<input type="hidden" name="check_counter" value="<?php echo $check_counter; ?>" />
									<input type="hidden" name="check_value" value="<?php echo $check_value; ?>" />
									<input type="hidden" name="current_score" value="<?php echo $current_score; ?>" />
									<input type="hidden" name="email_repetation" value="<?php echo htmlentities(serialize($email_repetation)); ?>" />

									<input type="hidden" name="block_score" value="<?php echo $block_score; ?>" />
									<input type="hidden" name="pre_block_score" value="<?php echo $pre_block_score; ?>" />
									<input type="hidden" name="n_p" value="<?php echo $n_p; ?>" />

									<input type="hidden" name="phishing_clusters" value="<?php echo htmlentities(serialize($phishing_clusters)); ?>" />

									<center><button name="submit2" class="button" type="submit">Submit</button> </center>

							</form>
						</td>
					</tr>
				</table>





				<?php
								} else {
									if (isset($_REQUEST['submit2'])) {
										$servername = "localhost";
										$database = "phish_training";
										$username = "root";
										$password = "";

										// Create connection
										$conn = mysqli_connect($servername, $username, $password, $database);
										// Check connection
										if (!$conn) {
											die("Connection failed: " . mysqli_connect_error());
										}

										$t = $_POST["trial"];
										$ta = $t;
										$Mturkid = $_POST["Mturkid"];
										$p = $_POST['p'];
										$array = unserialize($_POST['array']);
										$count = $_POST["count"];
										$phishing = $_POST['phishing'];
										$choice = $_POST['choice'];
										$confidence = $_POST['myRange'];
										$email_id = $_POST['num'];
										$email_repetation = unserialize($_POST["email_repetation"]);

										$phishing_clusters = unserialize($_POST['phishing_clusters']);

										// $block_score =$_POST["block_score"];
										$pre_block_score = $_POST["pre_block_score"];
										// $n_p =$_POST["n_p"];

										$phase = 2;
										if (($p == 1) && ($email_id != 242 && $email_id != 243)) {
											$email_type = "phishing";
										} elseif ($p == 0) {
											$email_type = "ham";
										} else {
											$email_type = "check";
											$ta = "ch" . $ta;
										}


										// Phase 2 score Intialization
										$c = 0;
										$cum_score = $_POST['Score1'];

										if ($email_id != 242 && $email_id != 243) {

											if ($p == 1 && $phishing == 1) {
												//$score=1;
												$msg = "This is a <b>Phishing</b> email and you detected it <b>correctly</b>";
												//$current_score=$current_score+1;
												$c = 1;

												$query_logid = mysqli_query($conn, "SELECT * FROM cues WHERE Email_id = '$email_id';");
												$r = mysqli_fetch_row($query_logid);
												$sender    = $r[1];
												$personal  = $r[2];
												$subject   = $r[3];
												$threat    = $r[4];
												$offer     = $r[5];
												$link      = $r[6];
											} elseif ($p == 1 && $phishing == 0) {
												//$score=0;
												$msg = "This is a <b>Phishing</b> email and you detected it <b>incorrectly</b>";
												//$current_score=$current_score;
												$c = 0;

												$query_logid = mysqli_query($conn, "SELECT * FROM cues WHERE Email_id = '$email_id';");
												$r = mysqli_fetch_row($query_logid);
												$sender    = $r[1];
												$personal  = $r[2];
												$subject   = $r[3];
												$threat    = $r[4];
												$offer     = $r[5];
												$link      = $r[6];
											} elseif ($p == 0 && $phishing == 1) {
												//$score=0;
												$msg = "This is a <b>Ham</b> email and you detected it <b>incorrectly</b>";
												//$current_score=$current_score;
												$c = 0;

												$query_logid = mysqli_query($conn, "SELECT * FROM cues WHERE Email_id = '$email_id';");
												$r = mysqli_fetch_row($query_logid);
												$sender    = $r[1];
												$personal  = $r[2];
												$subject   = $r[3];
												$threat    = $r[4];
												$offer     = $r[5];
												$link      = $r[6];
											} elseif ($p == 0 && $phishing == 0) {
												//$score=1;
												$msg = "This is a <b>Ham</b> email and you detected it <b>correctly</b>";
												//$current_score=$current_score+1;
												$c = 1;
												$query_logid = mysqli_query($conn, "SELECT * FROM cues WHERE Email_id = '$email_id';");
												$r = mysqli_fetch_row($query_logid);
												$sender    = $r[1];
												$personal  = $r[2];
												$subject   = $r[3];
												$threat    = $r[4];
												$offer     = $r[5];
												$link      = $r[6];
											}

											if ($c == 1) {

												$cum_score = $cum_score + 1;
											}
										}

										$base = 32;
										$sql = "INSERT INTO experimental_data (Mturk_id, base_rate, trial, phase, email_type, email_id, user_action1, user_action2, user_action3, score, cum_score) 
		VALUES ( '$Mturkid', $base, '$ta', $phase, '$email_type', $email_id, $phishing, $confidence , $choice, $score, $cum_score)";
										$result = $conn->query($sql);


										mysqli_close($conn);



										if ($email_id == 242 || $email_id == 243) // for attention check feedback.
										{
											$score = $_POST["score"];
											$check1 = 0;
											$quit = 0;
											if ($check_counter == 1) {
												$check2 = 0;
											}
											$t = $t - 1;
											if ($phishing == 1 && $choice == 6 && $email_id == 242) {
												$msg = "This was an attention check, and You passed. Please keep paying attention, there might be more attention checks!";
												$scoremsg = " There is no score for this email.";
												$check_counter = $check_counter - 1;
												$check_value = 1;
												$pass = $pass + 1;
											} else if ($phishing == 1 && $choice == 5 && $email_id == 243) {
												$msg = "This was an attention check, and You passed. Please keep paying attention, there might be more attention checks!";
												$scoremsg = " There is no score for this email.";
												$check_counter = $check_counter - 1;
												$check_value = 1;
												$pass = $pass + 1;
											} else {
												$msg = "This was an attention check, and You failed. If you fail next attention check you will be removed from the experiment.";
												$scoremsg = " There is no score for this email.";
												$check_counter = $check_counter - 1;
												$check_value = 0;
											}
											if ($pass == 0 && $check_counter == 0) {
												$msg = "This was an attention check and you failed. You failed two attention checks. Thus, you cannot continue this experiment.";

				?>
							<td>
								<font size="4" color="red">
									<center>
										<h4> <?php echo $msg ?><h4>
												<form action="code2.php" method="post">
													<input type="hidden" name="Mturk_id" value="<?php echo $Mturkid; ?>" />
													<input type="hidden" name="check2" value="<?php echo 0; ?>" <br><br>
													<center><button name="submit" class="button" type="submit">Next </button> </center>
												</form>
							</td>
							</tr>
							</table>
						<?php
												$quit = 1;
											}
											if ($quit != 1) {
						?>

							<td>
								<font size="4" color="red">
									<center>
										<h4><?php echo $msg ?><h4>
												<h4><?php echo $scoremsg ?></h4>
									</center>
								</font>
								<form action="phase2.php" method="post">
									<input type="hidden" name="Mturkid" value="<?php echo $Mturkid; ?>" />
									<input type="hidden" name="trial" value="<?php echo $t + 1; ?>" />
									<input type="hidden" name="count" value="<?php echo $count; ?>" />
									<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
									<input type="hidden" name="score" value="<?php echo $score; ?>" />
									<input type="hidden" name="Score1" value="<?php echo $cum_score; ?>" />
									<input type="hidden" name="pre" value="<?php echo $t; ?>" />
									<input type="hidden" name="num" value="<?php echo $num; ?>" />
									<input type="hidden" name="p" value="<?php echo $p; ?>" />
									<input type="hidden" name="check1" value="<?php echo $check1; ?>" />
									<input type="hidden" name="check2" value="<?php echo $check2; ?>" />
									<input type="hidden" name="pass" value="<?php echo $pass; ?>" />
									<input type="hidden" name="check_counter" value="<?php echo $check_counter; ?>" />
									<input type="hidden" name="check_value" value="<?php echo $check_value; ?>" />
									<input type="hidden" name="current_score" value="<?php echo $current_score; ?>" />
									<input type="hidden" name="email_repetation" value="<?php echo htmlentities(serialize($email_repetation)); ?>" />
									<input type="hidden" name="block_score" value="<?php echo $block_score; ?>" />
									<input type="hidden" name="pre_block_score" value="<?php echo $pre_block_score; ?>" />
									<input type="hidden" name="n_p" value="<?php echo $n_p; ?>" />

									<input type="hidden" name="phishing_clusters" value="<?php echo htmlentities(serialize($phishing_clusters)); ?>" />

									<br><br>
									<center><button name="submit" class="button" type="submit">Next Trial</button> </center>
								</form>
							</td>
							</tr>
							</table>
						<?php
											}
										} elseif ($t < 40) {
						?>
						<td>

							<?php
											if ($phishing == 0 && $p == 1) { ?>
								<p>
									<font color="red">
										<center>
											<h3><?php echo $msg ?></h3>
											<img src="sad.PNG" style="width:40px;height:40px;" align="middle">&nbsp;
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 1 && $p == 1) { ?>
								<p>
									<font color="green">
										<center>
											<h3><?php echo $msg ?></h3>
											<img src="happy.PNG" style="width:40px;height:40px;" align="middle">&nbsp;
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 1 && $p == 0) { ?>
								<p>
									<font color="red">
										<center>
											<h3><?php echo $msg ?></h3>
											<img src="sad.PNG" style="width:40px;height:40px;" align="middle">&nbsp;
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 0 && $p == 0) { ?>
								<p>
									<font color="green">
										<center>
											<h3><?php echo $msg ?></h3>
											<img src="happy.PNG" style="width:40px;height:40px;" align="middle">&nbsp;
										</center>
									</font>
								</p>
							<?php } ?>
							
							<!-- <font color="black" align="center"><b>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Your Phase 2 score is: <?php echo $current_score ?></b><br> -->

							<!-- <font color="black" align="left">
								<h4> &nbsp;&nbsp; Mouseover the following attributes to see the details <h4>
							</font>
							<table class="table2">
								<tr>
									<td width="50%" align="center">Suspicious</td>
									<td align="center">Non-suspicious</td>
								</tr>
								<tr>
									<td><br>
										<?php

											if ($sender == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Sender Address</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The sender address or name is spoofed to make it seem legitimate. Please look carefully for suspicious misspellings.</span>
											</div>
										<?php
											}

											if ($personal == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Personal information</u> &nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message contains a request for personal and sensitive information. </span>
											</div>
										<?php
											}

											if ($subject == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Subject Line</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The subject line is trying to exploit urgency, pressure, or spark curiosity to read further. </span>
											</div>
										<?php
											}

											if ($threat == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Urgency/Threat</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message uses urgency, fear, or threat as a tactic to get an immediate response.</span>
											</div>
										<?php
											}

											if ($offer == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Offer/Rewards</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message uses prize, reward, or help as a tactic to get an immediate response.</span>
											</div>
										<?php
											}

											if ($link == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Link (URL)</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul>
												</font>
												<span style="text-align:justify;" style="text-align:justify;" class="tooltiptext">The link in the message is suspicious. The address in the link does not match the address of the organization /person it claims to be from. Mouseover the link in the email to view the actual address. Look out for misspelled address. </span>
											</div>
										<?php
											}
										?>
									</td>
									<td id="td1" width="50%"> <br> <?php

																	if ($sender == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Sender Address</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The sender address looks trustworthy. </span>
											</div>
										<?php
																	}

																	if ($personal == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Personal information</u> &nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">There is no harmful request. For e.g., money, personal or confidential information.</span>
											</div>
										<?php
																	}

																	if ($subject == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Subject Line</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The subject line represents regular email communication.</span>
											</div>
										<?php
																	}

																	if ($threat == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Urgency/Threat</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message is benign. It does not employ any scare tactics. </span>
											</div>
										<?php
																	}

																	if ($offer == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Offer/Rewards</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message is benign. It does not employ greed as a tactic.</span>
											</div>
										<?php
																	}

																	if ($link == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Link (URL)</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
												<span style="text-align:justify;" class="tooltiptext">The link in this email is trustworthy. It matches the address of the organization /person it claims to be from. </span>
											</div>
										<?php
																	}


										?>
									</td>
								</tr>
							</table> -->













							<form action="phase2.php" method="post">
								<input type="hidden" name="Mturkid" value="<?php echo $Mturkid; ?>" />
								<input type="hidden" name="trial" value="<?php echo $t + 1; ?>" />
								<input type="hidden" name="count" value="<?php echo $count; ?>" />
								<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
								<input type="hidden" name="score" value="<?php echo $score; ?>" />
								<input type="hidden" name="Score1" value="<?php echo $Tscore; ?>" />
								<input type="hidden" name="pre" value="<?php echo $t; ?>" />
								<input type="hidden" name="num" value="<?php echo $num; ?>" />
								<input type="hidden" name="p" value="<?php echo $p; ?>" />
								<input type="hidden" name="check1" value="<?php echo $check1; ?>" />
								<input type="hidden" name="check2" value="<?php echo $check2; ?>" />
								<input type="hidden" name="pass" value="<?php echo $pass; ?>" />
								<input type="hidden" name="check_counter" value="<?php echo $check_counter; ?>" />
								<input type="hidden" name="check_value" value="<?php echo $check_value; ?>" />
								<input type="hidden" name="current_score" value="<?php echo $current_score; ?>" />
								<input type="hidden" name="email_repetation" value="<?php echo htmlentities(serialize($email_repetation)); ?>" />

								<input type="hidden" name="block_score" value="<?php echo $block_score; ?>" />
								<input type="hidden" name="pre_block_score" value="<?php echo $pre_block_score; ?>" />
								<input type="hidden" name="n_p" value="<?php echo $n_p; ?>" />
								<input type="hidden" name="phishing_clusters" value="<?php echo htmlentities(serialize($phishing_clusters)); ?>" />

								<br><br>
								<center><button name="submit" class="button" type="submit">Next Trial</button> </center>
							</form>
						</td>
						</tr>
						</table>
					<?php
										} else {
					?>

						<td>

							<?php
											if ($phishing == 0 && $p == 1) { ?>
								<p>
									<font color="red">
										<center>
											<h3><?php echo $msg ?></h3>
											<!-- <img src="sad.PNG" style="width:40px;height:40px;" align="middle">&nbsp; -->
											
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 1 && $p == 1) { ?>
								<p>
									<font color="green">
										<center>
											<h3 color="green"><?php echo $msg ?></h3>
											<!-- <img src="happy.PNG" style="width:40px;height:40px;" align="middle">&nbsp; -->
											
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 1 && $p == 0) { ?>
								<p>
									<font color="red">
										<center>
											<h3><?php echo $msg ?></h3>
											<!-- <img src="sad.PNG" style="width:40px;height:40px;" align="middle">&nbsp; -->
											
										</center>
									</font>
								</p>
							<?php }
											if ($phishing == 0 && $p == 0) { ?>
								<p>
									<font color="green">
										<center>
											<h3 color="green"><?php echo $msg ?></h3>
											<!-- <img src="happy.PNG" style="width:40px;height:40px;" align="middle">&nbsp; -->
											
										</center>
									</font>
								</p>
							<?php } ?>
							
							<!-- <font color="black" align="center"><b>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; Your Phase 2 score is: <?php echo $current_score ?></b><br> -->
							</font>
							<!-- <font color="black" align="left">
								<h4> &nbsp;&nbsp; Mouseover the following attributes to see the details <h4>
							</font>
							<table class="table2">
								<tr>
									<td width="50%">
										<?php

											if ($sender == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Sender Address</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The sender address or name is spoofed to make it seem legitimate. Please look carefully for suspicious misspellings.</span>
											</div>
										<?php
											}

											if ($personal == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Personal information</u> &nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message contains a request for personal and sensitive information. </span>
											</div>
										<?php
											}

											if ($subject == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Subject Line</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The subject line is trying to exploit urgency, pressure, or spark curiosity to read further. </span>
											</div>
										<?php
											}

											if ($threat == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Urgency/Threat</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message uses urgency, fear, or threat as a tactic to get an immediate response.</span>
											</div>
										<?php
											}

											if ($offer == 1) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Offer/Rewards</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message uses prize, reward, or help as a tactic to get an immediate response.</span>
											</div>
										<?php
											}

											if ($link == 1) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Link (URL)</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="wrong.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</ul>
												</font>
												<span style="text-align:justify;" style="text-align:justify;" class="tooltiptext">The link in the message is suspicious. The address in the link does not match the address of the organization /person it claims to be from. Mouseover the link in the email to view the actual address. Look out for misspelled address. </span>
											</div>
										<?php
											}
										?>
									</td>
									<td id="td1" width="50%"> <br> <?php

																	if ($sender == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Sender Address</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The sender address looks trustworthy. </span>
											</div>
										<?php
																	}

																	if ($personal == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Personal information</u> &nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">There is no harmful request. For e.g., money, personal or confidential information.</span>
											</div>
										<?php
																	}

																	if ($subject == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Subject Line</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The subject line represents regular email communication.</span>
											</div>
										<?php
																	}

																	if ($threat == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Urgency/Threat</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message is benign. It does not employ any scare tactics. </span>
											</div>
										<?php
																	}

																	if ($offer == 0) { ?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Offer/Rewards</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
												<span style="text-align:justify;" class="tooltiptext">The message is benign. It does not employ greed as a tactic.</span>
											</div>
										<?php
																	}

																	if ($link == 0) {
										?>
											<div class="tooltip1">
												<font size="3" color="blue"><u>Link (URL)</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.PNG" width="25" height="25" align="top">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
												<span style="text-align:justify;" class="tooltiptext">The link in this email is trustworthy. It matches the address of the organization /person it claims to be from. </span>
											</div>
										<?php
																	}


										?>
									</td>
								</tr>
							</table> -->






							<form action="phase2_end.php" method="post">
								<input type="hidden" name="Mturk_id" value="<?php echo $Mturkid; ?>" />
								<input type="hidden" name="trial" value="<?php echo 1; ?>" />
								<input type="hidden" name="Score" value="<?php echo $Tscore; ?>" />
								<input type="hidden" name="current_score" value="<?php echo $current_score; ?>" />
								<input type="hidden" name="email_repetation" value="<?php echo htmlentities(serialize($email_repetation)); ?>" />

								<br><br>
								<center><button name="submit" class="button" type="submit">Next</button> </center>
							</form>
						</td>
						</tr>
						</table>
						<br>
			<?php
										}
									}
								}
			?>
			<div align="left">
				<?php
				include_once('footer.php'); ?>
			</div>
		<?php
	}
		?>

</html>