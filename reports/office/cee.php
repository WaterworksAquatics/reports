<?php

	session_start();
	session_unset();

	$survey = "Customer Experience Expert Daily Report";
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

	<head>
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
								array( "1. Please outline any problems/concerns you encountered today. What did you do to resolve them? If you were unable to, did you direct to a Shift Lead/Manager and follow through to ensure the problem was resolved?", 4 ),
								array( "2. How did you promote our growth tactics today? Did you learn anything new about a family today (FORD)?", 4 ),
								array( "3. Do you feel you were properly trained and had knowledge for every situation you encountered today? If not, please be specific in the areas you need continual training or areas we need to provide training in.", 4 ),
								array( "4. Are you interested in being cross trained on a new task or responsibility? If so, what?", 4 ),
								array( "5. Did you receive feedback today (positive and/or constructive)? If so, who delivered the feedback and what was it regarding? (please be concise)", 4 ),
								array( "6. Do you have any additional questions and/or concerns you would like to share?", 4 )
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
