<div>
	<label class="q">
		*
		<?php
			if ( $survey == "Report Customer Concern" ){
		?>
			Customer's
		<?php } ?>
		Location:
	</label>
	<p>
		<select id="region" name="region" required>
			<option id="default" value="">Select a Region</option>
			<option id="OC">Orange County</option>
			<option id="SDC">San Diego County</option>
			<option id="LAC">Los Angeles County</option>
			<option id="SGV">San Gabriel Valley</option>
			<option id="AC">Alameda County</option>
			<option id="SF">San Francisco</option>
			<option id="SV">Silicon Valley</option>
			<option id="DVR">Denver</option>
		</select>
	<?php
		if( $title == "View Recipients (Aquatics)" ){
	?>
		<select name="location" id="location" required onchange="this.form.submit()"></select>
	<?php }
	else {
		?>
		<select name="location" id="location" required></select>
	<?php } ?>
	</p>
</div>
