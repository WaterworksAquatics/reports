
<?php

	$title = "Web Forms/Reports";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title;?></title>
		<?php include "include/head.php"; ?><!-- Viewport, Styling, Scripts -->
	</head>
	<body>

		<?php include "header.php"; ?><!-- reports#header -->

		<div id="content">
			<h1><?php echo $title ?></h1>
			<hr>
			<div class="col">
				<!-- Reports -->
				<a href="reports">
					<h2>Daily Reports</h2>
				</a>
				<p>
					<a href="reports#office">Office</a>
					<br>
					<a href="reports#aquatics">Aquatics</a>
					<br>
					<a href="reports#new">New Hire/Trainee Survey</a>
					<br>
					<a href="reports#emp_exp">Accounting</a>
					<br>
					<a href="reports#emp_exp">Employee Experience</a>
					<br>
					<a href="reports#market">Marketing</a>
					<br>
					<a href="reports#maint">Maintenance</a>
					<br>
					<a href="reports#it">IT</a>
					<br>
					<a href="reports#s_comp">Swim Competition</a>
					<br>
					<a href="reports#events">Events</a>
					<br>
					<a href="reports#monthly">Monthly Surveys</a>
					<br>
					<a href="reports#trainee">Trainee</a>
				</p>
			</div>
			<div class="col">
				<!-- Requests -->
				<a href="requests">
					<h2>
						Requests
					</h2>
				</a>
			</div>
		</div>

		<?php include "include/help.php"; ?><!-- IT ISSUES -->

	</body>
</html>
