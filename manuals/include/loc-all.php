<p>
	<label class="q">
		*
		<?php
			if ( $survey == "Report Customer Concern" ){
		?>
			Customer's
		<?php } ?>	
		Location:
	</label>
	<br>
	<select id="region" name="region" required>
		<option data-region="default" id="default" value="">Select a Region</option> 
		<option data-region="OC">Orange County</option> 
		<option data-region="SDC">San Diego County</option> 
		<option data-region="LAC">Los Angeles County</option>
		<option data-region="SGV">San Gabriel Valley</option>
		<option data-region="AC">Alameda County</option>
		<option data-region="SF">San Francisco</option>
		<option data-region="SV">Silicon Valley</option>
		<option data-region="DVR" class="main">Denver</option>
	</select>
<?
	if( $title == "View Recipients (Aquatics)" || $title == "View Recipients (Office)" ){
?>
		<select id="location"  name="location" required onchange="this.form.submit()">
<? } 
	else {
		?>
		<select id="location" name="location" required>
	<?php } ?>
			<option value="" disabled selected>Select a Location</option>
			<!-- Orange County -->
			<option class="OC main" value="Huntington Beach">Huntington Beach</option>
			<option class="OC main" value="Irvine">Irvine</option>
			<option class="OC laf" value="Yorba Linda">Yorba Linda</option>
			<!-- San Diego County -->
			<option class="SDC main" value="Carlsbad">Carlsbad</option>
			<option class="SDC laf" value="Sorrento Valley">Sorrento Valley</option>
			<!-- Los Angeles County -->
			<option class="LAC main" value="Beverly Hills">Beverly Hills</option>
			<option class="LAC laf" value="Hawthorne">Hawthorne</option>
			<option class="LAC laf" value="Torrance">Torrance</option>
			<option class="LAC laf" value="Palos Verdes">Palos Verdes</option>
			<!-- San Gabriel Valley -->
			<option class="SGV laf" value="Alhambra">Alhambra</option>
			<option class="SGV laf" value="Arcadia">Arcadia</option>
			<option class="SGV main" value="Pasadena">Pasadena</option>
			<option class="SGV main" value="Sierra Madre">Sierra Madre</option>
			<!-- Alameda County -->
			<option class="AC laf" value="Hayward">Hayward</option>
			<!-- San Francisco -->
			<option class="SF laf" value="20th Avenue">20th Avenue</option>
			<!-- Silicon Valley -->
			<option class="SV laf" value="Almaden">Almaden</option>
			<option class="SV main" value="San Jose">San Jose</option>
			<option class="SV laf" value="Sunnyvale">Sunnyvale</option>
			<!-- Denver -->
			<option class="DVR main" value="Highlands Ranch">Highlands Ranch</option>
		</select>
	</p>
</div>