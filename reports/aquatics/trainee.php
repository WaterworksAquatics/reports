<?php

	session_start();
	session_unset();

	$survey = "Aquatics Trainee Survey";
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
						$questions[0] = "1.	Which trainer(s) oversaw your in-water training today?";
						$questions[1] = "2.	What areas do you feel like you excelled at in your training today?";
						$questions[2] = "3.	Are there any areas of training today that you feel like you need more help with?";
						$questions[3] = "4.	Do you have any positive feedback and/or concerns about your trainer(s)?";
						$questions[4] = "5. Do you have any more feedback, questions, and/or concerns about your experience in our training program?";

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

								   //( 0,  1,  2,  3,  4)
						$type = array( 4,  4,  4,  4,  4);
						
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