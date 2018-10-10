<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Camera Server Evaluation Report";
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
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action='<? echo $process; ?>' method='post'>
				<fieldset>
					<p>
						Please list any issues with the servers/cameras with an expected date of inspection or repair.
					</p>
					<p>
						Ex.: Cam 7 - Cutting in and out [Monday, October 31st - Inspection]
					</p>
				</fieldset>
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
							<input type='text' name='email2' id='email2' required>
						</p>
					</div>
					<div>
					
					<?php

						//Input your questions here
						$questions[0] = "Irvine:";
						$questions[1] = "Carlsbad:";
						$questions[2] = "Beverly Hills:";
						$questions[3] = "Huntington Beach:";
						$questions[4] = "Sierra Madre:";
						$questions[5] = "Pasadena:";
						$questions[6] = "San Jose:";
						$questions[7] = "Highlands Ranch:";

						$_SESSION["questions"] = $questions;
						

						//Determines what type of question it is
						//Type 0 is Name Box
						//type 1 is Comment
						//Type 2 is Yes or No
						//Type 3 is Yes or No W/ Comment
								   //( 0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13)
						$type = array( 1,  1,  1,  1,  1,  1,  1,  1);
						$_SESSION["type"] = $type;
						
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