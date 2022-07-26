<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
<?php
if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{		
	
	
?>
<html>


<script type="text/javascript">

function validateForm()	{
	var ovr18_array = document.getElementsByName('Rover18');
	var read_array = document.getElementsByName('Rreadterms');
	var cont_array = document.getElementsByName('Rwish2continue');
	var ov_filled = false;
	var rd_filled = false;
	var cn_filled = false;
	var terms = false;
	if (ovr18_array[0].checked || ovr18_array[1].checked){ ov_filled= true } 
	if (read_array[0].checked || read_array[1].checked){ rd_filled= true	}
	if (cont_array[0].checked || cont_array[1].checked){ cn_filled= true	}
	if (!(ov_filled && rd_filled && cn_filled)) { 
		alert('Please select answers for online consent questions.');
		return false;
	}
	//if (!(ovr18_array[0].checked && read_array[0].checked && cont_array[0].checked)) { 
	//	alert('If you wish to participate in this game, you should read and confirm the three statements below the online consent box\n\nYou may choose to opt-out and close this page.');
	//	return false;
	//}
		if (!(ovr18_array[0].checked )) { 
		alert('If you wish to participate in this game, you should be 18 to 80 years old.\nYou may choose to opt-out and close this page.');
		return false;
	}
		if (!(read_array[0].checked)) { 
		alert('If you wish to participate in this game, you should read the online consent and confirm.\nYou may choose to opt-out and close this page.');
		return false;
	}
		if (!(cont_array[0].checked)) { 
		alert('If you do not want to participant in this game, please close this page.');
		return false;
	}

}



</script>






<head>
<title>Terms and Conditions and Survey</title>

<style type="text/css">

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

div.terms {
	width:900px;
	height:400px;
	border:1px solid #ccc;
	background:#f2f2f2;
	padding:6px;
	overflow:auto;
}
</style>

<style type="text/css">
#main-content	{
	width:95%;
	float: center;
	position: relative;
	margin:20px;
	padding:15px;
	border-radius: 10px;
}
#form-content	{
	width:90%;
	float: center;
	position: relative;
	margin:20px;
	padding: 20px;
	font-weight: bold;
	font-size: 14px;
	border-radius: 10px;
}
</style>
</head>

<body>
<?php
$Mturk_id =$_POST["Mturk_id"];


$db = mysqli_connect('localhost', 'root', '', 'phish_training');
  //$data = $_POST["postname"];
  
$sql = "SELECT * FROM demographics WHERE Mturk_id='$Mturk_id'";
$results = mysqli_query($db, $sql);
if (mysqli_num_rows($results) > 0) 
{
	?>
	<br><br><br><br><br><br><br><br>
	<table border="1" cellpadding="10" cellspacing="0" style="width: 550px;" align="center">
	<tr><td>
  	  <br><br><br><center>
	 <h3>It's look like you have already participated in the experiment !</h3></center><br><br></center>
	 
	 </td></tr>
	 </table>
	 <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	 <?php
  	}
else
{
 ?> 	  

<table border="1" cellpadding="0" cellspacing="0" style="width: 900px;" align="center">
<tr>
<td>
	<div id="main-content">
		<center><font size="6"><b>Online Consent</b></font><br>
		<div class="terms" readonly="read-only">
				<h3>Terms and Conditions</h3>
				<br>This task is part of a research study conducted by Dr. Cleotilde Gonzalez at Carnegie Mellon University. The purpose of the research is to explore the various factors that affect decisions in the cyber security domain over repeated choices in individuals and competitive situations with more two or more people. This project is funded by the Army Research Office.
				<br><br>
				<b>Procedures</b>
				<br>Throughout this experiment, you will then make decisions in an individual, two-person, or group (more than two-person) task. These decisions may involve classifications, choosing between options, or generating ideas. Regardless of the particular situation you are presented with, your decisions will be separated in a number of trials, and you will be provided with feedback that reflects the accuracy of your decisions according to the instructions provided in the experiment. You will receive feedback in the form of points that are accumulated throughout the trials. At the end of the experiment, these will be converted into the total amount you earned. The accumulated number of points represent rewards for making accurate decisions.
				<br><br>
				<b>Participant Requirements</b>
				<br>Participation in this study is limited to individuals age 18 and older, currently residing in the United States, with at least basic computer proficiency, and the ability to read and understand English.
				<br><br>
				<b>Risks</b>
				<br>The risks and discomfort associated with participation in this study are no greater than those ordinarily encountered in daily life or during other online activities.
				<br><br>
				<b>Benefits</b>
				<br>There may be no personal benefit from your participation in the study but the knowledge received may be of value to humanity. 
				<br><br>
				<b>Compensation & Costs</b>
				<br>You will be compensated for completing the task at a rate of $0.10 per minute. You will only be eligible for compensation if you have completed the game in full and supplied the appropriate confirmation code. There is no partial payment if you do not complete the study. You will not be penalized if you choose to withdraw from the study without completing it, but you will not be compensated either. <br>There will be no cost to you if you participate in this study.
				<br><br>
				<b>Confidentiality</b>
				<br>
				The data captured for the research does not include any personally identifiable information about you.
				<br><br>
				By participating in this research, you understand and agree that Carnegie Mellon may be required to disclose your consent form, data and other personally identifiable information as required by law, regulation, subpoena or court order.  Otherwise, your confidentiality will be maintained in the following manner:
				<br><br>
				Your data and consent form will be kept separate. Your consent form will be stored in a locked location on Carnegie Mellon property and will not be disclosed to third parties. By participating, you understand and agree that the data and information gathered during this study may be used by Carnegie Mellon and published and/or disclosed by Carnegie Mellon to others outside of Carnegie Mellon.
				<br><br>
				In addition, the sponsor of this study, the Army Research Office, will have access to your research information.  
				<br><br>
				<b>Right to Ask Questions & Contact Information</b>
				<br>
				If you have any questions about this study, you should feel free to ask them by contacting the Principal Investigator now at:
				<br><br>
				<center>Prof. Cleotilde Gonzalez
				<br>Social and Decision Sciences Department
				<br>Pittsburgh, PA 15213
				<br>Phone: (412) 268-6242 <br> Email:conzalez@andrew.cmu.edu</center>
				<br><br>
				If you have questions later, desire additional information, or wish to withdraw your participation please contact the Principal Investigator by mail, phone or e-mail in accordance with the contact information listed above.  
				<br><br>
				If you have questions pertaining to your rights as a research participant; or to report objections to this study, you should contact the Office of Research integrity and Compliance at Carnegie Mellon University. Email: irb-review@andrew.cmu.edu. Phone: 412-268-1901 or 412-268-5460.
				<br><br>
				<b>Voluntary Participation</b>
				<br>
				Your participation in this research is voluntary.  You may discontinue participation at any time during the research activity.   
				<br>
		</div></center>
		<div id="form-content">		
			<form id="consent" method="post"  action="Demographics.php" onsubmit="return validateForm()" >
				<input type="checkbox" name="over18" hidden="hidden">
				<label style="color:#444499;">I am age 18 or older.</label>
				<input type="radio" name="Rover18" value="yes">Yes
				<input type="radio" name="Rover18" value="no">No
				<br>
				<input type="checkbox" name="readterms" hidden="hidden">
				<label style="color:#444499;">I have read and understand the information above. </label>
				<input type="radio" name="Rreadterms" value="yes">Yes
				<input type="radio" name="Rreadterms" value="no">No
				<br>
				<input type="checkbox" name="wish2continue" hidden="hidden">
				<label style="color:#444499;">I want to participate in this research and continue with the game</label>
				<input type="radio" name="Rwish2continue" value="yes">Yes
				<input type="radio" name="Rwish2continue" value="no">No
				<br>
				<br>
			<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
			<center>	<button name="submit"  class="button" type="submit"  >Next</button> </center>
			</form>
	
</div>
</div>
</td></tr></table>
<?php
					
	include_once('footer.php'); 
	}
}
	?>
</html>
</body>

</html>
