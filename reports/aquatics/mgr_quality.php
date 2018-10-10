<?php

	session_start();
	session_unset();

	$survey = "Quality Manager Daily Report";
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
						<p>
							<label><b>Note: Please fill out a separate training report if you conducted training today</b></label>
						</p>

						<?php include "include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
									"1. Please outline any problems (e.g. facility, parent and/or employee, etc.) you encountered today. What have you done to resolve them?  If you are unsure, what are your proposed solution(s)? ",
									"2. What did you do today to improve lesson retention and lesson growth? (that were not included in your submitted shadow logs).",
									"3. What did you do today increase your weekend programming enrollment?",
									"4. Did you learn anything new about a family today (FORD)?",
									"5. How many shadow requests did you receive from your team today? How did you encourage your team to fill out more?",
									"6. Do you have any additional questions or concerns you would like to share?"
								);

						$type = array(
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
