<?php

	session_start();

	$title = "View Recipients (Office)";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<style>
			label a {
				color: inherit;
			}
			label a:hover {
				color: black;
				font-size: 11pt;
				font-style: normal !important;
			}
		</style>

	<head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1 class="noprint"><?php echo $title; ?></h1>
			<hr class="noprint">
			<form action='view.php' method='post' class="noprint">
				<fieldset>
					<div>

						<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/office/include/locations.php"); ?>

						<p>
						OR
						</p>
						<p>
							<label class="q">Survey</label>
							<br>
							<select name="survey" required onchange='this.form.submit()'>
								<option value="" disabled selected>Select a Survey</option>
								<option value="Question of the Week">Question of the Week</option>
								<option value="Peer to Peer">Peer to Peer</option>
								<option value="Feedback Survey">Feedback Survey</option>
							</select>
						</p>
					</div>
				</fieldset>
			</form>
			<br>
			<?

				// Start Script
				$location = $_POST['location'];
				$survey = $_POST['survey'];

				// Location selected
				if( !empty( $location ) || !empty( $survey ) ){

					include ( "fetch.php" );

					if( !empty( $location ) ){

						// Display lists + location specific recipients
						// Location
						echo "<fieldset id=\"view\">
								<legend>
									$location
								</legend>
							<div>";
							//Reports

						$reports = array(
									array( "Operations Manager Report", $operMgr, "oper_mgr.php" ),
									array( "Area Experience Manager Report", $areaExpMgr, "area_exp_mgr.php" ),
									array( "Regional Experience Manager Report", $regExpMgr, "region_exp_mgr.php" ),
									array( "Regional Quality Manager Report", $regQualMgr, "region_qual_mgr.php" ),
									array( "Experience Manager Report", $expMgr, "exp_mgr.php" ),
									array( "Customer Relations Manager Report", $custRltnsMgr ),
									array( "Relationship Center Supervisor Report", $rltnCentSup ),
									array( "Senior Shift Lead Report", $shiftLeadSr ),
									array( "Shift Lead Report",  $shiftLead ),
									array( "Lead Trainer Report", $trainLead ),
									array( "Senior Customer Experience Expert Report", $ceeSr ),
									array( "Customer Experience Expert Report", $cee ),
									array( "Relationship Specialist Report", $rltnSpec ),
									array( "Project Specialist Report", $projSpec ),
									array( "Live Chat Specialist Report", $chat ),
									array( "Call Listening Expert Report", $callList ),
									array( "Deck Host Report", $host ),
									array( "Office Trainee Survey", $trainee ),
									array( "Swim Competition Report", $scomp ),
									array( "Event Host Report", $eventHost ),
									array( "Event Coordinator Report", $eventCoor ),
									array( "Community Event Report", $eventComm ),
									array( "Accounting Manager Report", $accMgr ),
									array( "Accounting Associate Report", $acc  ),
									array( "Employee Experience Administrator Report", $eea ),
									array( "Employee Experience Administrative Assistant Report", $eeaa )
						 		);

					}
					elseif( !empty( $survey ) ) {

						// Display lists + location specific recipients
						// Show Surveys
						echo "<fieldset id='view'>
								<legend>
									$survey
								</legend>
							<div>";

						// Question of the Month
						if( $survey == "Question of the Week" ){

							echo "<p style='font-size: 8pt; color:red;font-weight:bold'>
									If a specific location is not listed under the categories, only the recipients listed under \"All Locations\" will be receiving an email.
								</p>";

							$reports = array(
										//Aquatics
										array( "Aquatics", "title" ),
										array( "All Locations", $aqua ),
										array( "Irvine", $aquaIrv ),
										array( "Carlsbad", $aquaCB ),
										array( "Huntington Beach", $aquaHB ),
										array( "Sierra Madre", $aquaSM ),
										array( "Pasadena", $aquaPas ),
										array( "San Jose", $aquaSJ ),
										array( "Highlands Ranch", $aquaHR ),
										array( "Sorrento Valley", $aquaSV ),
										array( "Yorba Linda, Anaheim Hills", $aquaYL ),
										array( "Torrance", $aquaTorHaw ),
										array( "Arcadia", $aquaArc ),
										array( "Alhambra", $aquaAlh ),
										array( "West Covina", $aquaWC ),
										array( "Rancho Palos Verdes", $aquaPV ),
										array( "Sunnyvale, Brokaw, 20th Avenue", $aquaSun20Hay ),
										array( "Office", "title" ),
										array( "All Locations", $off ),
										array( "Irvine", $offIrv ),
										array( "Carlsbad", $offCB ),
										array( "Huntington Beach", $offHB ),
										array( "Sierra Madre", $offSM ),
										array( "Pasadena", $offPas ),
										array( "San Jose", $offSJ ),
										array( "Highlands Ranch", $offHR ),
										array( "Accounting", "title" ),
										array( "All Locations", $acc )
							 		);

						}
						// Peer to Peer
						elseif( $survey == "Peer to Peer" ) {
							echo "<p><label>General</label><br>" . $peer
								. "</p><p><label>Private</label><br>" . $peerP;
						}
						// Feedback Survey
						elseif( $survey == "Feedback Survey" ) {
							echo "<p><label>All Submissions</label><br>" . $feedback
								. "</p><p><label>Office</label><br>" . substr( $feedbackO, 2 )
								. "</p><p><label>Aquatics</label><br>" . substr( $feedbackA, 2 )
								. "</p><p><label>Senior Manager Feedback Survey</label><br>" . substr( $feedbackSr, 2 );
						}
					}

					for( $r = 0; $r < count( $reports ); $r++ ){

						$report = $reports[$r][0];
						$list = $reports[$r][1];

						if ( !empty( $reports[$r][2] ) ){
							$link = $reports[$r][2];
						}

						if ( empty( $list ) || $list == "" ){
							$list = "No Recipients Listed";
						}
						if ( $list == "title" ){
							echo "<h3>" . $report . "</h3>";
						}
						else {

							if ( !in_array( $list, array( $aqua, $off, $maint, $acc, "No Recipients Listed" ) ) && $survey == "Question of the Week" ){
								$list = substr( $list, 2 );
							}

							if ( !empty( $link ) ){
								echo "<p><label><a href=". $link . ">" . $report . "</a></label><br>" . $list . "</p>";
							}
							else {
								if ( $list !== "No Recipients Listed" && $survey == "Question of the Week" ){
									echo "<p><label>" . $report . "</label><br>" . $list . "</p>";
								}
							}

						}

					}

					echo "</div></fieldset>";

				}
				// No location or survey selected
				else{

					echo "Select a survey or location above to view recipients.";

				}

			?>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
