<?php 

	$title = "Speakers not working";
	
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
			<h2>Check Cables</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Make sure your system has speakers.
						</li>
						<li>
						Make sure your speakers are plugged in.
						</li>
							<ol type="a">
								<li>
								Should be plugged into the computers green port.
								</li>
								<li>
								Sometimes there is a small headphones icon next to the port.
								</li>
							</ol>
						<li>
						Check the computers audio is not muted
						</li>
							<ol type="a">
								<li>
								Speaker icon can be found in the lower right of the desktop
								</li>
								<li>
								Muted speakers will have a line through them
								</li>
							</ol>
						<li>
						Restart computer and check
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