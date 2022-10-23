<!-- news-section -->
<?php
 global $database;
 global $ariacms;
 global $params;
 $query = "SELECT c.groups, a.*
        FROM e4_posts a
            JOIN (
                SELECT t1.object_id, GROUP_CONCAT(' ', t2.id) AS groups
                    FROM e4_term_relationships t1 
                    JOIN ( SELECT id from e4_term_taxonomy WHERE taxonomy = 'category' AND position = 'home' AND status = 'active' and url_part='tin-tuc' ) t2 ON t1.term_taxonomy_id = t2.id GROUP BY t1.object_id
                ) c ON a.id = c.object_id
        WHERE a.post_type = 'post' AND a.post_status = 'active' 
        order by a.id desc limit 0,2
        ";
$database->setQuery($query);
$news = $database->loadObjectList();
//echo $query; die();
?>
        <section class="news-section">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>TIN TỨC</h2>
                </div>
                <div class="row clearfix">
                    <?php foreach ($news as $key => $new) {
                     
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="blog-details.html"><img src="<?=$new->image?>" alt=""></a>
                                        </figure>
                                      <!--   <div class="post-date">
                                            <h4><?=$ariacms->unixToDate($new->post_created,"/")?></h4>
                                            <p>AUG</p>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box">
                                        <ul class="post-info clearfix">
                                            <li><i class="far fa-folder-open"></i><a href="index.html">Safety</a></li>
                                            <!-- <li><i class="far fa-comments"></i><a href="index.html"> 02 Comments</a></li> -->
                                            <li><?=$ariacms->unixToDate($new->post_created,"/")?></li>
                                        </ul>
                                        <h2><a href="<?=$ariacms->actual_link?>chi-tiet/<?=$new->url_part?>.html"><?=$new->title_vi?></h2>
                                        <p><?=$ariacms->textLimit($new->brief_vi,20)?></p>
                                        <div class="link"><a href="<?=$ariacms->actual_link?>chi-tiet/<?=$new->url_part?>.html"><i class="flaticon-right-arrow"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
               
                </div>
            </div>
        </section>
        <!-- news-section end -->