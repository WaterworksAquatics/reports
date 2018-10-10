<?php

	session_start();
	session_unset();

	$survey = "Deck Host Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

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
								array( "2. Did you ensure all families scanned in at the kiosk and were directed to the front desk (if prompted to do so)?", 4 ),
								array( "3. Were all of the ISA's successfully communicated and given to the Instructors?", 4 ),
								array( "4. Do you feel you were properly trained and had knowledge for every situation you encountered today? If not, please be specific in the areas you need continual training or areas we need to provide training in.", 4 ),
								array( "5. Do you have any additional questions and/or concerns you would like to share? (IT issues: customer kiosk, POS system, etc.)?", 4 ),
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
