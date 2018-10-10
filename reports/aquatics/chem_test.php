<?php

	session_start();
	session_unset();

	$survey = "Pool Chemistry Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send-array.php";

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
							<label class="q">Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<p>
							<label class="q">Email</label>
							<br>
							<input type='text' name='email2' id='email2'>
						</p>

						<?php include "include/locations.php"; ?>

						<p>
							<label class="q">Pool</label>
							<br>
							<select name='pool' required>
								<option value=""></option>
								<option value="Teaching Pool">Teaching Pool</option>
								<option value="Lap Pool">Lap Pool</option>
								<option value="Wader">Wader</option>
							</select>
						</p>

					</div>
					<div>

					<?php

						$questions = array(
							array ( "Free Chlorine Level (from test)", 2 ),
							array ( "Total Chlorine Level (from test)", 2 ),
							array ( "pH Level (from test)", 3 ),
							array ( "Alkalinity Level (from test)", 4 ),
							array ( "Pool Temperature", 4 ),
							array ( "Were there any concerns/problems with the pool equipment and/or water today?", 4 ),
							array ( "Do you have any additional questions and/or concerns you would like to share?", 4 ),
						);

						$_SESSION["questions"] = $questions;

						for( $i = 0; $i < count( $questions ); $i++ ){

							$question[$i] = $questions[$i][0];
							$type = $questions[$i][1];
							$_SESSION['type'] = $type;

							// Auto Add opening <p> tag and question
							echo "<p><label class='q'>$question[$i]</label><br>";

							// Add question input
							switch ( $type ){

								case 0:
									echo "<input type='text' name='answer[$i]' id='answer[$i]'>";
								break;
								case 1:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i]a'>Yes</label><br>
										  <input type='radio' name='answer[$i]' id='answer[$i]b' value='No'><label for='answer[$i]b'>No</label><br>
										  <label>Comments:</label><br>
										  <textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>";
								break;
								case 2:
									echo "<select name='answer[$i]' id='answer[$i]'>
											<option value='' selected disabled></option>
											<option value='0.0 - 0.5'>0.0 - 0.5</option>
											<option value='0.6 - 1.0'>0.6 - 1.0</option>
											<option value='1.1 - 1.5'>1.1 - 1.5</option>
											<option value='1.6 - 2.0'>1.6 - 2.0</option>
											<option value='2.1 - 2.5'>2.1 - 2.5</option>
											<option value='2.6 - 3.0'>2.6 - 3.0</option>
											<option value='3.1 - 3.5'>3.1 - 3.5</option>
											<option value='3.6 - 4.0'>3.6 - 4.0</option>
											<option value='4.1 - 4.5'>4.1 - 4.5</option>
											<option value='4.6 - 5.0'>4.6 - 5.0</option>
											<option value='5.1 - 5.5'>5.1 - 5.5</option>
											<option value='5.6 - 6.0'>5.6 - 6.0</option>
											<option value='6.1 - 6.5'>6.1 - 6.5</option>
											<option value='6.6 - 7.0'>6.6 - 7.0</option>
											<option value='7.1 - 7.5'>7.1 - 7.5</option>
											<option value='7.6 - 8.0'>7.6 - 8.0</option>
											<option value='8.1 - 8.5'>8.1 - 8.5</option>
											<option value='8.6 - 9.0'>8.6 - 9.0</option>
											<option value='9.1 - 9.5'>9.1 - 9.5</option>
											<option value='9.6 - 10.0'>9.6 - 10.0</option>
											<option value='>10'>>10</option>
										</select>";
								break;
								case 3:
									echo "<input type='number' name='answer[$i]' type='answer[$i]' step='.1' min='6.0' max='8.5'>";
								break;
								case 4:
									echo "<label>Comments</label><br>
										  <textarea name='comments[$i]' id='comments[$i]' cols='75' rows='3'></textarea>";
								break;
								case 5:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i]a'>Yes</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Thinking about it'><label for='answer[$i]b'>Thinking about it</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='No'><label for='answer[$i]c'>No</label>";
								break;
								case 6:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Beginner'><label for='answer[$i]a'>Beginner</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Intermediate'><label for='answer[$i]b'>Intermediate</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Advanced'><label for='answer[$i]c'>Advanced</label>";
								break;
								case 7:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i}a'>Yes</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Sometimes'><label for='answer[$i}b'>Sometimes</label><br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Never'><<label for='answer[$i}c'>Never</label>";
								break;
								case 8:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i}a'>Yes</label><br>
										  <input type='radio' name='answer[$i]' id='answer[$i]b' value='No'><label for='answer[$i}b'>No</label>";
								break;
								case 9:
									echo "<input type='text' name='answer[$i]' id='answer[$i]'>";
								break;
								case 10:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Morning'>Morning<br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Afternoon'>Afternoon<br>
										  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Evening'>Evening";
								break;
								case 11:
									echo "";
								break;

							}

							// Auto add closing </p> tag
							echo "</p>";

						}

						include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");

						?>

					</div>
				</fieldset>
			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
