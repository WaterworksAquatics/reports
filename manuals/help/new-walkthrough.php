<?php 

	$title = "New Walkthroughs";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title; ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<h2>Adding new walkthroughs to help section</h2>
			<div class="col">
				<p>
					<ol> <!-- Numbered Ordered List -->
						<li>
						This will be Number 1
						</li>
						<li>
						This will be Number 2
						</li>
						<li>
						This will be Number 3
						</li>
						<li>
						Alphabetically ordered list, lowercase
						</li>
							<ol type="a"> <!-- lower case alphabet -->
								<li>
								This will be 'a'
								</li>
								<li>
								This will be 'b'
								</li>
							</ol>						
						<li>
						Alphabetically ordered list, uppercase
						</li>
							<ol type="A"> <!-- upper case alphabet -->
								<li>
								This will be 'A'
								</li>
								<li>
								This will be 'B'
								</li>
							</ol>
						<li>
						Roman numbers, lowercase
						</li>
							<ol type="i">
								<li>
								This will be 'i'
								</li>
								<li>
								This will be 'ii'
								</li>
							</ol>
						<li>
						Roman numbers, uppercase 
						</li>
							<ol type="I">
								<li>
								This will be 'I'
								</li>
								<li>
								This will be 'II'
								</li>
							</ol>
					</ol>
				</p>
			</div>
			<div class="col">
			</div>			
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/reports/footer.php"); ?><!-- #footer -->
		
	</body>
</html>