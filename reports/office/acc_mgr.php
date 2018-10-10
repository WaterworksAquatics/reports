<?php

	session_start();
	session_unset();

	$survey = "Accounting Manager Daily Report";
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
						          array( "1. Were you able to stick to your scheduled to do list? If not, what derailed you?", 4 ),
						          array( "2. What CEE issues/questions were presented to you today? Is there anything that needs to be added to the continual training?", 4 ),
						          array( "3. Are there any IT issues(customer kiosk, scheduling system, POS system, etc.)?", 4 ),
						          array( "4. What steps have you taken to develop your team members of your department?", 4 ),
						          array( "5. Are there any times on your To Don't List that you are having trouble delegating off of your list? If so, what items, and what roadblocks are you encountering?", 4 ),
						          array( "6. In what ways did you showcase one or more of our core values today in your work (1) Passion, (2) Approachability, (3) Adaptability, (4) Self-Responsibility? What areas within our core values do you feel you need to improve up?", 4 ),
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
