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
	$dt1=$_POST["Q1"];
	$dt2=$_POST["Q2"];
	$dt3=$_POST["Q3"];
	$dt4=$_POST["Q4"];
	$dt5=$_POST["Q5"];
	$dt6=$_POST["Q6"];
	$dt7=$_POST["Q7"];
	$dt8=$_POST["Q8"];
	$dt9=$_POST["Q9"];
	$dt10=$_POST["Q10"];
	$dt11=$_POST["Q11"];
	$dt12=$_POST["Q12"];
	$dt13=$_POST["Q13"];
	$dt14=$_POST["Q14"];
	$dt15=$_POST["Q15"];
	$dt16=$_POST["Q16"];
	$dt17=$_POST["Q17"];
	$dt18=$_POST["Q18"];
	$dt19=$_POST["Q19"];
	$dt20=$_POST["Q20"];
	$dt21=$_POST["Q21"];
	$dt22=$_POST["Q22"];
	$dt23=$_POST["Q23"];
	$dt24=$_POST["Q24"];
	$dt25=$_POST["Q25"];
	$dt26=$_POST["Q26"];
	$dt27=$_POST["Q27"];
	
?>
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

<body onload="assignHandler()">

<table border="1" cellpadding="10" cellspacing="0" style="width: 550px;" align="center">
<tr>
<td>
	<div id="main-content">
		<center><font size="5">If you have anything you would like to share with us about the study and/or your experience,
					 please let us know here. We appreciate all feedback we receive.</font><br></center>
	</div>
		
		<div class="terms" readonly="read-only">
				
			
			<form  name="feedback" id="feedback" method="post"  action="code.php" >
			<br><br>
			
				
				<center><textarea name="feedback" id="feedback" style="font-family:sans-serif;font-size:1.1em;" rows="8" cols="40"> </textarea></center>
			
			
			
			
			
			
			<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
			<input type="hidden" name="dt1" value="<?php  echo $dt1; ?>" />
			<input type="hidden" name="dt2" value="<?php  echo $dt2; ?>" />
			<input type="hidden" name="dt3" value="<?php  echo $dt3; ?>" />
			<input type="hidden" name="dt4" value="<?php  echo $dt4; ?>" />
			<input type="hidden" name="dt5" value="<?php  echo $dt5; ?>" />
			<input type="hidden" name="dt6" value="<?php  echo $dt6; ?>" />
			<input type="hidden" name="dt7" value="<?php  echo $dt7; ?>" />
			<input type="hidden" name="dt8" value="<?php  echo $dt8; ?>" />
			<input type="hidden" name="dt9" value="<?php  echo $dt9; ?>" />
			<input type="hidden" name="dt10" value="<?php  echo $dt10; ?>" />
			<input type="hidden" name="dt11" value="<?php  echo $dt11; ?>" />
			<input type="hidden" name="dt12" value="<?php  echo $dt12; ?>" />
			<input type="hidden" name="dt13" value="<?php  echo $dt13; ?>" />
			<input type="hidden" name="dt14" value="<?php  echo $dt14; ?>" />
			<input type="hidden" name="dt15" value="<?php  echo $dt15; ?>" />
			<input type="hidden" name="dt16" value="<?php  echo $dt16; ?>" />
			<input type="hidden" name="dt17" value="<?php  echo $dt17; ?>" />
			<input type="hidden" name="dt18" value="<?php  echo $dt18; ?>" />
			<input type="hidden" name="dt19" value="<?php  echo $dt19; ?>" />
			<input type="hidden" name="dt20" value="<?php  echo $dt20; ?>" />
			<input type="hidden" name="dt21" value="<?php  echo $dt21; ?>" />
			<input type="hidden" name="dt22" value="<?php  echo $dt22; ?>" />
			<input type="hidden" name="dt23" value="<?php  echo $dt23; ?>" />
			<input type="hidden" name="dt24" value="<?php  echo $dt24; ?>" />
			<input type="hidden" name="dt25" value="<?php  echo $dt25; ?>" />
			<input type="hidden" name="dt26" value="<?php  echo $dt26; ?>" />
			<input type="hidden" name="dt27" value="<?php  echo $dt27; ?>" />
			
				<br><br><br>
				<center><button name="submit"  class="button" type="submit" >Submit</button> </center>

			</form>
	

		</div>
</td>
</tr>
</table>

</body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
					
	include_once('footer.php'); 
}
	?>
	
	
	
</html>
