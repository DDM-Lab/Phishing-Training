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
div.ex1 {
  background-color: #FFFFFF;
  width: 96%;
  height: 480px;
  overflow: scroll;
  padding: 17px;
}


</style>

<style>
.slidecontainer {
  width: 100%;
  height: 97%;
}

.slider {
  -webkit-appearance: none;
  width: 60%;
  height: 20px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>
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
table {
  border: 1px solid black;
  padding: 1px;
   text-align: left;
  
}

table {
  
  width: 850px;
  height: 450px;
  
}

th {
  text-align: left;
}
</style>

<style>
div {
  height: 50px;
  width: 56%;
 
}
</style>

</head>
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
	$trial=$_POST["trial"];
	$Mturk_id=$_POST["Mturk_id"];
	
	
	
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


 
 $sql = "SELECT * from example where email_id='$trial'";
		$result = $conn->query($sql);


			if ($result->num_rows > 0) 
			{
				$row=mysqli_fetch_assoc($result);
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	if ($trial<4)
	{
			
		?>
		<form   method="post"  action="example.php" >
						
							<center><label ><h2> <b>Example <?php echo $trial?> </b></h2> </label></center>
							
                <table Align ="center">
				 
					<tr>
                            <td align="center" >
							
							<div align="justify" class="ex1">
							<?php
								printf ("<b>From:</b> %s",$row["source"]);
								echo "<br> <br>";
								printf ("<b>Subject:</b> %s",$row["subject"]);
								echo "<br><br>";
								printf ("%s",$row["body"]);

								?>
							</div>
	
			
				 <input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
				 <input type="hidden" name="trial" value="<?php  echo $trial+1; ?>" />
				 
				 </td> </tr></table><br>
                                 <center>
                                 <div align="center">
                                 <b>NOTE:</b>

				 <?php
				 if($trial==1)
				 {
					 $text="In this example, Danny uses his yahoo account for email exchanges. The yahoo security team sent a code to verify that Danny wants to log into his account at any other location.";
					echo $text;
				}
				 if($trial==2)
				 {
					 $text="In this example, a user orders food from GrubHub. The Grubhub team usually sends updates and offers to their customers.";
					echo $text;
				}
				 if($trial==3)
				 {
					 $text="In this example, a user might be a researcher who publishes papers at conferences. The user gets notifications for an international conference requesting papers submissions.";
					echo $text;
				}
				 ?>
                                 </div>
                                 </center>

				 <center><button name="submit"  class="button" type="submit"  >Next</button> </center>
				
			</form> 
	<?php
	}
	else
	{
		
	?>
					<form  method="post"  action="startone.php" >	
						
							<center><label  ><h2> <b>Example <?php echo $trial?> </b></h2> </label></center>
							
                <table Align ="center">
				 
					<tr>
                            <td align="center" >
							
							<div align="justify" class="ex1">
							<?php
								printf ("<b>From:</b> %s",$row["source"]);
								echo "<br> <br>";
								printf ("<b>Subject:</b> %s",$row["subject"]);
								echo "<br><br>";
								printf ("%s",$row["body"]);

								?>
							
							</div>
						
		
				 <input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
				 <input type="hidden" name="trial" value="<?php  echo 1; ?>" />
				 
				 </td>
			</tr></table><br>
                        <center>
			<div align="center">
                        <b>NOTE: </b>
			<?php
			$text="In this example, a user is an Adidas customer who often shops from Adidas. Thus, the company sends the user a sale notification.";
			echo $text;
			?>
			</div></center>
				 <center><button name="submit"  class="button" type="submit"  >Next</button> </center>
				
			</form>
			

<?php
					
	} include_once('footer.php'); 
	
}
	?>
</html>
