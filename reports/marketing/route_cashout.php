<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Marketing Route Cash Out Report";
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
							<label>Name</label>
							<br>
							<input type='text' name='name' id='name'  required>
						</p>
						<p>
							<label>Email</label>
							<br>
							<input type='text' name='email2' id='email2'  required>
						</p>

						<?php include "../office/include/locations.php"; ?>

					</div>
					<div>

					<?php

						$questions = array(
					          /** array( "Question", type ) **/
					          array( "1. What locations did you visit and how many brochures did you drop at each?", 4 ),
					          array( "2. How many employees/families did you speak to?", 4 ),
					          array( "3. How much time did you spend at each stop (estimate)?", 4 ),
					          array( "4. Were there any stops that took particular interest in our material?", 4 ),
					          array( "5. Did you encounter any problems at any of the stops?", 4 ),
					          array( "6. Do you have any suggestions to improve our routing process?", 4 ),
					          array( "7. Additional comments, questions, and/or concerns.", 4 )
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
