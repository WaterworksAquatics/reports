<?php 

session_start();
session_unset();
	$survey = "Waterworks Experience Survey";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$process = "send.php";
	$email = "jonsupport@waterworksswim.com, shelleysupport@waterworksswim.com, victor@waterworksswim.com";
 ?>
<!DOCTYPE html>

<html lang="en">
<head>
<title>Waterworks Aquatics - <? echo $survey; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/min/?b=css&amp;f=menu_style.css,shadowbox.css,style.css,jqueryslidemenu.css" />
	<!-- jQuery for menu and slideshow and shadowbox-->
	<script type="text/javascript" src="../min/g=js"></script>
	<script type= "text/javascript">
		var RecaptchaOptions = {
		theme: 'clean'
		};
	</script>
		<style type="text/css">
		body{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/bgweb.jpg');
			background-repeat: repeat-x;
			}
		#mainWrapperTop{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/mainWrapperTop1.png');
			}
		#mainWrapperMiddle{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/mainWrapperMiddle1.png');
			background-repeat: repeat-y;
			}
		#mainWrapperBottom{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/mainWrapperBottom1.png');
			}
		#slidecontainer{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/flashback.png');
			}
		#footer{
			background-image: url('http://waterworks1.s3.amazonaws.com/images/footer.jpg');
			}
	</style>


</head>
<body>

	
		<div id="header">
			<?php include("../parts/header.php") ?>
		</div>
	
	<div id="wrapper" > 

		<div id="mainWrapperTop">

		</div>
		<div id="mainWrapperMiddle">
			<div id="content">
				
					<table border='0'>
				<tr>
					<td>
						<div ID="container" style='width: 630px; padding-left: 200px;'>
							<center>
								<b><? echo $survey;?></b><br /><br />
								
								<br />
								<br />
							</center>
							<form action='<? echo $process; ?>' method='post'>	
							<div class="survey">	
								Name
								<input type='text' name='name' id='name' required>
								<br />
								<br />
								Location
								<select id='location' name='location' required>
									<option value=""></option>
									<option value="Irvine">Irvine</option>
									<option value="Carlsbad">Carlsbad</option>
									<option value="Huntington Beach">Huntington Beach</option>
									<option value="Beverly Hills">Beverly Hills</option>
									<option value="Sierra Madre">Sierra Madre</option>
									<option value="Pasadena">Pasadena</option>
									<option value="San Jose">San Jose</option>
									<option value="Highlands Ranch">Highlands Ranch</option>
								</select> <br /><br />


<?php
	
	//Input your questions here
	$questions[0] = "1. I feel I can express my honest opinions without fear of negative consequences.";
	$questions[1] = "2. I like the people I work with at this organization.";
	$questions[2] = "3. At this organization, employees have fun at work.";
	$questions[3] = "4. Quality is a top priority with this organization.";
	$questions[4] = "5.	I feel I am valued in this organization.";
	$questions[5] = "6. I feel part of a team working toward a shared goal.";
	$questions[6] = "7.	Most days, I look forward to going to work.";
	$questions[7] = "8. My job provides me with a sense of meaning and purpose.";
	$questions[8] = "9. There is room for me to advance at this organization.";
	$questions[9] = "10. I am proud to work for this organization.";
	$questions[10] = "11. I would recommend working here to a friend.";
	$_SESSION["questions"] = $questions;
	
	$heading = array("Your Most Recent Phone Call(s):",
					 "Your recent visits:",
					 "Your Instructor(s):");
	$headnum = array(100);
	$_SESSION["heading"] = $heading;
	$_SESSION["headnum"] = $headnum;
	
	//Determines what type of question it is
	//Type 0 is a name box
	//Type 1 is Yes or no W/ Comment
	//Type 2 is Number Answer
	//Type 3 is Date
	//type 4 is Comment box
	//Type 5 is Thinking about it
	//Type 6 is Lesson Type	
	//Type 7 is Sometimes
	//Type 8 is Yes or no W/O comment
	//Type 9 is Phone Number
	//Type 10 is Time of Day of lesson
	//Type 10 is Bubble survey
			   //(0, 1, 2, 3, 4, 5, 6, 7)
	$type = array(4, 4, 4, 4, 4, 4, 4, 4);
	$_SESSION["type"] = $type;							
	for($i = 0; $i < count($questions); $i++){
		$counter = $type[$i];
		
		
		//Decides what type of question it is and it outputs it
		//Type 4 is Thinking about it
		
		
	//Type 0 is a name box
		if($counter == 0){
			echo"$questions[$i]
			<input type='text' name='answer[$i]' id='answer[$i]'><br /><br />";
			}	//end of elseif
	//Type 1 is Yes or no W/ Comment
		elseif($counter == 1){	
				echo "$questions[$i] <br />
				<div class=\"indent2\">
					Yes 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Yes'>
					<br>
					No 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='No'>
					<br />
					Comments:</br >
					<textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>
					<br />
					<br />
				</div>
				";	
				}//end of elseif
	//Type 2 is Number Answer
		elseif($counter == 2){	
			echo "$questions[$i] <br />
				<div class=\"indent2\">
					1
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='1'>
					| 2
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='2'>
					| 3
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='3'>
					| 4
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='4'>
					| 5
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='5'>
					| 6
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='6'>
					| 7
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='7'>
					| 8										
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='8'>
					| 9
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='9'>
					| 10
					<input type='radio'
					name='answer[$i]' id='answer[$i]' value='10'>
					<br />
					Comments:<br />
					<textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>
					</div>
					<br />
					<br />
					";
			}//end if elseif
	//Type 3 is Date
		elseif($counter == 3){	
			echo "$questions[$i] <br />
				<div class=\"indent2\">
					<span validate='form' require='<b>Required field</b>'>
					<input type='checkbox'
					name='days[]' value='Monday'>
					Monday
					<br>
					<input type='checkbox'
					name='days[]'  value='Tuesday'>
					Tuesday
					<br>											
					<input type='checkbox'
					name='days[]'  value='Wednesday'>
					Wednesday
					<br>
					<input type='checkbox'
					name='days[]'  value='Thursday'>
					Thursday
					<br>
					<input type='checkbox'
					name='days[]'  value='Friday'>
					Friday
					<br>
					<input type='checkbox'
					name='days[]'  value='Saturday'>
					Saturday
					<br>
					<input type='checkbox'
					name='days[]'  value='Sunday'>
					Sunday
					</span>
				</div>
				<br />
				";
			}//end of elseif
	//Type 4 is Comment box
		elseif($counter == 4){
			echo" $questions[$i] <br />
				<div class=\"indent2\">
					<br />
					<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3'></textarea>
				</div>
				<br />";
			}//end of elseif
	//Type 5 is Thinking about it		
		elseif($counter == 5){
			echo "$questions[$i] <br />
				<div class=\"indent2\">
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Yes'>Yes	<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Thinking about it'>Thinking about it<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='No'>No<br />
				</div>
				<br />	";
			}//end of elseif
	//Type 6 is Lesson Type	
		elseif($counter == 6){
			echo "$questions[$i] <br />
				<div class=\"indent2\">
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Intermediate'>Intermediate	<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Advanced'>Advanced<br />
				</div>
				<br />	";
			}
	//Type 7 is Thinking about it		
		elseif($counter == 7){
			echo "$questions[$i] <br />
				<div class=\"indent2\">
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Yes'>Yes	<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Sometimes'>Sometimes<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Never'>Never<br />
				</div>
				<br />	";
			}//end of elseif
	//Type 8 is Yes or No W/O Comment	
		elseif($counter == 8){	
				echo "$questions[$i] <br />
				<div class=\"indent2\">
					Yes 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Yes'>
					<br>
					No 
					<input type='radio'
						name='answer[$i] id='answer[$i]' value='No'>
					<br />
					<br />
				</div>
				";	
				}//end of elseif	
	//Type 9 is Phone Number	
		elseif($counter == 9){	
				echo "$questions[$i]
					<div class=\"indent2\">
						<input type='text' name='answer[$i]'id='answer[$i]'><br />
					</div>
					";	
				}//end of elseif
	//Type 10 is Phone Number	
		elseif($counter == 10){	
				echo "$questions[$i] <br />
				<div class=\"indent2\">
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Morning'>Morning	<br />
					<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Evening'>Evening<br />
				</div>
				<br />	";	
				}//end of elseif
	//Type 11 is Bubble Survey
		elseif($counter == 11){
				echo "$questions[$i] <br />
				<div class=\"indent2\">
					Disagree Strongly 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Disagree Strongly '>
					<br>
					Disagree Somewhat 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Disagree Somewhat '>
					<br />
					Neutral 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Neutral '>
					<br />
					Agree Somewhat 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Agree Somewhat'>
					<br />
					Agree Strongly 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Agree Strongly '>
					<br />
					Not Applicable 
					<input type='radio'
						name='answer[$i]' id='answer[$i]' value='Not Applicable '>
					<br />
					<br />
				</div>
				";	
				}//end of elseif
			
		}//End of for

?>

								<p>
									<label for="code">Please enter the following security code in the box below > <span id="txtCaptchaDiv" style="color:#F00"></span><!-- this is where the script will place the generated code --> 
									<input type="hidden" id="txtCaptcha" /></label><!-- this is where the script will place a copy of the code for validation: this is a hidden field -->
									<br />
									<input type="text" name="txtInput" id="txtInput" size="30" required/>
								</p>

							<br>
							<br />
							
							<input type='submit' name='Submit' value='Submit'>
							</form>
							</div>

					</td>	
				</tr>
			</table>	

			
			</div>
			<div id="sidebar">
			</div>
				

		</div>
		<div id="mainWrapperBottom">
		</div>
	</div>
	
	<div id="footer">
		<?php include("../parts/footer.php") ?>
	</div>
<script type="text/javascript" src="../js/jquery.validator-0.3.5.min.js"></script>	
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>