<?php 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	session_start();
	session_unset();

	$survey = "Footage Request";
	$_SESSION['survey'] = $survey;
	$process = "send/footage.php";
	$_SESSION['email'] = $email;
	
	$title = $survey;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		  
		<script>
			$(document).ready(function() {
				$("#datepicker").datepicker();
			});
		</script>
		
		<script type="text/javascript" src="../js/addrow.js"></script>

		<style>
			#datepicker {
				width: 175px;
			}
		</style>		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action="<? echo $process; ?>" method="post" autocomplete="off">	
				<fieldset>
					<div>
						<label>* = Field</label>
					</div>
					<div class="col">
						<p>
							<label>*First Name</label>
							<br>
							<input type="text" name="first" required>
						</p>
						<p>
							<label>*Last Name</label>
							<br>
							<input type="text" name="last" required>
						</p>
					</div>
					<div class="col">
						<p>
							<label>*Email Address</label>
							<br>
							<input type="text" name="email" required>
						</p>
					</div>
				</fieldset>
				<fieldset>
					<legend>Details</legend>
					
					<?php include "../reports/office/include/locations.php"; ?>
					
					<p>
						<label>*Date</label>
						<br>
						<input type="text" id="datepicker" name="f_date" required>
					</p>
					<table id="dataTable" class="form">
						<tbody>
							<tr>
								<p>
									<!-- Only to Remove Question(No Val) -->								
									<td>
										<input type="checkbox" name="chk[]">
									</td>
									<td>
										<label>*Timeframe</label>
										<br>
										<input type="text" name="BK_TIME[]" placeholder="ex. 8:00am - 8:30am" required>
									</td>
									<td>
										<label>*Camera(s)</label>
										<br>
										<input type="text" name="BK_cameras[]" placeholder="ex. 1, 10, 13" required>
									</td>
								</p>
							</tr>
						</tbody>
					</table>
					<p style="text-align: center;"> 
						<input type="button" value="Add Timeframe" onClick="addRow('dataTable')" />
					</p>
				</fieldset>
				<fieldset>
					<legend>Comments</legend>
					<textarea name="comments" rows="5"></textarea>
				</fieldset>
			
			<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>
			
			</form>		
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>