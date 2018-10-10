<?php

	session_start();
	session_unset();

	$survey = "New Applicant Survey: Play Area Interactions";
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
						
						<p>
							<label class="q">Name of Applicant/Trainee</label>
							<br>
							<input type='text' name='name_app' required>
						</p>
					
					</div>
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "1. How often did the applicant smile?";
						$questions[1] = "2. Did the children respond well to the applicant?";
						$questions[2] = "3. Did the applicant enjoy themselves or did they seem uncomfortable? ";
						$questions[3] = "4. Do they naturally connect with children or did it seem forced?";
						$questions[4] = "5. What did the applicant do with the children while in the play area (e.g. play games, high fives, joke around, etc.)?";
						$questions[5] = "6. How often were they looking at the clock?";

						$_SESSION["questions"] = $questions;
						
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

								   //(0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29)
						$type = array( 4,  4,  4,  4,  4,  4);
						
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