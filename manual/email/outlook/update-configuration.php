<?php

	$title = "Update Outlook Email Configuration";

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
				<h3 style="color:red;">NOTE:</h3>
				<p>
					Please make sure that you are able to log onto <a style="text-decoration: underline;" href="https://sso.secureserver.net/?app=email&realm=pass">GoDaddy</a> and that your password is current.
				</p>
				<p>
					If your password was recently reset, please use the following link to update: <a style="text-decoration: underline;" href="http://reports.waterworksswim.com/manual/email/godaddy/update-password.php">Update Password in GoDaddy</a>
				</p>
                    <h3>Update Password</h3>
                    <ol>
                         <li>Go to "FILE"</li>
                         <li>Go to "Info" on the left-hand menu</li>
                         <li>Click on "Account Settings" and "Account Settings" in the drop-down</li>
                         <li>Double-click on the account that needs to be updated</li>
                         <li>Enter the correct password in the password field</li>
                         <li>Click on "Test Account Settings" to verify that the password is correct.
                              <ul>
                                   <li>The arrow next to "Log onto incoming mail server (POP3)" and "Send test e-mail message" should change to a green check mark. Window can be closed afterwards</li>
                              </ul>
                         </li>
                         <li>Click on "Next >"</li>
                         <li>Outlook will verify again. Window can be closed afterwards</li>
                         <li>Close "Account Settings" window</li>
                         <li>Run "Send/Receive" function to process emails</li>
                    </ol>
                    <h3>Change Length of Time to Keep Emails</h3>
                    <ol>
                         <li>Go to "FILE"</li>
                         <li>Go to "Info" on the left-hand menu</li>
                         <li>Click on "Account Settings" and "Account Settings" in the drop-down</li>
                         <li>Double-click on the account that needs to be updated</li>
                         <li>Click on "More Settings..."</li>
                         <li>Go to the "Advanced" tab</li>
                         <li>Under the "Delivery" section, change the value for "days"</li>
                         <li>Click "OK"</li>
                         <li>Click on "Next >" in the "Change Account" window</li><li>Outlook will verify again. Window can be closed afterwards</li>
                         <li>Close "Account Settings" window</li>
                         <li>Run "Send/Receive" function to process emails</li>
                    </ol>
               </p>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
