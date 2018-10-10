<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="robots" content="noindex">

<!-- Styling -->
<?php if($title == "Web Forms/Reports"){ ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php }
	else { ?>
		<link rel="stylesheet" type="text/css" href="/style.css">
<?php } ?>

<!-- Scripts -->
<script type="text/javascript" src="/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/recaptcha.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php

	if( strpos( $_SERVER['REQUEST_URI'], 'view' ) ){

?>

	<style>
		header > div {
			max-width: 1250px;
		}
		#content {
			max-width: 1250px;
		}

			#content p {
				font-size: 10pt;
			}

			#view p:hover {
				font-weight: bold;
			}

		h3 {
			color: rgb(35, 51, 97);
		}
	</style>

<?php

	}

?>
