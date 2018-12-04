

  <link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/flipclock.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

	<script src="https://apis.google.com/js/api.js"></script>




	<div class="row" style="margin-top: 150px">
		<img src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>img/logo.png" class="logo">
	</div>


	<div class="row">
		<h1 id="timer-text"></h1>
	</div>

	<div class="row" style="margin-top: 75px;">
		<div class="clock" style="display: inline-block;
    width: 500px;"></div>
	</div>


<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/custom.js"></script>
<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/flipclock.min.js"></script>

		<script type="text/javascript">

			$mins = getUrlParameter('minutes');

			$("#timer-text").text(getUrlParameter('text'));

			if ($mins == undefined) {
				$mins = 45;
			}

			$sec = $mins * 60;

			$(document).ready(function() {

        var clock = new FlipClock($('.clock'), $sec, {

          countdown: true,
        	// The onStop callback
          callbacks: {
		        	stop: function() {

                var audio = new Audio('<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>audio/gong.wav');
                audio.play();

                  $.confirm({
                  title: 'Time is out!',
                  content: 'Do you want to reload the timer ?',
                  buttons: {
                      Yes: function () {
                        location.reload();
                      },
                      No: function () {
                      },
                  }
                });
		        	}
		        }
        });
			});

  		</script>
