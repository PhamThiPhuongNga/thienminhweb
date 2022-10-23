<?php
 global $database;
 global $params;
 global $ariacms;
$query = "SELECT c.category, a.*
    FROM e4_posts a
      JOIN (
        SELECT t1.object_id
        FROM e4_term_relationships t1 WHERE t1.term_taxonomy_id = (SELECT id from e4_term_taxonomy WHERE taxonomy = 'category' and url_part='dich-vu' and position = 'home' AND status = 'active' LIMIT 0,1)
        ) d ON a.id = d.object_id
      JOIN (
        SELECT t1.object_id, GROUP_CONCAT(' ', t2.url_part) AS category
        FROM e4_term_relationships t1 
          JOIN e4_term_taxonomy t2 ON t1.term_taxonomy_id = t2.id AND t2.taxonomy = 'category' GROUP BY t1.object_id
        ) c ON a.id = c.object_id
    WHERE a.post_type = 'post'  AND a.post_status = 'active'
    order by a.id desc ";
    //echo $query;
$database->setQuery($query);
$services = $database->loadObjectList();

?>
<!-- service-section -->
        <section class="service-section centred bg-color-1">
            <div class="bg-layer" style="background-image: url(/templates/assets/images/background/service-bg-1.jpg);"></div>
            <div class="auto-container">
                <div class="sec-title">
                    <h2>DỊCH VỤ CỦA CHÚNG TÔI</h2>
                </div>
                <div class="row clearfix">
                   <?php foreach ($services as $key => $service) {
                
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="<?=$service->image?>" alt=""></figure>
                                <div class="text">
                                    <h2><?=$service->title_vi?></h2>
                                </div>
                                <div class="overlay-content">
                                    <div class="inner">
                                        <h3><a href="service-details.html"><?=$service->title_vi?></a></h3>
                                        <p><?=$service->brief_vi?>
                                        </p>
                                        <div class="link"><a href="<?=$ariacms->actual_link?>chi-tiet/<?=$service->url_part?>.html">XEM</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                  
                </div>
            </div>
        </section>
        <!-- service-section end -->