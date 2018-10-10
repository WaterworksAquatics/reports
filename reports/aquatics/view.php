<?php

	session_start();

	$title = "View Recipients (Aquatics)";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	<head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1 class="noprint"><?php echo $title; ?></h1>
			<hr class="noprint">
			<form action='' method='post' class="noprint">
				<fieldset>
					<div>

						<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/aquatics/include/locations.php"); ?>

					</div>
				</fieldset>
			</form>
			<br>
			<?

				// Start Script
				$location = $_POST['location'];

				// Determine if Main location
				if ( in_array( $location, array( "Irvine", "Carlsbad", "Beverly Hills", "Huntington Beach", "Sierra Madre", "Pasadena", "San Jose", "Highlands Ranch" ) ) ) {
					$type = "Main";
				}
				// LA Fitness or CSC location
				else{
					$type = "Sub";
				}

				// Location selected
				if ( !empty( $location ) ){

					include ( "fetch.php" );

					// Display lists + location specific recipients
					// Location
					echo "<fieldset id=\"view\">
							<legend>
								$location
							</legend>
						<div>";

					//Reports
					echo "<p><label>Customer Concerns</label><br>" . $concern . "</p>
						<p><label>Director of Training & Development</label><br>" . $dirTrainDev . "</p>
						<p><label>Regional Aquatics Manager Report</label><br>" . $mgrReg . "</p>
						<p><label>Aquatics Manager Report</label><br>" . $mgr . "</p>
						<p><label>Site Manager Report</label><br>" . $mgrSite . "</p>
						<p><label>Quality Manager Report</label><br>" . $mgrQuality . "</p>
						<p><label>Lead Trainer Report</label><br>" . $trainLead . "</p>
						<p><label>Training Report</label><br>" . $train . "</p>
						<p><label>Senior Instructor Daily Report</label><br>" . $instSr . "</p>";
					if ( $type == "Main" ) :
					echo "<p><label>Swim Instructor Report</label><br>" . $inst . "</p>";
					endif;
					echo "<p><label>Instructor Resignation Report</label><br>" . $instResign . "</p>";
					if ( $type == "Main" ) :
					echo "<p><label>Senior Deck Guard Report</label><br>" . $deckSr . "</p>
						<p><label>Deck Guard Daily Report</label><br>" . $deck . "</p>";
					endif;
					if ( $type == "Sub" || $location = "Beverly Hills" ) :
					echo "<p><label>LA Fitness/City Sports Manager Report</label><br>" . $lafitMgr . "</p>
						<p><label>LA Fitness/City Sports Site Coordinator Report</label><br>" . $lafitCoorSite . "</p>
						<p><label>LA Fitness/City Sports Lead Instructor Report</label><br>" . $lafitLead . "</p>
						<p><label>LA Fitness/City Sports Instructor Daily Report</label><br>" . $lafitInst . "</p>";
					endif;
					if ( $type == "Main" ) :
					echo "<p><label>Deck Guard Manager Evaluation Report</label><br>" . $evalDeck . "</p>
						<p><label>Mock Drowning Evaluation</label><br>" . $evalMock . "</p>";
					endif;
					echo "<p><label>Aquatics Trainee Survey</label><br>" . $trainee . "</p>";
					if ( $type == "Main" ) :
					echo "<p><label>First Day Shadow Survey</label><br>" . $shadow . "</p>
						<p><label>New Applicant Survey: Play Area Interactions</label><br>" . $playArea . "</p>";
					endif;
					echo "<p><label>Maintenance Daily Report</label><br>" . $maint . "</p>";
					if ( $type == "Main" ) :
					echo "<p><label>Pool Chemistry Report</label><br>" . $chem . "</p>";
					endif;

					echo "</div></fieldset>";

				}
				// No location selected
				else{

					echo "Please select a location.";

				}

			?>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
