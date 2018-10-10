<?php 

	$title = "Configuring TeamViewer";
	
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
			<h2>Configuring</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Open TeamViewer
						</li>
						<li>
						Use Extras drop down menu
						</li>
						<li>
						Select Options
						</li>
						<li>
						Change your display name
						</li>
							<ol type="a">
								<li>
								Location of the computer (Front desk, Break room, Office manager)
								</li>
								<li>
								Personal computers use your name
								</li>
							</ol>						
						<li>
						Select Security from the left column
						</li>
							<ol type="a">
								<li>
								Enter the password and confirm password
								</li>
							</ol>
						<li>
						Select Advanced from the left column
						</li>
							<ol type="a">
								<li>
								Click Show Advanced Options
								</li>
							</ol>
						<li>
						Under Advanced Settings for Connections to this Computer
						</li>
							<ol type="a">
								<li>
								Check Automatically minimize local TeamViewer Panel
								</li>
							</ol>
						<li>
						Under More
						</li>
							<ol type="a">
								<li>
								Check Disable TeamViewer shutdown
								</li>
							</ol>
						<li>
						Under TeamViewer Options
						</li>
							<ol type="a">
								<li>
								Check Changes require administrative rights on this computer
								</li>
							</ol>
						<li>
						Press OK
						</li>
						<li>
						Close TeamViewer
						</li>
							<ol type="a">
								<li>
								It will minimize to the hidden Icons in the lower right corner.
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