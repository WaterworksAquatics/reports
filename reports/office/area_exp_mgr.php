<?php

	session_start();
	session_unset();

	$survey = "Area Experience Manager Report";
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
						          array( "1. Please outline any problems/concerns you encountered today. What have you done to resolve them? If you are unsure, what are your proposed solution(s)?", 4 ),
						          array( "2. What did you do today to develop upcoming leaders and/or current leaders?", 4 ),
						          array( "3. Were we properly staffed today? Do we need additional staffing? What are we doing to address potential/current staffing concerns?", 4 ),
						          array( "4. Are there any improvements/changes needed to be made with our office operations? If so, what do you suggest and how will we implement?", 4 ),
								array( "5. Was Live Chat scheduled properly and active throughout the day? If so, were there any areas of improvement that you needed to address with the team?", 4 ),
						          array( "6. Do you have any additional questions and/or concerns you would like to share?", 4 ),
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
