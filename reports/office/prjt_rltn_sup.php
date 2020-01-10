<?php

	session_start();
	session_unset();

	$survey = "Project/Relationship Supervisor Report";
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
								array( "1. Please outline any problems/concerns you encountered today. What have you done to resolve them? If you are unsure, what are your proposed solutions(s)?", 4 ),
								array( "2. Did you make sure to address any missed calls, missed productivity goals, and/or missed project deadlines with the team? What opportunities are there to improve upon this?", 4 ),
								array( "3. Are we up-to-date on all projects listed below? If not, please provide reasons and an action plan to get caught up.", 11 ),
								array( "<ul style='margin: 0; font-size: 10pt'><li>Instructor Day of Call Outs</li>", 4 ),
								array( "<li>Instructor Training Schedules (filled for the current/next day)</li>" , 4 ),
								array( "<li>Instructor Request Offs/Availability Changes/Resignations</li>", 4 ),
                                        array( "<li>P&Me changes</li>", 4 ),
                                        array( "<li>No Show Report</li>", 4 ),
                                        array( "<li>Site Activity</li>", 4 ),
								array( "<li>Multiple Instructor Report</li>", 4 ),
								array( "<li>FOL</li>", 4 ),
								array( "<li>FUP</li>", 4 ),
								array( "<li>Instructor Stop Lists</li>", 4 ),
								array( "</ul>", 11 ),
								array( "4. What training did you give your team today to improve their
										performance?  Did you notice any of them implementing the training?", 4 ),
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
