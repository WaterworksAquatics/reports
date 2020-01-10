<?

// <------------- TALK TO JONNY BEFORE EDITING ------------->
	// Peer to Peer
	$peer = "kelsey.b@waterworksswim.com, brooklyn@waterworksswim.com, shelleysupport@waterworksswim.com";
	$peerP = "toddsupport@waterworksswim.com";

	// Feedback Survey
	$feedback = "toddsupport@waterworksswim.com";

	$feedbackO = ", kim@waterworksswim.com, lia@waterworksswim.com";
	$feedbackA = ", stevisupport@waterworksswim.com, tim@waterworksswim.com";
	$feedbackMIT = ", jonsupport@waterworksswim.com";
	$feedbackSr = ", jonsupport@waterworksswim.com";

	// Employee Hardship Application
	$empHardApp = "toddsupport@waterworksswim.com";

	// Report Party Leads
	$partyLeads = "birthday@waterworksswim.com, toddsupport@waterworksswim.com, kim@waterworksswim.com, leads@waterworksswim.com";

	if( $survey == "Question of the Week" ) {
		include( "emails/qweek.php" );
	}
	elseif( $survey == "Peer to Peer" ) {
		if( $private == "Yes" ) {
				$to = $peerP;
				$email = "PrivatePeerReport@waterworksswim.com";
		}
		else {
			$to = $peer . $peerP;
		}
	}
	elseif( $survey == "Feedback Survey" ) {

		if( $department == "Aquatics" ) {
			$to = $feedback . $feedbackA;
		}
		elseif( $department == "Office" ) {
			$to = $feedback . $feedbackO;
			if ( $location == "Irvine" ){
				$to .= ", caitlin@waterworksswim.com";
			}
		}
		elseif( $department == "Maintenance/IT" ) {
			$to = $feedback . $feedbackMIT;
		}
		else {
			$to = $feedback;
		}
	}
	elseif( $survey == "Senior Manager Feedback Survey" ) {
		$to = $feedback . $feedbackSr;
	}
	//Employee Hardship Application
	elseif( $survey == "Employee Hardship Application" ){
		$to = $empHardApp;
	}

	//Report Party Leads
	elseif( $survey == "Report Party Leads" ){
		$to = $partyLeads;
	}

// <------------- TALK TO JONNY BEFORE EDITING ------------->

	else {

		if( !empty( $location ) ) {

			// Add default recipients
			include( "emails/all_loc.php" );

			// Load specific location list
			if( $location == "Irvine" ) {
				include( "emails/irvine.php" );
			}
			elseif( $location == "Carlsbad" ) {
				include( "emails/cb.php" );
			}
			elseif( $location == "Beverly Hills" ) {
				include( "emails/bh.php" );
			}
			elseif( $location == "Huntington Beach" ) {
				include( "emails/hb.php" );
			}
			elseif( $location == "Sierra Madre" ) {
				include( "emails/sm.php" );
			}
			elseif( $location == "Pasadena" ) {
				include( "emails/pas.php" );
			}
			elseif( $location == "San Jose" ) {
				include( "emails/sj.php" );
			}
			elseif( $location == "Highlands Ranch" ) {
				include( "emails/hr.php" );
			}
			else {
				echo "No recipients for requested location. Please select a different location.";
			}

			//Send
			// Office List vvv
			if( $survey == "Operations Manager Daily Report" ){
				$to = $operMgr;
			}
			elseif( $survey == "Area Experience Manager Report" ){
				$to = $areaExpMgr;
			}
			elseif( $survey == "Regional Experience Manager Report" ){
				$to = $regExpMgr;
			}
			elseif( $survey == "Regional Quality Manager Report" ){
				$to = $regQualMgr;
			}
			elseif( $survey == "Experience Manager Report" ){
				$to = $expMgr;
			}
			elseif( $survey == "Regional Customer Relations Manager Report" ){
				$to = $regCustRltnsMgr;
			}
			elseif( $survey == "Customer Relations Manager Report" ){
				$to = $custRltnsMgr;
			}
			elseif( $survey == "Relationship Center Supervisor Report" ){
				$to = $rltnCentSup;
			}
			elseif( $survey == "Project/Relationship Supervisor Report" ){
				$to = $prjRltnCentSup;
			}
			elseif( $survey == "General Manager Report" ){
				$to = $mgr;
			}
			elseif( $survey == "Senior Shift Lead Report" ){
				$to = $shiftLeadSr;
			}
			elseif( $survey == "Shift Lead Report" ){
				$to = $shiftLead;
			}
			elseif( $survey == "Senior Lead Trainer Report" ){
				$to = $trainLeadSr;
			}
			elseif( $survey == "Lead Trainer Report" ){
				$to = $trainLead;
			}
			elseif( $survey == "Senior Customer Experience Expert Report" ){
				$to = $ceeSr;
			}
			elseif( $survey == "Customer Experience Expert Daily Report" ){
				$to = $cee;
			}
			elseif( $survey == "Relationship Specialist Report" ){
				$to = $rltnSpec;
			}
			elseif( $survey == "Project Specialist Report" ){
				$to = $projSpec;
			}
			elseif( $survey == "Live Chat Specialist Report" ){
				$to = $chat;
			}
			elseif( $survey == "Call Listening Expert Report" ){
				$to = $callList;
			}
			elseif( $survey == "Deck Host Report" ){
				$to = $host;
			}
			// Office List ^^^
			elseif( $survey == "Office Trainee Survey" ){
				$to = $trainee;
			}
			elseif( $survey == "Swim Competition Report" ){
				$to = $scomp;
			}
			elseif( $survey == "Event Host Report" ){
				$to = $eventHost;
			}
			elseif( $survey == "Event Coordinator Report" ){
				$to = $eventCoor;
			}
			elseif( $survey == "Community Event Report" ){
				$to = $eventComm;
			}
			elseif( $survey == "Accounting Manager Daily Report" ){
				$to = $accMgr;
			}
			elseif( $survey == "Accounting Associate Report" ){
				$to = $acc;
			}
			elseif ($survey == "Employee Experience Administrator Report"){
				$to = $eea;
			}
			elseif( $survey == "Employee Experience Administrative Assistant Report" ){
				$to = $eeaa;
			}
			else{
				$to = "lia@waterworksswim.com, jonny@maintenance.waterworksswim.com";
			}

		}

	}
?>
