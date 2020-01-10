<?php

	session_start();
	session_unset();

	$survey = "Relationship Center Supervisor Report";
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
								array( "1. Please outline any problems/concerns you encountered today. What have you done to resolve them? If you are unsure, what are your proposed solutions(s)?", 4 ),
								array( "2. Did address all of the missed calls, missed productivity goals, and/or missed project deadlines with the team? What opportunities are there to improve upon this?", 4 ),
								array( "3. What suggestions do you have for staffing in order to meet the above KPI's?  Are there any specific times or days we can reduce hours?", 4 ),
								array( "4. What training and development did you provide to the staff today? Be specific.", 4 ),
								array( "5. In what ways did you increase the morale today? Who were you able to give praise to today?  Be specific.", 4 ),
								array( "6. Do you have any additional questions and/or concerns you would like to share?", 4 ),

								
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
