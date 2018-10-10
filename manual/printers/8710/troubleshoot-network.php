<?php

	$title = "Brother MFC-8710DW - Troubleshoot Network";

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
                    <h3>View Network Status</h3>
                    <ol>
                         <li>Press "Menu"</li>
                         <li>Go to "Network" or press "7".</li>
                         <li>Go to "Wired LAN" or press "1"</li>
                         <li>Go to "Wired Status" or press "3"</li>
                    </ol>
                    <h3>Check IP Address</h3>
                    <ol>
					<li>Press "Menu"</li>
                         <li>Go to "Network" or press "7".</li>
                         <li>Go to "Wired LAN" or press "1"</li>
                         <li>Go to "IP Address", or press "1"</li>
                    </ol>
				<h3 style="color:red;">NOTE:</h3>
				<p>
					Before continuing with any with any of the sections below, try the following to restart the printer:
					<ul>
						<li>
							Locate the power switch on the right-hand side, near the back. Flip it to the off positions for 10 seconds, then turn it back on.
						</li>
						<li>
							Disconnect all the cables on the back of the printer, leave it off for 10 seconds, and reconnect everything. Make sure all the cables are seated properly.
						</li>
					</ul>
				</p>
                    <h3>Enable Wired LAN</h3>
                    <ol>
                         <li>Press "Menu"</li>
                         <li>Go to "Network" or press "7".</li>
                         <li>Go to "Wired LAN" or press "1"</li>
                         <li>Go to "Wired Enable" or press "6"</li>
                         <li>"On"</li>
                    </ol>
                    <h3>Reset Wired LAN</h3>
                    <ol>
                         <li>Press "Menu"</li>
                         <li>Go to "Network" or press "7".</li>
                         <li>Go to "Wired LAN" or press "1"</li>
                         <li>Go to "Set to Default" or press "5"</li>
                         <li>"Reset" or press "1"</li>
                    </ol>
                    <h3>Change IP Address (Only if Instructed)</h3>
                    <ol>
					<li>Press "Menu"</li>
                         <li>Go to "Network" or press "7".</li>
                         <li>Go to "Wired LAN" or press "1"</li>
                         <li>Go to "IP Address", or press "1"</li>
					<li>Type in the address given or that is labeled on the printer
						<ul>
							EX: 192.168.1.1 > 192.168.001.001
						</ul>
					</li>
                    </ol>
               </p>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
