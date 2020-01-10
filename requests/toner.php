<?php

	session_start();
	session_unset();

	$survey = "Toner/Drum Order Request";
	$_SESSION['survey'] = $survey;
	$process = "send/toner.php";
	$_SESSION['email'] = $email;

	$title = $survey;

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
			<form action="<?php echo $process; ?>" method="post">
				<fieldset>
					<div>
						<label>* = Required Field</label>
					</div>
					<div class="col">
						<p>
							<label class="q">*Name</label>
							<br>
							<input type="text" name="name" required/>
						</p>
						<p>
							<label class="q">*Email</label>
							<br>
							<input type="email" name="email" required/>
						</p>
						<p>
							<label class="q">*Location</label>
							<br>
							<select id="locations" name="location" required>
								<option id="default" value="" disabled selected>Select a Location</option>
								<option id="irvine" value="Irvine">Irvine</option>
								<option id="carlsbad" value="Carlsbad">Carlsbad</option>
								<option id="huntingtonbeach" value="Huntington Beach">Huntington Beach</option>
								<option id="sierramadre" value="Sierra Madre">Sierra Madre</option>
								<option id="pasadena" value="Pasadena">Pasadena</option>
								<option id="sanjose" value="San Jose">San Jose</option>
								<option id="highlandsranch" value="Highlands Ranch">Highlands Ranch</option>
							</select>
						</p>
					</div>
					<div class="col">
						<p>
							<label class="q">*Printer</label>
							<br>
							<span id="select" style="line-height:33px;">Select a location to view printers.</span>
							<select name="printer" id="printer" required></select>
						</p>
						<p>
							<label class="q">*What is needed?</label>
							<br>
							<span style="text-align:center;width:150px;float:left;margin-bottom:1em;">
								<input type="radio" name="TorD" id="toner" value="Toner"><label for="toner">Toner</label>
								<input type="radio" name="TorD" id="drum" value="Drum"><label for="drum">Drum</label>
							</span>
						</p>
					</div>
					<div>
						<p>
							<label class="q">Comments</label>
							<br>
							<label>If your request involves a color printer, please specify the colors needed.</label>
							<br>
							<textarea name="comments" rows="5"></textarea>
						</p>
					</div>

					<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>

				</fieldset>
			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

		<script>

			$(document).ready(function() {

				var printers = $( '#printer' );

				printers.hide();//hide printer on initial

				$( 'select#locations' ).change( function() {

					$('#select').hide();//hide printer on initial
					$('option.remove').remove();
					$('#printer').show();//show printers after location is selected

					var id = $(this).children(":selected").attr("id");
					var irvine = [ 'HP Laserjet M604', 'Brother MFC-L5900DW', 'Brother MFC-8710DW', 'Brother MFC-7460DN', 'Brother MFC-J6920DW', 'Samsung C430W' ];
					var carlsbad = [ 'HP Laserjet M604', 'Brother MFC-L5900DW', 'Brother MFC-8710DW', 'Brother MFC-7460DN', 'Brother MFC-J6920DW', 'Brother HL-3045CN' ];
					var huntingtonbeach = [ 'Brother MFC-L5800DW' ];
					var sierramadre = [ 'Brother MFC-L5800DW' ];
					var pasadena = [ 'HP Laserjet M604', 'Brother HL-3045CN', 'Brother MFC-L5800DW' ];
					var sanjose = [ 'HP Laserjet M604', 'Brother MFC-8710DW', 'Brother HL-L2360DW', 'Brother HL-3170CDW', 'HP Laserjet Pro M203dw' ];
					var highlandsranch = [ 'HP Laserjet M401dne', 'Brother MFC-8710DW', 'Brother HL-3170CDW', 'Brother MFC-J6920DW' ];

					printers.append('<option class="remove" value="" disabled selected>Select a Printer</option>');

					if ( $('#default').is(':selected') ) {
						$('option.remove').hide();//reset every thing
					}
					else {
						var selected = eval(id);
						selected.sort();
						$.each( selected, function( key, printer ){
						printers.append('<option class="remove" value="' + printer + '">' + printer + '</option>');
						});

					}

				});
			});

		</script>
	</body>
</html>
