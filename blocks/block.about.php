<!-- about-section -->
<?php
global $database;
global $ariacms;
global $params;
$query = "SELECT * FROM e4_web_home WHERE id=85 ";
$database->setQuery($query);
$abouts = $database->loadObjectList(); 
//print_r($abouts);
?>     
  <?php foreach ($abouts as $key => $about) {
      // code...
  ?>
        <section class="about-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
                                <figure class="image"><img src="<?=$about->image?>" alt=""></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title" style="text-align: center;">
                                    <h2>VỀ CHÚNG TÔI</h2>
                                </div>
                                <?=$about->brief_vi?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
        <!-- about-section end -->