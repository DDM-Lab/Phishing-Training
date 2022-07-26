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
		
 $t =$_POST["trial"];
 $Mturk_id=$_POST["Mturk_id"];
 $Score=$_POST["Score"];
 $Score2=$_POST["current_score"];
 $email_repetation=unserialize($_POST["email_repetation"]);
// print_r($email_repetation)
 
 ?>
 
 
 
 
 
 
 
 
 
	<center><table><tr><td><br>
	<center><h3>You have Completed Phase 2</h3><br>
	<h3>Your Phase 2 Score is: <?php echo $Score2 ?></h3>
	<h3>Your Total Score is:  <?php echo $Score ?></h3>
	
	
	<form action="phase3.php" method="post" >
	<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
	<input type="hidden" name="Score" value="<?php  echo $Score; ?>" />
	<input type="hidden" name="email_repetation" value="<?php  echo htmlentities(serialize($email_repetation));  ?>" />
		<br>
		<button name="submit"  class="button" type="submit" >Start Phase 3</button> </center>

	</form>
	</td></tr></table></center>
	
<br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br>
<?php
					
	 include_once('footer.php'); 
	}
	?>
