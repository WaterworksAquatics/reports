<?php

	session_start();
	session_unset();

	$survey = "New Report/Survey Request";
	$_SESSION['survey'] = $survey;
	$process = "send/report.php";
	$_SESSION['email'] = $email;

	$title = $survey

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- TinyMCE -->
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector:"textarea#recipients",
				menubar: "format",
				height: "300",
				convert_newlines_to_brs: true,
				protect: [/[\n\f\r\t\v]/g],
				});
		</script>
		<!-- TinyMCE -->

		<script type="text/javascript" src="../js/addrow.js"></script>

		<script>
			$(document).ready(function() {
				$("#datepicker").datepicker();
			});
		</script>

		<style>
			#specify {
				display: none;
			}
		</style>
	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action="<?php echo $process; ?>" method="post">
				<fieldset class="row1">
					<div>
						<label>* = Required Field</label>
					</div>
					<div>
						<p>
							<label class="q">*Name</label>
							<br>
							<input type="text" name="name" required/>
						</p>
						<p>
							<label class="q">*Email Address</label>
							<br>
							<input type="text" name="email" required/>
						</p>
						<p>
							<label class="q">*Report/Survey Name</label>
							<br>
							<input type="text" name="report" required/>
						</p>
					</div>
					<div>
						<p>
							<label class="q">*Locations</label>
							<br>
							<input type="radio" name="locations" class="locations" value="All Locations" required/>
							All Facilities
							<br>
							<input type="radio" name="locations" class="locations" value="Waterworks Aquatics Locations"/>
							Waterworks Aquatics Facilities
							<br>
							<input type="radio" name="locations" class="locations" value="LA Fitness Locations"/>
							LA Fitness Facilities
							<br>
							<input type="radio" name="locations" class="locations" value="specific" id="specific"/>
							Specific Location(s)
							<br>
							<input type="text" name="specific" id="specify" style="margin-left: 23px;">
						</p>
					</div>
				</fieldset>
				<fieldset>
					<legend>Questions</legend>
					<table id="dataTable" class="form">
						<tbody>
							<tr>
								<p>
									<!-- Only to Remove Question(No Val) -->
									<td><input type="checkbox" name="chk[]"></td>
									<td>
										<label class="q">*Question</label>
										<br>
										<input type="text" name="question[]" class="question" required/>
									</td>
									<td>
										<label class="q">*Type</label>
										<br>
										<select name="type[]" required>
											<option value="" disabled selected></option>
											<optgroup label="Text Fields">
												<option value="1">Name/Email/Number</option>
												<option value="10">Phone Number</option>
												<option value="5">Comment</option>
											</optgroup>
											<optgroup label="Radio Buttons">
												<option value="9">Yes/No</option>
												<option value="8">Yes/Sometimes/No</option>
												<option value="2">Yes/No + Comment</option>
												<option value="6">Yes/Thinking/No + Comment</option>
												<option value="3">1-10 + Comment</option>
												<option value="7">Beg/Int/Adv + Comment</option>
												<option value="11">Mor/Aft/Eve + Comment</option>
											</optgroup>
											<optgroup label="Check Boxes">
												<option value="4">Check Boxes(Mon-Sun)</option>
											</optgroup>
										</select>
									</td>
								</p>
							</tr>
						</tbody>
					</table>
					<p style="text-align: center;">
						<input type="button" value="Add Question" onClick="addRow('dataTable')" />
						<input type="button" value="Remove Question" onClick="deleteRow('dataTable')"/>
						<br>
						To remove, select a question first.
					</p>
				</fieldset>
				<fieldset>
					<legend>Details</legend>
					<p>
						<label class="q">*List of Recipients</label>
						<br>
						<fieldset style="width: 70%; margin: auto; margin-bottom: 10px; border: 1px dashed;">
							<p style="font-size: 10pt; margin: 0;">
								<b>Ex:</b>
								<br>
								<label>All Locations</label>
								<br>
								jonny@maintenance.waterworksswim.com, victor@waterworksswim.com
								<br>
								<br>
								<label>Irvine</label>
								<br>
								jon@waterworksswim.com, todd@waterworksswim.com
							</p>
						</fieldset>
						<textarea name="recipients" id="recipients"></textarea>
					</p>
					<p>
						<input type="checkbox" name="nopos" id="survey" value="Family Survey/General Report"><label class="q" for="survey">Select if this is does not need to go on the Reports Page and/or is a Family Survey.</label>
						<div id="stay">
							<label class="q">*Position on Reports Page</label>
							<br>
							<textarea name="position" id="pos" style="width: 49%" rows="5" required/></textarea>
						</div>
					</p>
					<p>
						<label class="q">Comments</label>
						<br>
						<textarea name="comments" style="width: 49%" rows="5"></textarea>
					</p>
				</fieldset>

				<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>

			</form>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

		<script>
		$('#survey').change(function() {
			if($(this).is(':checked')){
				$("#stay").hide();
				$("#pos").removeAttr('required');
			}
			else {
				$("#stay").show();
				$("#pos").prop('required', true);
			}
		});

		$('.locations').change(function() {
			if($('#specific').is(':checked')){
				$("#specify").show().prop('required', true);
			}
			else {
				$("#specify").removeAttr('required').hide();
			}
		});
		</script>
	</body>
</html>
