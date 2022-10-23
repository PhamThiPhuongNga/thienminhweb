<?php
	global $database;
	global $ariacms;
	global $params;
	$min_price =(trim($_REQUEST["min_price"]) != '' && trim($_REQUEST["min_price"]) != 'undefined') ? trim($_REQUEST["min_price"]) : 0; 
	$max_price =(trim($_REQUEST["max_price"]) != '' && trim($_REQUEST["max_price"]) != 'undefined') ? trim($_REQUEST["max_price"]) : 600000;
	$where = " where post_type = 'product' and product_sale >=".$min_price ." and product_sale <".$max_price;
	$task = $ariacms->getParam("task");
	if(isset($task)){
		$where = $where." and c.url_part = '".$task."' ";
		$task = "san-pham/".$task.".html";
	}else{
		$task = "san-pham.html";
	}
	//$S =(trim($_REQUEST["s"]) != '' && trim($_REQUEST["s"]) != 'undefined') ? trim($_REQUEST["s"]) : "aaaa"; 
	$key= '';
	if($_POST["key"] != "" or $_POST["key"]!= null){
		$key = $_POST["key"];
		  $where = $where. " and a.title_vi like '%{$key}%'";
		}else{
			$key= '';
		}
	
if(trim($ariacms->getParaUrl('?page')) != '' && trim($ariacms->getParaUrl('?page')) != 'undefined'){
		$page = trim($ariacms->getParaUrl('?page'));
	}else if($_POST["page"]){
		$page = $_POST["page"];
	}
	else{
		$page =1;
	}
	$page_from = ($page-1)*6; 
	$page_to = ($page-1)*6 +6;
	$limit = " limit " . $page_from . ",". $page_to ." "; 

	// lấy sản phẩm
 $query = "SELECT a.* FROM `e4_posts` a 
				left join `e4_term_relationships` b on a.id = b.object_id 
				left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id or b.term_taxonomy_id in((SELECT id from e4_term_taxonomy WHERE parent = c.id ))"
				.$where. " group by id order by a.id desc ".$limit;
	$database->setQuery($query);
	$products = $database->loadObjectList();
	
	$count_product = count($products);
	
	$query = "	SELECT count(a.id) total FROM `e4_posts` a 
				left join `e4_term_relationships` b on a.id = b.object_id 
				left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id "
				.$where. " group by id order by a.id desc";

	$database->setQuery($query);
	$count = $database->loadRow();
	$count = $count["total"];
	$count_page = number_format($count/6 + 1,0);
	
	// lấy banner chính
	$query = "SELECT a.* from e4_web_home a where a.parent > 0 and a.`icon` = 4 and status = 'active' ORDER BY `a`.`order` ";
	$database->setQuery($query);
	$banner_mains = $database->loadObjectList();  
	
	 
?>
<div class="category-description std">
	<div class="slider-items-products">
		<div id="category-desc-slider" class="product-flexslider hidden-buttons">
			<div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
				<?php foreach($banner_mains as $banner_main){ 
					?>
				<div class="item"> <a href="">
					<img alt="Season 2018" src="<?= $banner_main->image?>"></a>
					<div class="cat-img-title cat-bg cat-box">
						<div class="small-tag"><?= $banner_main->{$params->topic}?></div>
						<h2 class="cat-heading"><?= $banner_main->{$params->title}?></h2>
					<p><?= $banner_main->{$params->brief}?></p>
					</div>
				</div>
					<?php }?>
				<!--ENd Banner-->
			</div>
		</div>
	</div>
</div>
<article>
<?php if(count($products)==0){?>
	<p class="woocommerce-info"><?= _No_PRODUCT?></p>
<?php } else {?>
	<div class="woocommerce-notices-wrapper"></div>
	<div class="toolbar">
		<div class="sorter">
			 
			<form action="/<?= $task?>" method="POST">
				<input type="hidden" name="min_price" value="<?= $min_price?>"> 
				<input type="hidden" name="max_price" value="<?= $max_price?>"> 
				<input type="hidden" name="key" value="<?= $key?>"> 
				<input type="hidden" name="page" value="<?= $page?>"> 
				<button name="btn" class="button btn-cart"  value="gird"style="border-radius: 4px;background-color: #88be4c;"><?= _GRID?> </button>
				<button name="btn"class="button" style="border-radius: 4px;" value="list"> <?= _LIST?> </button>
				</form>
			
		</div>
	</div>

	<div class="category-products">
		<ul class="products-grid">
			<?php foreach($products as $product){?>
				<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-12"> 
					<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
						<div class="item-inner">
							<div class="item-img">
								<div class="item-img-info">
									<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="Fresh Organic Mustard Leaves" class="product-image"> 
										<img onload="Wpfcll.r(this,true);" src="<?= $product->image?>" data-wpfc-original-src="<?= $product->image?>" alt="Fresh Organic Mustard Leaves">
									</a>
									<?php if($product->product_price>0){?>
										<div class="sale-label sale-top-left">-<?= number_format((($product->product_price-$product->product_sale )/$product->product_price)* 100,0) ?>%</div>
									<?php }?>
									<div class="item-box-hover">
										<div class="box-inner">
											<div class="product-detail-bnt">
												<a class="button detail-bnt" onclick="view(<?= $product->id?>)">
													<span>Quick View</span>
												</a>
											</div>
											<div class="actions">
												<span class="add-to-links">
													<div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart">
													 <div class="tinv-wishlist-clear"></div>
													 <a role="button" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button fa fa-heart tinvwl-position-shortcode" data-tinv-wl-list="[]" data-tinv-wl-product="121" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add">
														<span class="tinvwl_add_to_wishlist-text">Add to Wishlist</span>
													 </a>
													 <div class="tinv-wishlist-clear"></div>
													 <div class="tinvwl-tooltip">Add to Wishlist</div>
													 </div>
												 </span>
											 </div>
										 </div>
									 </div>
								 </div>
								 <div class="add_cart">
									 <a onclick="addCart(<?= $product->id?>)"  class="button btn-cart " data-product_id="121" rel="nofollow">
										<span>Add to cart</span>
									 </a>
								 </div>
							 </div>
							 <div class="item-info">
								 <div class="info-inner">
									 <div class="item-title">
										<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="Fresh Organic Mustard Leaves"><?= $product->{$params->title}?></a>
									 </div>
								 <div class="item-content">
									 <div class="rating">
										 <div class="ratings">
											 <div class="star-rating" role="img" aria-label="Rated <?= $product->rating?> out of 5">
												<span style="width:<?= ($product->rating/5)*100?>%">Rated <strong class="rating"><?= $product->rating?></strong> out of 5</span>
											 </div>
										 </div>
									 </div>
									 <div class="item-price">
										 <div class="price-box">
											 <span class="regular-price">
												 <span class="price">
												 <?php if($product->product_price>0){?>
													 <del>
														 <span class="woocommerce-Price-amount amount">
															 <bdi>
															 <span class="woocommerce-Price-currencySymbol">&pound;</span><?=  number_format($product->product_price,0,"."," ")?></bdi>
														 </span>
													 </del> 
												<?php }?>
												 <ins>
													 <span class="woocommerce-Price-amount amount">
														 <bdi>
														 <?=number_format($product->product_sale,0,"."," ") ?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
													 </span>
												 </ins>
												 </span>
											 </span>
										 </div>
									 </div>
								 </div>
								 </div>
							 </div>
						 </div>
					 </a>
					 <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-after-add-to-cart tinvwl-loop-button-wrapper"> 
						 <div class="tinv-wishlist-clear"></div>
						 <a role="button" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button fa fa-heart tinvwl-position-after" data-tinv-wl-list="[]" data-tinv-wl-product="121" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add">
							<span class="tinvwl_add_to_wishlist-text">Add to Wishlist</span>
						 </a>
						 <div class="tinv-wishlist-clear"></div>
						 <div class="tinvwl-tooltip">Add to Wishlist</div>
					</div>
				</li>
			<?php }?>
		</ul>
	</div>
		
		<div class="toolbar bottom">
			<div class="display-product-option">
				<div class="pages"> 
					<nav class="woocommerce-pagination"> 
						<ul class="page-numbers pagination"> 
							<?php if($page > 1 ){?>
							<a class="prev page-numbers" href="?page=1">←</a>
							<?php }
							for($i =$page-1;$i <$page+2;$i++){
							?>
							<li><?php if($page == $i and $i > 0 ){?><span aria-current="page" class="page-numbers current"><?= $i?></span><?php }else if($i>0 and $i <= $count_page){?><a class="page-numbers" href="?page=<?= $i?>"><?= $i?></a><?php }?></li> 
						<?php }
							 if( $page < $count_page){?>
								<li><a class="next page-numbers" href="?page=<?= $page +1?>">→</a></li> 
							 <?php }?>
						
						</ul> 
					</nav>
				</div>
			</div>
		</div>
		<?php }?>
		<div class="loader-image" style="display:none;"></div>
		<div class="ajaxphp-results " id="view"></div>
</article>


