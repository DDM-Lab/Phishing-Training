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

function RandomString($length = 4) {

    $randstr='';

    //srand((double) microtime(1) * 1000000);

    //our array add all letters and numbers if you wish

    $chars = array(

        '1', '2', '3', '4', '5',

        '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',

        'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

 

    for ($rand = 0; $rand <= $length; $rand++) {

        $random = rand(0, count($chars) - 1);

        $randstr .= $chars[$random];

    }

    return $randstr;

}



$code = RandomString();
$code="0".$code;


/////////////////////////////////////////////////////////////
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
 
	$Mturk_id=$_POST["Mturk_id"];
	$check_value=$_POST["check2"];
	$sql = "UPDATE demographics SET check2=$check_value WHERE Mturk_id='$Mturk_id'";
	$result = $conn->query($sql);
	
	
	$sql = "UPDATE demographics 
	SET conf_code= '$code'  
	WHERE Mturk_id='$Mturk_id'";

if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$sql = "INSERT INTO exp_end_time (Mturk_id) VALUES ('$Mturk_id')";

if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
		

 
<center><table><tr><td>
	<center>
	<h3>Thank you for participating in this research study! <h3>
	<h4>Your unique payment code is: <b> <?php echo $code?></b></h4>
	
	
	<br>
		
		
		
	</form>
	</td></tr></table></center>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br>
<?php
					
    
	 include_once('footer.php'); 
}
	 ?>