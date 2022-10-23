<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Include Configuration File
if (file_exists("../configuration.php")) {
	require_once("../configuration.php");
} else {
	echo "Missing Configuration File";
	exit();
}
// Include Language File
if (file_exists("../languages/lang." . $ariaConfig_language . ".php")) {
	require_once("../languages/lang." . $ariaConfig_language . ".php");
} else {
	echo "Missing Language File";
	exit();
}
// Include Params File
if (file_exists("../params/params." . $ariaConfig_language . ".php")) {
	include("../params/params." . $ariaConfig_language . ".php");
} else {
	echo "Missing Params File";
	exit();
}
// Include Database Controller
if (file_exists("../include/database.php")) {
	include("../include/database.php");
} else {
	echo "Missing Database File";
	exit();
}
// Include System File
if (file_exists("../include/ariacms.php")) {
	include	("../include/ariacms.php");
} else {
	echo "Missing System File";
	exit();
}



$id = trim($_REQUEST["id"]);

/*
$type = trim($_REQUEST['type']);
switch ($type) {
	case 'add':
		if ($pid != '') {
			if (!isset($_SESSION['orderCart'])) {
				$_SESSION['orderCart'] = array();
			}
			$_SESSION['orderCart'][$pid] += $quantity;
		}
		break;
	case 'edit':
		foreach ($_SESSION['orderCart'] as $productID => $value) {
			if ($productID == $pid) {
				$_SESSION['orderCart'][$productID] = $quantity;
			}
		}
		break;
	case 'delete':
		if ($pid) {
			foreach ($_SESSION['orderCart'] as $productID => $value) {
				if ($productID == $pid) {
					unset($_SESSION['orderCart'][$productID]);
				}
			}
		} else {
			unset($_SESSION['orderCart']);
		}
		break;
}

*/

	$database = new database($ariaConfig_server, $ariaConfig_username, $ariaConfig_password, $ariaConfig_database);
	$ariacms = new ariacms();
	$params = new params();
	
	$query = "SELECT ((product_price-product_sale)/product_price)*100 'discount' ,a.* FROM `e4_posts` a where id = ".$id;
	$database->setQuery($query);
	$product = $database->loadRow();
	
	$query = "SELECT * FROM `e4_posts_image` where object_id =".$product["id"] ;
	$database->setQuery($query);
	$products_image = $database->loadObjectList();
	$count = count($products_image);

?>
<div class="ajaxphp-results" id="view">
<div class="popup1 klb-quick-view" id="display_view" style="display:block;">
<div class="quick-view-box">
<img src=" <?= $ariacms->actual_link ?>upload/close-icon.png" alt="close" class="x" onclick="close_view()">
<div class="product-view product-essential container"><div class="row">
<div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
<?php if($product['discount']>0){?>
<div class="new-label new-top-left">Hot</div>

<div class="sale-label sale-top-left">-<?= number_format($product['discount'],0)?>%</div>
<?php }?>
<div class="product-image"><div class="product-full"> 
<img id="product-zoom" src="<?= $product['image']?>" data-zoom-image="<?= product['image']?>" alt="product-image"> </div>
<div class="more-views">
<div class="slider-items-products">
<div  class="product-flexslider hidden-buttons product-img-thumb">

	<div class="slider-items slider-width-col4 block-content owl-carousel owl-theme" style="opacity: 1; display: block;">
		<div class="owl-wrapper-outer">
			<div class="owl-wrapper" style="width: 560px; left: 0px; display: block;">
				<?php foreach($products_image as $product_image){?>
					<div class="owl-item" style="width: 56px;">
						<div class="more-views-items"> 
							<a href="#" data-image="<?= $product_image->image_link?>" data-zoom-image="<?= $product_image->image_link?>"> 
							<img id="product-zoom" src="<?= $product_image->image_link?>" alt="product-image"> </a>
						</div>
					</div>	 
				<?php }?>
			</div>
		</div>
		<?php if($count > 4){?>
		 <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"><a class="flex-prev"></a></div><div class="owl-next"><a class="flex-next"></a></div></div></div>
		<?php }?>
	 </div>
	 
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>
	 <div class="product-shop col-lg- col-sm-7 col-xs-12">
	 <div class="product-name"><h1><?= $product[$params->title]?> </h1></div>
	 <div class="ratings">
	 <div class="star-rating" role="img" aria-label="Rated <?= $product['rating']?> out of 5"><span style="width:<?= $product['rating']*20?>%">Rated <strong class="rating"><?= $product['rating']?></strong> out of 5 based on <span class="rating">1</span> customer rating</span>
	 </div>
	 <p class="rating-links">
	 <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product['url_part']?>.html"><?= $product['comment_count']?> <?= _REVIEWS?></a> <span class="separator">|</span> 
	 <a href="<?= $ariacms->actual_link?>chi-tiet/<?= $product['url_part']?>.html?>#reviews"><?=_Add_a_review?></a></p></div>
	 <div class="price-block">
	 <div class="price-box">
	 <p class="special-price"> 
	 <span class="price-label">Special Price</span> 
	 <span id="product-price-48" class="price"> 
		<?php if($product['product_price']>0){?>
		 <del>
			<span class="woocommerce-Price-amount amount"><bdi><?= $product['product_price']?></bdi><span class="woocommerce-Price-currencySymbol">Đ</span></span>
		 </del> 
		 <?php }?>
		 <ins>
		 <span class="woocommerce-Price-amount amount"><bdi><?= number_format($product['product_sale'],0,""," ")?></bdi><span class="woocommerce-Price-currencySymbol">Đ</span></span>
		 </ins> 
	 </span> 
	 </p></div></div>
 <div class="add-to-box">
	<div class="add-to-cart">
		<form class="variations_form cart" action="<?=$ariacms->actual_link?>chi-tiet/<?= $product['url_part']?>.html" method="post" enctype="multipart/form-data" data-product_id="86" data-product_variations="[{&quot;attributes&quot;:{&quot;attribute_color&quot;:&quot;red&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:50,&quot;display_regular_price&quot;:50,&quot;image&quot;:{&quot;title&quot;:&quot;p16&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-600x600.jpg&quot;,&quot;srcset&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-600x600.jpg 600w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-150x150.jpg 150w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-300x300.jpg 300w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-768x768.jpg 768w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-450x450.jpg 450w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-80x80.jpg 80w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-99x99.jpg 99w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg 800w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg&quot;,&quot;full_src_w&quot;:800,&quot;full_src_h&quot;:800,&quot;gallery_thumbnail_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-99x99.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:99,&quot;gallery_thumbnail_src_h&quot;:99,&quot;thumb_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-80x80.jpg&quot;,&quot;thumb_src_w&quot;:80,&quot;thumb_src_h&quot;:80,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:87,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;><bdi><span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;pound;<\/span>50.00<\/bdi><\/span><\/span>&quot;,&quot;sku&quot;:&quot;K37SA62&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:549,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;},{&quot;attributes&quot;:{&quot;attribute_color&quot;:&quot;yellow&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:60,&quot;display_regular_price&quot;:60,&quot;image&quot;:{&quot;title&quot;:&quot;p16&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-600x600.jpg&quot;,&quot;srcset&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-600x600.jpg 600w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-150x150.jpg 150w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-300x300.jpg 300w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-768x768.jpg 768w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-450x450.jpg 450w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-80x80.jpg 80w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-99x99.jpg 99w, https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg 800w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16.jpg&quot;,&quot;full_src_w&quot;:800,&quot;full_src_h&quot;:800,&quot;gallery_thumbnail_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-99x99.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:99,&quot;gallery_thumbnail_src_h&quot;:99,&quot;thumb_src&quot;:&quot;https:\/\/klbtheme.com\/qualis\/wp-content\/uploads\/2018\/12\/p16-80x80.jpg&quot;,&quot;thumb_src_w&quot;:80,&quot;thumb_src_h&quot;:80,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:87,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;><bdi><span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;pound;<\/span>60.00<\/bdi><\/span><\/span>&quot;,&quot;sku&quot;:&quot;K37SA62&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:550,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;}]">
			
						
				<div class="single_variation_wrap">
					<div class="woocommerce-variation single_variation"></div>
					<div class="woocommerce-variation-add-to-cart variations_button">
						<div class="quantity">
							<label class="screen-reader-text" for="quantity_5ff1ee61951f0"><?= $product[$params->title]?> </label>
							<button onclick="down()" class="minus reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
							<input type="text" class="count input-text qty input-text qty text" id="inp" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
							<button onclick="add()" class="plus increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
						</div>
						<button  type="submit" class="single_add_to_cart_button button alt"><?= _ADD_TO_CART?></button>
						<input type="hidden" name="add-to-cart" value="86">
						<input type="hidden" name="product_id" value="86">
						<input type="hidden" name="variation_id" class="variation_id" value="0">
					</div>
				</div>
		</form>
	</div>
	<script>
		function add(){
			document.getElementById("inp").value ++;
		}
		function down(){
			if(document.getElementById("inp").value>1)
				document.getElementById("inp").value --;
		}
	</script>
</div>
</div>
</div>
</div>
</div> 
<div id="fade" style="display: block;"></div>
</div>
</div>
