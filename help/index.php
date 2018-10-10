<?php

	$title = "Help Center";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms - <?php echo $title; ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<style>
			.insts {
				display: none;
				margin-left: 20px;
			}

				.insts h3 {
					color: rgb(0, 62, 114);
				}
		</style>
	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<p>
				<div class="col">
					<h2>Computer</h2>
						<a href="computer/monitor-signal.php">Monitor says "No Signal"</a>
						<br>
						<a href="report.php">New Report/Survey</a>
						<br>
						<a href="footage.php">Footage</a>
						<br>
						<a href="suit.php">New Suit</a>
						<br>
						<a href="toner.php">Toner Order</a>
				</div>
				<div class="col">
					<h2>Software</h2>
						<a href="software/running-auslogics.php">Running Auslogics Defrag</a>
						<br>
						<a href="software/setup-outlook.php">Setting up Outlook for GoDaddy</a>
						<br>
						<a href="software/installing-teamviewer.php">Installing Teamviewer</a>
						<br>
						<a href="software/configuring-teamviewer.php">Configuring Teamviewer</a>
						<br>
						<a href="software/teamviewer-enduser.php">Using Teamviewer (End User)</a>
						<br>
						<a href="software/teamviewer-tech.php">Using Teamviewer (Tech)</a>
				</div>
				<div class="col">
					<?php

						$directories = glob( '*' , GLOB_ONLYDIR);

						foreach ( $directories as $directory ){

							$count1 = 
							$count2 =
							$count3 =
							$count4 =

							$section = ucwords( $directory );
							$files = glob( $directory.'/*.php' );

							echo "<h2>".$section."</h2><p>";

							if ( empty( $files ) ){
								echo "No manuals found for this section.";
							}
							else {
								foreach ( $files as $file ){

									$filelabel = str_replace( array( $directory.'/', '.php', '-' ), ' ', $file );
									$id = str_replace( ' ', '', $filelabel );
									$label = ucwords( $filelabel );

									echo '<h3 class="instTitle">'.$label.'</h3>
										<div class="insts">';
											include $file;
									echo	'</div>';

								}
							}

							echo "</p>";

						}
					?>
				</div>
			</p>
		</div>
		<script>
			$( function (){
				var title = '.instTitle';
				var instructions = '.insts';
				$(title).click(function(){
					$(this).next(instructions).slideToggle();
				});
			});
		</script>
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
