<?php 

	$title = "Computer keeps restarting";
	
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
				<h2>Windows 7</h2>
					<p>
						<ol>
							<li>
							 Restart computer
							</li>
							<li>
							 Press f8 before the windows logo appears
							</li>
							<li>
							Choose safe mode from the Advanced Boot Options
							</li>
						</ol>
					</p>
			</div>
			<div class="col">
				<h2>Windows 8, 8.1, 10</h2>
					<p>
						<ol>
							<li>
							Hold Shift and restart computer
							</li>
							<li>
							Press Troubleshoot
							</li>
							<li>
							Choose Advanced Options
							</li>
							<li>
							Start-up Settings
							</li>
							<li>
							Restart
							</li>
							<li>
							Choose safe mode
							</li>
						</ol>
					</p>
			</div>
			</p>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/footer.php"); ?><!-- #footer -->
		
	</body>
</html>