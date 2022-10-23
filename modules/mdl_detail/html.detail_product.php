<?php
global $ariacms;
global $params;
global $database;
global $ariaConfig_template;
global $analytics_code;



$quantity =(trim($_REQUEST["quantity"]) != '' && trim($_REQUEST["quantity"]) != 'undefined') ? trim($_REQUEST["quantity"]) : 1;
$query = "SELECT * FROM `e4_posts` where post_type = 'product' order by rating desc limit 0,6";
$database->setQuery($query);
$products_rating = $database->loadObjectList();
$count_comment =0;

$query = "SELECT * FROM `e4_posts` where post_type = 'product' order by rating desc limit 0,6";
$database->setQuery($query);
$products_rating = $database->loadObjectList();

		// danh mục con
$query =  'SELECT c.id,c.parent FROM `e4_posts` a LEFT JOIN e4_term_relationships b on a.id = b.object_id LEFT JOIN e4_term_taxonomy c on c.id = b.term_taxonomy_id WHERE a.id = '.$detail[id].' and c.taxonomy = "product_category"';
$database->setQuery($query);
$category = $database->loadRow();
	//danh mục cha
$dad_category =  'SELECT id FROM `e4_term_taxonomy` WHERE parent = '.$category['parent'].' and taxonomy = "product_category"';

$query = "SELECT * FROM `e4_posts_image` where object_id =".$detail["id"] ;
$database->setQuery($query);
$products_image = $database->loadObjectList();

$query = "SELECT * FROM `e4_comment` where post_id = ".$detail[id]." order by id asc";
$database->setQuery($query);
$comments = $database->loadObjectList();
$comment_count =count($comments);

	// sản phẩm liên quan
$query = "SELECT a.* FROM `e4_posts` a where a.id in (select a.id from `e4_posts` a 
LEFT JOIN e4_term_relationships b on a.id = b.object_id 
LEFT JOIN e4_term_taxonomy c on c.id = b.term_taxonomy_id 
WHERE a.post_type = 'product' and a.id != {$detail['id']} and c.id in(".$dad_category.")) order by a.id desc limit 0,6";
$database->setQuery($query);
$products_recent = $database->loadObjectList();

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
						<h1><?=$detail[$params->title]?></h1>
					</div>
					<ul class="bread-crumb clearfix">
						<li><a href="<?=$ariacms->actual_link?>">Trang chủ</a></li>
						<li><?=$detail[$params->title]?></li>
						<!-- <li>Hệ thống báo cháy</li> -->
					</ul>
				</div>
			</div>
		</section>

		 <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="service-sidebar default-sidebar">
                            <div class="sidebar-widget categori-widget">
                                
                            <div class="widget-title centred">
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
                    
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="service-details-content">
                            <div class="auto-container">
                                <div class="inner-box">
                                    <div class="two-column">
                                        <div class="row clearfix">
                                            <div class="col-lg-7 col-md-6 col-sm-6 sidebar-side">
                                                <div class="container">
                                                	<?php  
                                                	foreach ($images as $key => $image) { 
													?>
                                                    <div class="mySlides img-magnifier-container">
                                                    <div class="numbertext"><?=$key?> / 6</div>
                                                    <img src="<?=$image->image_link?>" style="width:100%">
                                                    </div>
                                                    
                                                    <?php } ?>
                                                    
                                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                                    <a class="next" onclick="plusSlides(1)">❯</a>
                                                
                                                    <div class="row">
                                                    	<?php  
                                                	foreach ($images as $key2 => $image) { 
													?>
                                                    <div class="column">
                                                        <img class="demo cursor" src="<?=$image->image_link?>" style="width:100%" onclick="currentSlide(<?=$key2?>)" alt="The Woods">
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="col-lg-5 col-md-6 col-sm-6 content-side">
                                                <div class="text">
                                                    <h4><?=$detail[title_vi]?></h4>
                                                    <p>Mô tả ngắn:</p>
                                                    <div class="row">
                                                        <ul class="col-lg-6 col-md-6 col-sm-12 list clearfix">
                                                            <li>Mã sản phẩm:<?=$detail[brief_vi]?></li>
                                                            <li>Hãng sản xuất:<?=$detail[title_en]?></li>
                                                            <li>Xuất xứ:<?=$detail[brief_en]?></li>
                                                            <li>Số lượng:<div class="buttons_added">
                                                                    <input class="minus is-form" type="button" value="-">
                                                                    <input aria-label="quantity" class="input-qty" max="100" min="1" name="quantity" value="<?= $quantity?>" type="number" >
                                                                    <input type="hidden" name="product_id" value="<?=$detail['id']?>" /> 
                                                                    <input class="plus is-form" type="button" value="+">
                                                                </div></li>
                                                            <li>Giá:<?=$detail['product_sale']?> VNĐ</li>
                                                        </ul>
                                                        
                                                    </div>
                                                    <div class="order mt-3">
                                                        <a href="" onclick="addCart(<?=$detail['id']?>)" style="color:white;">Thêm vào giỏ hàng</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- js plus-minus-number -->
<script>
    //<![CDATA[
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
</script>
                    <div class="col-lg-12 col-md-12 col-sm-12 text">
                        <div class="post-subtitle row">
                           <!--  <button type="submit"><span><a href="" class="">THÔNG SỐ KỸ THUẬT</a></span></button>
                            <button>/</button> -->
                            <button type="submit"><span><a href="" class="">CHI TIẾT SẢN PHẨM</a></span></button>
                            <!-- <button>/</button>
                            <button type="submit"><span><a href="" class="">BÌNH LUẬN</a></span></button> -->
                        </div>
                        <span><?=$detail['content_vi']?>;</span>

                        
                    </div>
                    
                     <div>
                    <div class="product">
                        <p class="title-product" style="left:0;"><span class="">SẢN PHẨM KHÁC</span></p>
                        <!-- <p class="add-product"><a href="" class="">>> Xem thêm</a></p> -->
                    </div>
                    <section class="team-page-section centred" id="lightSlider">

                        <div class="auto-container">
                            <div class="row clearfix">
                                <?php foreach ($product_relateds as $key3 => $pro1) {
                                	// code...
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 team-block">
                                    <div class="team-block-one wow fadeInUp animated animated animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
                                        <div class="inner-box">
                                            <figure class="image-box"><img src="<?=$pro1->image?>" alt=""></figure>
                                            <div class="lower-content">
                                                <h4><a href="<?=$ariacms->actual_link?>san-pham/<?=$pro1->url_part?>.html"><?=$pro1->title_vi ?></a></h4>
                                                <span><a href="<?=$ariacms->actual_link?>san-pham/<?=$pro1->url_part?>.html" class="designation">Giá:<?=number_format($pro1->product_sale) ?></a></span>
                                                <div class="figcaption" style=" height: 35px;
                                                background-color: red;">
                                                    <a href="<?=$ariacms->actual_link?>san-pham/<?=$pro1->url_part?>.html" style="color:white;">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <?php 
                           } ?>
                            </div>
                        </div>
                    </section>
                </div>

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






