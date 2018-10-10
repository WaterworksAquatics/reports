<?php

	session_start();
	session_unset();

	$survey = "Event Host Report";
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
								array( "1. How often did you check in with the client during the party?", 4 ),
								array( "2. Were there any concerns brought forward to you about the party? If so, how were they addressed?", 4 ),
								array( "3. Did you encounter any problems with the Deck Supervisors (e.g. showing up late, not on task, etc.)?", 4 ),
								array( "4. Are you in need of any supplies (e.g. wristbands, toys, live vests, etc.)?", 4 ),
								array( "5. Was the party set up on time? If not, what hindered you from starting on time?", 4 ),
								array( "6. Did you encounter any problems during set up or clean up?", 4 ),
								array( "7. Were any toys damaged during the party? If so, please list the toys and provide a brief description of the damage.", 4 ),
								array( "8. Were any life vests broken or in need of repair?", 4 ),
								array( "9. Is there anything we could have done differently to provide a better experience for the client?", 4 ),
								array( "10. Do you have any additional questions and/or concerns you would like to share?", 4 )
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
