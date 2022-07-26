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
 
	$Mturk_id=$_POST["Mturk_id"];
	$dt1=$_POST["dt1"];
	$dt2=$_POST["dt2"];
	$dt3=$_POST["dt3"];
	$dt4=$_POST["dt4"];
	$dt5=$_POST["dt5"];
	$dt6=$_POST["dt6"];
	$dt7=$_POST["dt7"];
	$dt8=$_POST["dt8"];
	$dt9=$_POST["dt9"];
	$dt10=$_POST["dt10"];
	$dt11=$_POST["dt11"];
	$dt12=$_POST["dt12"];
	$dt13=$_POST["dt13"];
	$dt14=$_POST["dt14"];
	$dt15=$_POST["dt15"];
	$dt16=$_POST["dt16"];
	$dt17=$_POST["dt17"];
	$dt18=$_POST["dt18"];
	$dt19=$_POST["dt19"];
	$dt20=$_POST["dt20"];
	$dt21=$_POST["dt21"];
	$dt22=$_POST["dt22"];
	$dt23=$_POST["dt23"];
	$dt24=$_POST["dt24"];
	$dt25=$_POST["dt25"];
	$dt26=$_POST["dt26"];
	$dt27=$_POST["dt27"];
	$feedback=$_POST["feedback"];
	
	
	$sql = "UPDATE demographics SET dt1 = $dt1, dt2 = $dt2, dt3=$dt3,  dt4=$dt4 ,  dt5=$dt5 , dt6=$dt6 , dt7=$dt7 , dt8=$dt8 , dt9=$dt9 , dt10=$dt10, dt11=$dt11 , dt12=$dt12, dt13 = $dt13,
		dt14 =$dt14 , dt15=$dt15, dt16=$dt16 , dt17=$dt17 ,dt18=$dt18 ,dt19=$dt19 ,dt20=$dt20 ,dt21=$dt21 ,dt22=$dt22 ,dt23=$dt23 , dt24=$dt24 ,dt25=$dt25,
		dt26=$dt26 , dt27=$dt27  WHERE Mturk_id='$Mturk_id'";

	
if (mysqli_query($conn, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "UPDATE demographics SET feedback='$feedback' WHERE Mturk_id='$Mturk_id'";
if (mysqli_query($conn, $sql)) {
      
}


/**
* function to generate random strings
* @param                          int           $length                 number of characters in the generated string
* @return                          string     a new string is created with random characters of the desired length
*/

function RandomString($length = 5) {

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
	<center><h3>You have Successfully Completed  the Experiment</h3>
	<h3>Thank you for participating in this research study! <h3>
	<h4>Your unique payment code is: <b> <?php echo $code?></b></h4>
	
	
	
	</td></tr></table></center>
<br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<?php
					
    
	 include_once('footer.php'); 
	 
}
	 ?>
