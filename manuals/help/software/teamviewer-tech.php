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
			<h2>Tech End</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Acquire the Partner ID for the computer you are connecting to.
						</li>
						<li>
						Press connect to partner
						</li>
						<ol>
							<li>
							If prompted get the TeamViewer password for the computer.
							</li>
						</ol>
						<li>
						When finished with the connection use the tool bar on top to close TeamViewer
						</li>
						<ol>
							<li>
							The X on the tool bar closes it.
							</li>
						</ol>
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