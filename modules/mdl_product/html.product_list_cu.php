<?php
global $ariacms;
global $ariaConfig_template;
global $analytics_code;
global $params;
global $web_menus;
global $database;
session_start();
//{$params->title}
	$min_price =(trim($_REQUEST["min_price"]) != '' && trim($_REQUEST["min_price"]) != 'undefined') ? trim($_REQUEST["min_price"]) : 0; 
	$max_price =(trim($_REQUEST["max_price"]) != '' && trim($_REQUEST["max_price"]) != 'undefined') ? trim($_REQUEST["max_price"]) : 600000;
	 $where = " where post_type = 'product' and product_sale >=".$min_price ." and product_sale <".$max_price;
	$task = $ariacms->getParam("task");
	
	$query = "SELECT a.*, GROUP_CONCAT('',b.id) submenu  FROM e4_term_taxonomy a 
		LEFT JOIN (SELECT id, parent FROM e4_term_taxonomy) b ON a.id = b.parent OR a.id = b.id
		WHERE a.url_part = '" . $task . "' AND a.status = 'active' 
		GROUP BY a.id";
		$database->setQuery($query);
		$category = $database->loadRow();
	if(isset($task)){
		$where = $where." and c.url_part = '".$task."' ";
		$task = "san-pham/".$task.".html";
	}else{
		$task = "san-pham.html";
	}
	if($_POST["key"]!="" or POST["key"]!=null){
		$key = $_POST["key"];
		  $where = $where. " and a.title_vi like '%{$key}%'";
		}else{
			$key= '';
		}
	
	if(trim($ariacms->getParaUrl('&page')) != '' && trim($ariacms->getParaUrl('&page')) != 'undefined'){
		$page = trim($ariacms->getParaUrl('&page'));
	}else if($_POST["page"]){
		$page = $_POST["page"];
	}
	else{
		$page =1;
	}
	// trim($ariacms->getParaUrl('&page')) : 
	$page_from = ($page-1)*6; 
	$page_to = ($page-1)*6 +6;
	$limit = " limit " . $page_from . ",". $page_to ." ";
	
	$query = "	SELECT a.* FROM `e4_posts` a 
				left join `e4_term_relationships` b on a.id = b.object_id 
				left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id or b.term_taxonomy_id in((SELECT id from e4_term_taxonomy WHERE parent = c.id ))"
				.$where. " group by a.id order by a.id desc ".$limit;
	$database->setQuery($query);
	$products = $database->loadObjectList();
	
	
	$count_product = count($products);
	
	$query = "SELECT a.* FROM `e4_posts` a 
				left join `e4_term_relationships` b on a.id = b.object_id 
				left join `e4_term_taxonomy` c on c.id = b.term_taxonomy_id or b.term_taxonomy_id in((SELECT id from e4_term_taxonomy WHERE parent = c.id ))"
				.$where. " group by a.id order by a.id desc";
	$database->setQuery($query);
	$count = $database->loadObjectList();
	$count = count($count);
	 $count_page = $count/6 + 1;
	
	//print_r($_SESSION['orderCart']);die;
	
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<?= $ariacms->getBlock("head"); ?>
	<title><?= _PRODUCT_LIST ?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>
	<meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
	<meta name="keywords" content="<?= ($ariacms->web_information->{$params->meta_keyword} != '') ? $ariacms->web_information->{$params->meta_keyword} : $ariacms->web_information->{$params->name}; ?>" />
	<meta property="og:title" content="<?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?>" />
	<meta property="og:description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
	<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l0xw9klt_f9lvt.css" media="all"/>
<style id='rs-plugin-settings-inline-css'>#rs-demo-id{}</style>
<style id='woocommerce-inline-inline-css'>.woocommerce form .form-row .required{visibility:visible;}</style>
<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l9ajug3i_f9lvt.css" media="all"/>
<style id='font-awesome-inline-css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important;}</style>
<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/d75kedqc_f9lvt.css" media="all"/>
</head>
<body class="page-template-default page page-id-287 theme-qualis mmm mega_main_menu-2-1-7 woocommerce-no-js tinvwl-theme-style wpb-js-composer js-comp-ver-6.4.2 vc_responsive">
<div id="preloader"></div><div id="page">
<?= $ariacms->getBlock("header"); ?>
<div class="page-heading">
<div class="page-title"> 
<h2><?php if( $category[$params->title]){ echo $category[$params->title];} else{echo _PRODUCT;} ?></h2>
</div></div><div class="container"><div class="vc_row wpb_row vc_row-fluid"><style>@media(max-width:768px) and (min-width:320px){
.vc_row .klb_xs_vc_custom_1546427089919{padding-right:0px !important;padding-left:0px !important;}
}</style><div class="wpb_column vc_column_container vc_col-sm-9"><div class="vc_column-inner vc_custom_1546427089916 klb_xs_vc_custom_1546427089919"><div class="wpb_wrapper"><div class="category-description std">
<div class="slider-items-products">
<div id="category-desc-slider" class="product-flexslider hidden-buttons">
<div class="slider-items slider-width-col1 owl-carousel owl-theme">
<div class="item"><a href="#" target="" title="product1"><img alt="product1" src="https://klbtheme.com/qualis/wp-content/uploads/2018/12/category-img1.jpg"></a><div class="cat-img-title cat-bg cat-box"><div class="small-tag">Season 2018</div><h2 class="cat-heading">Organic <span>World</span></h2><p>GET 40% OFF ⋅ Free Delivery </p></div></div><div class="item"><a href="#" target="" title="product1"><img alt="product1" src="https://klbtheme.com/qualis/wp-content/uploads/2018/12/category-img1.jpg"></a><div class="cat-img-title cat-bg cat-box"><div class="small-tag">Season 2018</div><h2 class="cat-heading">Organic <span>World</span></h2><p>GET 40% OFF ⋅ Free Delivery </p></div></div></div></div></div></div><div class="pro-coloumn">
<article>
<div class="toolbar">
<div class="sorter">
<form action="/<?= $task?>" method="POST">
				<input type="hidden" name="min_price" value="<?= $min_price?>"> 
				<input type="hidden" name="max_price" value="<?= $max_price?>"> 
				<input type="hidden" name="key" value="<?= $s?>"> 
				<input type="hidden" name="page" value="<?= $page?>"> 
				
				<button name="btnGirt" class="button btn-cart"  value="gird" style="border-radius: 4px;"> <?= _GRID?> </button>
				<button name="btnList"class="button"  value="list" style="border-radius: 4px;background-color: #88be4c;"><?= _LIST?> </button>
				
				</form>
</div>
</div>
<div class="category-products">
	<ol class="products-list" id="products-list">
	<?php foreach($products as $product){?>
		<li class="item first">
			<div class="product-image">
				 <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="<?= $product->{$params->title}?>">
				 <img class="small-image" src="<?= $product->image?>" alt="<?= $product->{$params->title}?>"></a>
			 </div>
			 <div class="product-shop">
				 <h2 class="product-name">
					<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html" title="Fresh Organic Mustard Leaves"><?= $product->{$params->title}?></a>
				 </h2>
				 <div class="ratings">
					 <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
						<span style="width:<?= ($product->rating/5)*100?>%">Rated <strong class="rating"><?= $product->rating?></strong> out of 5</span>
					 </div>
					<p class="rating-links">
						<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html#reviews"><?= $product->comment_count." "._REVIEWS?></a>  <span class="separator">|</span> 
						<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html#reviews"><?=_Add_a_review?></a>
					</p>
				</div>
				 <div class="desc std">
					<p><?= $product->{$params->brief}?></p>
					<a class="link-learn" title="Fresh Organic Mustard Leaves" href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?=_Learn_More?></a>
				 </div>
				 <div class="price-box">
					 <p class="special-price"> 
						<span class="price"> 
						<?php if($product->product_price>0){?>
							 <del><span class="woocommerce-Price-amount amount">
								<bdi><?=  number_format($product->product_price, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi></span>
							 </del> 
							 <ins>
						<?php }?>
								<span class="woocommerce-Price-amount amount"><bdi><?= number_format($product->product_sale, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi></span>
							 </ins>
						</span> 
					 </p>
				 </div>
				 <div class="actions">
					 <a onclick="addCart(<?= $product->id?>)"  class="button btn-cart " aria-label="Add &ldquo;<?= $product->{$params->title}?>" rel="nofollow">
					 <span><?= _ADD_TO_CART?></span></a>
					 <span class="add-to-links">
						 <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart" data-product_id="121">
							 <div class="tinv-wishlist-clear"></div>
							 <a role="button" aria-label="Add to Wishlist" class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-shortcode" data-tinv-wl-list="[]" data-tinv-wl-product="121" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[0]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add"><span class="tinvwl_add_to_wishlist-text"><?= _ADD_TO_WISHLIST?></span></a>
							 <div class="tinv-wishlist-clear"></div>
							 <div class="tinvwl-tooltip"><?= _ADD_TO_WISHLIST?></div>
						 </div>
					 </span>
				 </div>
			 </div>
		 </li>
	 <?php }?>
	 </ol>
</div>
<div class="toolbar bottom">
			<div class="display-product-option">
				<div class="pages"> 
					<nav class="woocommerce-pagination"> 
						<ul class="page-numbers pagination"> 
							<?php if($page > 1 ){?>
							<a class="prev page-numbers" href="?t=list&page=<?= $page -1?>">←</a>
							<?php }
							for($i =$page-1;$i <$page+2;$i++){
							?>
							<li><?php if($page == $i and $i > 0 ){?><span aria-current="page" class="page-numbers current"><?= $i?></span><?php }else if($i>0 and $i <= $count_page){?><a class="page-numbers" href="?t=list&page=<?= $i?>"><?= $i?></a><?php }?></li> 
						<?php }
							 if($page + 1 < $count_page){?>
								<li><a class="next page-numbers" href="?t=list&page=<?= $page +1?>">→</a></li> 
							 <?php }?>
						
						</ul> 
					</nav>
				</div>
			</div>
		</div>
</article>
</div>
<div class="loader-image" style="display:none;"></div>
<div class="ajaxphp-results"></div>
</div>
</div>
</div>
<style>@media(max-width:768px) and (min-width:320px){
.vc_row .klb_xs_vc_custom_1546428910775{padding-right:0px !important;padding-left:0px !important;}
}</style>

<?php  
	$query = "SELECT * FROM `e4_term_taxonomy` where taxonomy ='product_category' order by id DESC";
	$database->setQuery($query);
	$menus = $database->loadObjectList();
	
	$query = "SELECT * FROM `e4_term_taxonomy` where `taxonomy` ='product_category' and `parent` > 0 group by `parent` ORDER BY `id` ASC ";
	$database->setQuery($query);
	$cat_menus = $database->loadObjectList();
?>
<!-- -->
<div class="wpb_column vc_column_container vc_col-sm-3">
<div class="vc_column-inner vc_custom_1546428910773 klb_xs_vc_custom_1546428910775">
<div class="wpb_wrapper"><div class="wpb_widgetised_column wpb_content_element">
<div class="wpb_wrapper sidebar">
<div class="block woocommerce widget_product_categories"><div class="block-title"><?=_PRODUCT_CATEGORIES?></div>
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
</div>
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
							<li <?php if($i == 0) echo 'class="active"'?> data-target="#carousel-example-generic" data-slide-to="<?=$i?>"></li>
						
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
</div>
<?php }?>

<!--Top rating-->
<?php 	
	$query = "SELECT * from `e4_posts` Where post_type='product' order by rating desc, id desc limit 5";
	$database->setQuery($query);
	$top_rateds = $database->loadObjectList();
?>


<div class="block woocommerce widget_top_rated_products">
<div class="block-title">Top rated products</div>
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
	 <?php if($top_rated->product_price>0){?>
	 <del>
	 <span class="woocommerce-Price-amount amount"><bdi>
		<?= number_format($top_rated->product_price, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi>
	 </span>
	 </del>
	 <?php }?>
	 <span class="woocommerce-Price-amount amount">
	 <bdi>
	 <?= number_format($top_rated->product_sale, 0, ',', ' ')?><span class="woocommerce-Price-currencySymbol">Đ</span></bdi></span>
 </li>
<?php }?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row our-features-box">
<ul>
<li> <div class="feature-box klb-footer-box"> <i class="fa fa-truck"></i> <div class="content">FREE SHIPPING on order over $99</div></div></li>
<li> <div class="feature-box klb-footer-box"> <i class="fa fa-phone"></i> <div class="content">HAVE A QUESTIONS? <a href="10800 7890000">+10800 789 0000</a></div></div></li>
<li> <div class="feature-box klb-footer-box"> <i class="fa fa-usd"></i> <div class="content">100% MONEY BACK GUARANTEE</div></div></li>
<li> <div class="feature-box klb-footer-box"> <i class="fa fa-briefcase"></i> <div class="content">30 DAYS RETURN SERVICE</div></div></li>
<li class="last"> <div class="feature-box"> <a href="#"><i class="fa fa-apple"></i> Download</a> <a href="#"><i class="fa fa-android"></i> Download</a></div></li>
</ul></div></div><footer> 
<div class="footer-inner">
<div class="newsletter-row">
<div class="container">
<div class="row"> 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
<div class="newsletter-wrap">
<h5>NEWSLETTER</h5>
<h4>GET DISCOUNT 30% OFF</h4>
<form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-205" method="post" data-id="205" data-name="" ><div class="mc4wp-form-fields"><div id="container_form_news">
<div id="container_form_news2"> <input type="email" id="newsletter1" name="EMAIL" placeholder="Your email address" required /> <button type="submit" class="button subscribe"><span>Subscribe</span></button></div></div></div><label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp" value="1608556830" /><input type="hidden" name="_mc4wp_form_id" value="205" /><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" /><div class="mc4wp-response"></div></form></div></div></div></div></div><div class="footer-middle">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="footer-column">
<div class="klbfooterwidget widget_nav_menu"><h4>Shopping Guide</h4><div class="menu-shopping-guide-container"><ul id="menu-shopping-guide" class="menu"><li id="menu-item-474" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-474"><a href="https://klbtheme.com/qualis/blog/">Blog</a></li> <li id="menu-item-475" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-475"><a href="#">FAQs</a></li> <li id="menu-item-476" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-476"><a href="#">Payment</a></li> <li id="menu-item-477" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-477"><a href="#">Shipment</a></li> <li id="menu-item-478" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-478"><a href="#">Where is my order?</a></li> <li id="menu-item-479" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-479"><a href="#">Return Policy</a></li> </ul></div></div></div></div><div class="col-md-3 col-sm-6">
<div class="footer-column">
<div class="klbfooterwidget widget_nav_menu"><h4>STYLE Advisor</h4><div class="menu-style-advisor-container"><ul id="menu-style-advisor" class="menu"><li id="menu-item-480" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-480"><a href="https://klbtheme.com/qualis/my-account/">Your Account</a></li> <li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481"><a href="#">Information</a></li> <li id="menu-item-482" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-482"><a href="#">Addresses</a></li> <li id="menu-item-483" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-483"><a href="#">Discount</a></li> <li id="menu-item-484" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-484"><a href="https://klbtheme.com/qualis/my-account/orders/">Orders History</a></li> <li id="menu-item-485" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-485"><a href="#">Order Tracking</a></li> </ul></div></div></div></div><div class="col-md-3 col-sm-6">
<div class="footer-column">
<div class="klbfooterwidget widget_nav_menu"><h4>Information</h4><div class="menu-information-container"><ul id="menu-information" class="menu"><li id="menu-item-486" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-486"><a href="#">Site Map</a></li> <li id="menu-item-487" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-487"><a href="#">Search Terms</a></li> <li id="menu-item-488" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-488"><a href="#">Advanced Search</a></li> <li id="menu-item-489" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-489"><a href="https://klbtheme.com/qualis/about-us/">About Us</a></li> <li id="menu-item-490" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-490"><a href="https://klbtheme.com/qualis/contact-us/">Contact Us</a></li> <li id="menu-item-491" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-491"><a href="#">Suppliers</a></li> </ul></div></div></div></div><div class="col-md-3 col-sm-6">
<div class="footer-column">
<div class="klbfooterwidget widget_contact_box"><h4>Contact Us</h4>		
<div class="contacts-info">
<div class="phone-footer"><i class="fa fa-map-marker"></i><p>KlbTheme, 789 Main rd,<br> Anytown, CA 12345 USA</p></div><div class="phone-footer"><i class="fa fa-phone"></i><p>+ 888 456-7890</p></div><div class="phone-footer"><i class="fa fa-envelope"></i><p>Qualis@klbtheme.com</p></div></div></div></div></div></div></div></div></div><div class="footer-top">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-4">
<div class="social"> <ul> <li class="facebook"><a href="#" target="_blank"> <i class="fa fa-facebook"></i></a></li> <li class="twitter"><a href="#" target="_blank"> <i class="fa fa-twitter"></i></a></li> <li class="google-plus"><a href="#" target="_blank"> <i class="fa fa-google-plus"></i></a></li> <li class="rss"><a href="#" target="_blank"> <i class="fa fa-rss"></i></a></li> <li class="pinterest"><a href="#" target="_blank"> <i class="fa fa-pinterest"></i></a></li> <li class="linkedin"><a href="#" target="_blank"> <i class="fa fa-linkedin"></i></a></li> <li class="youtube"><a href="#" target="_blank"> <i class="fa fa-youtube"></i></a></li> </ul></div></div><div class="col-sm-4 col-xs-12 coppyright"> © 2020 KlbTheme. All Rights Reserved.</div><div class="col-xs-12 col-sm-4">
<div class="payment-accept"> <img onload="Wpfcll.r(this,true);" src="https://klbtheme.com/qualis/wp-content/plugins/wp-fastest-cache-premium/pro/images/blank.gif" data-wpfc-original-src="https://klbtheme.com/qualis/wp-content/uploads/2019/01/payment-1.png" alt="payment-image"> <img onload="Wpfcll.r(this,true);" src="https://klbtheme.com/qualis/wp-content/plugins/wp-fastest-cache-premium/pro/images/blank.gif" data-wpfc-original-src="https://klbtheme.com/qualis/wp-content/uploads/2019/01/payment-3.png" alt="payment-image"> <img onload="Wpfcll.r(this,true);" src="https://klbtheme.com/qualis/wp-content/plugins/wp-fastest-cache-premium/pro/images/blank.gif" data-wpfc-original-src="https://klbtheme.com/qualis/wp-content/uploads/2019/01/payment-2.png" alt="payment-image"> <img onload="Wpfcll.r(this,true);" src="https://klbtheme.com/qualis/wp-content/plugins/wp-fastest-cache-premium/pro/images/blank.gif" data-wpfc-original-src="https://klbtheme.com/qualis/wp-content/uploads/2019/01/payment-4.png" alt="payment-image"></div></div></div></div></div></footer></div><div id="mobile-menu"> <ul id="menu-menu-1"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-248"><a href="https://klbtheme.com/qualis/">Home</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-366 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/">Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-361 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/stone-fruits/">Stone Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-362"><a href="https://klbtheme.com/qualis/product-category/fruits/stone-fruits/doughnut-peachs/">Doughnut Peachs</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-363"><a href="https://klbtheme.com/qualis/product-category/fruits/stone-fruits/italian-fruits/">Italian Fruits</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-364"><a href="https://klbtheme.com/qualis/product-category/fruits/stone-fruits/nectarines/">Nectarines</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-365"><a href="https://klbtheme.com/qualis/product-category/fruits/stone-fruits/sweet-apricots/">Sweet Apricots</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-356 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/seasonal-fruits/">Seasonal Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-357"><a href="https://klbtheme.com/qualis/product-category/fruits/seasonal-fruits/black-jamuns/">Black Jamuns</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-358"><a href="https://klbtheme.com/qualis/product-category/fruits/seasonal-fruits/fresh-mangos/">Fresh Mangos</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-359"><a href="https://klbtheme.com/qualis/product-category/fruits/seasonal-fruits/longans/">Longans</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-360"><a href="https://klbtheme.com/qualis/product-category/fruits/seasonal-fruits/organic-litchis/">Organic Litchis</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-381 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/tropical-fruits/">Tropical Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-382"><a href="https://klbtheme.com/qualis/product-category/fruits/tropical-fruits/coconuts/">Coconuts</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-383"><a href="https://klbtheme.com/qualis/product-category/fruits/tropical-fruits/dragonfruits/">Dragonfruits</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-384"><a href="https://klbtheme.com/qualis/product-category/fruits/tropical-fruits/passionfruit/">Passionfruit</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-385"><a href="https://klbtheme.com/qualis/product-category/fruits/tropical-fruits/pomegranates/">Pomegranates</a></li> </ul> </li> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-386"><a href="#">HIDDEN COLUMN</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-355 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/citrus-fruits/">Citrus Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-372"><a href="https://klbtheme.com/qualis/product-category/fruits/citrus-fruits/fresh-oranges/">Fresh Oranges</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-373"><a href="https://klbtheme.com/qualis/product-category/fruits/citrus-fruits/grapefruits/">Grapefruits</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-374"><a href="https://klbtheme.com/qualis/product-category/fruits/citrus-fruits/organic-limes/">Organic Limes</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-375"><a href="https://klbtheme.com/qualis/product-category/fruits/citrus-fruits/yellow-lemons/">Yellow Lemons</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-376 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/large-fruits/">Large Fruits</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-380"><a href="https://klbtheme.com/qualis/product-category/fruits/large-fruits/pineapples/">Pineapples</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-379"><a href="https://klbtheme.com/qualis/product-category/fruits/large-fruits/organic-papayas/">Organic Papayas</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-377"><a href="https://klbtheme.com/qualis/product-category/fruits/large-fruits/fresh-melons/">Fresh Melons</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-378"><a href="https://klbtheme.com/qualis/product-category/fruits/large-fruits/grapefruits-large-fruits/">Grapefruits</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-367 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/">Berries % Cherries</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-368"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/blackberries/">Blackberries</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-370"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/raspberries/">Raspberries</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-371"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/strawberries/">Strawberries</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-369"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/cherries/">Cherries</a></li> </ul> </li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-387 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/">Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-388 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/veg-salads/">Veg Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-390"><a href="https://klbtheme.com/qualis/product-category/salads/veg-salads/tomatoes/">Tomatoes</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-389"><a href="https://klbtheme.com/qualis/product-category/salads/veg-salads/peppers-capsicums/">Peppers &#038; Capsicums</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-391"><a href="https://klbtheme.com/qualis/product-category/salads/veg-salads/cucumbers/">Cucumbers</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-392"><a href="https://klbtheme.com/qualis/product-category/salads/veg-salads/avocados/">Avocados</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-393 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/dressing-salads/">Dressing Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-394"><a href="https://klbtheme.com/qualis/product-category/salads/dressing-salads/hellmanns/">Hellmann&#8217;s</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-395"><a href="https://klbtheme.com/qualis/product-category/salads/dressing-salads/giuseppe-giusti/">Giuseppe Giusti</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-396"><a href="https://klbtheme.com/qualis/product-category/salads/dressing-salads/unitednature/">Unitednature</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-397"><a href="https://klbtheme.com/qualis/product-category/salads/dressing-salads/walden-farms/">Walden Farms</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-398 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/fruits-salads/">Fruits Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-399"><a href="https://klbtheme.com/qualis/product-category/salads/fruits-salads/pineapples-fruits-salads/">Pineapples</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-400"><a href="https://klbtheme.com/qualis/product-category/salads/fruits-salads/red-apple/">Red Apple</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-401"><a href="https://klbtheme.com/qualis/product-category/fruits/berries-cherries/strawberries/">Strawberries</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-402"><a href="https://klbtheme.com/qualis/product-category/salads/fruits-salads/row-mangos/">Row Mangos</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-403 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/bagged-salads/">Bagged Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-404"><a href="https://klbtheme.com/qualis/product-category/salads/bagged-salads/italian-baby-spinach/">Italian Baby Spinach</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-405"><a href="https://klbtheme.com/qualis/product-category/salads/bagged-salads/australia-green-kale/">Australia Green Kale</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-406"><a href="https://klbtheme.com/qualis/product-category/salads/bagged-salads/oro-rocket-salad/">Oro Rocket Salad</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-407"><a href="https://klbtheme.com/qualis/product-category/salads/bagged-salads/sustenir-fresh-toscano/">Sustenir Fresh Toscano</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-408 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/lettuce-salads/">Lettuce Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-409"><a href="https://klbtheme.com/qualis/product-category/salads/lettuce-salads/butterhead/">Butterhead</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-411"><a href="https://klbtheme.com/qualis/product-category/salads/lettuce-salads/red-coral/">Red Coral</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-412"><a href="https://klbtheme.com/qualis/product-category/salads/lettuce-salads/rolla-rosa-lettuce/">Rolla Rosa Lettuce</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-410"><a href="https://klbtheme.com/qualis/product-category/salads/lettuce-salads/summercrisp/">Summercrisp</a></li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-413 parent drop-menu"><a href="https://klbtheme.com/qualis/product-category/salads/bread-salads/">Bread Salads</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-414"><a href="https://klbtheme.com/qualis/product-category/salads/bread-salads/green-goddess/">Green Goddess</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-415"><a href="https://klbtheme.com/qualis/product-category/salads/bread-salads/grilled-broccoli/">Grilled Broccoli</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-417"><a href="https://klbtheme.com/qualis/product-category/salads/bread-salads/panzanella/">Panzanella</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-416"><a href="https://klbtheme.com/qualis/product-category/salads/bread-salads/green-tomato/">Green Tomato</a></li> </ul> </li> </ul> </li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-419"><a href="https://klbtheme.com/qualis/product-category/juices/">Juices</a></li> <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-418"><a href="https://klbtheme.com/qualis/product-category/meats/">Meats</a></li> <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-249 parent drop-menu"><a href="#">Pages</a> <ul class="sub-menu"> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426"><a href="https://klbtheme.com/qualis/shop/">Products Grid</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-287 current_page_item menu-item-427"><a href="https://klbtheme.com/qualis/products-list-view/" aria-current="page">Products List</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-product menu-item-428"><a href="https://klbtheme.com/qualis/product/fresh-organic-mustard-leaves/">Product Detail</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-423"><a href="https://klbtheme.com/qualis/cart/">Cart Page</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-422"><a href="https://klbtheme.com/qualis/checkout/">Checkout</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-424"><a href="https://klbtheme.com/qualis/wishlist/">Wishlist</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-425"><a href="https://klbtheme.com/qualis/my-account/">My account</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-433"><a href="https://klbtheme.com/qualis/blog/">Blog</a></li> <li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-434"><a href="https://klbtheme.com/qualis/powerful-and-flexible-premium-ecommerce-themes/">Blog Detail</a></li> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-420"><a href="https://klbtheme.com/qualis/404">404 Error Page</a></li> </ul> </li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-429"><a href="https://klbtheme.com/qualis/contact-us/">Contact Us</a></li> </ul></div><script type="text/html" id="wpb-modifications"></script>	
<noscript id="wpfc-google-fonts"><link rel='stylesheet' id='qualis-font-css' href='//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700|Oswald:300,400,500,600,700|Open+Sans:700,600,800,400|Rubik:400,400i,500,500i,700,700i,900&#038;subset=latin,latin-ext' type='text/css' media='all'/>
</noscript>
<script id='wc-add-to-cart-js-extra'>var wc_add_to_cart_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/klbtheme.com\/qualis\/cart\/","is_cart":"","cart_redirect_after_add":"no"};</script>
<script>(function (){
var c=document.body.className;
c=c.replace(/woocommerce-no-js/, 'woocommerce-js');
document.body.className=c;
})()</script>
<script id="contact-form-7-js-extra">var wpcf7={"apiSettings":{"root":"https:\/\/klbtheme.com\/qualis\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};</script>
<script id="woocommerce-js-extra">var woocommerce_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%"};</script>
<script id="wc-cart-fragments-js-extra">var wc_cart_fragments_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_b82fd1e602d3929a2e8e26009ed3c00d","fragment_name":"wc_fragments_b82fd1e602d3929a2e8e26009ed3c00d","request_timeout":"5000"};</script>
<script id="yith-woocompare-main-js-extra">var yith_woocompare={"ajaxurl":"\/qualis\/?wc-ajax=%%endpoint%%","actionadd":"yith-woocompare-add-product","actionremove":"yith-woocompare-remove-product","actionview":"yith-woocompare-view-table","actionreload":"yith-woocompare-reload-product","added_label":"Added","table_title":"Product Comparison","auto_open":"yes","loader":"https:\/\/klbtheme.com\/qualis\/wp-content\/plugins\/yith-woocommerce-compare\/assets\/images\/loader.gif","button_text":"Compare","cookie_name":"yith_woocompare_list","close_label":"Close"};</script>
<script id="tinvwl-js-extra">var tinvwl_add_to_wishlist={"text_create":"Create New","text_already_in":"Product already in Wishlist","simple_flow":"","hide_zero_counter":"","i18n_make_a_selection_text":"Please select some product options before adding this product to your wishlist.","tinvwl_break_submit":"No items or actions are selected.","tinvwl_clipboard":"Copied!","allow_parent_variable":"","block_ajax_wishlists_data":"","update_wishlists_data":"","hash_key":"ti_wishlist_data_b82fd1e602d3929a2e8e26009ed3c00d","nonce":"2a20c81172","rest_root":"https:\/\/klbtheme.com\/qualis\/wp-json\/","plugin_url":"https:\/\/klbtheme.com\/qualis\/wp-content\/plugins\/ti-woocommerce-wishlist\/"};</script>
<script id="qualis-quick-ajax-js-extra">var MyAjax={"ajaxurl":"https:\/\/klbtheme.com\/qualis\/wp-admin\/admin-ajax.php","security":"542fc92532","current_page":"1","per_page":"0"};</script>
<script id="qualis-slidetext-js-extra">var slidetext={"speed":"3000"};</script>
<script src="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/1pebfep6_f9lvt.js"></script>
<script>function setREVStartSize(e){
try {
var pw=document.getElementById(e.c).parentNode.offsetWidth,
newh;
pw=pw===0||isNaN(pw) ? window.innerWidth:pw;
e.tabw=e.tabw===undefined ? 0:parseInt(e.tabw);
e.thumbw=e.thumbw===undefined ? 0:parseInt(e.thumbw);
e.tabh=e.tabh===undefined ? 0:parseInt(e.tabh);
e.thumbh=e.thumbh===undefined ? 0:parseInt(e.thumbh);
e.tabhide=e.tabhide===undefined ? 0:parseInt(e.tabhide);
e.thumbhide=e.thumbhide===undefined ? 0:parseInt(e.thumbhide);
e.mh=e.mh===undefined||e.mh==""||e.mh==="auto" ? 0:parseInt(e.mh,0);
if(e.layout==="fullscreen"||e.l==="fullscreen")
newh=Math.max(e.mh,window.innerHeight);
else{
e.gw=Array.isArray(e.gw) ? e.gw:[e.gw];
for (var i in e.rl) if(e.gw[i]===undefined||e.gw[i]===0) e.gw[i]=e.gw[i-1];
e.gh=e.el===undefined||e.el===""||(Array.isArray(e.el)&&e.el.length==0)? e.gh:e.el;
e.gh=Array.isArray(e.gh) ? e.gh:[e.gh];
for (var i in e.rl) if(e.gh[i]===undefined||e.gh[i]===0) e.gh[i]=e.gh[i-1];
var nl=new Array(e.rl.length),
ix=0,
sl;
e.tabw=e.tabhide>=pw ? 0:e.tabw;
e.thumbw=e.thumbhide>=pw ? 0:e.thumbw;
e.tabh=e.tabhide>=pw ? 0:e.tabh;
e.thumbh=e.thumbhide>=pw ? 0:e.thumbh;
for (var i in e.rl) nl[i]=e.rl[i]<window.innerWidth ? 0:e.rl[i];
sl=nl[0];
for (var i in nl) if(sl>nl[i]&&nl[i]>0){ sl=nl[i]; ix=i;}
var m=pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1:(pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
newh=(e.type==="carousel"&&e.justify==="true" ? e.gh[ix]:(e.gh[ix] * m)) + (e.tabh + e.thumbh);
}
if(window.rs_init_css===undefined) window.rs_init_css=document.head.appendChild(document.createElement("style"));
document.getElementById(e.c).height=newh;
window.rs_init_css.innerHTML +="#"+e.c+"_wrapper { height: "+newh+"px }";
} catch(e){
console.log("Failure at Presize of Slider:" + e)
}};</script>
<script>(function(){
window.mc4wp=window.mc4wp||{
listeners: [],
forms: {
on: function(evt, cb){
window.mc4wp.listeners.push({
event:evt,
callback: cb
}
);
}}
}})();</script>
<script>(function(){function maybePrefixUrlField(){
if(this.value.trim()!==''&&this.value.indexOf('http')!==0){
this.value="http://" + this.value;
}}
var urlFields=document.querySelectorAll('.mc4wp-form input[type="url"]');
if(urlFields){
for (var j=0; j < urlFields.length; j++){
urlFields[j].addEventListener('blur', maybePrefixUrlField);
}}
})();</script>
<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/f41ln7h0_f9lvt.js'></script>
<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/o8l0w9j_f9lvt.js' id='tinvwl-js'></script>
<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/8xa34603_f9lxl.js'></script>
<script>document.addEventListener('DOMContentLoaded',function(){function wpfcgl(){var wgh=document.querySelector('noscript#wpfc-google-fonts').innerText, wgha=wgh.match(/<link[^\>]+>/gi);for(i=0;i<wgha.length;i++){var wrpr=document.createElement('div');wrpr.innerHTML=wgha[i];document.body.appendChild(wrpr.firstChild);}}wpfcgl();});</script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div><link rel="stylesheet" id="qualis-font-css" href="./Products_files/css" type="text/css" media="all"><a href="https://klbtheme.com/qualis/products-list-view/#" id="toTop" style="display: none;"><span id="toTopHover"></span></a></body></html>
</html>