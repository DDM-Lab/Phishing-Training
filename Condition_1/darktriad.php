<script type="text/javascript">
///////// this code is for back button disable//////////////
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
<html>
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
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<script type="text/javascript"> 

 function validate() {
       

        if (document.myForm.Q1.value == false) {
            alert("Please answer question 1 to proceed");
            return false;
        }
        else if (document.myForm.Q2.value == false) {
            alert("Please answer question 2 to proceed");
            return false;
        }
        else if (document.myForm.Q3.value == false) {
            alert("Please answer question 3 to proceed");
            return false;
        }
        else if (document.myForm.Q4.value == false) {
            alert("Please answer question 4 to proceed");
            return false;
        }
        else if (document.myForm.Q5.value == false) {
            alert("Please answer question 5 to proceed");
            return false;
        }
        else if (document.myForm.Q6.value == false) {
            alert("Please answer question 6 to proceed");
            return false;
        }
        else if (document.myForm.Q7.value == false) {
            alert("Please answer question 7 to proceed");
            return false;
        }
        else if (document.myForm.Q8.value == false) {
            alert("Please answer question 8 to proceed");
            return false;
        }
        else if (document.myForm.Q9.value == false) {
            alert("Please answer question 9 to proceed");
            return false;
        }
        else if (document.myForm.Q10.value == false) {
            alert("Please answer question 10 to proceed");
            return false;
        }
        else if (document.myForm.Q11.value == false) {
            alert("Please answer question 11 to proceed");
            return false;
        }
        else if (document.myForm.Q12.value == false) {
            alert("Please answer question 12 to proceed");
            return false;
        }else if (document.myForm.Q13.value == false) {
            alert("Please answer question 13 to proceed");
            return false;
        }
        else if (document.myForm.Q14.value == false) {
            alert("Please answer question 14 to proceed");
            return false;
        }
        else if (document.myForm.Q15.value == false) {
            alert("Please answer question 15 to proceed");
            return false;
        }
        else if (document.myForm.Q14.value == false) {
            alert("Please answer question 14 to proceed");
            return false;
        }
        else if (document.myForm.Q17.value == false) {
            alert("Please answer question 17 to proceed");
            return false;
        }
        else if (document.myForm.Q18.value == false) {
            alert("Please answer question 18 to proceed");
            return false;
        }
        else if (document.myForm.Q19.value == false) {
            alert("Please answer question 19 to proceed");
            return false;
        }
        else if (document.myForm.Q20.value == false) {
            alert("Please answer question 20 to proceed");
            return false;
        }
        else if (document.myForm.Q21.value == false) {
            alert("Please answer question 21 to proceed");
            return false;
        }
        else if (document.myForm.Q22.value == false) {
            alert("Please answer question 22 to proceed");
            return false;
        }
        else if (document.myForm.Q23.value == false) {
            alert("Please answer question 23 to proceed");
            return false;
        }
        else if (document.myForm.Q24.value == false) {
            alert("Please answer question 24 to proceed");
            return false;
        }
        else if (document.myForm.Q25.value == false) {
            alert("Please answer question 25 to proceed");
            return false;
        }
        else if (document.myForm.Q26.value == false) {
            alert("Please answer question 26 to proceed");
            return false;
        }
        else if (document.myForm.Q27.value == false) {
            alert("Please answer question 27 to proceed");
            return false;
        }
        else{
            $(window).unbind('beforeunload');
        }
    }
	//onsubmit="return(validate());"
</script>



<?php

 


if(!isset($_POST["Mturk_id"]))
{
 
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if($pageWasRefreshed==1){echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";}
	
}
else{
	$Mturk_id=$_POST["Mturk_id"];
?>



<body>


<div id="finalQuestions">

    <form name="myForm" method="post" action="feedback.php" onsubmit="return validate()">

       <center> <h2>Please indicate how much you agree with the following questions on a 5-point scale</h2></center>

<table  style="width: 1200px;" align="center">

<tr>
<td >
<span style="font-size: 14; font-weight: bold;">1. It's not wise to tell your secrets:</span> 
</td>
<td >
 <label  style="font-size: 14px;"><input type="radio" name="Q1" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q1" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q1" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q1" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q1" value=5>Strongly Agree</label>
    
</td>
</tr>



<tr>
<td>
 <span style="font-size: 14; font-weight: bold;">2. I like to use clever manipulation to get my way:</span> 
</td>
<td>
		<label style="font-size: 14px;"><input type="radio" name="Q2" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q2" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q2" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q2" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q2" value=5>Strongly Agree</label>
        
</td>
</tr>       
      
<tr>
<td>
<span style="font-size: 14; font-weight: bold;">3. Whatever it takes, you must get the important people on your side:</span>
</td>
<td>    <label style="font-size: 14px;"><input type="radio" name="Q3" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q3" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q3" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q3" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q3" value=5>Strongly Agree</label>
</td>
</tr>       
      
<tr>
<td>
<span style="font-size: 14; font-weight: bold;">4. Avoid direct conflict with others because they may be useful in the future:</span>
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q4" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q4" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q4" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q4" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q4" value=5>Strongly Agree</label>
</td>
</tr>       
      
<tr>
<td>
<span style="font-size: 14; font-weight: bold;">5. It’s wise to keep track of information that you can use against people later:</span> 
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q5" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q5" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q5" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q5" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q5" value=5>Strongly Agree</label>
</td>
</tr>       

<tr>
<td>
	<span style="font-size: 14; font-weight: bold;">6. You should wait for the right time to get back at people:</span>
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q6" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q6" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q6" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q6" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q6" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">7. There are things you should hide from other people because they don’t need to know:</span>
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q7" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q7" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q7" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q7" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q7" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">8. Make sure your plans benefit you, not others:</span> 
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q8" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q8" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q8" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q8" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q8" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
 <span style="font-size: 14; font-weight: bold;">9. Most people can be manipulated:</span> 
    	
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q9" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q9" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q9" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q9" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q9" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">10. People see me as a natural leader:</span> 
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q10" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q10" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q10" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q10" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q10" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
 <span style="font-size: 14; font-weight: bold;">11. I hate being the center of attention:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q11" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q11" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q11" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q11" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q11" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">12. Many group activities tend to be dull without me:</span>
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q12" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q12" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q12" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q12" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q12" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">13. I know that I am special because everyone keeps telling me so:</span>
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q13" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q13" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q13" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q13" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q13" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">14. I like to get acquainted with important people:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q14" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q14" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q14" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q14" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q14" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
<span style="font-size: 14; font-weight: bold;">15. I feel embarrassed if someone compliments me:</span> 
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q15" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q15" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q15" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q15" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q15" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
 <span style="font-size: 14; font-weight: bold;">16. I have been compared to famous people:</span>
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q16" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q16" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q16" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q16" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q16" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td>
 <span style="font-size: 14; font-weight: bold;">17. I am an average person:</span> 
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q17" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q17" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q17" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q17" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q17" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td> <span style="font-size: 14; font-weight: bold;">18. I insist on getting the respect I deserve:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q18" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q18" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q18" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q18" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q18" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td><span style="font-size: 14; font-weight: bold;">19. I like to get revenge on authorities:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q19" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q19" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q19" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q19" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q19" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td><span style="font-size: 14; font-weight: bold;">20. I avoid dangerous situations:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q20" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q20" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q20" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q20" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q20" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td><span style="font-size: 14; font-weight: bold;">21. Payback needs to be quick and nasty:</span>
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q21" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q21" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q21" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q21" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q21" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td><span style="font-size: 14; font-weight: bold;">22. People often say I’m out of control:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q22" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q22" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q22" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q22" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q22" value=5>Strongly Agree</label>
</td>
</tr> 

<tr>
<td><span style="font-size: 14; font-weight: bold;">23. It’s true that I can be mean to others:</span> 
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q23" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q23" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q23" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q23" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q23" value=5>Strongly Agree</label>
</td>
</tr>     

<tr>
<td> <span style="font-size: 14; font-weight: bold;">24. People who mess with me always regret it:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q24" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q24" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q24" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q24" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q24" value=5>Strongly Agree</label>
</td>
</tr>

<tr>
<td><span style="font-size: 14; font-weight: bold;">25. I have never gotten into trouble with the law:</span>
       
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q25" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q25" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q25" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q25" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q25" value=5>Strongly Agree</label>
</td>
</tr>

<tr>
<td> <span style="font-size: 14; font-weight: bold;">26. I enjoy having sex with people I hardly know:</span> 
        
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q26" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q26" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q26" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q26" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q26" value=5>Strongly Agree</label>
</td>
</tr>

<tr>
<td> <span style="font-size: 14; font-weight: bold;">27. I’ll say anything to get what I want:</span>
</td>
<td><label style="font-size: 14px;"><input type="radio" name="Q27" value=1>Strongly Disagree </label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q27" value=2>Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q27" value=3>Neither agree nor Disagree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q27" value=4>Agree</label>&nbsp&nbsp&nbsp&nbsp&nbsp
        <label style="font-size: 14px;"><input type="radio" name="Q27" value=5>Strongly Agree</label>
</td>
</tr>

</table>
<br><br>
<center><input type="submit" name="submit" class="button" value="Submit" /></center>
<input type="hidden" name="Mturk_id" value="<?php  echo $Mturk_id; ?>" />
</form>
</div>

</body>
</html>
<?php
}
?>