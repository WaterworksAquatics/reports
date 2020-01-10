<?php

	session_start();
	session_unset();

	$survey = "Customer Relations Manager Report";
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
								array( "1. Please outline any problems/concerns you encountered today. What have you done to resolve them? If you are unsure, what are your proposed solutions?", 4 ),
								array( "2. In what ways were did you your team create desired/surprising experiences for our first time families? Please provide examples.", 4 ),
								array( "3. What has been done to address opportunities today based on our customer
										feedback?  What additional training needs to be rolled out as a result of
										this feedback?", 4 ),
								array( "4. How many customer concerns did you receive today? What were the opportunities? How do you plan to resolve these from occurring in the future?", 4 ),
								array( "5. Do you have any additional questions and/or concerns you would like to share (e.g. staffing levels, facility, etc.)?", 4 ),
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
