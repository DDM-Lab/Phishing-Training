<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
<!DOCTYPE html>
<html>


<head>
<style>
.button{
  background-color: #555555;
  border: none;
  color: white;
  padding: 12px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

</head>

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
 
	$trial=1;
	$Mturk_id=$_POST["Mturk_id"];
	$inst_q1=$_POST["diff"];
	$inst_q2=$_POST["points"];
	$inst_q3=$_POST["goal"];
	$inst_q4=$_POST["atten"];
 
 
	$inst_q1_cor=0;
	$inst_q2_cor=0;
	$inst_q3_cor=0;
	$inst_q4_cor=0;
	
	if($inst_q1==2){$inst_q1_cor=1; }
	if($inst_q2==1){$inst_q2_cor=1; }
	if($inst_q3==1){$inst_q3_cor=1; }
	if($inst_q4==3){$inst_q4_cor=1; }
	
	$sql = "UPDATE demographics 
	SET inst_q1 = '$inst_q1', inst_q2 = '$inst_q2', inst_q3='$inst_q3', inst_q4='$inst_q4', inst_q1_cor='$inst_q1_cor', inst_q2_cor='$inst_q2_cor', inst_q3_cor='$inst_q3_cor', inst_q4_cor='$inst_q4_cor'   
	WHERE Mturk_id='$Mturk_id'";

if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>





<center><h2>Example Emails</h2>
<table border="1" cellpadding="10" cellspacing="0" style="width: 600px;" align="center">
<tr><td>
	<div align="justify">
	<p>Next you will be presented with a few email examples coming from potential email users’ mailboxes. These are considered legitimate (i.e.,<b> “Ham”</b>) emails.</p>

	<p>The purpose of these emails is to help you familiarize yourself with the kinds of emails that you will observe during this task. Please click the next button 
	to read the examples.</p>

		
	</div>
	
		</center>
	
  



	<form action="example.php" method="post" >
	<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
	<br><br>
		<div align="center">
		<button name="submit"  class="button" type="submit" >Next</button> 
		</div>
	</form>
	
	

</td></tr></table>
<div align="left">


<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
</body>
<?php
include_once('footer.php'); }  
?>
</div>
</html>
