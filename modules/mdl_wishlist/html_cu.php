<?php
class View
{
	static function viewhome()
	{
		global $ariacms;
		global $params;
		global $database;
		global $ariaConfig_template;
?>
		<!DOCTYPE html>
		<html lang="vi">

		<head>
		<?= $ariacms->getBlock("head"); ?>
			<title>Danh sách yêu thích - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>
			<meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			<meta name="keywords" content="<?= ($ariacms->web_information->{$params->meta_keyword} != '') ? $ariacms->web_information->{$params->meta_keyword} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:title" content="<?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
			<link rel="alternate" type="application/rss+xml" title="Qualis - Responsive eCommerce Theme &raquo; Feed" href="https://klbtheme.com/qualis/feed/"/>
			<link rel="alternate" type="application/rss+xml" title="Qualis - Responsive eCommerce Theme &raquo; Comments Feed" href="https://klbtheme.com/qualis/comments/feed/"/>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l0xw9klt_f9lvt.css" media="all"/>
			<style id='rs-plugin-settings-inline-css'>#rs-demo-id{}</style>
			<style id='woocommerce-inline-inline-css'>.woocommerce form .form-row .required{visibility:visible;}</style>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l9ajug3i_f9lvt.css" media="all"/>
			<style id='font-awesome-inline-css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important;}</style>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/8uu5fujd_f9lxl.css" media="all"/>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		</head>
		<body>
			<?= $ariacms->getBlock("header"); ?>
			
			<section style="padding-bottom:0px" class="shop-cart spad">
				<div class="page-heading">
					<div class="page-title">
						<h2><?= _WISHLIST?></h2>
					</div>
				</div>
				
				<div class="main-container col1-layout">   
					
					<div class="main container" id="main-container"> 
						<?php if ($_SESSION['orderWishlist']) {
									$id= array();
									foreach ($_SESSION['orderWishlist'] as $productID=>$value) {
										array_push($id,$productID); 
									}
								}
								//print_r($_SESSION['orderWishlist']);die;
								$id=implode(",",$id);
								$count = count($id);
								$query = "SELECT  a.* FROM e4_posts a WHERE  a.id in ({$id})";
								$database->setQuery($query);
								$products = $database->loadObjectList();?>
						<div class="row">                    
							<div class="std">
								<div class="wrapper_bl">
									<div class="form_background">
										<div class="klb-post">
											<div class="tinv-wishlist woocommerce tinv-wishlist-clear">
												<div class="tinv-header">
													<h2><?= _YOUR_WISHLIST?></h2>
												</div>		
												<?php if($count ==0){?>
													<p class="cart-empty"><?= _YOUR_WISHLIST." "._EMPTY?>.</p>
													<p class="return-to-shop">
														<a class="button wc-backward" href="#"><?= _Return_To_Shop?></a>
													</p>
												<?php }else{?>												
													<form action="" method="post" autocomplete="off">
														<table class="tinvwl-table-manage-list">
															<thead>
																<tr>
																	<th class="product-cb"><input type="checkbox" class="global-cb" title="<?= _SELECT_ALL?>"></th>
																	<th class="product-remove"></th>
																	<th class="product-thumbnail"><?= _Image?></th>
																	<th class="product-name">
																		<span class="tinvwl-full"><?= _PRODUCT_NAME?></span>
																		<span class="tinvwl-mobile"><?= _PRODUCT?></span>
																	</th>
																<th class="product-price"><?= _UNIT_PRICE?></th>
																<th class="product-action">&nbsp;</th>
																</tr>
															</thead>
													<tbody>		
														<?php foreach($products as $product){?>										
															<tr class="wishlist_item">
																<td class="product-cb">
																	<input type="checkbox" name="wishlist_pr[]" value="<?= $product->id?>" title="<?= _SELECT?>">							
																</td>
																<td >
																	<a href="" onclick="deleteWish(<?= $product->id?>)" name="tinvwl-remove" value="<?= $product->id?>" title="<?= _REMOVE?>"><b>X</b></a>
																</td>
																<td class="product-thumbnail">
																	<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html">
																		<img width="80" height="80" src="<?= $product->image?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="<?= $product->image?> 80w, <?= $product->image?> 150w, <?= $product->image?> 300w, <?= $product->image?> 768w, <?= $product->image?> 450w, <?= $product->image?> 600w, <?= $product->image?> 800w" sizes="(max-width: 80px) 100vw, 80px" /></a>						
																</td>
																<td class="product-name">
																	<a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?= $product->{$params->title} ?></a>						
																</td>
																<td class="product-price">
																	<del>
																		<span class="woocommerce-Price-amount amount">
																			<bdi><span class="woocommerce-Price-currencySymbol">&pound;</span><?= $product->product_price?></bdi></span>
																		</del> 
																		<ins>
																			<span class="woocommerce-Price-amount amount">
																				<bdi><span class="woocommerce-Price-currencySymbol">&pound;</span><?= $product->product_sale?></bdi>
																			</span>
																		</ins>							
																</td>
																
																<td class="product-action">
																	<a onclick="addCart(<?= $product->id?>)" class="button alt" name="tinvwl-add-to-cart" value="<?= $product->id?>" title="Add to Cart">
																		<i class="ftinvwl ftinvwl-shopping-cart"></i>
																		<span class="tinvwl-txt"><?= _ADD_TO_CART?></span>
																	</a>
																</td>
															</tr>
														<?php }?>
													</tbody>
													<tfoot>
														<tr>
															<td colspan="100">
																<div class="tinvwl-to-left look_in">
																	<input type="hidden" name="lists_per_page" value="10" id="tinvwl_lists_per_page"  />
																	<select name="product_actions" id="tinvwl_product_actions" class="tinvwl-break-input-filed" >
																		<option value="" selected="selected"><?= _SELECT?></option>
																		<option value="add"><?= _ADD_TO_CART?></option>
																		<option value="remove"><?= _REMOVE?></option>
																	</select>
																	<button type="submit" class="button tinvwl-break-input tinvwl-break-checkbox" name="tinvwl-action" value="product_apply" title="Apply Action"><span class='tinvwl-mobile'><?= _ACTIONS?></span></button>
																</div>
																			
																<input type="hidden" id="wishlist_nonce" name="wishlist_nonce" value="2c77f09a89" />
																<input type="hidden" name="_wp_http_referer" value="" />		
															</td>
														</tr>
													</tfoot>
												</table>
											</form>
											<?php }?>
										<div class="social-buttons">
											<span><?= _SHARE?></span>
											<ul>
												<li>
													<a href="#" class="social social-facebook " title="Facebook">
														<i class="ftinvwl ftinvwl-facebook"></i>
													</a>
												</li>
												<li>
													<a href="#"  class="social social-twitter "	title="Twitter">
														<i class="ftinvwl ftinvwl-twitter"></i>
													</a>
												</li>
											</ul>
										</div>
										<div class="tinv-lists-nav tinv-wishlist-clear"> </div>
									</div>
								</div>
							</div>							
						</div>
					</div> 
				</div>         
			</div>
		</div>
		<script>
		function deleteWish(id){
			var f = "pid=" + id + "&type=delete";
			var _url = "<?= $ariacms->actual_link ?>ajax/ajax.wishlist.php?"+f;
			if(confirm("Bạn có chắc là muốn xóa không?")){
			$.ajax({
				url: _url,
				data: f,
				cache: false,
				context: document.body,
				success: function(data) {
					alert("Xóa thành công ra danh sách yêu thích");
					location.reload();
				}
			});
			}
		}
		</script>
	</section>
	<?= $ariacms->getBlock("footer"); ?>
			
<noscript id="wpfc-google-fonts"><link rel='stylesheet' id='qualis-font-css' href='//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700|Oswald:300,400,500,600,700|Open+Sans:700,600,800,400|Rubik:400,400i,500,500i,700,700i,900&#038;subset=latin,latin-ext' type='text/css' media='all'/>
</noscript>
<script id='wc-add-to-cart-js-extra'>var wc_add_to_cart_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/klbtheme.com\/qualis\/cart\/","is_cart":"","cart_redirect_after_add":"no"};</script>
<script>(function (){
var c=document.body.className;
c=c.replace(/woocommerce-no-js/, 'woocommerce-js');
document.body.className=c;
})()</script>
<script id='contact-form-7-js-extra'>var wpcf7={"apiSettings":{"root":"https:\/\/klbtheme.com\/qualis\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};</script>
<script id='woocommerce-js-extra'>var woocommerce_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%"};</script>
<script id='wc-cart-fragments-js-extra'>var wc_cart_fragments_params={"ajax_url":"\/qualis\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/qualis\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_b82fd1e602d3929a2e8e26009ed3c00d","fragment_name":"wc_fragments_b82fd1e602d3929a2e8e26009ed3c00d","request_timeout":"5000"};</script>
<script id='yith-woocompare-main-js-extra'>var yith_woocompare={"ajaxurl":"\/qualis\/?wc-ajax=%%endpoint%%","actionadd":"yith-woocompare-add-product","actionremove":"yith-woocompare-remove-product","actionview":"yith-woocompare-view-table","actionreload":"yith-woocompare-reload-product","added_label":"Added","table_title":"Product Comparison","auto_open":"yes","loader":"https:\/\/klbtheme.com\/qualis\/wp-content\/plugins\/yith-woocommerce-compare\/assets\/images\/loader.gif","button_text":"Compare","cookie_name":"yith_woocompare_list","close_label":"Close"};</script>
<script id='tinvwl-js-extra'>var tinvwl_add_to_wishlist={"text_create":"Create New","text_already_in":"Product already in Wishlist","simple_flow":"","hide_zero_counter":"","i18n_make_a_selection_text":"Please select some product options before adding this product to your wishlist.","tinvwl_break_submit":"No items or actions are selected.","tinvwl_clipboard":"Copied!","allow_parent_variable":"","block_ajax_wishlists_data":"","update_wishlists_data":"","hash_key":"ti_wishlist_data_b82fd1e602d3929a2e8e26009ed3c00d","nonce":"2a20c81172","rest_root":"https:\/\/klbtheme.com\/qualis\/wp-json\/","plugin_url":"https:\/\/klbtheme.com\/qualis\/wp-content\/plugins\/ti-woocommerce-wishlist\/"};</script>
<script id='qualis-quick-ajax-js-extra'>var MyAjax={"ajaxurl":"https:\/\/klbtheme.com\/qualis\/wp-admin\/admin-ajax.php","security":"542fc92532","current_page":"1","per_page":"0"};</script>
<script id='qualis-slidetext-js-extra'>var slidetext={"speed":"3000"};</script>
<script src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/1pebfep6_f9lvt.js'></script>
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
<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/laetmg6k_f9rdp.js'></script>
<script>document.addEventListener('DOMContentLoaded',function(){function wpfcgl(){var wgh=document.querySelector('noscript#wpfc-google-fonts').innerText, wgha=wgh.match(/<link[^\>]+>/gi);for(i=0;i<wgha.length;i++){var wrpr=document.createElement('div');wrpr.innerHTML=wgha[i];document.body.appendChild(wrpr.firstChild);}}wpfcgl();});</script>

		</body>

		</html>
<?php
	}
}
?>