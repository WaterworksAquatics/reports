<?php

	session_start();
	session_unset();

	$survey = "LA Fitness/City Sports Site Coordinator Report";
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
							"1. Please outline any problems (e.g. facility, parent and/or employee, etc.) you encountered today. What have you done to resolve them?  If you are unsure, what are your proposed solution(s)?",
							"2. Did the following get completed today: (1) test chlorine/pH, (2) check pool temperature, (3) opening and closing checklist, (4) tablet issues reported to Cindy, and (5) supplies replenished (if needed)?",
							"3. What did you do today to improve lesson retention and lesson growth? (that were not included in your submitted shadow logs).",
							"4. What did parents say about our program today? Where can we go to market our lessons? Do you have any additional ideas for marketing our program?",
							"5. Did learn anything new about a family today (FORD)?",
							"6. Do you have any additional questions and/or concerns you would like to share?"
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
