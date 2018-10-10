<?php

	session_start();
	session_unset();

	$survey = "LA Fitness/City Sports Lead Instructor Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send.php";

	$_SESSION['pub'] = $_SERVER['REMOTE_ADDR'];

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
							"1. Chemical reading (Chlorine and pH)",
							"2. Temperature reading",
							"3. Was everything completed 100% on the opening check list? Closing check list?",
							"4. Were any issues with the tablets reported to Cindy?",
							"5. Are there any supplies needed for the facility (fliers, toys, stickers, first-aid kit materials, goggles, etc.)?",
							"6. Please outline any problems (e.g. facility, parent and/or employee, etc.) you encountered today. What have you done to resolve them?  If you are unsure, what are your proposed solution(s)? ",
							"7. What did you personally exhibit in your lessons today to help with your retention? What impact did you see as a result of your actions?",
							"8. What marketing ideas/suggestions did you get from the families you shadowed today?  Please be specific.",
							"9. Did you learn anything about a family today (FORD)?",
							"10. Do you have any additional questions and/or concerns you would like to share?"
						);

						$type = array(
							0,
							0,
							4,
							1,
							1,
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
