<?php

	$concern = "toddsupport@waterworksswim.com, kim@waterworksswim.com, lia@waterworksswim.com, alicia@waterworksswim.com, timsupport@waterworksswim.com, experience@waterworksswim.com, victor@waterworksswim.com";

	switch ( $location ){
		case "Irvine": case "Huntington Beach": case "Yorba Linda": case "Anaheim Hills":
			$concern .= ", caitlin@waterworksswim.com, cris@waterworkssswim.com, rebecca.h@waterworksswim.com";
		break;
		case "Carlsbad": case "Sorrento Valley": case "Highlands Ranch": case "Beverly Hills":
			$concern .= ", caitlin@waterworksswim.com, rebecca.h@waterworksswim.com";
		break;
		case "Pasadena": case "Torrance": case "Alhambra": case "West Covina":
		case "Rancho Palos Verdes": case "Arcadia": case "Sierra Madre": case "Culver City":
			$concern .= ", jason@waterworksswim.com";
		break;
		case "San Jose": case "Almaden": case "Brokaw":
		case "20th Avenue": case "Hayward": case "Sunnyvale":
			$concern .= ", desiree@waterworksswim.com";
		break;
	}
