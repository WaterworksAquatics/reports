<?php 

	$title = "Self-Evaluation Packet Completed";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<div id="success">
				<div>
					<img src="/images/success.png" alt="Success">
				</div>
				<div>
					<h2>Thank you</h2>
					Your self-evaluation review packet has been submitted successfully!
					<a href="JavaScript:window.close()">Close</a>
				</div>
			</div>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>