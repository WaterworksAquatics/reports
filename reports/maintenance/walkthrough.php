<?php

	session_start();
	session_unset();

	$survey = "Maintenance Morning Walkthrough";
	$_SESSION['survey'] = $survey;
	$title = $survey;
	$process = "send.php";

	$loc = $_REQUEST['loc'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<script>
			$(document).ready(function() {
				$(".datepicker").datepicker({
					dateFormat: 'MM d, yy ',
					minDate: -1
				});
			});
		</script>

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<form action='<?php echo $process; ?>' method='post'>
				<fieldset>
					<div>

<?php

						include "../office/include/locations.php";

?>

						<p>
							<label class="q">*Name</label><br>
							<input type="text" name="name" required>
						</p>
						<p>
							<label class="q">*Date</label><br>
							<input class="datepicker" name="forDate" required>
						</p>
					</div>
					<div>

<?php

						if ( !empty( $loc ) ){
							include "questions/" . $loc . ".php";
						}
						else {
							include "questions/general.php";
						}

						include "generate.php"

?>

					</div>
				</fieldset>

				<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");?>

			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->

		<script>
			$(document).ready( function(){

			<?php
				if ( in_array( $loc, array( "irv", "hb" ) ) ) {
					if ( $loc == "irv" ){
			?>
						$('option[value="Irvine"]').prop( 'selected', true );
			<?php
					}
					elseif ( $loc == "hb" ){
			?>
					$('option[value="Huntington Beach"]').prop( 'selected', true );
			<?php
					}
			?>
				$('select[name="location"]').parent().hide();
			<?php
				}
		 	?>



			});
		</script>
	</body>
</html>
