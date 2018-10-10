<?php

	session_start();
	session_unset();

	$survey = "Senior Manager Feedback Survey";
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

			div#agree {
				margin: 30px 10px;
			}

				div#agree > div {
					padding: 20px;
				}

		</style>

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<p style="text-align: justify; width: 75%; margin: 0 auto;">
						Please take a minute to fill out the survey below. Your feedback is appreciated and will help us to create a better work environment. Keep in mind, all feedback will remain anonymous from your management team, unless you give permission. If you have multiple managers at your location, please specify the manager in the comment sections below.
					</p>
				</fieldset>
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

						<?php include "../aquatics/include/locations.php"; ?>

						<p>
							<label class="q">*Department:</label>
							<br>
							<select id='department' name='department' required>
								<option value="" disabled selected>Select a Department</option>
								<option value="Aquatics">Aquatics</option>
								<option value="Office">Office</option>
								<option value="Maintenance/IT">Maintenance/IT</option>
							</select>
						</p>
						<div id="agree">
							<div>
								<label>
									1
									<br>
									Strongly
									<br>
									Disagree
								</label>
							</div>
							<div>
								<label>
									2
									<br>
									Somewhat
									<br>
									Disagree
								</label>
							</div>
							<div>
								<label>
									3
									<br>
									Neutral
								</label>
							</div>
							<div>
								<label>
									4
									<br>
									Somewhat
									<br>
									Agree
								</label>
							</div>
							<div>
								<label>
									5
									<br>
									Strongly
									<br>
									Agree
								</label>
							</div>
						</div>
					</div>

					<div>

					<?php

						//Input your questions here
						$questions = array(
								array( "*1. I work in a positive environment.", 2 ),
								array( "*2. I can go to my manager with any concerns I have.", 2 ),
								array( "*3. My manager promptly and effectively addresses any concerns I have.", 2 ),
								array( "*4. My manager gives me feedback and develops me in my position.", 2 ),
								array( "*5. My manager encourages me and motivates me.", 2 ),
								array( "*6. I respect my manager.", 2 ),
								array( "*7. Is there anything your manager can do differently or would like to see them do differently?.", 3 ),
								array( "8. Additional Comments:", 4 ),
								array( "*9. Are you okay with us sharing this survey with your manager?", 6 ),
						);

						$_SESSION["questions"] = $questions;

						for( $i = 0; $i < count( $questions ); $i++ ){

							$question[$i] = $questions[$i][0];
							$type = $questions[$i][1];
							$_SESSION['type'] = $type;

							//Type 0 is a name box
							switch ( $type ){

								case 0:
									echo "<p><label class='q'>$question[$i]</label><br><input type='text' name='answer[$i]'></p>";
								break;
								case 1:
									echo "<div class=\"ques\">
											<label class='q'>$question[$i]</label>
											</div>
											<br>
										<div class=\"indent\">
											<div class=\"rdo\">
												<input type='radio' name='answer[$i]' value='Strongly Disagree'>1 |
												<input type='radio' name='answer[$i]' value='Somewhat Disagree'>2 |
												<input type='radio' name='answer[$i]' value='Neutral'>3 |
												<input type='radio' name='answer[$i]' value='Somewhat Agree'>4 |
												<input type='radio' name='answer[$i]' value='Strongly Agree'>5
											</div>
											<div class=\"rdo-cmnt\">
												<label>Comments:</label>
												<br>
												<textarea name='comments[$i]' rows=5'></textarea>
											</div>
										</div>
										<br>
										<br>";
								break;
								case 2:
									echo "<div class=\"ques\">
											<label class='q'>$question[$i]</label>
											</div>
											<br>
										<div class=\"indent\">
											<div class=\"rdo\">
												<input type='radio' name='answer[$i]' value='Strongly Disagree' required>1 |
												<input type='radio' name='answer[$i]' value='Somewhat Disagree'>2 |
												<input type='radio' name='answer[$i]' value='Neutral'>3 |
												<input type='radio' name='answer[$i]' value='Somewhat Agree'>4 |
												<input type='radio' name='answer[$i]' value='Strongly Agree'>5
											</div>
											<div class=\"rdo-cmnt\">
												<label>Comments:</label>
												<br>
												<textarea name='comments[$i]' rows=5'></textarea>
											</div>
										</div>
										<br>
										<br>";
								break;
								case 3:
									echo "<p>
											<label class='q'>$question[$i]</label>
										 	<br>
											<textarea name='comments[$i]' cols='50' rows='3' required></textarea>
										</p>";
								break;
								case 4:
									echo "<p>
											<label class='q'>$question[$i]</label>
										 	<br>
											<textarea name='comments[$i]' cols='50' rows='3'></textarea>
										</p>";
								break;
								case 5:
									echo "<p>
											<label class='q'>$question[$i]</label>
											<select name=\"answer[$i]\">
												<option></option>
												<option value=\"Yes\">Yes</option>
												<option value=\"No\">No</option>
											</select>
										</p>";
								break;
								case 6:
									echo "<p>
											<label class='q'>$question[$i]</label>
											<select name=\"answer[$i]\">
												<option></option>
												<option value=\"Yes\">Yes</option>
												<option value=\"No\">No</option>
											</select>
										</p>";
								break;

							}
						}

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
