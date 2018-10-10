<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Test Report";
	$_SESSION['survey'] = $survey;	
	$process = "send.php";
	$_SESSION['email'] = $email;
	
	$title = $survey
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	<head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action='<? echo $process; ?>' method='post' onsubmit="return (validate('form') && checkform(this));">
				<fieldset>
					<div>
						<p>
							<label>Name</label>
							<br>
							<input type='text' name='name' id='name' validate="form" required>
						</p>
						<p>
							<label>Email</label>
							<br>
							<input type='text' name='email2' id='email2' validate="form" required>
						</p>

						<?php include "../office/include/locations.php"; ?>
					
					</div>
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "Name Box";
						$questions[1] = "Yes/No w/ Comment";
						$questions[2] = "Number Answer";
						$questions[3] = "Date";
						$questions[4] = "Comment Box";
						$questions[5] = "Thinking about it";
						$questions[6] = "Lesson Type";
						$questions[7] = "Sometimes";
						$questions[8] = "Y/N w/o Comment";
						$questions[9] = "Phone Number";
						$questions[10] = "Time of Day";
						

						$_SESSION["questions"] = $questions;
						$heading = array("Your Most Recent Phone Call(s):",
										 "Your recent visits:",
										 "Your Instructor(s):");
						$headnum = array(0, 4, 10);
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
								   //(0, 1, 2, 3, 4, 5)
						$type = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
						
						include "../office/types.php";
						
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