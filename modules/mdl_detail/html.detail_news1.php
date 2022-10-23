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
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$detail["title_vi"]?></title>
<base  />
<link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/product/zoom.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/swiper/css/swiper.min.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/plaza/cloudzoom/css/cloud-zoom.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/theme/default/stylesheet/plaza/swatches/swatches.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/templates/traid/catalog/view/javascript/jquery/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />
<!-- icon font -->
<link href="/templates/traid/catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/templates/traid/catalog/view/javascript/ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />
<!-- end icon font -->
<!-- end -->
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/stylesheet.css" rel="stylesheet">
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/header/header1.css" rel="stylesheet">
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/theme.css" rel="stylesheet">
<link href="/templates/traid/catalog/view/javascript/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">
<script src="/templates/traid/catalog/view/javascript/jquery/jquery-3.1.1.min.js" ></script>

<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.jquery.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/swatches/swatches.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
<script src="/templates/traid/catalog/view/javascript/common.js" ></script>
<!-- <link href="aenean-luctus-non-metus.html" rel="canonical" /> -->
<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
<!-- Quick view -->
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/cloud-zoom.1.0.2.min.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/cloudzoom/zoom.js" ></script>
<script src="/templates/traid/catalog/view/javascript/plaza/quickview/quickview.js" ></script>
<link href="/templates/traid/catalog/view/theme/tt_amino1/stylesheet/plaza/quickview/quickview.css" rel="stylesheet" type="text/css" />
<!-- General -->
<!-- Sticky Menu -->
<script >
	$(document).ready(function () {	
		var height_box_scroll = $('.scroll-fix').outerHeight(true);
		$(window).scroll(function () {
			if ($(this).scrollTop() > 800) {
				$('.scroll-fix').addClass("scroll-fixed");
				$('body').css('padding-top',height_box_scroll);
			} else {
				$('.scroll-fix').removeClass("scroll-fixed");
				$('body').css('padding-top',0);
			}
		});
	});
</script>
<!-- Scroll Top -->
<script>
	$("#back-top").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > $('body').height()/3) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		$('#back-top').click(function () {
			$('body,html').animate({scrollTop: 0}, 800);
			return false;
		});
	});
</script>
<!-- Advance -->
<!-- Bootstrap Js -->
<script src="/templates/traid/catalog/view/javascript/bootstrap/js/bootstrap.min.js" ></script>
</head>



<body class="product-product">
	<div class="wrapper">

		<div id="back-top"><i class="ion-chevron-up"></i></div>

		<div id="header" class="header-absolute" >	
			<nav id="top" >
				<div class="container">
					<div class="static-nav"><?= $ariacms->web_information->{$params->slogan} ?></div>


				</div>
			</nav>
			<?= $ariacms->getBlock("header_traid"); ?>
		</div>


		<ul class="breadcrumb">
			<li><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li><a href="<?=$ariacms->actual_link?>/blog.hml"><?=_BLOG?></a></li>
			<li><?= $detail[$params->title]?></li>
		</ul>

		<div class="container">
			<div class="main">
				<div class="row">
					<div id="content" class="col-xs-12">
						<div class="post-container">
							<div class="post-title">
								<h1><?= $detail[$params->title]?></h1>
							</div>
							<div class="post-date-author">
								<span class="post-date"></span>
								<span class="post-author"></span>
							</div>
							<div class="post-description">
								<img src="<?= $detail['image']?>" alt="heading_title" />
								<?= $detail[$params->content]?>
							</div>
						</div>
						<div class="blog-widget-section blog-widget blog-widget-slider ">
							<div class="block-title">
								<div class="title"><span><?=_NEWS_RELATED?></span></div>

							</div>
							<div class="pt-content">
								<div class="swiper-viewport">
									<div class="swiper-container posts-container">
										<div class="swiper-wrapper">
											<?php foreach($news_relateds as $key => $news_relate)?>
											<div class=" swiper-slide product-thumb ">
												<div class="post-grid">
													<div class="post-item ">
														<div class="post-image">
															<a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$news_relate->url_part?>.html"><img src="<?=$news_relate->image?>" alt="<?=$news_relate->{$params->title}?>" /></a>
															
														</div>
														<div class="post-cation">
															<div class="inner">
																
																<p class="post-name"><a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$news_relate->url_part?>.html"><?=$news_relate->{$params->title}?></a></p>
																<div class="post-intro"><p><?=$news_relate->{$params->brief}?></p></div>
																<div class="post-date-author">
																	<span class="post-date"><?= $ariacms->unixToDate($detail['post_created'], "/")?></span>
																	<span class="post-author"><?=_Learn_More?></span>
																</div>
																<div class="btn-more"><a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$news_relate->url_part?>.html"><?=_Learn_More?></a></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
										
										</div>
									</div>

									<!--div class="swiper-pagination post-pagination"></div-->
									<div class="swiper-pager">
										<div class="swiper-button-next related-posts-next"></div>
										<div class="swiper-button-prev related-posts-prev"></div>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								$(".posts-container").swiper({
									spaceBetween: 0,
									nextButton: '.related-posts-next',
									prevButton: '.related-posts-prev',
									speed: 600,
									slidesPerView: 3,
									slidesPerColumn: 1,
									watchSlidesVisibility: true,
									autoplay: false,
									loop: false,
								// Responsive breakpoints
								breakpoints: {
									359: {
										slidesPerView: 1
									},
									479: {
										slidesPerView: 2
									},
									767: {
										slidesPerView: 2
									},
									991: {
										slidesPerView: 3

									},
									1199: {
										slidesPerView: 3

									}
								}
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div> 

	<?= $ariacms->getBlock("footer_traid");?>
</div> 
</body>
</html>







