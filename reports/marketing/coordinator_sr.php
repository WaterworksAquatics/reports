<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Senior Marketing Coordinator Report";
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
					          array( "1. How much time did you spend on the following and what did you complete or observe: Google Analytics, \"How did you hear about us?\" Report, and Google Adwords.", 4 ),
					          array( "2. How much time did you spend on our social media channels (Facebook, Instagram, Twitter, Pinterest, blogs) today? Please briefly explain what was completed.", 4 ),
					          array( "3. Did you set up any presentations for mom's groups or have you set up a new family promotion for any mom's groups? If so, how many and for which locations?", 4 ),
					          array( "4. In what ways have you positively impacted our customer growth (increase in lessons, enrollment in programs, etc.) today?  Please briefly explain.", 4 ),
					          array( "5. What new idea and/or past ideas were you able to execute today to increase our outreach efforts in the local communities?", 4 ),
					          array( "6. What do you need help with or are there any team members not supporting you on any of the marketing tasks?", 4 ),
					          array( "7. Do you have any additional questions and/or concerns you would like to share?", 4 )
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
