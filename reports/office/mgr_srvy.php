<?php

	session_start();
	session_unset();

	$survey = "Feedback Survey";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey

	$process = "send-old.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
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
							<label>Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label>Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "../aquatics/include/locations.php"; ?>

						<p>
							<label>*Department:</label>
							<br>
							<select id='department' name='department' required>
								<option value="" disabled selected>Select a Department</option>
								<option value="Aquatics">Aquatics</option>
								<option value="Office">Office</option>
								<option value="Maintenance/IT">Maintenance/IT</option>
							</select>
						</p>
					</div>
					<div id="agree">
						<div>
							1<br>Strongly<br>Disagree
						</div>
						<div>
							2<br>Somewhat<br>Disagree
						</div>
						<div>
							3<br>Neutral
						</div>
						<div>
							4<br>Somewhat<br>Agree
						</div>
						<div>
							5<br>Strongly<br>Agree
						</div>
					</div>

					<div>

					<?php

						//Input your questions here
						$questions[0] = "*1. I am happy in my current position, and I look forward to coming to work.";
						$questions[1] = "*2. I work in a positive environment";
						$questions[2] = "*3. There is room for me to grow in my position.";
						$questions[3] = "*4. I can go to my manager with any concerns I have.";
						$questions[4] = "*5. My manager promptly and effectively addresses any concerns I have.";
						$questions[5] = "*6. My manager gives me feedback and develops me in my position.";
						$questions[6] = "*7. My manager encourages me and motivates me.";
						$questions[7] = "8. Additional Comments:";
						$_SESSION["questions"] = $questions;

						//Determines what type of question it is
						//Type 0 is a name box
						//Type 1 is 1-5 Number + Comment(Not Required)
						//Type 2 is 1-5 Number + Comment(Required)
						//Type 3 is Comment box
								   //(0, 1, 2, 3, 4, 5, 6, 7, 8 )
						$type = array(2, 2, 2, 2, 2, 2, 2, 3 );

						$_SESSION["type"] = $type;
						for($i = 0; $i < count($questions); $i++){
							$counter = $type[$i];

							//Decides what type of question it is and it outputs it

							//Type 4 is Thinking about it
						//Type 0 is a name box
						if($counter == 0){
							echo"$questions[$i]
							<input type='text' name='answer[$i]' id='answer[$i]'><br><br>";
							}	//end of elseif
						//Type 1 is 1 - 5 Number + Comment(Not Required)
						elseif($counter == 1){
							echo "<div class=\"ques\">
									$questions[$i]
									</div>
									<br>
								<div class=\"indent\">
									<div class=\"rdo\">
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Disagree'>
										1 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Disagree'>
										2 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Neutral'>
										3 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Agree'>
										4 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Agree'>
										5
									</div>
									<div class=\"rdo-cmnt\">
										Comments:
										<br>
										<textarea name='comments[$i]' id='comments[$i]' rows=5'></textarea>
									</div>
								</div>
								<br>
								<br>";
							}//end if elseif
						//Type 2 is 1 - 5 Number + Comment(Required)
						elseif($counter == 2){
							echo "<div class=\"ques\">
									$questions[$i]
									</div>
									<br>
								<div class=\"indent\">
									<div class=\"rdo\">
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Disagree' required>
										1 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Disagree'>
										2 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Neutral'>
										3 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Agree'>
										4 |
										<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Agree'>
										5
									</div>
									<div class=\"rdo-cmnt\">
										Comments:
										<br>
										<textarea name='comments[$i]' id='comments[$i]' rows=5'></textarea>
									</div>
								</div>
								<br>
								<br>";
							}//end if elseif
						//Type 3 is Comment box
						elseif($counter == 3){
							echo "<div class=\"ques\">
									$questions[$i]
									</div>
								<div class=\"indent2\">
									<br>
									<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3'></textarea>
								</div>
								<br>";
							}//end of elseif
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
