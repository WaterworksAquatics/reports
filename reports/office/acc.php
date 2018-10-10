<?php

	session_start();
	session_unset();

	$survey = "Accounting Associate Report";
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
								array( "1. Were you able to complete all daily tasks? (packets & support emails) If not, what is remaining unfinished?", 4 ),
								array( "2. Is scanning and filing up to date? If it is not up to date, what are the reason(s) for this?", 4 ),
								array( "3. Are there any concerning/repeated mistakes that need to be addressed with the staff? If so, please explain.", 4 ),
								array( "4. What, if anything, do you feel should be better addressed in training /continual training?", 4 ),
								array( "5. Were there any problems/concerns with clients that were directed to you?  What corrective action was taken?", 4 ),
								array( "6. Are there any IT issues(customer kiosk, scheduling system, POS system, etc.)?", 4 ),
								array( "7. Who do you think needs the most help with their duties in the office?", 4 ),
								array( "8. In what ways did you showcase one or more of our core values today in your work (1A) Passion, (2) Approachability, 3) Adaptability, (4)Self-Responsibility? What areas within our core values do you fee you need to improve on?", 4 ),
								array( "9. Do you have any additional questions and/or concerns you would like to share?", 4 )
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
