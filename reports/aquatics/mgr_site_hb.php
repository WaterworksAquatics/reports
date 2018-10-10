<?php

	session_start();
	session_unset();

	$survey = "Site Manager Report";
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

		<style>
			select {
				border: 0;
				-webkit-appearance: none;
			}
		</style>
	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?> - Huntington Beach</h1>
			<hr>
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<div>
						<p style="text-align: center;">
							Note: If you are not filling out this report for Huntington Beach, click <a href="http://reports.waterworksswim.com/reports/aquatics/mgr_site.php" style="text-decoration: underline;">here</a>
						<p>
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

						<div id="loc-dd">
							<div>
								<label>
									*Location:
								</label>
							</div>
							<div>
								<p>
									<select id="region">
										<option>Orange County</option>
									</select>
									<select name="location" required>
										<option value="Huntington Beach">Huntington Beach</option>
									</select>
								</p>
							</div>
						</div>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions[0] = "1.	What did you do today to improve the performance of your facility (lesson counts and retention)?";
						$questions[1] = "2. Please outline any problems/concerns you encountered today. What have you done to resolve them?  If you are unsure, what are your proposed solution(s)What did you do today to improve the performance of your facility (lesson counts and retention)?";
						$questions[2] = "3.	What did you do today to increase your weekend programming enrollment?";
						$questions[3] = "4.	Any morale concerns? (Example: Frequent call outs, staff not engaged, complaining)";
						$questions[4] = "5.	Do you have any additional questions or concerns you would like to share?";

						$_SESSION["questions"] = $questions;
						$heading = array("Your Most Recent Phone Call(s):",
										 "Your recent visits:",
										 "Your Instructor(s):");
						$headnum = array(0, 4, 10);
						$_SESSION["heading"] = $heading;
						$_SESSION["headnum"] = $headnum;

						//Determines what type of question it is
						//Type 0 is a name box
						//Type 1 is Yes or no W/ Comment
						//Type 2 is Number Answer
						//Type 3 is Date
						//type 4 is Comment box
						//Type 5 is Thinking about it
						//Type 6 is Lesson Type
						//Type 7 is Sometimes
						//Type 8 is Yes or no W/O comment
						//Type 9 is Phone Number
						//Type 10 is Time of Day of lesson
								   //( 0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 16, 17)
						$type = array( 4,  4,  4,  4,  4,  4,  4);

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
