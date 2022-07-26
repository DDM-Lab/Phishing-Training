<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
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

<script type="text/javascript">

function validateForm()	{
	var goal_array = document.getElementsByName('goal');
	var points_array = document.getElementsByName('points');
	var diff_array = document.getElementsByName('diff');
	var atten_array= document.getElementsByName('atten');
	var goal_filled = false;
	var points_filled = false;
	var diff_filled = false;
	var atten_filled = false;
	var terms = false;
	if (goal_array[0].checked || goal_array[1].checked || goal_array[2].checked){ goal_filled= true } 
	if (points_array[0].checked || points_array[1].checked || points_array[2].checked){ points_filled= true	}
	if (diff_array[0].checked || diff_array[1].checked || diff_array[2].checked){ diff_filled= true	}
	if (atten_array[0].checked || atten_array[1].checked || atten_array[2].checked){ atten_filled= true	}
	if (!(goal_filled && points_filled && diff_filled && atten_filled)) { 
		alert('Please answer all the questions.');
		return false;
	}
	
		
}
</script>

<script>
function displayQuestion1()	{
	var val = "";
	var val_array = document.getElementsByName('diff');
	for (var i=0; i < val_array.length; i++)	{
		if (val_array[i].checked)
			val = val_array[i].value;
	}
	if(val_array[0].checked || val_array[2].checked)
		{
		document.getElementById('q1_answer').style.color = "red";
		document.getElementById('q1_answer').style.display = "block";
		}
		else
		{
			document.getElementById('q1_answer').style.display = "block";
		}
	
	if(val_array[0].checked)
	{document.getElementById("diff2").disabled=true;
	document.getElementById("diff3").disabled=true;}
	
	if(val_array[1].checked)
	{document.getElementById("diff1").disabled=true;
	document.getElementById("diff3").disabled=true;}
	
	if(val_array[2].checked)
	{document.getElementById("diff1").disabled=true;
	document.getElementById("diff2").disabled=true;}
	
	showCloseButton();
}
				
</script>

<script>

function displayQuestion2()	{
	var val = "";
	
	var val_array = document.getElementsByName('points');
	
	for (var i=0; i < val_array.length; i++)	{
		if (val_array[i].checked)
			val = val_array[i].value;
	}
	if(val_array[1].checked || val_array[2].checked)
		{
		document.getElementById('q2_answer').style.color = "red";
		document.getElementById('q2_answer').style.display = "block";
		}
		else
		{
			document.getElementById('q2_answer').style.display = "block";
		}
	
	if(val_array[0].checked)
	{document.getElementById("points2").disabled=true;
	document.getElementById("points3").disabled=true;}
	
	if(val_array[1].checked)
	{document.getElementById("points1").disabled=true;
	document.getElementById("points3").disabled=true;}
	
	if(val_array[2].checked)
	{document.getElementById("points1").disabled=true;
	document.getElementById("points2").disabled=true;}
	 
	showCloseButton();
}
				
</script>

<script>
function displayQuestion3()	{
	var val = "";
	var val_array = document.getElementsByName('goal');
	for (var i=0; i < val_array.length; i++)	{
		if (val_array[i].checked)
			val = val_array[i].value;
	}
	if(val_array[1].checked || val_array[2].checked)
		{
		document.getElementById('q3_answer').style.color = "red";
		document.getElementById('q3_answer').style.display = "block";
		}
		else
		{
			document.getElementById('q3_answer').style.display = "block";
		}
		if(val_array[0].checked)
	{document.getElementById("goal2").disabled=true;
	document.getElementById("goal3").disabled=true;}
	
	if(val_array[1].checked)
	{document.getElementById("goal1").disabled=true;
	document.getElementById("goal3").disabled=true;}
	
	if(val_array[2].checked)
	{document.getElementById("goal1").disabled=true;
	document.getElementById("goal2").disabled=true;}
	showCloseButton();
}
				
</script>
<script>
function displayQuestion4()	{
	var val = "";
	var val_array = document.getElementsByName('atten');
	for (var i=0; i < val_array.length; i++)	{
		if (val_array[i].checked)
			val = val_array[i].value;
		}
	if(val_array[0].checked || val_array[1].checked)
		{
		document.getElementById('q4_answer').style.color = "red";
		document.getElementById('q4_answer').style.display = "block";
		}
		else
		{
			document.getElementById('q4_answer').style.display = "block";
		}
		if(val_array[0].checked)
	{document.getElementById("atten2").disabled=true;
	document.getElementById("atten3").disabled=true;}
	
	if(val_array[1].checked)
	{document.getElementById("atten1").disabled=true;
	document.getElementById("atten3").disabled=true;}
	
	if(val_array[2].checked)
	{document.getElementById("atten1").disabled=true;
	document.getElementById("atten2").disabled=true;}
	showCloseButton();
}
				
</script>

<html>
<body>

<?php
if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{


$Mturk_id=$_POST["Mturk_id"];
?>

<form action="example_inst.php" method="post" onsubmit="return validateForm()">
	
	<table border="1" cellpadding="10" cellspacing="0" style="width: 810px;" align="center">
		<tr>
		<td>
		<div align="center">
		<h2>Questionnaire about instructions</h2>
	</div>
			<div align="justify">	
				
				<b><label style="color:#444499;">Q1. What is the difference between Phase 2 and Phase 3?</label></b><br>
				<input type="radio" id="diff1" name="diff" value="1" onclick="displayQuestion1()">Feedback will be given only in Phase 3
				<br>
				<input type="radio" id="diff2" name="diff" value="2" onclick="displayQuestion1()">Feedback will be given only in Phase 2
				<br>
				<input type="radio" id="diff3" name="diff" value="3" onclick="displayQuestion1()">No feedback will be provided in Phase 2 and Phase 3
				<div id="q1_answer" style="color:green;display:none">The correct answer is option 2: Feedback will be given only in Phase 2.</div>
				<br> <br>
				

				<b><label style="color:#444499;">Q2. How many points will you earn for correctly classifying an email?</label></b><br>
				<input type="radio" id= "points1" name="points" value="1" onclick="displayQuestion2()">One
				<br>
				<input type="radio"  id= "points2" name="points" value="2" onclick="displayQuestion2()">Two
				<br>
				<input type="radio"  id= "points3" name="points" value="3" onclick="displayQuestion2()">Three
				<div id="q2_answer" style="color:green;display:none">The correct answer is option 1: One</div>
				
				<br><br>			

			
				<b><label style="color:#444499;">Q3. What is your goal in the task? </label></b><br>
				<input type="radio" id="goal1" name="goal" value="1" onclick="displayQuestion3()">To correctly classify phishing and ham emails
				<br>
				<input type="radio" id="goal2" name="goal" value="2" onclick="displayQuestion3()">To be confident in your answer
				<br>
				<input type="radio" id="goal3" name="goal" value="3" onclick="displayQuestion3()">To take correct action for phishing emails
				<div id="q3_answer" style="color:green;display:none">The correct answer is option 1: To correctly classify phishing emails.</div>


				<br><br>
				<b><label style="color:#444499;">Q4. There will be several attention checks in the experiment. If you fail in two attentions checks what will happen ? </label></b><br>
				<input type="radio" id="atten1" name="atten" value="1" onclick="displayQuestion4()">You will continue the experiment
				<br>
				<input type="radio" id="atten2" name="atten" value="2" onclick="displayQuestion4()">You will not be able to proceed with the experiment but will receive base payment and performance incentive
				<br>
				<input type="radio" id="atten3" name="atten" value="3" onclick="displayQuestion4()">You will not be able to proceed with the experiment and will receive only base payment
				<div id="q4_answer" style="color:green;display:none">The correct answer is option 3: You will not be able to proceed with the experiment and will receive only base payment.</div>
				
				<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
				
				
				<br><br>
			</div>
			<div align="center">
				<center><button name="submit"  class="button" type="submit" >Submit</button> </center>
			</div>
	

		</td>
		</tr>
		</table>
</form>
<br><br><br><br>
<?php
					
	 include_once('footer.php'); 
}
?>

</body>
</html>
