<?php

	session_start();
	session_unset();

	$survey = "Swim Competition Report";
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
								array( "1. Did the meet start on time? If not, what time did it start and what were the causes of the delay?", 4 ),
								array( "2. What time did the meet end? (last event over, not when the coin toss was done)", 4 ),
								array( "3. Were there any mistakes that the announcer made?", 4 ),
								array( "4. Was the announcer speaking loud enough and clear enough?", 4 ),
								array( "5.	Were the pathways clear and accessible for swimmers to get to the blocks?", 4 ),
								array( "6.	Are you low on any supplies that are needed for the swim competition?", 4 ),
								array( "7.	Were there any problems/concerns with clients? If so, what corrective action was taken with these issues?", 4 ),
								array( "8.	Were there any issues with office tasks that you feel require more training?", 4 ),
								array( "9. Were there any system/IT issues?", 4 ),
								array( "10. Were there any Deck Guards issues?", 4 ),
								array( "11. Is there anything you feel you need more training on?", 4 ),
								array( "12. Do you have any additional questions, comments and/or concerns you would like to share?", 4 )
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
