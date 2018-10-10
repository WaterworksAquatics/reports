<?php 

	$title = "Setting up Outlook";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title; ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<h2>GoDaddy Accounts Only</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Open Outlook
						</li>
						<li>
						Add Account
						</li>
						<li>
						Choose manual setup or additional server types
						</li>
						<ol type=i>
							<li>
							Press Next
							</li>
						</ol>
						<li>
						Select POP or IMAP
						</li>
						<ol type=i>
							<li>
							Press Next
							</li>
						</ol>
						<li>
						Fill in the information
						</li>
						<ol type=i>
							<li>
							Your name: John Doe
							</li>
							<li>
							Email Address: JohnDoe@waterworksswim.com
							</li>
							<li>
							Account type: POP3
							</li>
							<li>
							Incoming: pop.secureserver.net
							</li>
							<li>
							Outgoing: smtpout.secureserver.net
							</li>
							<li>
							Username: JohnDoe@waterworksswim.com
							</li>
							<li>
							Password: Email password
							</li>
							<li>
							Select Remember Password
							</li>
						</ol>
						<li>
						Select more settings.
						</li>
						<ol type=i>
							<li>
							Select Outgoing Server tab
							</li>
							<ol type=a>
								<li>
								Check �My outgoing server (SMTP) requires authentication�
								</li>
								<li>
								Check �Use same settings as my incoming mail server�
								</li>
							</ol>
							<li>
							Select Advanced tab
							</li>
							<ol type=a>
								<li>
								Use 110 for Incoming server (POP3)
								</li>
								<li>
								Use 25 for Outgoing server (SMTP)
								</li>
								<li>
								Leave the rest of the settings.
								</li>
								<li>
								Press OK
								</li>
							</ol>
							<li>
							Press next and let outlook run a test email.
							</li>
						</ol>
						<li>
						Outlook should now be setup.
						</li>
					</ol>
				</p>
			</div>
			<div class="col">
			</div>			
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/footer.php"); ?><!-- #footer -->
		
	</body>
</html>