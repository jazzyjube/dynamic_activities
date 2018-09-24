<link rel="stylesheet" href="<?php echo $FRONT_PAGES_URL."/".$GLOBAL_PAGE."/"?>css/style.css">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="background: #000;" data-interval="4000">
      <?php  foreach ($GLOBAL_DATA as $key => $data) : ?>
                <?php if ($data["images"]) : ?>
                              <?php foreach ($data["images"] as $item) :    ?>             
                                        <?php if ($item) : ?>
                                                <div class="item " >
                                                  <img src="<?php echo $item; ?>">
                                                  <div class="carousel-caption">
                                                    <h3><?php echo $data["title"]; ?></h3>
                                                  </div>
                                                </div>
                                           <?php endif; ?>
                                <?php endforeach; ?>
                 <?php endif; ?>
       <?php endforeach; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script type="text/javascript">
        
$(window).on("load", function() {
   $('.carousel .item').first().addClass("active");
    $('.carousel').carousel();

});

    
</script>
