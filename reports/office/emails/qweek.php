<?php

	//------------ Aquatics ------------//
	// All Locations
	$aqua = "jonsupport@waterworksswim.com, toddsupport@waterworksswim.com, stevisupport@waterworksswim.com, timsupport@waterworksswim.com";
	/**
	// Irvine
	$aquaIrv = ", justinsupport@waterworksswim.com";
	// Carlsbad
	$aquaCB = ", justinsupport@waterworksswim.com";
	// Huntington Beach
	$aquaHB = ", david@waterworksswim.com";
	// Sierra Madre
	$aquaSM = ", ally@waterworksswim.com, scarlet@waterworksswim.com";
	// Pasadena
	$aquaPas = ", scarlet@waterworksswim.com, ally@waterworksswim.com";
	// San Jose
	$aquaSJ = ", lia@waterworksswim.com, michelle@waterworksswim.com";
	// Highlands Ranch
	$aquaHR = ", adam@waterworksswim.com, michelle.n@waterworksswim.com";
	// Sorrento Valley
	$aquaSV = ", justinsupport@waterworksswim.com";
	// Yorba Linda
	$aquaYL = ", justinsupport@waterworksswim.com, ally@waterworksswim.com";
	// Torrance, Hawthorne
	$aquaTorHaw = ", ally@waterworksswim.com";
	// Arcadia
	$aquaArc = ", cameron@waterworksswim.com, ally@waterworksswim.com";
	// Alhambra
	$aquaAlh = ", ally@waterworksswim.com";
	// West Covina
	$aquaWC = ", ally@waterworksswim.com";
	// Rancho Palos Verdes
	$aquaPV = ", ally@waterworksswim.com";
	// Sunnyvale, 20th Avenue, Hayward
	$aquaSun20Hay = ", lia@waterworksswim.com, michelle@waterworksswim.com";
	**/

	//------------ Office ------------//
	// All Locations
	$off = "jonsupport@waterworksswim.com, toddsupport@waterworksswim.com, kim@waterworksswim.com, lia@waterworksswim.com, timsupport@waterworksswim.com";
	/**
	// Irvine
	$offIrv = ", marcos@waterworksswim.com";
	// Carlsbad
	$offCB = ", caitlin@waterworksswim.com";
	// Beverly Hills
	$offBH = ", adam@waterworksswim.com, michelle.n@waterworksswim.com";
	// Huntington Beach
	$offHB = ", marcos@waterworksswim.com";
	// Sierra Madre
	$offSM = ", jason@waterworksswim.com";
	// Pasadena
	$offPas = ", jason@waterworksswim.com";
	// San Jose
	$offSJ = ", alicia@waterworksswim.com";
	// Highlands Ranch
	$offHR = "";
	**/

	//------------ Maintenance ------------//
	// All Locations
	//$maint = "jonsupport@waterworksswim.com, toddsupport@waterworksswim.com, victor@waterworksswim.com";
	$maint = "jonny@maintenance.waterworksswim.com";

	//------------ Accounting ------------//
	$acc = " jonsupport@waterworksswim.com, toddsupport@waterworksswim.com, kevin@waterworksswim.com";

	if ( $department == "Aquatics" ){
		$to = $aqua;
		/**
		if( $location == "Irvine" ){
				$to = $aqua . $aquaIrv;
			}
			elseif( $location == "Carlsbad" ){
				$to = $aqua . $aquaCB;
			}
			elseif( $location == "Huntington Beach" ){
				$to = $aqua . $aquaHB;
			}
			elseif( $location == "Beverly Hills" ){
				$to = $aqua . $aquaBH;
			}
			elseif( $location == "Sierra Madre" ){
				$to = $aqua . $aquaSM;
			}
			elseif( $location == "Pasadena" ){
				$to = $aqua . $aquaPas;
			}
			elseif( $location == "San Jose" ){
				$to = $aqua . $aquaSJ;
			}
			elseif( $location == "Highlands Ranch" ){
				$to = $aqua . $aquaHR;
			}
			elseif( $location == "Sorrento Valley" ){
				$to = $aqua . $aquaSV;
			}
			elseif( $location == "Yorba Linda" ){
				$to = $aqua . $aquaYL;
			}
			elseif( $location == "Torrance" || $location == "Hawthorne" ){
				$to = $aqua . $aquaTorHaw;
			}
			elseif( $location == "Arcadia" ){
				$to = $aqua . $aquaArc;
			}
			elseif( $location == "Alhambra" ){
				$to = $aqua . $aquaAlh;
			}
			elseif( $location == "Sunnyvale" || $location == "20th Avenue" || $location == "Hayward" ){
				$to = $aqua . $aquaSun20Hay;
			}
		**/
	}
	elseif ( $department == "Office" ){
		$to = $off;
		/**
		if( $location == "Irvine" ){
				$to = $off . $offIrv;
			}
			elseif( $location == "Carlsbad" ){
				$to = $off . $offCB;
			}
			elseif( $location == "Huntington Beach" ){
				$to = $off . $offHB;
			}
			elseif( $location == "Beverly Hills" ){
				$to = $off . $offBH;
			}
			elseif( $location == "Sierra Madre" ){
				$to = $off . $offSM;
			}
			elseif( $location == "Pasadena" ){
				$to = $off . $offPas;
			}
			elseif( $location == "San Jose" ){
				$to = $off . $offSJ;
			}
			elseif( $location == "Highlands Ranch" ){
				$to = $off . $offHR;
			}
		**/
	}
	elseif ( $department == "Maintenance/IT" ){
		$to = $maint;
	}
	elseif ( $department == "Accounting" ){
		$to = $acc;
	}
	else{
		$to = "toddsupport@waterworksswim.com, jonny@maintenance.waterworksswim.com";
	}
