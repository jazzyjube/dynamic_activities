
<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">

<div class="col-md-12 first-row">
  <div class="col-md-8 container-left">
    
    <div class="row header-row">
      <div class="col-md-4">
        <h1 class="main-title"><?= $title1 ?></h1>
      </div>

      <div class="col-md-8">
        <h1 class="main-date"><?= $weekStart ?> — <?= $weekEnd ?></h1>
      </div>
    </div>
<?php if (count($GLOBAL_DATA) <= 11 ): 

?>

<div class="row">
    <div class="col-md-12 group-list">
      <?php foreach($GLOBAL_DATA as $data): ?>

          <div class="row">
              <p><?= $data["title"] ?></p>
              <?php if (in_array($today, $data["date"])):?>
                <span class="badge"><?= $todayLabel ?></span>
              <?php endif; ?>
           </div>

      <?php endforeach; ?>
    </div>
</div>

<?php else: 

?>

  <div class="row">
    <div class="col-md-6 group-list">
        <?php for($i = 0; $i < 11; $i++): ?>

          <?php if ($GLOBAL_DATA[$i]):?>
            <div class="row">
              <p><?= $GLOBAL_DATA[$i]["title"] ?></p>
               <?php if (in_array($today, $GLOBAL_DATA[$i]["date"])): ?>
                <span class="badge"><?= $todayLabel ?></span>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
    </div>
    <div class="col-md-6 group-list">
        <?php for($i = 11; $i < 22; $i++): ?>
          <?php if ($GLOBAL_DATA[$i]):?>
            <div class="row">
                <p><?= $GLOBAL_DATA[$i]["title"] ?></p>
                 <?php if (in_array($today, $GLOBAL_DATA[$i]["date"])):?>
                  <span class="badge"><?= $todayLabel ?></span>
                <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
    </div>
  </div>

<?php endif; ?>
     
  </div>

  <div class="col-md-4 container-right">
    <div class="row align-center">
        <p class="main-title main-title-right"><?= $title2; ?></p>
    </div>
    <div class="row align-center social-row">
        <p class="social-title">FACEBOOK</p>
        <p class="main-title">@thecamp.provence</p>
    </div>
    <div class="row align-center social-row">
        <p class="social-title">INSTAGRAM</p>
        <p class="main-title">#thecamp365</p>
    </div>
    <div class="row align-center social-row">
        <p class="social-title">TWITTER</p>
        <p class="main-title">@thecampProvence</p>
    </div>
     <div class="row align-center social-row">
        <p class="social-title">LINKEDIN</p>
        <p class="main-title">thecamp</p>
    </div>

  </div>

</div>

<!--<div class="col-md-12 container-bottom">
  <marquee behavior="scroll" direction="left" scrollamount="20">
    CAMPERS : 8 452 campers ont séjourné sur le premier trimestre dans notre camp de base, venus de France et de plus de 25 pays comme le Mexique, le Brésil, la Chine, Israël, la Corée du Sud, l’Égypte, la Tunisie, le Maroc, les États-Unis et l’Inde ! - REPAS : 24 944 repas ont permis d’explorer une alimentation végétale, positive et durable - PASS : 567 explorateurs se sont formés aux enjeux de demain dans le cadre du PASS - PROJETS CRÉATIFS : 7 projets réalisés par 20 jeunes créatifs à l’issue de la résidence collaborative Hive - PROJETS STARTUPS : 10 startups ont bénéficié de 3 mois d’accompagnement au sein du Village by CAAP à thecamp - PROJETS D’INTÉRÊT GÉNÉRAL : 1 collectif créé avec plus de 30 scientifiques internationaux et 20 ONGs. 1 rapport publié sur la réalité de la pollution plastique et ses conséquences. PROJETS D’EXPÉRIMENTATION : 5 projets en cours au sein du Lab pour expérimenter le futur sur le terrain - PROJETS JEUNESSE : 250 élèves de CM1 & CM2 embarqués par Recreation Lab dans l’écriture collaborative d’un livre numérique axé sur le monde de demain.
</marquee>
</div> -->
