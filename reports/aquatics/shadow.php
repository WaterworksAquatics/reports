<?php

	session_start();
	session_unset();

	$survey = "First Day Shadow Survey";
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
							<label class="q">Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label class="q">Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "../office/include/locations.php"; ?>
						
						<p>
							<label class="q">Name of Applicant/Trainee</label>
							<br>
							<input type='text' name='name_app' required>
						</p>					
					</div>
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "1. How engaged in the lesson(s) was the applicant when they were shadowing you? Did they seem interested in the lesson(s)? (1 being least interested and 5 being highest engagement)";
						$questions[1] = "2. Did the applicant seem enthusiastic about teaching and being in the water? (1 being lowest enthusiasm and 5 being extremely happy)";
						$questions[2] = "3. How well did the applicant interact with your students?  Did they seem to be engaged with the children?  (1 being poor and 5 being excellent)";
						$questions[3] = "4. Did you find out anything that would pose as a concern with the interviewee (e.g. commitment conflicts, poor attitude, lack of passion for children, etc.)?";
						$questions[4] = "5. In the brief time you spent with the interviewee, how would you rate their level of passion for the position?  (1 being lowest 5 being highest)";
						$questions[5] = "6. Was the applicant consistently smiling?";
						$questions[6] = "7. Could you imagine yourself working well with this individual?";
						$questions[7] = "8. Did the applicant ask you any questions? Were they curious about the position?";
						$questions[8] = "9. Did the applicant stay close to you or did they wander to other parts of the pool and/or look at other lessons?";
						$questions[9] = "10. Additional Comments";

						$_SESSION["questions"] = $questions;
						
						//Determines what type of question it is
						//Type 0  - Name Box
						//Type 1  - Y/N w/ Comment
						//Type 2  - # Answer (1-10)
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
						//Type 14 - # Answer (1-5)
						
								   //(0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29)
						$type = array( 14,  14,  14,  1,  14,  8,  8,  1,  1, 4);
						
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