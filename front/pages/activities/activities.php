
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">


<?php if(!empty($GLOBAL_DATA["experiences"])): ?>
	<div class="col-md-1 col-vertical" >
		<div class="vertical-experiences">
			<p>
				<?= $vertical_text1 ?>
			</p>
		</div>

	</div>

	<div class="<?php if(!empty($GLOBAL_DATA["events"])) echo "col-md-5"; else echo "col-md-11"; ?> col-horizontal" >

		<?php if($GLOBAL_DATA["experiences"][0]): ?>

			<div class="next-experience">
				<div class="col-md-5" >
						<h2 class="experience-title"><?= $GLOBAL_DATA["experiences"][0]["title"] ?></h2>
						<h3 class="experience-date">
							<?php if ($today == $GLOBAL_DATA["experiences"][0]["date"]):?>
				                <?= $todayLabel ?>
				              <?php else:?>
				              	<?= $GLOBAL_DATA["experiences"][0]["date"] ?>
				              <?php endif; ?>
						</h3>
						<h3 class="experience-time"><?= $GLOBAL_DATA["experiences"][0]["time"] ?></h3>
						<p class="experience-description"><?= $GLOBAL_DATA["experiences"][0]["description"] ?></p>
						<h5 class="experience-location">@<?= $GLOBAL_DATA["experiences"][0]["location"] ?></h5>
				</div>
				<div class="col-md-7" >
					<img class="experience-picture" src="<?php echo $GLOBAL_DATA["experiences"][0]["picture"] ?>">
				</div>
			</div>
			<?php
			$GLOBAL_FIRST_EXPERIENCES = $GLOBAL_DATA["experiences"][0];
			unset($GLOBAL_DATA["experiences"][0]); ?>
	  	<?php endif; ?>
		<?php if($GLOBAL_DATA["experiences"][1]): ?>
			<div class="col-md-12 header-upcoming" >
					<h4><?= $upcoming_text_experience ?></h4>
			</div>
		<?php endif; ?>
		<?php foreach($GLOBAL_DATA["experiences"] as $data): ?>
			<div class="upcoming-experience">
				<div class="col-md-12 upcoming-experience-row"  >
					<div class="col-md-9" >
						<h4 class="experience-title"><?= $data["title"] ?></h4>
						<h6 class="experience-location">@<?= $data["location"] ?></h6>
					</div>
					<div class="col-md-3" >
						<h5 class="experience-date"><?= $data["date"] ?></h5>
						<h5 class="experience-time"><?= $data["time"] ?></h5>
					</div>
				</div>
			</div>

	     <?php endforeach; ?>


	</div>

<?php endif; ?>


<?php if(!empty($GLOBAL_DATA["events"])): ?>

	<div class="col-md-1 col-vertical" >
		<div class="vertical-events">
			<p>
				<?= $vertical_text2 ?>
			</p>
		</div>
	</div>

	<div class="<?php if(!empty($GLOBAL_FIRST_EXPERIENCES)) echo "col-md-5"; else echo "col-md-11"; ?> col-horizontal" >

		<?php if($GLOBAL_DATA["events"][0]): ?>

			<div class="next-event">
				<div class="col-md-8" >
					<h2 class="event-title"><?= $GLOBAL_DATA["events"][0]->title ?>	</h2>
					<p class="event-description"><?= $GLOBAL_DATA["events"][0]->headline ?></p>
				</div>
				<div class="col-md-4" >
					<h3 class="event-date"><?= $GLOBAL_DATA["events"][0]->event_date_range ?></h3>
				</div>
				<div class="col-md-12" >
					<img src="<?= $GLOBAL_DATA["events"][0]->thumbnail ?>">
				</div>

			</div>

			<?php unset($GLOBAL_DATA["events"][0]); ?>

	  	<?php endif; ?>

		<?php if($GLOBAL_DATA["events"][1]): ?>
			<div class="col-md-12 header-upcoming" >
				<h4><?= $upcoming_text_event ?></h4>
			</div>
		<?php endif; ?>

		<div class="upcoming-events">

			<?php foreach($GLOBAL_DATA["events"] as $data): ?>

					<div class="col-md-12" >
						<div class="col-md-9" >
							<h4 class="event-title"><?= $data->title ?></h4>
							<p class="event-description"><?= $data->headline ?></p>
						</div>
						<div class="col-md-3" >
							<p class="event-date"><?= $data->event_date_range ?></p>
						</div>
					</div>

		     <?php endforeach; ?>
		</div>



	</div>

<?php endif; ?>
