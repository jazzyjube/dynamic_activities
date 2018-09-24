
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">


	<div class="col-md-12 grid-element">
			<h1 id="pageTitle" class="bold" style="font-size: 60px;"></h1>
			<p id="pageSubtitle1"></p>
	</div>

	<div id="list">

			<?php foreach ($GLOBAL_DATA as $key => $item) : ?>
			
			<div class="col-md-6 card-item fadeInLeft card-item-{{index}}">
       			<div class="border-row">
	             	<div class="col-md-3 card-img" style="background-image: url(&quot;<?= $item["Image"] ?>&quot;)">
	             		<div class="card-tag card-tag-<?= $item["Tag"] ?>">#<?= $item["Tag"] ?></div>      
			        </div>
			        <div class="col-md-6 card-title">
			        	<?= $item["Title"] ?>
	    			</div>
	    			
	    			<div class="col-md-3 practical-infos">
	    				<div class="row">
    						<p class="card-time"> <?= $item["Date"] ?> </p>
    					</div>
	    				<div class="row">
			        		<p class="card-place"><?= $item["Location"] ?></p>
    					</div>
	    			</div>
				</div>
			</div>

			<?php endforeach; ?>
			
	</div>

<script src="<?php echo $FRONT_RESSOURCES_URL?>js/airtable.browser.js"></script>
<script src="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>js/custom.js"></script>
