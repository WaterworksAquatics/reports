<?php

	session_start();
	session_unset();

	$survey = "Maintenance Daily Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send.php";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<fieldset>
				<h4 style="color:red">
					Do not use this form to report maintenance issues! Your submission will be ignored if submitted via this form.
				</h4>
				<p>
				 Use the methods below to get to the correct form:
					<ol>
						<li>
							System: Msg Center > Report an Issue > Report Maintenance 
						</li>
						<li>
							On the right side of all EOD reports: Report Issue > Maintenance Issue
						</li>
					</ol>
				</p>
			</fieldset>
			<form action='<? echo $process; ?>' method='post'>
				<fieldset>
					<div>
						<p>
							<label>Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label>Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "include/locations.php"; ?>
					
					</div>
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "Were there any concerns/problems with the pool equipment and/or water today?";
						$questions[1] = "Please list any additional items you were able to complete today outside of your daily to-do list.";
						$questions[2] = "What items were you able to complete from the online to-do list today?";
						$questions[3] = "Are there any additional areas through the facility that need repair? Have they been added to the online to-do list?";
						$questions[4] = "How is the facility looking (cleanliness)? What areas need attention?";
						$questions[5] = "Do you need any parts/tools to complete your projects?";
						$questions[6] = "In what ways did you showcase one or more of our core values today in your work (1) Passion, (2) Approachability, (3) Adaptability, (4) Self-Responsibility? What areas within our core values do you feel you need to improve upon?";
						$questions[7] = "Do you have any additional questions and/or concerns you would like to share?";


						$_SESSION["questions"] = $questions;
						$heading = array("Your Most Recent Phone Call(s):",
										 "Your recent visits:",
										 "Your Instructor(s):");
						$headnum = array(0, 4, 10);
						$_SESSION["heading"] = $heading;
						$_SESSION["headnum"] = $headnum;
						
						//Determines what type of question it is
						//Type 0  - Name Box
						//Type 1  - Y/N w/ Comment
						//Type 2  - # Answer
						//Type 3  - Day of Week
						//type 4  - Comment
						//Type 5  - Thinking About It
						//Type 6  - Lesson Type	
						//Type 7  - Y/N/Sometimes
						//Type 8  - Y/N w/o Comment
						//Type 9  - Phone
						//Type 10 - Time of Day
						//Type 11 - Echo Question
						//Type 12 - Indented N/A, Y or No radio
						
								   //(0, 1, 2, 3, 4, 5, 6, 7)
						$type = array(4, 4, 4, 4, 4, 4, 4, 4);
						
						include "types.php";
						
					?>
					
					</div>
				</fieldset>		
					
					<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");?>
					
			</form>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>