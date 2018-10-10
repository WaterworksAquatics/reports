<?php

	session_start();
	session_unset();

	$survey = "Maintenance Issue";
	$_SESSION['survey'] = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $survey ?></title>
		<link rel="stylesheet" type="text/css" href="form.css" />

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<style>
			#loc-dd div:nth-child(2){
				text-align: center;
			}
			#loc-dd div:nth-child(2) select {
				clear: both;
			}
		</style>
	<head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<form action="send.php" method="post" name="contact_form" class="contact_form">
				<fieldset>
					<ul>
						<li>
							 <h2>Report a Maintenance Issue</h2>
							 <span class="required_notification">* Denotes Required Field</span>
						</li>
						<li>
							<label class="q" for="Fname">*First Name:</label>
							<input type="text" name="Fname" id='Fname' required/>
						</li>
						<li>
							<label class="q" for="Lname">*Last Name</label>
							<input type="text" name="Lname" id='Lname' required/>
						</li>
						<li>
							<label class="q" for="email">Email:</label>
							<input type="text" name="email" id='email'/>
						</li>
						<li>
							<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/office/include/locations.php"); ?>
						</li>
						<li>
							<h4>
								To ensure that your issue is resolved in a timely manner, please provide as many specific details as possible.
							</h4>
						</li>
						<li>
							<label class="q" for="message">What is the issue?</label>
							<textarea id='message' name="message" cols="40" rows="6" required></textarea>
						</li>
					</ul>
				</fieldset>

				<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");?>

			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
