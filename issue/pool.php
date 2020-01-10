<?php
	header("Location: http://reports.waterworksswim.com/issue/maint.php");



	$survey = "Pool Issue";
	$_SESSION['survey'] = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $survey ?></title>
		<link rel="stylesheet" type="text/css" href="form.css" />

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	<head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<form action="send.php" method="post" name="contact_form" class="contact_form">
				<fieldset>
					<ul>
						<li>
							 <h2>Report a Pool Issue</h2>
							 <span class="required_notification">* Required Field</span>
						</li>
						<li>
							<label class="q" for="Fname">*First Name:</label>
							<input type="text" name="Fname" required/>
						</li>
						<li>
							<label class="q" for="Lname">*Last Name</label>
							<input type="text" name="Lname" required/>
						</li>
						<li>
							<label class="q" for="email">Email:</label>
							<input type="text" name="email" id='email'/>
						</li>
						<li>
							<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/office/include/locations.php"); ?>
						</li>
						<li>
							<label class="q" for="pool">*Pool</label>
							<select name="pool" required >
								<option value=""></option>
								<option value="Small Pool">Small Pool</option>
								<option value="Lap Pool">Lap Pool</option>
								<option value="Pool 3">Pool 3</option>
								<option value="Outdoor Pool">Outdoor Pool</option>
							</select>
							<span class="form_hint">Pool 3 and Outdoor Pool apply to Irvine ONLY</span>
						</li>
						<li>
							<h4>
								To ensure that your issue is resolved in a timely manner, please provide as many specific details as possible.
							</h4>
						</li>
						<li>
							<label class="q" for="message">What is the issue?</label>
							<textarea name="message" cols="40" rows="6" required></textarea>
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
