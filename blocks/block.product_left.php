<?php 
	global $database;
	global $ariacms;
	global $params;
	global $web_menus;
	 
	$min_price =(trim($_REQUEST["min_price"]) != '' && trim($_REQUEST["min_price"]) != 'undefined') ? trim($_REQUEST["min_price"]) : 0; 
	$max_price =(trim($_REQUEST["max_price"]) != '' && trim($_REQUEST["max_price"]) != 'undefined') ? trim($_REQUEST["max_price"]) : 600000;
		if($_POST["key"]!="" or POST["key"]!=null){
		$key = $_POST["key"];
		  $where = $where. " and a.title_vi like '%{$key}%' or a.title_en like '%{$key}%'";
		}else{
			$key= '';
		}
	
	//$web_menu->{$params->title}
	$query = "SELECT * FROM `e4_term_taxonomy` where taxonomy ='product_category'  order by id DESC";
	$database->setQuery($query);
	$menus = $database->loadObjectList();
	
	$query = "SELECT * FROM `e4_term_taxonomy` where `taxonomy` ='product_category' and `parent` > 0 group by `parent` ORDER BY `id` ASC ";
	$database->setQuery($query);
	$cat_menus = $database->loadObjectList();
	
?>
<!-- Price -->
<div class="block woocommerce widget_price_filter">
	<div class="block-title"><?= _FILTER_BY_PRICE?></div>
	<form method="POST" action="#">
		<div class="price_slider_wrapper">
			<div class="price_slider" style="display:none;"></div>
			<div class="price_slider_amount" data-step="5000">
				<input type="text" id="min_price" name="min_price" value="<?= $min_price?>" data-min="0" placeholder="Min price" />
				<input type="text" id="max_price" name="max_price" value="<?= $max_price?>" data-max="600000" placeholder="Max price" />
				<input type="hidden" name="key" value="<?= $key?>"> 
				<button type="submit" class="button"><?= _FILTER?></button>
				<div class="price_label" style="display:none;"> <?= _PRICE?>: <span class="from"></span> &mdash; <span class="to"></span></div>
				<div class="clear"></div>
			</div>
		</div>
	</form>
</div>

<!-- END Price -->

<!-- Menu -->
<div class="block woocommerce widget_product_categories">
<div class="block-title"><?= _PRODUCT_CATEGORIES?></div>
	<ul class="product-categories">
	<?php
		foreach ($menus as $web_menu) {
			if($web_menu->parent ==0){
			 ?>
				<li class="cat-item current-cat cat-parent cat-item-<?= $web_menu->id?>">
					<a href="<?= $ariacms->actual_link ?>san-pham/<?= $web_menu->url_part?>.html "> <?= $web_menu->{$params->title} ?></a>
				<?php foreach($cat_menus as $cat_menu){
							if($cat_menu->parent == $web_menu->id) { ?>	
								<ul class='children'>
								<?php
									foreach ($menus as $sub_menu) {
										if($web_menu->id == $sub_menu->parent) {
										?>
										<li class="cat-item cat-item-52 cat-parent">
											<a href="<?= $ariacms->actual_link ?>san-pham/<?= $sub_menu->url_part?>.html"> <?= $sub_menu->{$params->title} ?></a>
										</li>
									<?php
										}
									}?>
								</ul>		
					<?php 	}
						}
					?>
				</li>
			
		<?php }
		} ?>	
	</ul>
</div><!-- END MENU -->
<!-- AD-->

<?php
		// lấy banner phụ
		$query = "SELECT a.* from e4_web_home a where a.parent > 0 and a.`icon` = 5 and status = 'active' ORDER BY `a`.`order` ";
		$database->setQuery($query);
		$banners = $database->loadObjectList();
		$count_banners = count($banners);
if($count_banners > 0){		
?>

<div class="block widget_product_slider">		
	<div class="custom-slider">
		<div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<?php if($count_banners >0){?>
				<ol class="carousel-indicators">
					<?php for($i = 0; $i< $count_banners; $i++){?>
						<li class="<?php if($i == 0) echo 'active'?>" data-target="#carousel-example-generic" data-slide-to="<?=$i?>"></li>
					
					<?php }?>
				</ol>
				<?php }?>
				<div class="carousel-inner">
					
					<?php 
					$i = 0;
					foreach($banners as $banner){
						?>
						<div class="item <?php if($i == 0) echo 'active';?>">
							<img onload="Wpfcll.r(this,true);" src="<?= $banner->image?>" data-wpfc-original-src="<?= $banner->image?>" alt="<?= $banner->{$params->title}?>">
							<div class="carousel-caption"> 
								<h4><?= $banner->{$params->topic}?></h4> 
								<h3><a href="<?= $banner->link?>"><?= $banner->{$params->title}?></a></h3> 
								<p><?= $banner->{$params->brief}?></p> 
								<a class="link" href="<?= $banner->link?>">Buy Now</a>
							</div>
						</div>	
					<?php 
					$i++;
					}?>
				</div>
			</div>
		</div>
	</div>
</div><!-- END AD -->
<?php }?>

<?php 	
	$query = "SELECT * from `e4_posts` Where post_type='product' order by rating desc, id desc limit 5";
	$database->setQuery($query);
	$top_rateds = $database->loadObjectList();
?>
<!-- Top rate-->
<div class="block woocommerce widget_top_rated_products">
<div class="block-title"><?= _TOP_RATED_PRODUCTS?></div>
<ul class="product_list_widget">
<?php foreach($top_rateds as $top_rated){?>
<li> 
	<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $top_rated->url_part?>.html"> 
	<img onload="Wpfcll.r(this,true);" src="<?= $top_rated->image?>" width="80" height="80" data-wpfc-original-src="<?= $top_rated->image?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" data-wpfc-original-srcset="<?= $top_rated->image?> 80w,<?= $top_rated->image?> 150w, <?= $top_rated->image?> 300w, <?= $top_rated->image?> 768w,<?= $top_rated->image?> 450w, <?= $top_rated->image?> 600w, <?= $top_rated->image?> 99w, <?= $top_rated->image?> 800w" sizes="(max-width: 80px) 100vw, 80px"/> 
	<span class="product-title"><?= $top_rated->{$params->title}?></span> 
	</a>
	 <div class="star-rating" role="img" aria-label="Rated <?= $top_rated->rating?> out of 5">
	 <span style="width:<?= ($top_rated->rating/5)*100?>%">Rated <strong class="rating"><?= $top_rated->rating?></strong> out of 5</span>
	 </div>
	 <?php if( $top_rated->product_price > 0){?>
	 <del>
	 <span class="woocommerce-Price-amount amount"><bdi>
		<?= number_format($top_rated->product_price, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
	 </span>
	 </del>
	 <?php }?>
	 <span class="woocommerce-Price-amount amount">
	 <bdi> <?= number_format($top_rated->product_sale, 0, ',', ' ')?></bdi><span class="woocommerce-Price-currencySymbol">Đ</span></span>
 </li>
<?php }?>
</ul>
</div>
