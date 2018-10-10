<?php

	$title = "Update Password in GoDaddy";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<p>
                    <h3>GoDaddy</h3>
                    <ol>
                         <li>Log onto <a style="text-decoration: underline;" href="https://sso.secureserver.net/?app=email&realm=pass">GoDaddy</a> with the provided password</li>
                         <li>Under the "Email" tab, click "Settings", and Select "Personal Settings"</li>
                         <li>In the "Current Password" field, enter the provided password</li>
                         <li>In the "New Password" and "Confirm New Password" fields, enter your new password</li>
                         <li>Click "OK"</li>
                    </ol>
				<h3 style="color:red;">NOTE:</h3>
				<p>
					Password changes can take up to 30 minutes to take effect. After that time, log out, and try out your new password.
				</p>
                    <h3>Outlook</h3>
                    <p>
                         If using Outlook, please visit the following page to update your password: <a style="text-decoration: underline;" href="http://reports.waterworksswim.com/manual/email/outlook/add-or-update-configuration.php">Update Outlook Email Configuration</a>
                    </p>
               </p>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
