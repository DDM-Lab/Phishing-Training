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
		
$Mturk_id=$_POST["Mturk_id"];
	


?>

	<center><table><tr><td><br>
	<center><h3>To Start Phase 1 Please Press Next Button </h3><br>
	
	
	
	<form action="phase1.php" method="post" >
	<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
	<input type="hidden" name="trial" value="<?php  echo 1; ?>" />
		<br>
		<button name="submit"  class="button" type="submit" >Next</button> </center>

	</form>
	</td></tr></table></center>
	
<br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
					
	 include_once('footer.php');

}
	 ?>
