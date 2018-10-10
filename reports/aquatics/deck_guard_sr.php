<?php

	session_start();
	session_unset();

	$survey = "Senior Deck Guard Report";
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
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
							"1. Were there any major safety concerns/incidents that occurred in and/or around the pool today?  If so, how were they resolved?  Did you report them to your manager and/or anyone else?",
							"2. Were there any questions and/or concerns addressed to you by customers on the pool deck? If so, did all of them get answered/resolved?",
							"3. Did the Deck Guard relieve you from your shift at the appropriate time (if applicable)?",
							"4. Did you have any problems with communicating with the office today?",
							"5. Did you conduct any training/continual training with Deck Guards? If so, what are the areas they need improvement on? What feedback did you give to each of them?",
							"6. Do you have any additional questions and/or concerns you would like to share?"
						);

						$type = array(
							4,
							4,
							4,
							4,
							4,
							4
						);

						//Determines what type of question it is
						//Type 0  - Name Box
						//Type 1  - Y/N w/ Comment
						//Type 2  - # Answer
						//Type 3  - Day of Week
						//type 4  - Comment
						//Type 5  - Thinking About It
						//Type 6  - Lesson Type
						//Type 7  - Y/N/Sometimes
						//Type 8  - Y/N w/o Comment
						//Type 9  - Phone
						//Type 10 - Time of Day
						//Type 11 - Echo Question
						//Type 12 - Indented N/A, Y or No radio

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
