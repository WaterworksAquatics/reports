<?php

	session_start();
	session_unset();

	$survey = "Instructor Resignation Report";
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

						<?php include "include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
							"1. Name of instructor who resigned?",
							"2. Date of Hire",
							"3. Reason(s) for resigning?",
							"4. What steps have you taken to save this instructor?",
							"5. When is there last day?"
						);

						$type = array(
							4,
							14,
							4,
							4,
							14
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
