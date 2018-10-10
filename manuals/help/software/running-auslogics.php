<?php 

	$title = "Auslogics";
	
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
			<h2>Running Defrag</h2>
			<div class="col">
				<p>
					<ol>
						<li>
						Log into Admin account
						</li>
						<li>
						Open Auslogics
						</li>
						<li>
						Select C: drive
						</li>
						<li>
						If SSD does <u>not</u> have a check mark continue to next step otherwise close program. 
						</li>
						<li>
						Choose your Defrag
						</li>
						<ol>
							<li>
							<b>Defrag</b> will be quick but only does the basics
							</li>
							<li>
							 <b>Defrag & Optimize</b> will take longer but do more
							</li>
						</ol>
						<li>
						Once defrag is complete close program
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