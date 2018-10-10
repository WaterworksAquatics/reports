<?php

	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "IT Daily Report";
	$_SESSION['survey'] = $survey;
	$process = "../office/send.php";
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
							<input type='text' name='email2' id='email2' required>
						</p>

						<?php include "../office/include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
							array( "Please list the major items you were able to complete today.", 4 ),
							array( "Were there any issues made with the website(s)?", 4 ),
							array( "Were there any major changes made to the website (adding/removing pages or menu options, changing the layout of any pages, etc.)?", 4 ),
							array( "List the items that you will have to follow-up on: updates to website, ordering parts, scheduling date to visit location, etc. Make sure to add these to your calendar and set alarts.", 4 ),
							array( "Do you need any tools/software to complete your projects?", 4 ),
							array( "Do you have any additional questions and/or concerns you would like to share?", 4 )
						);

						include "../office/types.php";

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
