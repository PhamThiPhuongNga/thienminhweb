 <?php
global $database;
global $ariacms;
global $params;
global $web_information;
$query = "SELECT * FROM e4_web_image WHERE position ='banner' and status='active'" ;
$database->setQuery($query);
$homes = $database->loadObjectList();
?> 
  <!-- banner-section -->
        <section class="banner-section style-one">
            <div class="pattern-layer"></div>
            <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
                <?php foreach($homes as $key=>$home) 
                {  
                    if($home->region==0){
                
                ?>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(<?=$home->image;?>)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <!-- <h2 style="color: white;font-weight: 700;"><?=$home->title_vi?></h2> -->
                            <p><?=$home->title_vi?></p>
                            <div class="btn-box">
                                <a href="<?=$ariacms->actual_link?><?=$home->link?>.html" class="theme-btn-one">XEM THÊM</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="slide-item bg-left">
                    <div class="image-layer" style="background-image:url(<?=$home->image;?>)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                           <!--  <h2 style="color: red;font-weight: 600;"><?=$home->title_vi?></h2> -->
                            <p><?=$home->title_vi?></p>
                            <div class="btn-box">
                                <a href="<?=$ariacms->actual_link?><?=$home->link?>.html" class="theme-btn-one">XEM THÊM</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } } ?>
               
            </div>
        </section>
        <!-- banner-section end -->