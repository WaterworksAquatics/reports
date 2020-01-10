<?php

	session_start();
	session_unset();

	$survey = "Question of the Week";
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
							<label class="q">Department</label>
							<br>
							<select id='department' name='department' required>
								<option value=""></option>
								<option value="Aquatics">Aquatics</option>
								<option value="Office">Office</option>
								<option value="Accounting">Accounting</option>
							</select>
						</p>
					</div>
					<div>

					<?php

						$questions = array(
							/** array( "Question", type ) **/
							array( "1. How can I support you to do the best work of your life here at Waterworks?", 15 ),
							array( "2. Other than your manager, is there any one person or persons that you turn to for wisdom/advice here at Waterworks? Who specifically? How have they supported you?", 15 ),
							array( "Additional Comments:", 4 )
						);

						$_SESSION["questions"] = $questions;

						for($i = 0; $i < count($questions); $i++){

							$question = $questions[$i][0];
							$type = $questions[$i][1];
							$_SESSION['type'] = $type;

							echo "<p><label class='q'>$question</label><br>";

							// Add question input
							switch ( $type ){

								case 0:
									echo "<input type='text' name='answer[$i]' id='answer[$i]'>";
								break;
								case 1:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]' value='Waterworks'>Waterworks<br>
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='Home'>Home
										 <br>
										 Comments:
										 <br>
										 <textarea name='comments[$i]' id='comments[$i]' cols='60' rows='5'></textarea>";
								break;
								case 2:
									echo "<div id=\"agree\">
											<div>
												<label>Strongly<br>Disagree</label><br>
												<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Disagree' required>
											</div>
											<div>
												<label>Somewhat<br>Disagree</label><br>
												<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Disagree'>
											</div>
											<div>
												<label>Neutral</label><br><br>
												<input type='radio' name='answer[$i]' id='answer[$i]' value='Neutral'>
											</div>
											<div>
												<label>Somewhat<br>Agree</label><br>
												<input type='radio' name='answer[$i]' id='answer[$i]' value='Somewhat Agree'>
											</div>
											<div>
												<label>Strongly<br>Agree</label><br>
												<input type='radio' name='answer[$i]' id='answer[$i]' value='Strongly Agree'>
											</div>
										</div>
										<br>
										<label>Comments:</label><br>
										<textarea name='comments[$i]' id='comments[$i]' rows=5'></textarea>";
								break;
								case 3:
									echo "<input type='checkbox' name='days[]' value='Monday' required>Monday<br>
										 <input type='checkbox' name='days[]' value='Tuesday'>Tuesday<br>
										 <input type='checkbox' name='days[]' value='Wednesday'>Wednesday<br>
										 <input type='checkbox' name='days[]' value='Thursday'>Thursday<br>
										 <input type='checkbox' name='days[]' value='Friday'>Friday<br>
										 <input type='checkbox' name='days[]' value='Saturday'>Saturday<br>
										 <input type='checkbox' name='days[]' value='Sunday'>Sunday";
								case 4:
									echo "<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3' ></textarea>";
								break;
								case 5:
									echo "<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3'></textarea>";
								break;
								case 6:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Intermediate'>Intermediate<br>
										 <input type='checkbox' name='answer[$i]' id='answer[$i]' value='Advanced'>Advanced";
								break;
								case 7:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Yes'>Yes<br>
									    	 <input type='checkbox' name='answer[$i]' id='answer[$i]' value='Sometimes'>Sometimes<br>
										 <input type='checkbox' name='answer[$i]' id='answer[$i]' value='Never'>Never";
								break;
								case 8:
									echo "<select class='dd-short' name='answer[$i]' id='answer[$i]' required>
											<option value=''></option>
											<option value='Yes'>Yes</option>
											<option value='No'>No</option>
							 			 </select>";
								break;
								case 10:
									echo "<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Morning'>Morning<br>
										 <input type='checkbox' name='answer[$i]' id='answer[$i]' value='Evening'>Evening";
								break;
								case 11:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]' value='1' required> 1 |
									 	 <input type='radio' name='answer[$i]' id='answer[$i]' value='2' required> 2 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='3' required> 3 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='4' required> 4 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='5' required> 5 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='6' required> 6 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='7' required> 7 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='8' required> 8 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='9' required> 9 |
										 <input type='radio' name='answer[$i]' id='answer[$i]' value='10' required> 10";
								break;
								case 15:
									echo "<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3' required ></textarea>";
							}

							echo "</p>";

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
