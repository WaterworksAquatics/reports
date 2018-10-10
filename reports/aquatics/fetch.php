<?

	// Add default recipients
	include ("emails/all_loc.php");

	// Load specific location list
	include ("emails/concern_cust.php");

	if ($location == "Irvine"){
		include ("emails/irvine.php");
	}
	elseif ($location == "Carlsbad"){
		include ("emails/cb.php");
	}
	elseif ($location == "Huntington Beach"){
		include ("emails/hb.php");
	}
	elseif ($location == "Sierra Madre"){
		include ("emails/sm.php");
	}
	elseif ($location == "Pasadena"){
		include ("emails/pas.php");
	}
	elseif ($location == "San Jose"){
		include ("emails/sj.php");
	}
	elseif ($location == "Highlands Ranch"){
		include ("emails/hr.php");
	}
	elseif( $location == "20th Avenue" || $location == "Sunnyvale" || $location == "Hayward" || $location == "North San Jose" || $location == "Almaden" ){
		include( "emails/lafit/norcal.php" );
	}
	elseif( $location == "Arcadia" || $location == "Alhambra" ){
		include( "emails/lafit/arc_alh.php" );
	}
	elseif( $location == "Torrance" || $location == "Rancho Palos Verdes" ){
		include( "emails/lafit/tor_rpv.php" );
	}
	elseif( $location == "Culver City" ){
		include( "emails/lafit/culvercity.php" );
	}
	elseif( $location == "Sorrento Valley" ){
		include( "emails/lafit/sorrentovalley.php" );
	}
	elseif( $location == "Yorba Linda" || $location == "Anaheim Hills" ){
		include( "emails/lafit/yorlin_ah.php" );
	}
	elseif( $location == "West Covina" ){
		include( "emails/lafit/westcovina.php" );
	}
	else{
		echo "No recipients for requested location. Please select a different location.";
	}

	// Aquatics List vvv
	if( $survey == "Director of Training & Development" ){
		$to = $dirTrainDev;
	}
	elseif( $survey == "Regional Aquatics Manager Report" ){
		$to = $mgrReg;
	}
	elseif( $survey == "Aquatics Manager Daily Report" ){
		$to = $mgr;
	}
	elseif( $survey == "Site Manager Report" ){
		$to = $mgrSite;
	}
	elseif( $survey == "Quality Manager Daily Report" ){
		$to = $mgrQuality;
	}
	elseif($survey == "Lead Trainer Report"){
		$to = $trainLead;
	}
	elseif($survey == "Training Report"){
		$to = $train;
	}
	elseif( $survey == "Senior Instructor Daily Report"){
		$to = $instSr;
	}
	elseif( $survey == "Swim Instructor Report"){
		$to = $inst;
	}
	elseif( $survey == "Instructor Resignation Report"){
		$to = $instResign;
	}
	elseif( $survey == "Senior Deck Guard Report"){
		$to = $deckSr;
	}
	elseif( $survey == "Deck Guard Daily Report"){
		$to = $deck;
	}
	elseif( $survey == "LA Fitness/City Sports Manager Report" ){
		$to = $lafitMgr;
	}
	elseif( $survey == "LA Fitness/City Sports Site Coordinator Report" ){
		$to = $lafitCoorSite;
	}
	elseif( $survey == "LA Fitness/City Sports Lead Instructor Report"){
		$to = $lafitLead;
	}
	elseif( $survey == "LA Fitness/City Sports Instructor Daily Report"){
		$to = $lafitInst;
	}
	// Aquatics List ^^^
	elseif($survey == "Aquatics Trainee Survey"){
		$to = $trainee;
	}
	elseif( $survey == "First Day Shadow Survey"){
		$to = $shadow;
	}
	elseif( $survey == "New Applicant Survey: Play Area Interactions"){
		$to = $playArea;
	}
	elseif( $survey == "Deck Guard Manager Evaluation Report"){
		$to = $evalDeck;
	}
	elseif( $survey == "Mock Drowning Evaluation"){
		$to = $evalMock;
	}
	elseif( $survey == "Maintenance Daily Report"){
		$to = $maint;
	}
	elseif( $survey == "Pool Chemistry Report"){
		$to = $chem;
	}
	elseif( $survey == "Report Customer Concern" ){
		$to = $concern;
	}
	else{
		$to = "stevisupport@waterworksswim.com, jonny@maintenance.waterworksswim.com";
	}

?>
