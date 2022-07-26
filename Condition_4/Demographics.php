
<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php
if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{		
		$Mturk_id=$_POST["Mturk_id"];
?>

<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

<html>

<script type="text/javascript">

function validateForm()	{
		                                     
	var sexFilled = false;
	var sex_array = document.getElementsByName('sex');
	for (var i=0; i < sex_array.length; i++)	{
		if (sex_array[i].checked)
			sexFilled = true;
	}
	if (!sexFilled)	{
		alert('Please select an option for Q1.');
		return false;
	}

	var ageFilled = false;
	var age_array = document.getElementsByName('age');
	for (var i=0; i < age_array.length; i++)	{
		if (age_array[i].value != "")
			ageFilled = true;
	}
	if (!ageFilled)	{
		alert('Please select your age in Q2.');
		return false;
	}
	
	var eduFilled = false;
	var edu_array = document.getElementsByName('edu');
	for (var i=0; i < edu_array.length; i++)	{
		if (edu_array[i].checked)
			eduFilled = true;
	}
	if (!eduFilled)	{
		alert('Please fill your education level in Q3.');
		return false;
	}

	
	
};

</script>



<head>
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


</head>

<body onload="assignHandler()">

<table border="1" cellpadding="10" cellspacing="0" style="width: 800px;" align="center">
<tr>
<td>
	<div id="main-content">
		<center><font size="5"><b>Demographic</b></font><br></center>
	</div>
		
		<div class="terms" readonly="read-only">
				
			
			<form  name="demographics" id="demographics" method="post"  action="survey.php" onsubmit="return validateForm()">
			<br><br>
			
				<b><label style="color:#444499;">Q1. Please specify your sex:</label></b><br>
				<input type="radio" name="sex" value="male">Male
				<br>
				<input type="radio" name="sex" value="female">Female
				<br>
				<input type="radio" name="sex" value="no-specify">Do not wish to specify
				<br><br><br>
				<b><label style="color:#444499;">Q2. What is your age:</label></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="number" name="age" min="18" max="65"/>
				<br><br><br>
				<b><label style="color:#444499;">Q3. What is the highest level of education that you have completed?</label></b><br>
				<input type="radio" name="edu" value="Some high school">Some high school
				<br>
				<input type="radio" name="edu" value="High school">High school
				<br>
				<input type="radio" name="edu" value="Some college">Some college
				<br>
				<input type="radio" name="edu" value="Bachelor degree">Bachelor's degree
				<br>
				<input type="radio" name="edu" value="Master degree">Master's degree
				<br>
				<input type="radio" name="edu" value="Professional or doctoral degree">Professional or doctoral degree
				<br><br><br>
				
			
			<input type="hidden" name="exp_condition" value="<?php  echo "base_21" ?>" />
			<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
				<br><br><br>
				<center><button name="submit"  class="button" type="submit" >Submit</button> </center>

			</form>
	

		</div>
</td>
</tr>
</table>

</body>

<br><br><br><br><br><br>
<?php
					
	include_once('footer.php'); 
	}
	?>
	
	
	
</html>
