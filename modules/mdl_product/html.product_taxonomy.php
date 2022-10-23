<?php
global $database;
global $ariacms;
global $params;
global $ariaConfig_template;
global $web_information;
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
						<h1>SẢN PHẨM</h1>
					</div>
					<ul class="bread-crumb clearfix">
						<li><a href="index.html">Trang chủ</a></li>
						<li><?=$category[title_vi]?></li>
						<!-- <li>Hệ thống báo cháy</li> -->
					</ul>
				</div>
			</div>
		</section>

		<section class="service-details mt-5">
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
										<!-- <li><a href="service-details-2.html">HỆ THỐNG CHỮA CHÁY</a></li>
										<li><a href="service-details-3.html">HỆ THỐNG TĂNG ÁP HÚT KHÓI</a></li>
										<li><a href="service-details-4.html">HỆ THỐNG ĐÈN EXIT SỰ CỐ</a></li> -->
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
							<div>
								<div class="text mb-3">
									<h4 class=""style="left:0; font-weight: 500; font-size:20px; "><?=$category[title_vi]?></h4>
								</div>
								<section class="team-page-section centred">

									<div class="auto-container">
										<div class="row clearfix">
											<?php foreach ($products as $key => $product) {
												
											?>
											<div class="col-lg-4 col-md-6 col-sm-12 team-block">
												<div class="team-block-one wow fadeInUp animated animated animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
													<div class="inner-box">
														<figure class="image-box"><img src="<?=$product->image?>" alt=""></figure>
														<div class="lower-content">
															<h4><a href="<?=$ariacms->actual_link?>chi-tiet/<?=$product->url_part?>.html"><?=$product->title_vi?></a></h4>
															<span><a href="" class="designation">Giá: <?=number_format($product->product_sale)?></a></span>
															<div class="figcaption"style=" height: 35px;
															background-color: red;">
															<a  onclick="addCart(<?= $product->id?>)" href=""style="color:white;">Thêm vào giỏ hàng</a>
														</div>
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
			</div>
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