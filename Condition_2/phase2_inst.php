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

if(!isset($_POST["Mturkid"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{ 


 $Mturkid=$_POST["Mturkid"];
 $score=$_POST['Score1'];
 $email_repetation=unserialize($_POST["email_repetation"]);
 



?>





<center><h2>Phase 2 Instructions</h2>
<table border="1" cellpadding="10" cellspacing="0" style="width: 1150px;" align="center">
<tr><td>
	<div align="justify">
		<p> In the upcoming Phase 2, you will receive feedback about the decisions you make. The figure below shows an example of an unsuccessful classification of a phishing email.
		For unsuccessful detection, you will receive one of the following 2 feedback messages with a red-colored sad face, and you will NOT earn any points in that trial.<br>
	
		- This was a <b>ham </b>email and you detected it <b>incorrectly.</b><br>
		- This was a <b>phishing </b>email and you detected it <b>incorrectly.</b><br>	</p>
		
		For successful detection, you will receive one of the following 2 feedback messages with a green-colored smiley face, and you will earn 1 point in that trial.<br>
		- This was a <b>ham </b> email and you detected it <b>correctly.</b><br>
		- This was a <b>phishing </b>email and you detected it <b>correctly.</b><br>
		<p>
		The feedback provides also 6 attributes colored to represent whether the attributes 
		are good (i.e., green) or bad (i.e., red). The 6 attributes are defined as follows:<br>
		
		1.	<u>Sender address:</u> Does the sender address look suspicious?<br>
		2.	<u>Personal information:</u> Is there any request for money, credentials and sensitive information in the email?<br>
		3.	<u>Subject Line:</u> Does the subject line look suspicious or unusual?<br>
		4.	<u>Urgency/Threat:</u> Does the email suggest threat, urgency, or emergency? <br>
		5.	<u>Offer/Reward:</u> Does the email present an offer or unexpected reward?<br>
		6.	<u>Link (URL):</u> Does the email contain any mismatch on the link or is the link suspicious?</p>

		The detailed feedback will show the non-suspicious features on the right side and suspicious features will be on the left side. In this example, the Personal Information, 
		Subject Line, and Urgency/Threat in the email are all indicators of a Phishing email; while the Sender Address, Offer/Reward, and a Link (URL) all appear non-suspicious.
		Thus, the attributes that make the current email phishing are shown on the left-side with a red cross mark.  The details of these attributes feedback can be read through 
		the mouse over on the attributes.
		</p>
		<div align="center">
	<img  src="feedback.PNG" alt="Instructions" width="800px", height="350px">
	</div>
	</td></tr>
		</table>
		</center>
	
  



	<form action="phase2.php" method="post" >
	<input type="hidden" name="Mturkid" value="<?php  echo $Mturkid; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
	<input type="hidden" name="pre" value="<?php  echo 0; ?>" />
	<input type="hidden" name="num" value="<?php  echo 0; ?>" />
	<input type="hidden" name="p" value="<?php  echo 0; ?>" />
	<input type="hidden" name="Score1" value="<?php  echo $score; ?>" />
	<input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation));  ?>" />
		
		<div align="center">
		<button name="submit"  class="button" type="submit" >Start Phase 2</button> 
		<br>
		</div>
	</form>
	
	

</td></tr></table>






</body>
<?php
}
?>
</html>
