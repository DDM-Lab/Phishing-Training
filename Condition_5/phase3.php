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
  overflow: scroll;
  padding: 15px;
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
  padding: 5px;
   text-align: left;
  
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
<aside id="featured" class="body">
        <article>
<?php
if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{

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

 $t =$_POST["trial"];
 $Mturkid=$_POST["Mturk_id"];
 $email_repetation=unserialize($_POST["email_repetation"]);
 //print_r($email_repetation);
 
	if ($t==1)
	{
		$first=mt_rand(2,5);
		$second=mt_rand(6,10);
		$array=array();
		$a=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
		$arr=array_rand($a,6);
		for($i=0;$i<6;$i++)
		{
			$array[$i]=$a[$arr[$i]];
		}

		$count=0;
		$score=0;
		$cum_score=$_POST["Score"];
		$current_score=0;
	}
	else if ($t>1)
	{
		 $first =$_POST["first"];
		 $second =$_POST["second"];
		 $count =$_POST["count"];
		 $array =unserialize($_POST["array"]);
		 
	}
	


	if(($t==$array[$count])& ($count<6))
	{
		$num=mt_rand(177,188);
		// code to avoid repetation of same emails
		for($i=0;$i<$t+54;$i++)
		{
			if($email_repetation[$i]==$num)
			{
				$num=mt_rand(177,188);
				$i=0;
			}
			
		}		$email_repetation[$t+54]=$num;
		$sql = "SELECT * from emails where email_id='$num'";	
		$p=1;
		$count++;
	}
	else
	{
		$num=mt_rand(189,239);
		// code to avoid repetation of same emails
		for($i=0;$i<$t+54;$i++)
		{
			if($email_repetation[$i]==$num)
			{
				$num=$num+1;
				if($num==242){$num=mt_rand(189,239);}
				$i=0;
			}
			
		}		$email_repetation[$t+54]=$num;
		$sql = "SELECT * from emails where email_id='$num'";
		$p=0;
	}
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$row=mysqli_fetch_assoc($result);
	}
	else 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	if ($t>1 && $t<=15)
	{
		
		$phase=3;
		
		$Ta=$t;
		$Ta--;
		$email_id=$_POST['email_id'];
		$email_type=$_POST['email_type'];
		$phishing=$_POST['phishing'];
		$pre_p=$_POST['pre_p'];
		$choice =$_POST['choice'];
		$confidence=$_POST['myRange'];
		$cum_score=$_POST['cum_score'];
		$current_score=$_POST['current_score'];
		
		
		if(($pre_p==1 && $phishing==1) || ($pre_p==0 && $phishing==0))
		{
			$cum_score=$cum_score+1;
			$score=1;
			$current_score=$current_score+1;
		}	
		else
		{
			$score=0;
			$current_score=$current_score;
		}	
		
		$base=31;
		$sql = "INSERT INTO experimental_data (Mturk_id, base_rate, trial, phase, email_type, email_id, user_action1, user_action2, user_action3, score, cum_score) 
		VALUES ( '$Mturkid', $base, $Ta, $phase, '$email_type', $email_id, $phishing, $confidence, $choice, $score, $cum_score)";
		$result = $conn->query($sql);
	}
	if($p==1){$email_type="phishing";}
		elseif($p==0) {$email_type="ham";}
 
	mysqli_close($conn);


	if($t<=14)
	{
	

?>
						<div class="m">
						
							<label align="left" ><h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Phase 3 </b></h2> </label>
							<label align="left" ><h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <b>Trial: <?php echo $t?> </b> </h3></label> </div>
			
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
							
							</div>
							
							</td>
			
	
	<td width="32%">
			
			<form  id="actions" method="post"  action="phase3.php" onsubmit="return validateForm()">
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
				<font size="2"><label > &nbsp;&nbsp;50 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100</label><br>
				<label > Not Confident at all &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fully Confident</label> </font>
				
				<h4><b><p>Confidence Level: <span id="demo"></span></p></b> <h4>
				</div>
				
				<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value;
				
				slider.oninput = function() {
					output.innerHTML = this.value;
				}
				</script>
			
				
				<label align= "justify" style="color:#444499;">Q3. What do you recommend that the person receiving this message should do: </label><br>
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
				
			
					
				<br><br>
				 <input type="hidden" name="Mturk_id" value="<?php  echo $Mturkid; ?>" />
				 <input type="hidden" name="first" value="<?php  echo $first; ?>" />
				 <input type="hidden" name="second" value="<?php  echo $second; ?>" />
				 <input type="hidden" name="count" value="<?php  echo $count; ?>" />
				 <input type="hidden" name="trial" value="<?php  echo $t+1; ?>" />
				 <input type="hidden" name="email_id" value="<?php  echo $num; ?>" />
				  <input type="hidden" name="pre_p" value="<?php  echo $p; ?>" />
				  <input type="hidden" name="email_type" value="<?php  echo $email_type; ?>" />
				 <input type="hidden" name="cum_score" value="<?php  echo $cum_score; ?>" />
				 <input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
				 <input type="hidden" name="hamemail" value="<?php  echo $hamemail; ?>" />
				 <input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />
				 <input type="hidden" name="array" value="<?php echo htmlentities(serialize($array)); ?>" />
				 
				<center><button name="submit"  class="button" type="submit"  >Submit</button> </center>
				
			</form>
			</td>
			</tr></table>
			

	<?php  
					
	}
	else{?>
			
			
			<label align="left" ><h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Phase 3 </b></h2> </label>
			<label align="left" ><h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <b>Trial: <?php echo $t?> </b> </h3></label>
			
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
							
							</div>
							
							</td>
			
	
	<td>
				<form  id="actions" method="post"  action="phase3_feedback.php" onsubmit="return validateForm()">
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
			
				
				<label style="color:#444499;">Q3. What do you recommend that the person receiving this message should do:</label><br>
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
				
				
				<br><br>
				 <input type="hidden" name="Mturk_id" value="<?php  echo $Mturkid; ?>" />
				
				 <input type="hidden" name="trial" value="<?php  echo $t; ?>" />
				 <input type="hidden" name="pre_p" value="<?php  echo $p; ?>" />
				 <input type="hidden" name="email_id" value="<?php  echo $num; ?>" />
				 <input type="hidden" name="email_type" value="<?php  echo $email_type; ?>" />
				 <input type="hidden" name="cum_score" value="<?php  echo $cum_score; ?>" />
				 <input type="hidden" name="current_score" value="<?php  echo $current_score; ?>" />
				 <input type="hidden" name="hamemail" value="<?php  echo $hamemail; ?>" />
				 <input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation)); ?>" />
				<center><button name="submit"  class="button" type="submit"  >Submit</button> </center>
				
			</form>
			</td>
			</tr></table>
			
			
			
				
				
			    
        </article>
</aside>
</form>

<?php
					
	} include_once('footer.php');
}
	?>
</html>
