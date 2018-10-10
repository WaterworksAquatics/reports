<?php 

	$title = "Adding Employee Folder";
	
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
			<h2>Adding Employee Folder to your Desktop</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Right click on desktop.
						</li>
						<ol type="a">
							<li>
							Hover over New.
							</li>
							<li>
							Select Shortcut.
							</li>
						</ol>
						<li>
						Type \\192.168.1.83\Employees into the address bar.
						</li>
						<ol type="a">
							<li>
							Username will be: guest
							</li>
							<li>
							Password will be: wwemployee
							</li>
							<li>
							Dont forget to check Remember Credentials
							</li>
						</ol>
						<li>
						Remane folder to Employee Folder and click Finish.
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