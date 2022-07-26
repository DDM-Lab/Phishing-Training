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
$training =$_POST["training"];
$defination =$_POST["defination"];
$proportion =$_POST["proportion"];
 
$sql = "UPDATE demographics SET exp_q1 = $defination, exp_q2 = $proportion, exp_q3=$training WHERE Mturk_id='$Mturk_id'";

//"INSERT INTO survey (Mturk_id, phishing_training, phishing_defination, phishing_proportion) VALUES ( '$Mturk_id', $training, $defination, $proportion)";



if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>




<body>
<table border="1" cellpadding="10" cellspacing="0" style="width: 1000px;" align="center">
<tr>
<td>
<div align="center">
  <h1>Instructions</h1>
	
</div>

<div align="justify">

<p>We're interested in assessing how people classify emails as “Phishing” or “Ham”. A <b>“Phishing”</b> email is a deceptive email pretending to be from a legitimate source
 (e.g., bank, friend) to steal money or your personal information. A <b>“Ham”</b> email is a legitimate email.</p>

<p>
This task consists of three phases. Phase 1 and Phase 3 are intended to determine how you classify emails without receiving any information or feedback about the accuracy 
of your classification decisions. Phase 2 is a “training” phase in which we will provide you with feedback about your performance. </p>

<p>
In each phase you will be presented with, both personal and work related emails in a sequence, both personal and work related. These emails were taken from the inbox of many potential email users. <b>Your goal</b> is to examine each 
email and make a classification decision as: “Phishing” or “Ham”. Because these emails are known to be Phishing or Ham, we can tell whether you have classified each email correctly 
or not (e.g., A classification will be successful if you say an email is Phishing when indeed it is). <b>You will be rewarded with 1 point for each successful classification</b>. Each point 
you earn will translate into a monetary incentive as advertised.</p> 

<p>
You will also be asked to determine your confidence in this classification, and the action that you would recommend the person receiving this email should take, as shown in the 
figure below. </p>
</div>


	<div align="center">
	<img  src="example.PNG" alt="Instructions" width="800px", height="350px">
	</div>
	<p>
	During Phase 2, after you submit your response, you will receive feedback on whether you classified the email correctly or incorrectly and the points you earned. <br><br>
	<font color="red"><b>IMPORTANT: </b>Please do NOT refresh the page or attempt to navigate backward at any point in this study. Doing so will void your response and prevent us from issuing your payment.
	<br><br>
	Please Note, that <b>your attention might be tested multiple times during the experiment</b>. If you fail this attention test <b>twice, you <b>will not receive any bonus payment.</b>
	</font>
	</p>
	
  



	<form action="instruction_ques.php" method="post" >
	<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
		
		<div align="right">
		<button name="submit"  class="button" type="submit" >Next</button> 
		</div>
	</form>
	
	

</td></tr></table>






</body>
<?php
include_once('footer.php');}
?>
</html>
