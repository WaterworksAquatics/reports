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

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<!-- Redirect Prompt
			<div id="redirect" class="instloc">
				<p>
					You are now being redirected
				</p>
				<br>
			</div> -->
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
							<input type='text' name='email2' id='email2' required>
						</p>

						<?php include "../aquatics/include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
									"1. Please outline any problems (e.g. facility, parent and/or employee, etc.) you encountered today. What have you done to resolve them?  If you are unsure, what are your proposed solution(s)? ",
									"2. What did you do today to improve lesson retention and lesson growth? What impact did you see as a result of your actions?",
									"3. What did you do today increase your weekend programming enrollment?",
									"4. Are there any instructors that need improvement (teaching, wrap ups, first impressions, etc.)?  Were you able to coach them on these improvement areas?",
									"5. Did you learn anything new ab out a family today (FORD)?",
									"6. How many shadow requests did you receive from your team today? How did you encourage your team to fill out more?",
									"7. Do you have any additional questions or concerns you would like to share?"
								);

						$type = array(
									4,
									4,
									4,
									4,
									4,
									4,
									4
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

		<!-- <script>
			$(document).ready(function() {

				$('#redirect').hide();//hide location on initial load

				$(document).on('change', 'select#location', function() {

					//Main Facilities
					if ( $('#hb').is(':selected') ) {

						$('form').hide();
						$('#redirect').show();

						var timer = setTimeout(function() {
							window.location = "http://reports.waterworksswim.com/reports/aquatics/mgr_site_hb.php";
						}, 2500);

					}

				});

			});
		</script> -->

	</body>
</html>
