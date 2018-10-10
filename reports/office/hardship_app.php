<?php

	session_start();
	session_unset();

	$survey = "Employee Hardship Application";
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
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<div>
						<p>
							<label class="q">*Full Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label class="q">Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>					

						<?php include "../aquatics/include/locations.php"; ?>
					
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "Street Address";
						$questions[1] = "City";
						$questions[2] = "State";
						$questions[3] = "Zip";
						$questions[4] = "Primary Phone";
						$questions[5] = "Describe the financial need you are experiencing and your capacity to meet that need.";
						
						$_SESSION["questions"] = $questions;
						
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
								   //(0, 1, 2, 3, 4, 5, 6, 7, 8 )
						$type = array(0, 0, 0, 0, 9, 4);
						
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