<?php 

	$title = "Request Forms"
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<p>
				<a href="email.php">Create/Delete Email</a>
				<br>
				<a href="report.php">New Report/Survey</a>
				<br>
				<a href="footage.php">Footage</a>
				<br>
				<a href="suit.php">New Suit</a>
				<br>
				<a href="toner.php">Toner Order</a>
			</p>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUE -->
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>