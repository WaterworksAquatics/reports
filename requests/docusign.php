<?php
 header("Location: http://reports.waterworksswim.com/requests/onboarding.php");
	session_start();
	session_unset();

	$survey = "Docusign Request";
	$_SESSION['survey'] = $survey;
	$process = "send/docusign.php";
	$_SESSION['email'] = $email;

	$title = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<style>
			.toggle {
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
				<fieldset>
					<div>
						<label>* = Required Field</label>
					</div>
					<p>
						<label class="q">*New Hires Name</label>
						<br>
						<input type="text" name="name" required/>
					</p>
                         <p>
						<label class="q">*Email</label>
						<br>
						<input type="email" name="email" required/>
					</p>
                         <p>
						<label class="q">*Phone Number</label>
						<br>
						<input type="text" name="phone" required/>
					</p>
                         <p>
						<label class="q">*Position</label>
						<br>
						<input type="text" name="position" required/>
					</p>
					<p>
						<label class="q">*Region</label>
						<br>
						<select id="region" required>
							<option value="" id="reset" selected>Select a Region</option>
							<option id="OC">Orange County</option>
							<option id="SDC">San Diego County</option>
							<option id="LAC">Los Angeles County</option>
							<option id="NCA">Northern California</option>
							<option id="DVR">Denver</option>
						</select>
					</p>
					<p>
						<div id="facility" class="toggle">
							<label class="q">*Location(s)</label>
						</div>
					</p>
					<p>
						<label>*Training Track</label>
						<br>
						<select id="track" name="track" required>
							<option value="">Select a Region</option>
							<option value="General Instructor">General Instructor</option>
							<option value="Gym Instructor">Gym Instructor</option>
							<option value="Learn to Swim Under 3">Learn to Swim/Under 3</option>
							<option value="Technique">Technique</option>
						</select>
					</p>
                         <p class="task">
                              <label class="q">*17 years old or under</label>
                              <br>
                              <input type="radio" name="under17" id="under17yes" value="Yes" data-task="toggle" required/><label for="under17yes">Y</label>
                              <input type="radio" name="under17" id="under17no" value="No"><label for="under17yes">N</label>
                         </p>
                         <p class="task toggle">
                              <label class="q">*High School Student</label>
                              <br>
                              <input type="radio" name="hs" id="hsyes" value="Yes" data-task="toggle"><label for="hsyes">Y</label>
                              <input type="radio" name="hs" id="hsno" value="No"><label for="hsno">N</label>
                         </p>
                         <p class="task toggle">
                              <label class="q">*Final Work Permit Received</label>
                              <br>
                              <input type="radio" name="permit" id="permityes" value="Yes"><label for="hsyes">Y</label>
                              <input type="radio" name="permit" id="permitno" value="No" data-task="toggle"><label for="hsno">N</label>
                         </p>
                         <p class="task toggle">
                              <label class="q">*Reason</label>
                              <br>
                              <input type="text" name="exempt">
                         </p>
                         <p>
                              <label class="q">*Seasonal Hire</label>
                              <br>
                              <input type="radio" name="seasonal" id="seasyes" value="Yes" required/><label for="seasyes">Y</label>
                              <input type="radio" name="seasonal" id="seasno" value="No"><label for="seasno">N</label>
                         </p>
                         <p>
                              <label class="q">*Available to start training on</label>
                              <br>
                              <input type="date" name="start" required>
                         </p>
                         <p id="training">
                              <label class="q">*Training Availability</label>
                              <br>
                              <input type="checkbox" name="days[]" id="availM" class="day" value="Mon"><label for="availM">M</label>
						<br>
                              <input type="checkbox" name="days[]" id="availT" class="day" value="Tue"><label for="availT">T</label>
						<br>
                              <input type="checkbox" name="days[]" id="availW" class="day" value="Wed"><label for="availW">W</label>
						<br>
                              <input type="checkbox" name="days[]" id="availTh" class="day" value="Thu"><label for="availTh">Th</label>
						<br>
                              <input type="checkbox" name="days[]" id="availF" class="day" value="Fri"><label for="availF">F</label>
						<br>
                              <input type="checkbox" name="days[]" id="availSa" class="day" value="Sat"><label for="availSa">Sa</label>
						<br>
                              <input type="checkbox" name="days[]" id="availSu" class="day" value="Sun"><label for="availSu">Su</label>
						<br>
                         </p>
					<p>
						<label class="q">Pre-approved Time Off</label>
						<br>
						<textarea name="timeoff" rows="5"></textarea>
					</p>

					<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>

				</fieldset>
			</form>
		</div>
          <script>
               $( function(){

				var task = $( 'p.task input[type="radio"]' );
				var toggle = '.toggle'

                    task.click(function(){
                         if( $( this ).data( 'task' ) == "toggle" ){
                              $( this ).parent().next( toggle ).slideDown().find('input:first').prop('required', true);
                         }
                         else{
                              $( this ).parent().next( toggle ).slideUp().find('input:first').removeAttr('required');
                         }
                    });

				var time = '.time:first';
				var lineB = 'br:first';
				$( '.day' ).click(function(){
					if ( $( this ).is( ':checked' ) ){
						$( this ).nextAll( lineB ).after( "<input type='text' name='times[]' class='time' placeholder='Times Available' required><br>");
					}
					else{
						$( this ).nextAll( time ).remove();
						$( this ).nextAll( lineB ).remove();
					}
                    });

				var facility = $( '#facility' );

				$( 'select#region' ).change( function() {

					$('.location, div#facility br').remove(); //remove previous location select
					facility.show();//show location after region is selected

					var id = $(this).children(":selected").attr("id");
					var OC = [ 'Huntington Beach', 'Irvine', 'Anaheim Hills', 'Yorba Linda' ];
					var SDC = [ 'Carlsbad', 'Sorrento Valley', 'Poway', 'Temecula' ];
					var LAC = [ 'Culver City', 'Torrance', 'Arcadia', 'Alhambra', 'Rancho Palos Verdes', 'West Covina', 'Pasadena', 'Sierra Madre', 'Diamond Bar', 'La Verne' ];
					var NCA = [ '20th Avenue', 'San Jose', 'Brokaw', 'Almaden', 'Sunnyvale', 'Hayward', 'Blossom Hill' ];
					var DVR = [ 'Highlands Ranch' ];

					if ( $('#reset').is(':selected') ) {
						$('.location, #facility').hide();//reset every thing
					}
					else {
						var selected = eval(id);
						selected.sort();
						$.each( selected, function( key, location ){
							var lower = location.toLowerCase();
							var locid = lower.replace( ' ', '_' );
							facility.append( '<br><input type="checkbox" name="locations[]" class="location" id="' + locid + '" value="' + location + '"><label class="location" for="' + locid + '">' + location + '</label>' );
						});
					}
				});
			 });

          </script>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
