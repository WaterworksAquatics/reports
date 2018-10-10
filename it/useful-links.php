<?php

	$title = "Useful Links";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reports - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
               <p>
               <?php

                    $links = array(
                         array( "Internal", "title" ),
                         array( "IT Daily Report", "/reports/it/daily.php" ),
                         array( "Facility Evaluation Report", "/reports/it/fac_eval.php" ),
                         array( "Camera Server Evaluation Report", "/reports/it/cam_eval.php" ),
                         array( "View Recipients (Office)", "/reports/office/view.php" ),
                         array( "View Recipients (Aquatics)", "/reports/aquatics/view.php" ),
                         array( "Email Account Request", "/requests/email.php" ),
                         array( "Generate Instructor Bios (Use for Website)", "generate-bios.php" ),
                         array( "Google Drive", "title" ),
                         array( "Facility Maps", "https://drive.google.com/open?id=0Bxr5PQxsBmBxTDV6ZFFhQ3Jfdk0" ),
                         array( "Printers/Toners Reference", "https://docs.google.com/spreadsheets/d/1715zwIgP-Z_PMeUpw8xojnpjc6J0f5kuj93nzKqK2sk/edit#gid=0" ),
                         array( "Camera Server IP Cheatsheet", "https://docs.google.com/spreadsheets/d/1KorIb52QIOXTeZYAA1kUxAQSbJtPKqAZCZMjRFBKRME/edit#gid=249944032" ),
                         array( "Inventory - Irvine", "https://docs.google.com/spreadsheets/d/1YlwjLWB1gYrocJwbrM0ZzCOcVKMqTQcM5xv_CAobFuc/edit#gid=1845273600" ),
                         array( "Utilities/Programs for Website", "title" ),
                         array( "Photo Resizing - GIMP", "https://www.gimp.org/" ),
                         array( "Photo & Price Sheet Uploading - Cloudberry Lab", "https://www.cloudberrylab.com/" ),
                         array( "FTP Access - Filezilla Client", "https://filezilla-project.org/download.php?type=client" ),
                         array( "Code Editor - Atom", "https://atom.io/" ),
                         array( "Price Sheet Splitter - PDFSplit!", "http://www.splitpdf.com/" ),
                    );

                    for ( $i = 0; $i < count( $links ); $i++ ){

                         $report = $links[$i][0];
                         $link = $links[$i][1];

                         if ( $link == "title"){
                              echo '<h2>' . $report . '</h2>';
                         }
                         else {
                              echo '<a href="' . $link . '">'. $report .'</a><br>';
                         }

                    }
               ?>
               </p>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
