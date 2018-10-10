<?php

	$title = "Request Submitted";
	$resub = $_GET['url'];

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
					<img src="/images/success.png">
				</div>
				<div>
					<h2>Thank you</h2>
					Your request has been submitted successfully!
					<br>
					We will contact you shortly.
				</div>
			</div>

				<? if( !empty( $resub ) ){ ?>
				<p style="text-align: center; margin-top: 3em;">
					<label>
						Want to submit this report again?
					</label>
					<br>
					<a href="<? echo $resub ?>"><button style="margin-top: 1em;">Go Back</button></a>
				</p>
				<? } ?>

		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
