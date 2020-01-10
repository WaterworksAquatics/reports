<?php

	session_start();
	session_unset();

	$survey = "Call Listening Expert Report";
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
								array( "1. Please outline any problems/concerns you encountered today. What did you do to resolve them? If you were unable to, did you direct to a Shift Lead/Manager and follow through to ensure the problem was resolved?", 4 ),
								array( "2. Who and/or what location do you feel has the most room to improve on the quality of their calls (accurate information, professionalism, customer service given, etc.)?", 4 ),
								array( "3. Based on the call listening results, have you noticed any trends as a company or within any particular facility?", 4 ),
								array( "4. Did you encounter any severe red flag calls or exceptionally good calls? Was appropriate feedback given to the team member? Did you follow back up with customer(s), if needed?", 4 ),
								array( "5. Do you have any additional questions and/or concerns you would like to share?", 4 ),
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
