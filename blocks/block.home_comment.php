<?php
	global $database;
global $ariacms;
global $params;

$query = "SELECT a.*, b.fullname FROM `e4_posts` a left join e4_users b on b.id = a.user_created where post_type = 'post' ORDER BY id desc limit 0,3";
$database->setQuery($query);
$news = $database->loadObjectList();

$query = "SELECT * FROM `e4_review` ORDER BY `order` ";
$database->setQuery($query);
$comments = $database->loadObjectList();

$query = "SELECT * FROM `e4_web_image` where position='brand' ";
$database->setQuery($query);
$brands = $database->loadObjectList();
?>

<!-- 	COMMNET -->
<div class="vc_row-full-width vc_clearfix"></div>
<div class="container">
	<div class="vc_row wpb_row vc_row-fluid vc_column-gap-1">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					<div class="testimonials-section slider-items-products">
						<div id="testimonials" class="offer-slider parallax parallax-2">
							<div class="slider-items slider-width-col6">
							<?php foreach($comments as $comment){?>
								<div class="item">
									<div class="avatar">
										<img src="<?= $comment->image?>" alt="<?= $comment->name?>">
									</div>
									<div class="testimonials"><?= $comment->content?></div>
									<div class="clients_author"><?= $comment->name?> <span><?= $comment->evo?></span></div>
								</div>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--End Comment -->

<!--Nhãn Hàng -->
<div class="container">
	<div class="vc_row wpb_row vc_row-fluid vc_custom_1545722648407">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					<div class="logo-brand">
						<div class="slider-items-products">
							<div id="brand-slider" class="product-flexslider hidden-buttons">
								<div class="slider-items slider-width-col6">
									<!-- 1 item -->
									<?php foreach($brands as $brand){?>
									<div class="item">
										<div class="logo-item">
											<a href="<?= $brand->link ?>" target="_blank" title="<?= $brand->title_vi ?>">
												<img src="<?= $brand->image ?>" alt="<?= $brand->title_vi ?>">
											</a>
										</div>
									</div>
									<?php }?>
									</div>
									<!--END Item-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- END Nhãn Hàng -->

<!-- Latest News -->
<?php if(count($news)>0){?>
<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_column-gap-1 vc_row-no-padding">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper"> 
				<div class="latest-blog">
				<h2><?= _LATEST_NEWS?></h2>
					<div class="container">
						<div class="row">
						<!-- START -->
						<?php foreach($news as $new){
							?>
							<div class="col-md-4 col-xs-12 col-sm-4 blog-post">
								<div class="blog_inner">
									<div class="blog-img">
										<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"> 
											<img src="<?= $new->image_thumb?>" alt="<?= $new->{$params->title}?>"> 
										</a>
										<div class="mask"> 
											<a class="info" href="<?=$ariacms->actual_link?>chi-tiet/<?=$new->url_part?>.html">Read More</a>
										</div>	
									</div>
									<div class="blog-info">
										<div class="post-date">
											<time class="entry-date" datetime="2018"><?= $ariacms->unixToDate($new->post_created, "/")?></time>
										</div>
										<ul class="post-meta">
											<li>
												<i class="fa fa-user"></i>Posted by <a><?=$new->fullname?></a> 
											</li>
											<li>
												<i class="fa fa-comments"></i><a href="#"><?= $new->comment_count?> comment</a> 
											</li>
										</ul>
										<h3>
											<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $new->url_part?>.html"><?= $new->{$params->title}?></a>
										</h3>
										<p><?= substr($new->{$params->brief}, 0, 110).".."?><a href="<?=$ariacms->actual_link?>chi-tiet/<?=$new->url_part?>.html" style="color: #9fb935;">Read More</a></p>
									</div>
								</div>
							</div>
						<?php }?>
							<!-- end -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
<?php 
	$query = "SELECT * from `e4_posts` Where post_type='product' order by rating desc, id desc limit 1";
	$database->setQuery($query);
	$detail = $database->loadRow();
		
	$query = "SELECT a.* from e4_web_home a where a.parent > 0 and `icon` = 3 ORDER BY `a`.`parent` ASC  limit 1";
	$database->setQuery($query);
	$details = $database->loadRow();
?>

<!-- about company -->
<div class="vc_row-full-width vc_clearfix"></div>
<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
	<style>@media only screen and (max-width: 479px) and (min-width: 320px){
	.mid-section{background:#000 url(<?= $details["image"]?>) no-repeat 0 0px !important;}
	}</style>
	<div class="wpb_column vc_column_container vc_col-sm-12">

		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="mid-section" style="background: url(<?= $details["image"]?>) no-repeat 0 0px;">
					<div class="container">
						<div class="row">
							<h3><?= $details[$params->topic]?></h3>
							<h2><?= $details[$params->title]?></h2>
						</div>
							<?= $details[$params->brief]?>
					 </div>
				 </div>
			</div>
		</div>
	 </div>
 
 </div>
 <div class="vc_row-full-width vc_clearfix"></div>
<!-- ENd  -->
