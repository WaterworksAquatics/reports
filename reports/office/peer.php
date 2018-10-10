<?php

	session_start();
	session_unset();

	$survey = "Peer to Peer";
	$_SESSION['survey'] = $survey;
	$title = $survey;
	$_SESSION['email'] = $email;
	$_SESSION['dept'] = $_REQUEST['type'];
	$uid = $_REQUEST['uid'];
		if(empty($uid)){
			$uid = "User ID not sent by the system";
		}
	$_SESSION['uid'] = $uid;
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
			<h1><?php echo $title;; ?></h1>
			<hr>
			<p style="text-align: center;">
				Your name will be kept confidential.
				<br />
				<br />
				We appreciate you taking the time to fill out this evaluation.
			</p>
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<div>
						<p>
							<label>Name</label>
							<br>
							<input type='text' name='name' id='name'>
						</p>
						<p>
							<label>Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>
						<p style="display: none;">
							<label>UID</label>
							<br>
							<?php echo $uid; ?>
						</p>

						<?php include "../aquatics/include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
									array( "1. Who do you feel is exhibiting exceptional work qualities?  Please list the qualities you see them doing well in.", 4 ),
									array( "2. Who do you feel is ready or may be ready to advance within the company?  Why do you feel they are ready or may be ready for advancement?", 4 ),
									array( "3. Who do you feel needs more improvement?  What areas do they need work in?", 4 ),
									array( "4. Who is very positive around the work place?", 4 ),
									array( "5. Who seems disengaged in the work place? What do you think could be causing this behavior?", 4 ),
									array( "6. Who do you think enjoys their job and demonstrates a genuine passion for what they do?", 4 ),
									array( "7. Who does not demonstrate a genuine passion for what they do?", 4 ),
									array( "Do you have any additional comments/concerns?", 4 )
								);

						include "types.php";

					?>
						<p>
							Would you like this evaluation to only be sent to Todd? Before doing so, please remember that your name will be kept confidential and will not be shared with your peer(s) who you mention in this evaluation. We encourage all of you to share your feedback with your respective managers.
							<br>
							<select id='private' name='private'>
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>
						</p>

					</div>
				</fieldset>

					<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");?>

			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
