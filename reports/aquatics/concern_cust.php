<?php

	session_start();
	session_unset();

	$survey = "Report Customer Concern";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<script>
			$(document).ready(function() {

				$( '#yourLocation' ).hide();//hide location on initial load

				$(document).on( 'change', 'select#yourRegion', function() {

					$( '#yourLocation' ).show();//show location after region is selected
					$( 'option.removeAll' ).remove();
					$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );

					if ( $( '#yourOC' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="Huntington Beach" id="hb">Huntington Beach</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Irvine">Irvine</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Yorba Linda">Yorba Linda</option>' );

					}
					else if ( $( '#yourSDC' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Carlsbad">Carlsbad</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Sorrento Valley">Sorrento Valley</option>' );
					}
					else if ( $( '#yourLAC' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Beverly Hills">Beverly Hills</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Hawthorne">Hawthorne</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Torrance">Torrance</option>' );

					}
					else if ( $( '#yourSGV' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Arcadia">Arcadia</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Pasadena">Pasadena</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Sierra Madre">Sierra Madre</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Alhambra">Alhambra</option>' );

					}
					else if ( $( '#yourAC' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Hayward">Hayward</option>' );

					}
					else if ( $( '#yourSF' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="20th Avenue">20th Avenue</option>' );

					}
					else if ( $( '#yourSV' ).is( ':selected' ) ) {
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="San Jose">San Jose</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Sunnyvale">Sunnyvale</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Almaden">Almaden</option>' );

					}
					else if ( $( '#yourDVR' ).is( ':selected' ) ) {
						$( 'option.removeAll' ).remove();
						$( '#yourLocation' ).append( '<option class="removeAll" value="" disabled selected>Select a Location</option>' );
						$( '#yourLocation' ).append( '<option class="removeAll" value="Highlands Ranch">Highlands Ranch</option>' );

					}
					else if ( $( '#yourdefault' ).is( ':selected' ) ) {
						$( 'option.removeAll' ).hide();//reset every thing
						$( '#yourLocation' ).hide();//reset every thing
					}

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
						<p>
							<label class="q">*Name</label>
							<br>
							<input type='text' name='name' id='name' required>
						</p>
						<div>
							<label class="q">
								*Your Location:
							</label>
						</div>
						<div>
							<p>
								<select id="yourRegion" name="yourRegion" required autocomplete="off">
									<option id="yourdefault" value="" selected disabled>Select a Region</option>
									<option id="yourOC">Orange County</option>
									<option id="yourSDC">San Diego County</option>
									<option id="yourLAC">Los Angeles County</option>
									<option id="yourSGV">San Gabriel Valley</option>
									<option id="yourAC">Alameda County</option>
									<option id="yourSF">San Francisco</option>
									<option id="yourSV">Silicon Valley</option>
									<option id="yourDVR">Denver</option>
								</select>
								<select name="yourLocation" id="yourLocation" required autocomplete="off"></select>
							</p>
						</div>

						<?php include "include/locations.php"; ?>

					</div>
					<div>

					<?php

						//Input your questions here
						$questions = array(
							"*Customer's Full Name",
							"*Customer's Primary Contact Number",
							"Customer's Email Address(if applicable)",
							"*Best Call Back Time(s)",
							"*Customer's Concern"
						);
						$type = array(
							2,
							2,
							1,
							2,
							4
						);

						$_SESSION["questions"] = $questions;
						$_SESSION["type"] = $type;

						// Type 1 =

						for( $i = 0; $i < count( $questions ); $i++ ){

							echo "<p><label class='q'>$questions[$i]</label><br>";

							switch ( $type[$i] ){
								case 0:
									echo "<label class='q'>$questions[$i]</label>";
								break;
								case 1:
									echo "<input type='text' name='answer[$i]' id='answer[$i]'>";
								break;
								case 2:
									echo "<input type='text' name='answer[$i]' id='answer[$i]' required>";
								break;
								case 3:
									echo "<input type='radio' name='answer[$i]' id='answer[$i]' value='Yes'>Yes
										  <br>
										  <input type='radio' name='answer[$i]' id='answer[$i]' value='No'>No
										  <br>
										  Comments:
										  <br>
										  <textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>";
								break;
								case 4:
									echo "<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3' required></textarea>";
								break;
								case 5:
									echo "<select name='answer[$i]' id='answer[$i]' required>
											  <option value='' selected disabled>Select a Department</option>
											  <option value='Office'>Office</option>
											  <option value='Aquatics'>Aquatics</option>
										  </select>";
								break;

							}

							echo "</p>";

						}

					?>

					</div>
				</fieldset>

					<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php");?>

			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
