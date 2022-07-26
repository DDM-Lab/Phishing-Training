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
<style>
table, tr, td {
  border: 2px solid black;
  padding: 4px;
}

table {
  
  width: 40%;
  height: 100px;
  
}

th {
  text-align: left;
}
</style>

<?php include_once('header.php'); ?>
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

	$Ta =$_POST["trial"];
	$Mturkid=$_POST["Mturk_id"];
	$email_repetation=unserialize($_POST["email_repetation"]);
	

	$score=0;

		
		$phase=1;
		$email_id=$_POST['email_id'];
		$email_type=$_POST['email_type'];
		$phishing=$_POST['phishing'];
		$choice =$_POST['choice'];
		$pre_p=$_POST['pre_p'];
		$confidence=$_POST['myRange'];
		$cum_score=$_POST['cum_score'];
		
		
		if(($pre_p==1 && $phishing==1) || ($pre_p==0 && $phishing==0))
		{
			$cum_score=$cum_score+1;
			$score=1;
		}	
		else
		{
			$score=0;
		}	
		$base=31;
		$sql = "INSERT INTO experimental_data (Mturk_id, base_rate, trial, phase, email_type, email_id, user_action1, user_action2, user_action3, score, cum_score) 
		VALUES ( '$Mturkid', $base, $Ta, $phase, '$email_type', $email_id, $phishing, $confidence, $choice, $score, $cum_score)";
		$result = $conn->query($sql);
	
		
		
	$score=0;
	$sql="select * from experimental_data where Mturk_id='$Mturkid' AND trial=15 AND phase=1";
	$result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_assoc($result))
		{
			if($row["trial"]==15 )
			{
				$score=$row["cum_score"];
			}
					
		}
		
	
	
		
	?>
	<center><table><tr><td><br>
	<center><h3>You have Completed Phase 1</h3><br>
	<h3>Your Phase 1 Score is:  <?php echo $score ?></h3>
	
	
	
	<form action="phase2_inst.php" method="post" >
	<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
	<input type="hidden" name="pre" value="<?php  echo 0; ?>" />
	<input type="hidden" name="num" value="<?php  echo 0; ?>" />
	<input type="hidden" name="p" value="<?php  echo 0; ?>" />
	<input type="hidden" name="Score1" value="<?php  echo $score; ?>" />
	<input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation));  ?>" />
				
		<br>
		<button name="submit"  class="button" type="submit" >Next</button> </center>

	</form>
	</td></tr></table></center>
	<?php
	mysqli_close($conn);		
	
	?>
<br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<?php
					
	 include_once('footer.php'); 
}
?>
