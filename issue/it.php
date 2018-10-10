<?php

	session_start();
	session_unset();

	$survey = "IT Issue";
	$_SESSION['survey'] = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $survey ?></title>
		<link rel="stylesheet" type="text/css" href="form.css" />

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	<head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			 <h1>Report an IT Issue</h1>
		
			<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSchKj4HIFhG9VFdv6yfGXsyyj8oehCT8H0TierO7CRk0lUCTw/viewform?embedded=true" width="100%" height="800" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>
