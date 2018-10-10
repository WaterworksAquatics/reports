<?php

	session_start();
	session_unset();

	$survey = "Senior Lead Trainer Report";
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

						$questions = array(
								/** array( "Question", type ) **/
								array( "1. Who did you or your team train today and what are the trainees areas of improvements? Did you provide immediate feedback?", 4 ),
								array( "2. Did you see any red flags with the trainee(s) or trainers? If so, what action do you propose we take with the concerns?", 4 ),
								array( "3. What expectations did you give the trainee or trainers at the end of the day for the next day they are in (please be concise)? How did they receive the feedback?", 4 ),
								array( "4. What improvements do you feel need to be made to our training program?", 4 ),
								array( "5. Is there anyone on your current team that would be well suited for a lead trainer position? If so, please list who and why you feel they would do well as a lead trainer.", 4 ),
								array( "6. What FORD did you learn about your trainee today?", 4 ),
								array( "7. Do you have any additional questions and/or concerns you would like to share?", 4 ),
						);

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
