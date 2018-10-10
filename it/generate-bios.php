<?php

	session_start();
	session_unset();

	$survey = "Generate Instructor Bios";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$root = $_SERVER['DOCUMENT_ROOT'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ( $root."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	</head>
	<body>

		<?php include ( $root."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<form action='' method='post'>
				<fieldset>
					<p>
						<label class="q">Location</label>
						<br>
						<select name="type">
							<option value="">Main</option>
							<option value="LAFit/">LA Fitness/CSC</option>
						</select>
						<input type='text' name='location' placeholder="Folder Name in Cloudberry" required>
					</p>
					<div id="instructors">
						<p>
							<label class="q">Name</label>
							<br>
							<input type='text' name='name[]' required>
						</p>
						<p>
							<label class="q">City</label>
							<br>
							<input type='text' name='city[]' required>
						</p>
						<p style="color:red;font-weight:bold;font-size:8pt;">
							NOTE:
							<br>
							After copying and pasting the bio, replace all apostrophes. If not done, the entire bio and any instructors after will not appear.
						</p>
						<p>
							<label class="q">Bio</label>
							<br>
							<textarea name="bio[]" rows="5" cols="30" required></textarea>
						</p>
						<p>
							<input type="checkbox" name="nopic[]" id="nopic" value="No"><label class="q" for="nopic">No Picture</label>
						</p>
						<p>
							<label class="q">Additional Skills</label>
							<br>
							<input type='text' name='skills[]'>
						</p>
					</div>
					<input type="button" onclick="addBio()" value="Add Instructor">
				</fieldset>

				<input id="submit" type="submit" name="Submit" value="Submit">

			</form>

			<?php

				$type = $_POST[ 'type' ];
				$location = $_POST[ 'location' ];
				$names = $_POST[ 'name' ];
				$cities = $_POST[ 'city' ];
				$bios = $_POST[ 'bio' ];
				$nopics = $_POST[ 'nopic' ];
				$skillsets = $_POST[ 'skills' ];

				$desktop = array();
				$mobile = array();

				for( $i = 0; $i < count( $names ); $i++ ) {

					$name = $names[$i];
					$city = $cities[$i];
					$bio = str_replace( "’", "'", $bios[$i] );
					$nopic = $nopics[$i];
					$skills = $skillsets[$i];

					if ( $nopic != "No"){
						$pic = "http://images3.waterworksswim.com/images/instructors/" . $type . $location . "/" . strtolower( $name ) . "1.jpg";
					}
					else {
						$pic = "http://images3.waterworksswim.com/images/instructors/soon.jpg";
					}

					$instD = '<!-- ' . $name . ' -->
							<table style="margin: 0px auto; width: 669px;">
								<tbody>
									<tr>
										<td style="vertical-align: middle; width: 114px">
											<img src="' . $pic . '" alt="' . $name .'" />
										</td>
										<td style="width: 555px">
											<div style="margin-left: -10px; color: #316595;">
												<strong>
													' . $name . '
												</strong>
												<br/>
												' . $city . '
											</div>
											<div>
												' . $bio;
							if ( !empty( $skills ) ){
							$instD .=				'<br>
												<br>
												<span style="color: #316595;">
													Additional Skills: ' . $skills . '
												</span>';
							}
							$instD .=			'</div>
										</td>
									</tr>
								</tbody>
							</table>
							<br>';

					array_push( $desktop, $instD );

					$instM = '<!-- ' . $name . ' -->
							<div class="instructor">
								<img src="' . $pic . '" alt="' . $name .'" />
								<br>
								<b>
								  ' . $name . '
								</b>
								<br>
								  ' . $city . '
								<br>
								<div class="showbio">
									<img src="http://images3.waterworksswim.com/images/Mobile/content/readbio1.png" class="bioimg">
									<div class="bio">
										' . $bio;
					if ( !empty( $skills ) ){
					$instM .=				'<br>
										<br>
										<span style="color: #316595;">
											Additional Skills: ' . $skills . '
										</span>';
					}
					$instM .=			'</div>
								</div>
							</div>';

					array_push( $mobile, $instM );

				}
			?>

			<hr>
			<div>
				<h2>Desktop</h2>

				<?php

					if ( !empty( $desktop ) ){

						foreach ( $desktop as $desktopI ){

							echo '<p>' . htmlspecialchars( $desktopI ) . '</p>';

						}
					}
					else {
						echo '<p>Enter instructor information to begin</p>';
					}

				?>

			</div>
			<div>
				<h2>Mobile</h2>

				<?php

					if ( !empty( $mobile ) ){

						foreach ( $mobile as $mobileI ){

							echo '<p>' . htmlspecialchars( $mobileI ) . '</p>';

						}
					}
					else {
						echo '<p>Enter instructor information to begin</p>';
					}

				?>

			</div>

		</div>
		<script>
			function addBio(){
				var instructors = $( '#instructors' );

				instructors.append( "<hr><p><label class='q'>Name</label><br><input type='text' name='name[]' required></p>" +
								"<p><label class='q'>City</label><br><input type='text' name='city[]' required></p>" +
								"<p><label class='q'>Bio</label><br><textarea name='bio[]' rows='5' cols='30' required></textarea></p>" +
								"<p><input type='checkbox' name='nopic[]' id='nopic' value='No'><label class='q' for='nopic'>No Picture</label><p>" +
								"<p><label class='q'>Additional Skills</label><br><input type='text' name='skills[]'></p>");

			}
		</script>
	</body>
</html>
