
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">

<div>
	<div class="col-md-6" style="padding-left: 40px">
		<div class="row">
			<h1 id="pageTitle" class="bold" style="font-size: 60px;"></h1>
			<p id="pageSubtitle1"></p>
			<p id="pageSubtitle2" class="bold"></p>
			<p id="pageSubtitle3" class="bold"></p>
		</div>

		<div class="row monday"></div>
		<div class="row tuesday"></div>
		<div class="row wednesday"></div>
		<div class="row thursday"></div>
		<div class="row friday"></div>
		
	</div>
	<div class="col-md-6" style="padding-right: 0">

		<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
		
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox"></div>

		</div>
		
	</div>
</div>
<script src="<?php echo $FRONT_RESSOURCES_URL?>js/airtable.browser.js"></script>
<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/custom.js"></script>