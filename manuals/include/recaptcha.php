<?php if($title != "Email Request"){
	?>
	<div class="g-recaptcha" data-sitekey="6Lc0ZhoTAAAAAKA4LIF9qD4Bg-vfyMa9UYCQ-1FC" data-callback="capenable" data-expired-callback="capdisable"></div>
	<div><input id="submit" type='submit' name='Submit' value='Submit' disabled="disabled"></div>
<?php }
	else{ ?>
	<div style="clear: both; margin: 5px 0; float: right;" class="g-recaptcha" data-sitekey="6Lc0ZhoTAAAAAKA4LIF9qD4Bg-vfyMa9UYCQ-1FC" data-callback="capenable" data-expired-callback="capdisable"></div>
	<div style="clear: both; margin: 5px 10px; float: right;">
		<input id="submit" class="submit" type="submit" value="Submit &raquo;" disabled="disabled"/>
	</div>
<?php }?>