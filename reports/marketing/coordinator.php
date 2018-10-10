<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Marketing Coordinator Report";
	$_SESSION['survey'] = $survey;
	$process = "send.php";
	$_SESSION['email'] = $email;

	$title = $survey

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<div>
						<p>
							<label class="q">Name</label>
							<br>
							<input type='text' name='name' id='name'  required>
						</p>
						<p>
							<label class="q">Email</label>
							<br>
							<input type='text' name='email2' id='email2'  required>
						</p>

						<?php include "../office/include/locations.php"; ?>

					</div>
					<div>

					<?php

						$questions = array(
					          /** array( "Question", type ) **/
					          array( "1. What impact did you have in the field today with regards to your brochure drops?", 4 ),
					          array( "2. Did any of your interactions (e.g. leads, stop lists, etc.) via phone and/or in person lead to new family registrations and/or renewals from existing families today? If so, how many?", 4 ),
					          array( "3. Were you able to set up any presentations for mom's groups today?", 4 ),
					          array( "4. What new and/or past partnerships did you create/foster today? What were you able to attain from the partnership(s)?", 4 ),
					          array( "5. What new and/or past ideas were you able to execute today to increase our outreach efforts in the community?", 4 ),
					          array( "6. Do you have any additional questions and/or concerns you would like to share? ", 4 )
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
