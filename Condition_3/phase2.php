<?php include_once('header.php'); ?>
<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
<html>
<head>
<script type="text/javascript">
	var slider_flag=0;
	function validateForm()	{
	var choice_array = document.getElementsByName('choice');
	var phishing_array = document.getElementsByName('phishing');
	
	var choice_filled = false;
	var phishing_filled = false;
	
	var terms = false;
	if (choice_array[0].checked || choice_array[1].checked || choice_array[2].checked ||choice_array[3].checked || choice_array[4].checked || choice_array[5].checked){ choice_filled= true } 
	if (phishing_array[0].checked || phishing_array[1].checked ){ phishing_filled= true	}
	if (!(choice_filled && phishing_filled )) { 
		alert('Please select answers for given questions.');
		return false;
	}
	
	if(slider_flag!=1){
				alert('Please select confidence level in Q2.');
				return false;
			}
	
		
}
</script>
<script>
function my_slider_Function() {
  slider_flag=1;
}
</script>

<style>
div.ex1 {
  background-color: #FFFFFF;
  width: 95%;
  height: 450px;
  padding: 15px;
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
.button{
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
table, tr, td {
  border: 2px solid black;
  padding: 4px;
}

table {
  
  width: 95%;
  height: 450px;
  
}

th {
  text-align: left;
}
</style>

</head>
		<header id="banner" class="body">
        &nbsp;
		</header>

<?php
if(!isset($_POST["Mturkid"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{
		
		
		/////////////////////////////////////////////////////////////// Common Code during the questions and feedback///////////////////////////////////////////
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
 //$maxtrial;
 $t =$_POST["trial"];
 $pre =$_POST["pre"];
 $p =$_POST["p"];
 $num =$_POST["num"];
 $Mturkid=$_POST["Mturkid"];
 $Tscore=$_POST['Score1'];
 $email_repetation=unserialize($_POST["email_repetation"]);

 
	if($t==1 && $t!=$pre)
	{
		$score=0;	
		$array = array(
						mt_rand(1,4),
						mt_rand(5,8),
						mt_rand(9,12),
						mt_rand(13,16),
						mt_rand(17,20),
						mt_rand(21,24),
						mt_rand(25,28),
						mt_rand(29,32),
						mt_rand(33,36),
						mt_rand(37,40), 0,
					);
		//$hamemail=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$count=0;
		 // percentage to calculate position of checks.
		$check1=mt_rand(5,10);
		$check2=mt_rand(15,25);
		$pass=0;
		$check_counter=2;
		$current_score=0;
		// for ($x = 0; $x < 10; $x++) {
		// 	if($array[$x]==$check1)
		// 	{
		// 		$check1=$check1+1;
		// 	}
		// 	if($array[$x]==$check2)
		// 	{
		// 		$check2=$check2+1;
		// 	}
		// } 
		
	}
	else
	{
		
		//$hamemail=$_POST["hamemail"];
		$score=$_POST["score"];	
		$array =unserialize($_POST['array']);
		//print_r($array);
		$count =$_POST["count"];
		$check1 =$_POST["check1"];
		$check2 =$_POST["check2"];
		$pass=$_POST["pass"];	
		$check_counter =$_POST["check_counter"];
		$check_value =$_POST["check_value"];
		$current_score =$_POST["current_score"];
		
		
	}
	//echo $check1, $check2, $pass;
//////////////////////////////////////////inserting check values in database///		
	if($check_counter==1) 
	{
		$sql = "UPDATE demographics SET check1=$check_value WHERE Mturk_id='$Mturkid'";
		$result = $conn->query($sql);
	}
	if($check_counter==0) 
	{
		$sql = "UPDATE demographics SET check2=$check_value WHERE Mturk_id='$Mturkid'";
		$result = $conn->query($sql);
		$check_counter=$check_counter-1;
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////		
	if(($t==$pre && $p==1 && $num!=242)&& ($t==$pre && $p==1 && $num!=243))
		{
			$count=$count-1;
			
		}	
	if ($check1 == $t) {
		$num = 242;
		// $sql = "SELECT * from emails where email_id='$num'";
		$p = 1;
	} else if ($check2 == $t) {
		$num = 243;
		$p = 1;
	}	
	else if(($t==$array[$count]&&($count<10)))
	{
		if($t!=$pre)
		{
			$num=mt_rand(1,176);
			// code to avoid repetation of same emails
				for($i=0;$i<($t+15);$i++)
				{
					if($email_repetation[$i]==$num)
					{
						$num=mt_rand(1,176);
						$i=0;
					}
			
		}		$email_repetation[$t+14]=$num;
	}
		
		// $sql = "SELECT * from emails where email_id='$num'";	
		$p=1;
		$count++;
	}
	else
	{
		if($t!=$pre)
		{
			$num=mt_rand(189,239);
			 // code to avoid repetation of same emails
			for($i=0;$i<($t+15);$i++)
			{
				if($email_repetation[$i]==$num)
				{
					$num=$num+1;
					if($num>239)
					{
						$num=mt_rand(189,239);
					}
					$i=0;
				}
			}
			$email_repetation[$t+14]=$num;
		}
		//echo $num;
		// if($check1==$t)
		// {
		// 	$num=242;
		// }
		// else if($check2==$t)
		// {
		// 	$num=243;
		// }
		// $sql = "SELECT * from emails where email_id='$num'";
		$p=0;
		// if($num==242 || $num==243){$p=1;}
	}
	$sql = "SELECT * from emails where email_id='$num'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$row=mysqli_fetch_assoc($result);
	}
	else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	 
	mysqli_close($conn);
	
	?>

						
						
							<label align="left" ><h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Phase 2 </b></h2> </label>
							<label align="left" ><h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							<b>Trial: <?php echo $t?> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
							
							
					<b>Total Score : <?php 
					
							if($t==1 && $t!= $pre)
							{
								echo $Tscore;
							}
							elseif(($t == $pre && $num!=242)&&($t == $pre && $num!=243))
							{
								$phishing=$_POST['phishing']; //fetching data
										
								if(($p==1 && $phishing==1)||($p==0 && $phishing==0))
									{
										$Tscore=$Tscore+1;
									}
								else
								{
									$Tscore=$Tscore;
								}
									
								echo $Tscore;
							}
							else
							{
								echo $Tscore;
							}
									
									?></b></h3> </label>
							
							<table Align ="center">
				 
							<tr>
                            <td align="center" width="68%">
							
							<div align="justify" class="ex1">
							<?php
								printf ("<b>From:</b> %s",$row["source"]);
								echo "<br> <br>";
								printf ("<b>Subject:</b> %s",$row["subject"]);
								echo "<br><br>";
								printf ("%s",$row["body"]);

								?>
			<?php
				if ($t != $pre)
					{
			?>
							</div>
							
							</td>
			
	
						<td>
			
						<form  id="actions" method="post"  action="phase2.php" onsubmit="return validateForm()">
						<div align="left"> 
				
						<h3> Answer to the following Questions:</h3> 
				<label style="color:#444499;">Q1. Is this a phishing email ?</label><br>
				<input type="radio" name="phishing" value="1">Yes
				<br>
				<input type="radio" name="phishing" value="0">No
				
				<br><br>
				<label style="color:#444499;">Q2. How confident are you on your answer in question 1?</label><br>
				<div  align ="center" class="slidecontainer">
				<input type="range" min="50" max="100" value="50" class="slider" id="myRange" name="myRange" onchange="my_slider_Function()"><br>
				<font size="2"><label > &nbsp;&nbsp;50 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100</label><br>
				<label > Not Confident at all &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fully Confident</label> </font>
				
				<b><p>Confidence Level: <span id="demo"></span></p></b>
				</div>
				
				<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value;

				slider.oninput = function() {
					output.innerHTML = this.value;
				}
				</script>
			
				
				<label align= "justify" style="color:#444499;">Q3. If you recieve this email, what will be your reaction?</label><br>
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
						<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
						<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
						<input type="hidden" name="count" value="<?php  echo $count; ?>" />
						<input type="hidden" name="trial" value="<?php  echo $t; ?>" />
						<input type="hidden" name="score" value="<?php  echo $score; ?>" />
						<input type="hidden" name="Score1" value="<?php  echo $Tscore; ?>" />
						<input type="hidden" name="p" value="<?php  echo $p; ?>" />
						<input type="hidden" name="pre" value="<?php  echo $t; ?>" />
						<input type="hidden" name="num" value="<?php  echo $num; ?>" />
						<input type="hidden" name="check1" value="<?php  echo $check1; ?>" />
						<input type="hidden" name="check2" value="<?php  echo $check2; ?>" />
						<input type="hidden" name="pass" value="<?php  echo $pass; ?>" />
						<input type="hidden" name="check_counter" value="<?php  echo $check_counter; ?>" />
						<input type="hidden" name="check_value" value="<?php  echo $check_value; ?>" />
						<input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
						<input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />
				 
						<center><button name="submit2"  class="button" type="submit"  >Submit</button> </center>
				
				</form>
				</td>
				</tr></table>
	
				
				
		
				
		<?php
		}
		else{
			 if(isset($_REQUEST['submit2']))
		{
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

		$t=$_POST["trial"];
		$ta=$t;
		$Mturkid=$_POST["Mturkid"];
		$p =$_POST['p'];
		$array=unserialize($_POST['array']);
		$count=$_POST["count"];
		$phishing=$_POST['phishing'];
		$choice =$_POST['choice'];
		$confidence=$_POST['myRange'];
		$email_id=$_POST['num'];
		$email_repetation=unserialize($_POST["email_repetation"]);
		$phase=2;
		if(($p==1) && ($email_id!=242 && $email_id!=243)){$email_type="phishing";}
		elseif($p==0) {$email_type="ham";}
		else 
		{
			$email_type="check";
			$ta="ch".$ta;
			}
	

		// Phase 2 score Intialization
					$c=0;
			$cum_score=$_POST['Score1'];
		
		if($email_id!=242 && $email_id!=243)
		{
			
			if($p==1 && $phishing==1)
			{
				$score=1;
				$msg="This was a phishing email, and you detected it correctly.";
				$current_score=$current_score+1;
				$c=1;
			}
			elseif($p==1 && $phishing==0)
			{
				$score=0;
				$msg="This was a phishing email, and you detected incorrectly.";
				$current_score=$current_score;
				$c=0;
			}
			elseif($p==0 && $phishing==1)
			{
				$score=0;
				$msg="This was a ham email, and you detected incorrectly.";
				$current_score=$current_score;
				$c=0;
			}
			elseif($p==0 && $phishing==0)
			{
				$score=1;
				$msg="This was a ham email, and you detected correctly.";
				$current_score=$current_score+1;
				$c=1;
			}
		
			if($c==1)
			{
				
				$cum_score=$cum_score+1;
			}
		}
		
		$base=20;
		$sql = "INSERT INTO experimental_data (Mturk_id, base_rate, trial, phase, email_type, email_id, user_action1, user_action2, user_action3, score, cum_score) 
		VALUES ( '$Mturkid', $base, '$ta', $phase, '$email_type', $email_id, $phishing, $confidence , $choice, $score, $cum_score)";
		$result = $conn->query($sql);
		
		
		mysqli_close($conn);		
	 
	 
		
if($email_id==242 || $email_id==243) // for attention check feedback.
	{
		$score=$_POST["score"];
		$check1=0;
		$quit=0;
		if($check_counter==1){$check2=0;}
		$t=$t-1;
		if($phishing==1 && $choice==6 && $email_id==242)
			{
				$msg="This was an attention check, and You passed. Please keep paying attention, there might be more attention checks!";
				$scoremsg=" There is no score for this email.";
				$check_counter=$check_counter-1;
				$check_value=1;
				$pass=$pass+1;
			}
		else if($phishing==1 && $choice==5 && $email_id==243)
			{
				$msg="This was an attention check, and You passed. Please keep paying attention, there might be more attention checks!";
				$scoremsg=" There is no score for this email.";
				$check_counter=$check_counter-1;
				$check_value=1;
				$pass=$pass+1;
			}
		else
			{
				$msg="This was an attention check, and You failed. If you fail next attention check you will be removed from the experiment.";
				$scoremsg=" There is no score for this email.";
				$check_counter=$check_counter-1;
				$check_value=0;
			}
		if($pass==0 && $check_counter==0 )
			{
				$msg="This was an attention check and you failed. You failed two attention checks. Thus, you cannot continue this experiment.";
			
				?>
				<td>
			<font size="4" color="red"> <center><h4> Feedback : <?php echo $msg ?><h4>
			<form action="code2.php" method="post" >
			<input type="hidden" name="Mturk_id" value="<?php  echo $Mturkid; ?>" />
			<input type="hidden" name="check2" value="<?php  echo 0; ?>" 
			<br><br>
			<center><button name="submit"  class="button" type="submit" >Next </button> </center>
			</form>
			</td>
			</tr></table>
			<?php
			$quit=1;
			}
		if($quit!=1)
		{
	?>
	
			<td>
			<font size="4" color="red"> <center><h4> Feedback : <?php echo $msg ?><h4>
			<h4><?php echo $scoremsg ?></h4></center> </font>
			<form action="phase2.php" method="post" >
			<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
			<input type="hidden" name="trial" value="<?php  echo $t+1; ?>" />
			<input type="hidden" name="count" value="<?php  echo $count; ?>" />
			<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
			<input type="hidden" name="score" value="<?php  echo $score; ?>" />
			<input type="hidden" name="Score1" value="<?php  echo $cum_score; ?>" />
			<input type="hidden" name="pre" value="<?php  echo $t; ?>" />
			<input type="hidden" name="num" value="<?php  echo $num; ?>" />
			<input type="hidden" name="p" value="<?php  echo $p; ?>" />
			<input type="hidden" name="check1" value="<?php  echo $check1; ?>" />
			<input type="hidden" name="check2" value="<?php  echo $check2; ?>" />
			<input type="hidden" name="pass" value="<?php  echo $pass; ?>" />
			<input type="hidden" name="check_counter" value="<?php  echo $check_counter; ?>" />
			<input type="hidden" name="check_value" value="<?php  echo $check_value; ?>" />
			<input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
			<input type="hidden" name="email_repetation" value="<?php echo htmlentities(serialize($email_repetation)); ?>" />
			<br><br>
			<center><button name="submit"  class="button" type="submit" >Next Trial</button> </center>
			</form>
			</td>
			</tr></table>
<?php
		}
}	

elseif($t<40)
	{
		if ($c==0){

		
	?>
	
	<td>
	<font size="4" color="red"> <center><h4> Feedback : <?php echo $msg ?><h4>
	<font size="4" color="black"> <center><h4>Your Phase 2 score is: <?php echo $current_score ?></h4></center> </font>
	<form action="phase2.php" method="post" >
	<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
	<input type="hidden" name="trial" value="<?php  echo $t+1; ?>" />
	<input type="hidden" name="count" value="<?php  echo $count; ?>" />
	<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
	<input type="hidden" name="score" value="<?php  echo $score; ?>" />
	<input type="hidden" name="Score1" value="<?php  echo $Tscore; ?>" />
	<input type="hidden" name="pre" value="<?php  echo $t; ?>" />
	<input type="hidden" name="num" value="<?php  echo $num; ?>" />
	 <input type="hidden" name="p" value="<?php  echo $p; ?>" />
	 <input type="hidden" name="check1" value="<?php  echo $check1; ?>" />
	 <input type="hidden" name="check2" value="<?php  echo $check2; ?>" />
	 <input type="hidden" name="pass" value="<?php  echo $pass; ?>" />
	 <input type="hidden" name="check_counter" value="<?php  echo $check_counter; ?>" />
			<input type="hidden" name="check_value" value="<?php  echo $check_value; ?>" />
	 <input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
	 <input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />
	<br><br>
	<center><button name="submit"  class="button" type="submit" >Next Trial</button> </center>
	</form>
	</td>
	</tr></table>
<?php
		}else{
				
	?>
	
	<td>
	<font size="4" > <center><h4> Feedback : <?php echo $msg ?><h4>
	<h4>Your Phase 2 score is: <?php echo $current_score ?></h4></center> </font >
	<form action="phase2.php" method="post" >
	<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
	<input type="hidden" name="trial" value="<?php  echo $t+1; ?>" />
	<input type="hidden" name="count" value="<?php  echo $count; ?>" />
	<input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
	<input type="hidden" name="score" value="<?php  echo $score; ?>" />
	<input type="hidden" name="Score1" value="<?php  echo $Tscore; ?>" />
	<input type="hidden" name="pre" value="<?php  echo $t; ?>" />
	<input type="hidden" name="num" value="<?php  echo $num; ?>" />
	 <input type="hidden" name="p" value="<?php  echo $p; ?>" />
	 <input type="hidden" name="check1" value="<?php  echo $check1; ?>" />
	 <input type="hidden" name="check2" value="<?php  echo $check2; ?>" />
	 <input type="hidden" name="pass" value="<?php  echo $pass; ?>" />
	 <input type="hidden" name="check_counter" value="<?php  echo $check_counter; ?>" />
			<input type="hidden" name="check_value" value="<?php  echo $check_value; ?>" />
	 <input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
	 <input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />
	<br><br>
	<center><button name="submit"  class="button" type="submit" >Next Trial</button> </center>
	</form>
	</td>
	</tr></table>
<?php
		}
}	
else
	{
	?>
	
	<td>
	 <font size="4" ><center><h4> Feedback : <?php echo $msg ?><h4></font>
	<h4>Your Phase 2 score is: <?php echo $current_score ?></h4></center>
	<form action="phase2_end.php" method="post" >
	<input type="hidden" name="Mturk_id" value="<?php  echo $Mturkid; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
	<input type="hidden" name="Score" value="<?php  echo $Tscore; ?>" />
	<input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
	<input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />

	<br><br>
	<center><button name="submit"  class="button" type="submit" >Next</button> </center>
	</form>
	</td>
	</tr></table>
	
	
	<?php
	}
	
	}
	}
}
	?>

	
</html>	  
