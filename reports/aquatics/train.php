<?php

	session_start();
	session_unset();

	$survey = "Training Report";
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
						$questions = array(
							"1. Who did you train today, what day were they on, and in what areas do they need improvement on?",
							"2. Do you observe or hear of any red flags with the trainees?",
							"3. Do they need any additional practice with any certain ages, levels, and/or skills?",
							"4. Do you think the trainee/trainees would be a good fit for PM or SC classes?",
							"5. Was the trainee open to feedback today?",
							"6. When given the feedback, did the trainee:",
							"&#8226; Implement the change(s)?",
							"&#8226; Make an excuse?",
							"&#8226; Say \"okay\" to you, but not change their behavior?",
							"&#8226; Appear to not understand the feedback?",
							"7. Did the trainee fail to implement any feedback from previous days of training? Please explain. (Ex.: Aspects of 10-step outline, lesson, structure, communication with parent, etc.)",
							"8. What expectations did you give the trainee at the end of the day for the next day they are in (please be concise)?",
							"9. Did they have any concerns/questions about these expectations?",
							"10. Are there any age/level restrictions we should place on them before they start teaching?",
							"11. Do you feel this trainee should be labeled as firm or gentle?  If something has changed from a previous report that you have submitted, please explain why.",
							"12. How did the trainee do with wrap ups today? Did they discuss figure
								goals? Did they incorporate growth tactics? Any other concerns with their
								parent communication?",
							"13. Any additional questions and/or concerns you would like to share?"
						);

						$type = array(
							4,
							4,
							4,
							4,
							4,
							11,
							12,
							12,
							12,
							12,
							4,
							4,
							4,
							4,
							4,
							4,
							4
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
