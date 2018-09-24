

  <link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/flipclock.css">


	<script src="https://apis.google.com/js/api.js"></script>
	


	
	<div class="row" style="margin-top: 250px">
		<img src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>img/logo.png" class="logo">
	</div>
	

	<div class="row">
		<h1>Prochaine visite guidée</h1>
	</div>

	<div class="row" style="margin-top: 75px;">
		<div class="clock" style="display: inline-block;
    width: 500px;"></div>		
	</div>




		


<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/custom.js"></script>
<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/flipclock.min.js"></script>

		<script type="text/javascript">
		
			$mins = getUrlParameter('minutes');

			if ($mins == undefined) {
				$mins = 45;
			}

			$sec = $mins * 60;

			$(document).ready(function() {
				var clock = $('.clock').FlipClock($sec, {
					countdown: true
				});
			});


		</script>

		