<?php

	session_start();
	session_unset();

	$survey = "LA Fitness/City Sports Instructor Daily Report";
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
							"3. Were any issues with the tablets reported to Cindy?",
							"4. How is the quality of your facility&#39;s environment (ex: Air quality, deck area, water quality)?",
							"5. Did you and every instructor around you promote wet suits your students? What did families say about this?",
							"6. Do you have any concerns with any of your lessons? Did you submit a shadow request?",
							"7. How did your lessons that were on the level advancement report go today?",
							"8. Are you waiting on anything from your manager?",
							"9. Did you learn anything new about a family today (FORD)?",
							"10. Do you have any additional questions and/or concerns you would like to share?"
						);

						$type = array(
							0,
							0,
							1,
							4,
							1,
							4,
							4,
							1,
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
