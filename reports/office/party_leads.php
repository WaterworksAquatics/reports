<?php

	session_start();
	session_unset();

	$survey = "Report Party Leads";
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
							<label class="q">*Your Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
										array( "*Family's Full Name", 2 ),
										array( "*Primary Contact Number", 7 ),
										array( "Email Address (if applicable)", 6 ),
										array( "*What location are they interested in for their party?", 0 ),
										array( "What date or date range are they interested in for their party?", 1 ),
										array( "Birthday person's, or guest of honor's, name", 1 ),
										array( "Special Requests/Other Comments", 4 )
						);

						$_SESSION["questions"] = $questions;

						for( $i = 0; $i < count( $_SESSION["questions"] ); $i++ ) {

							echo "<p><label class='q'>" . $questions[$i][0] . "</label><br>";

							switch ( $questions[$i][1] ){
								// Locations Drop Down
								case 0:
									echo "<select name='answer[$i]' required>
											<option value='' disabled selected>Select a Location</option>
											<option value='Beverly Hills'>Beverly Hills</option>
											<option value='Carlsbad'>Carlsbad</option>
											<option value='Highlands Ranch'>Highlands Ranch</option>
											<option value='Huntington Beach'>Huntington Beach</option>
											<option value='Irvine'>Irvine</option>
											<option value='Pasadena'>Pasadena</option>
											<option value='San Jose'>San Jose</option>
											<option value='Sierra Madre'>Sierra Madre</option>
										</select>";
								break;
								// Short Answer
								case 1:
									echo "<input type='text' name='answer[$i]'>";
								break;
								// Short Answer (Required)
								case 2:
									echo "<input type='text' name='answer[$i]' required>";
								break;
								// Yes/No + Comment
								case 3:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]' value='Yes'>Yes
										  <br>
										  <input type='radio' name='answer[$i]' id='answer[$i]' value='No'>No
										  <br>
										  Comments:
										  <br>
										  <textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>";
								break;
								// Comment
								case 4:
									echo "<textarea name='comments[$i]' cols='50' rows='3'></textarea>";
								break;
								// Department (Required)
								case 5:
									echo "<select name='answer[$i]' required>
											  <option value='' selected disabled>Select a Department</option>
											  <option value='Office'>Office</option>
											  <option value='Aquatics'>Aquatics</option>
										  </select>";
								break;
								case 6:
									echo "<input type='email' name='answer[$i]'>";
								break;
								// Telephone Number
								case 7:
									echo "<input type='tel' name='answer[$i]' minlength='10' maxlength='13' required>";
								break;

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

		<script>
			<!--$("input[name='answer[1]']").submit(function() {
				$(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d)+$/, "$1.$2.$3"));
			});-->
		</script>

	</body>
</html>
