<?php
global $database;
global $ariacms;
global $params;
global $ariaConfig_template;
global $analytics_code;
     
?>
<!DOCTYPE html>
   <html lang="en">
   <?=$ariacms->getBlock("head"); ?>
   <body>

    <div class="boxed_wrapper"> 

      <?=$ariacms->getBlock("header");?>
       <section class="page-title centred" style="background-image: url(/templates/assets/images/background/page-title.jpg);">
            <div class="overlay-bg"></div>
            <div class="pattern-layer"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1><?=$category[title_vi]?></h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?=$ariacms->actual_link?>">Trang chủ</a></li>
                        <li><?=$category[title_vi]?></li>
                    </ul>
                </div>
            </div>
        </section>


           <section class="blog-grid mt-5">
            <div class="auto-container">
                <div class="text mb-3">
                    <h4 class=""style="left:0; font-weight: 500; font-size:20px; "><?=$category[title_vi]?></h4>
                </div>
                <div class="row clearfix">
                    <?php foreach ($news as $key => $new) {
                        // code...
                    ?>
                    <div class="col-lg-4 col-md-12 col-sm-12 news-block">
                        <div class="news-block-one pad-0 wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><img src="<?=$new->image?>" alt=""width="100%" height="250px"></a></figure>
                                </div>
                                <div class="content-box">
                                    <p><?=$new->title_vi?></p>
                                    <span><?=$new->brief_vi?>  </span>
                                    <div class="link"><a href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><i class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php } ?>
                  
                </div>
                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <!-- <li><a href="blog-grid.html"><i class="far fa-long-arrow-left"></i></a></li>
                        <li><a href="blog-grid.html" class="active">01</a></li>
                        <li><a href="blog-grid.html">02</a></li>
                        <li><a href="blog-grid.html">03</a></li>
                        <li><a href="blog-grid.html"><i class="far fa-long-arrow-right"></i></a></li> -->
                        <?= $ariacms->paginationPublic($count,$maxRows1, 12) ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->
       <?=$ariacms->getBlock("letter");?>
      <?=$ariacms->getBlock("footer");?>
     <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
    </div> 
    <!-- <script src="/templates/assets/js/jquery.js"></script> -->
     <?=$ariacms->getBlock("footer_script");?>

     </body>
<!-- End of .page_wrapper -->

</html>