<?php
global $ariacms;
global $params;
global $database;
global $ariaConfig_template;
$query = "SELECT * FROM `e4_posts` where post_type = 'post' order by id desc limit 0,5";
$database->setQuery($query);
$posts_recent = $database->loadObjectList();
	//echo "AAAAAAAAA";
?>
<!DOCTYPE html>
   <html lang="en">
   <?=$ariacms->getBlock("head"); ?>
   <body>

    <div class="boxed_wrapper"> 

      <?=$ariacms->getBlock("header");?>
    
    <section class="page-title centred" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="overlay-bg"></div>
            <div class="pattern-layer"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1><?= $detail[$params->title]?></h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?=$ariacms->actual_link?>">Trang chủ</a></li>
                        <li><?= $detail[$params->title]?></li>
                        
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- service-details -->
        <section class="service-details mt-5">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <div class="inner-box">
                                <div class="product"><h4><?= $detail[$params->title]?></h4></div>
                                <div class="post-info">
                                    <div class=""><i class="fa fa-calendar mr-2"></i> <?= Date('H:i d/m/Y',$detail['post_created'])?></div>
                                    <div>
                                        <div class="fb-like fb_iframe_widget" data-href="" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=538897933198331&amp;container_width=0&amp;href=https%3A%2F%2Ffisavietnam.com%2Fgoi-xay-lap-chua-hai-giac-pr20&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;size=small&amp;width="><span style="vertical-align: bottom; width: 120px; height: 28px;"><iframe name="f2d8e64dc217348" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v9.0/plugins/like.php?action=like&amp;app_id=538897933198331&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2b5b7c6109e68c%26domain%3Dfisavietnam.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Ffisavietnam.com%252Ff22d98cb6686028%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Ffisavietnam.com%2Fgoi-xay-lap-chua-hai-giac-pr20&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;size=small&amp;width=" style="border: none; visibility: visible; width: 120px; height: 20px;" class=""></iframe></span></div>
                                    </div>
                                </div>
                                <figure class="image-box"><img src="<?=$detail['image']?>" alt="" height="500px"></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar default-sidebar">
                            <div class="sidebar-widget categori-widget">
                                <div class="widget-title">
                                    <h4>DANH SÁCH SẢN PHẨM</h4>
                                </div>
                               <?php 
								$query = "SELECT * FROM `e4_term_taxonomy` WHERE status='active' AND taxonomy='product_category' AND parent=0 order by id ";
								$database->setQuery($query);
								$danhsach = $database->loadObjectList(); 
								?>
								<div class="widget-content">
									<ul class="categori-list clearfix">
										<?php foreach ($danhsach as $key => $ds) {
										
										?>
										<li><a href="<?=$ariacms->actual_link?>san-pham/<?=$ds->url_part?>.html" class="active"><?=$ds->title_vi?></a></li>
									
									<?php } ?>
									</ul>
								</div>
                            </div>
                           <div class="sidebar-widget advise-widget">
								<div class="widget-title centred" style="margin: 20px;">
									<h4>HỖ TRỢ TRỰC TUYẾN</h4>
								</div>
								<div class="inner-box centred" style="background-image: url(/assets/css/support-girl.jpg);">
									<div class="icon-box"><img src="/assets/css/support-girl.jpg" alt=""  width="130px";
										height="130px";></div>
										<div class="cskh">
											<!-- <p>MS. Nga</p> -->
											<p>Call: <?=$ariacms->web_information->hotline?></p>
										</div>
									</div>
								</div>
                        </div>
                    </div>
                    <!-- image thi cong -->
                    <div class="col-lg-12 col-md-12 col-sm-12 text">
                        <div class="post-subtitle row">
                            <button type="submit"><span><a href="" class="">Thông tin chi tiết</a></span></button>
                            <!-- <button>/</button> -->
                            <!-- <button type="submit"><span><a href="" class="">Hình ảnh thi công</a></span></button> -->
                        </div>
                        <div>
                            <?= $detail['content_vi']?>
                        </div>
                        <div class="row">
                           <!--  <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                                <div class="testimonial-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="" class="">
                                                <img src="/assets/images/gallery/gallery-1.jpg" alt=""height="270" width="100%">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div> -->  
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->


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






