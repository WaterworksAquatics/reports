<?php 

	$title = "Help Center";
	
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
			<p>
				<div class="col">
					<h2>Computer</h2>
						<a href="computer/monitor-signal.php">Monitor says "No Signal"</a>
						<br>
						<a href="report.php">New Report/Survey</a>
						<br>
						<a href="footage.php">Footage</a>
						<br>
						<a href="suit.php">New Suit</a>
						<br>
						<a href="toner.php">Toner Order</a>
				</div>
				<div class="col">
					<h2>Software</h2>
						<a href="software/running-auslogics.php">Running Auslogics Defrag</a>
						<br>
						<a href="software/setup-outlook.php">Setting up Outlook for GoDaddy</a>
						<br>
						<a href="software/installing-teamviewer.php">Installing Teamviewer</a>
						<br>
						<a href="software/configuring-teamviewer.php">Configuring Teamviewer</a>
						<br>
						<a href="software/teamviewer-enduser.php">Using Teamviewer (End User)</a>
						<br>
						<a href="software/teamviewer-tech.php">Using Teamviewer (Tech)</a>
				</div>
				<div class="col">
				</div>
			</p>			
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/footer.php"); ?><!-- #footer -->
		
	</body>
</html>