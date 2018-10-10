<?

	//Send
	if ( $survey == "Marketing Idea" ){
		$to = "tim@waterworksswim.com, stevisupport@waterworksswim.com, anthony@waterworksswim.com";
	}
	else {

		$all = "toddsupport@waterworksswim.com";
		$to = $all;

		// assistant.php
		if( $survey == "Senior Marketing Coordinator Report" ){

			$to .= ", jon@waterworksswim.com";

			if( $location == "Highlands Ranch"){
				$to .= ", anthony@waterworksswim.com, adam@waterworksswim.com";
			}

		}
		elseif( $survey == "Marketing Coordinator Report" ){

			$to .= ", jonsupport@waterworksswim.com, anthony@waterworksswim.com, tim@waterworksswim.com";

			if( $location == "Highlands Ranch"){
				$to .= ", adam@waterworksswim.com";
			}

		}
		elseif( $survey == "Marketing Route Cash Out Report" ){
			$to = ", kim@waterworksswim.com, anthony@waterworksswim.com";
		}
		else {
			$to .= "jonny@maintenance.waterworksswim.com";
		}
	}

?>
