<script type="text/javascript">
	///////// this code is for back button disable//////////////
	history.pushState(null, null, location.href);
	window.onpopstate = function() {
		history.go(1);
	};
</script>
<?php
if (!isset($_POST["Mturk_id"])) {

	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if ($pageWasRefreshed == 1) {
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
	}
} else {


?>
	<html>


	<script type="text/javascript">
		function validateForm() {
			var check_array = document.getElementsByName('check');
			if (!check_array[0].checked || !check_array[1].checked || !check_array[2].checked) {
				alert('You must confirm that all items are true if you want to continue with the study, otherwise please return the HIT.');
				return false;
			}
			

		}
	</script>






	<head>
		<title>Terms and Conditions and Survey</title>

		<style type="text/css">
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

			div.terms {
				width: 900px;
				height: 400px;
				border: 1px solid #ccc;
				background: #f2f2f2;
				padding: 6px;
				overflow: auto;
			}
		</style>

		<style type="text/css">
			#main-content {
				width: 95%;
				/* float: left;
				position: relative; */
				margin: 20px;
				padding: 20px;
				font-size: 18px;
				border-radius: 10px;
			}

			#form-content {
				width: 90%;
				/* float: left;
	position: relative; */
				margin: 20px;
				padding: 20px;
				font-weight: bold;
				font-size: 18px;
				border-radius: 10px;
			}
		</style>
	</head>

	<body>
		<?php
		$Mturk_id = $_POST["Mturk_id"];


		$db = mysqli_connect('localhost', 'root', '', 'phish_training');
		//$data = $_POST["postname"];

		$sql = "SELECT * FROM demographics WHERE Mturk_id='$Mturk_id'";
		$results = mysqli_query($db, $sql);
		if (mysqli_num_rows($results) > 0) {
		?>
			<br><br><br><br><br><br><br><br>
			<table border="1" cellpadding="10" cellspacing="0" style="width: 550px;" align="center">
				<tr>
					<td>
						<br><br><br>
						<center>
							<h3>It's look like you have already participated in the experiment !</h3>
						</center><br><br></center>

					</td>
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<?php
		} else {
		?>

			<table border="1" cellpadding="0" cellspacing="0" style="width: 900px;" align="center">
				<tr>
					<td>
						<div id="main-content">
								<center><b>Before continuing, please verify that the following items are true. If any are not, please return the HIT now.</b><br></center>
								<div id="form-content">
									<form id="consent" method="post" action="consent.php" onsubmit="return validateForm()">
										<input type="checkbox" name="1" hidden="hidden">
										<label style="color:#444499;">1. I have not attempted to participate more than one time in this study and I am aware that participating more than one time will result in a rejection.</label><br>
										<input type="checkbox" id="check1" name="check" value="check1">
										<label for="check1"> True</label> <br><br>
										<input type="checkbox" name="2" hidden="hidden">
										<label style="color:#444499;">2. I am not using a private/incognito window when participating and I am aware that doing so will result in rejection.</label><br>
										<input type="checkbox" id="check2" name="check" value="check2">
										<label for="check2"> True</label><br><br>
										<input type="checkbox" name="3" hidden="hidden">
										<label style="color:#444499;">3. I will complete the study promptly without any excessive delays and I am aware that failing to do so may result my payment being invalidated.</label><br>
										<input type="checkbox" id="check3" name="check" value="check3">
										<label for="check3"> True</label><br><br>
										<!-- <br>
				<br> -->
										<input type="hidden" name="Mturk_id" value="<?php echo $Mturk_id; ?>" />
										<center> <button name="submit" class="button" type="submit">Next</button> </center>
									</form>

								</div>

						</div>


					</td>
				</tr>
			</table>
	<?php

			//include_once('footer.php');
		}
	}
	?>

	</html>
	</body>

	</html>