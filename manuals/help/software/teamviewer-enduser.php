<?php 

	$title = "Teamviewer";
	
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
			<h2>End User</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Open TeamViewer
						</li>
						<ol>
							<li type=i>
							Left click on the TeamViewer icon. A blue square around a white circle with a two sided blue arrow inside.
							</li>
						</ol>
						<li>
						Give the tech Your ID
						</li>
						<li>
						If needed give the tech your Password
						</li>
						<li>
						Sit back and let the tech work.
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