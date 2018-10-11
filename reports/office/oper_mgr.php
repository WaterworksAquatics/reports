<?php

	session_start();
	session_unset();
	$rootDir = $_SERVER['DOCUMENT_ROOT'];
	$survey = "Operations Manager Daily Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "https://reports.waterworksswim.com/reports/office/send.php";

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
							<label class="q">Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label class="q">Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
								/** array( "Question", type ) **/
								array( "1. Please outline any problems/concerns you encountered today. What have you done to resolve them? If you are unsure, what are your proposed solution(s)?", 4 ),
								array( "2. Are there any new/existing processes where we can increase efficiency? If so, what are your proposed solutions?", 4 ),
								array( "3. In what ways were you able to contribute to the growth of the company today (lessons counts, retention, etc.)?", 4 ),
								array( "4. Are there any areas of opportunity to reduce company costs? How do you propose we achieve this?", 4 ),
								array( "5. Do you have any additional questions and/or concerns you would like to share?", 4 )
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
