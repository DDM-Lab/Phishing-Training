<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

<html>

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
<script type="text/javascript">

function validateForm()	{
	var training_array = document.getElementsByName('training');
	var defination_array = document.getElementsByName('defination');
	var proportion_array = document.getElementsByName('proportion');
	var tra_filled = false;
	var def_filled = false;
	var pro_filled = false;
	
	if (training_array[0].checked || training_array[1].checked ||training_array[2].checked || training_array[3].checked || training_array[4].checked)
	{ tra_filled= true } 
	if (defination_array[0].checked || defination_array[1].checked || defination_array[2].checked || defination_array[3].checked || defination_array[4].checked || defination_array[5].checked)
	{ def_filled= true	}
	if (proportion_array[0].checked || proportion_array[1].checked || proportion_array[2].checked || proportion_array[3].checked || proportion_array[4].checked)
	{ pro_filled= true	}
	
	if (!(tra_filled && def_filled && pro_filled)) { 
		alert('Please answer all the questions');
		return false;
	}
	
	
		
}

</script>



<body>



<?php
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
 


if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{
	$Mturk_id =$_POST["Mturk_id"];
$Gen =$_POST["sex"];
$Ag =$_POST["age"];
$edu =$_POST["edu"];
$exp_condition=$_POST["exp_condition"];


$sql = "INSERT INTO demographics (Mturk_ID, exp_condition, age, gender, education) VALUES ('$Mturk_id','$exp_condition', '$Ag', '$Gen', '$edu')";

if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>



<table border="1" cellpadding="10" cellspacing="0" style="width: 800px;" align="center">
<tr>
<td>
<form action="task_description.php" method="post" onsubmit="return validateForm()">

<div align="center">
  <h1>Survey</h1><br>
  </div>
<div align="justify">	
	
				<b><label style="color:#444499;">Q1. What is Phishing? (Select the most accurate description)</label></b><br>
				<input type="radio" name="defination" value="1">Pretending to be someone or a company to steal information or money
				<br>
				<input type="radio" name="defination" value="2">Making a fake website that looks legitimate to steal information or money
				<br>
				<input type="radio" name="defination" value="3">Sending spam or advertisement emails
				<br>
				<input type="radio" name="defination" value="4">Tracking internet habits to send advertisements
				<br>
				<input type="radio" name="defination" value="5">Hacking someone’s computer by trying different passwords 
				<br>
				<input type="radio" name="defination" value="6">Do not know 


				<br> <br>
								
   				<b><label style="color:#444499;">Q2. By your estimate, what is the possible number of phishing emails you may have received in the last four months? </label></b><br>
				<input type="radio" name="proportion" value="1">None
				<br>
				<input type="radio" name="proportion" value="2">1 to 2 Phishing emails
				<br>
				<input type="radio" name="proportion" value="3">3 to 5 phishing emails		
				<br>
				<input type="radio" name="proportion" value="4">5 to 10 phishing emails
				<br>
				<input type="radio" name="proportion" value="5">More than 10 phishing emails						

				<br><br>
				
				
				
				<b><label style="color:#444499;">Q3. Did you receive training on phishing attacks in the recent past? </label></b><br>
				<input type="radio" name="training" value="1">No
				<br><input type="radio" name="training" value="2">Yes, I have undergone an Internet security awareness training 
				<br><input type="radio" name="training" value="3">I have read written educational material about phishing attacks and threats on Internet
				<br><input type="radio" name="training" value="4">I was phished by my company as part of a training and received feedback on how to detect phishing emails
				<br><input type="radio" name="training" value="5">I have undergone formal computer security training or education

				
				
				<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
<br>
</div>
<div align="center">
	<br> <br>
		<center><button name="submit"  class="button" type="submit" >Submit</button> </center>
</div>
	</form>
	
	
</div>
</td>
</tr>
</table>

<br><br><br>
<?php
					
include_once('footer.php');} ?>
</html>
</body>
</html>





