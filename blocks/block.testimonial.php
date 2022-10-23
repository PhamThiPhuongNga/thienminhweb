<?php

 global $database;

 global $ariacms;

 global $params;

 $query = "SELECT c.groups, a.*

        FROM e4_posts a

            JOIN (

                SELECT t1.object_id, GROUP_CONCAT(' ', t2.id) AS groups

                    FROM e4_term_relationships t1 

                    JOIN ( SELECT id from e4_term_taxonomy WHERE taxonomy = 'category' AND position = 'home' AND status = 'active' and url_part='du-an' ) t2 ON t1.term_taxonomy_id = t2.id GROUP BY t1.object_id

                ) c ON a.id = c.object_id

        WHERE a.post_type = 'post' AND a.post_status = 'active' 

        order by a.id desc limit 0,4

        ";

$database->setQuery($query);

$duans = $database->loadObjectList();

//echo $query; die();

?>

<section class="testimonial-section">

            <div class="pattern-layer" style="background-image: url(/templates/assets/images/shape/pattern-2.png);"></div>

            <div class="large-container">

                <div class="sec-title centred">

                    <h2>DỰ ÁN TIÊU BIỂU</h2>

                </div>

                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">  

                   <?php foreach ($duans as $key => $duan) {

                       // code...

                    ?> 

                    <div class="testimonial-block-one">

                        <div class="inner-box">



                            <figure class="image-box">

                                <a href="<?=$ariacms->actualink?>chi-tiet/<?=$duan->url_part?>.html" class="">

                                    <img src="<?=$duan->image?>" alt="" height="370" width="470">

                                </a>

                            </figure>

                            <div class="author-info">

                                <h4><?=$duan->title_vi?></h4>

                                <span class="designation"><?=$duan->brief_vi?></span>

                            </div>

                        </div>

                    </div>

                <?php } ?>

               

                </div>

            </div>

        </section>

        <!-- testimonial-section end -->