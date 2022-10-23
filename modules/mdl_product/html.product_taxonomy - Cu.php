<?php
global $ariacms;
global $params;
global $ariaConfig_template;
global $analytics_code;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<?= $ariacms->getBlock("head"); ?>
	<title><?= $category[$params->title] ?></title>
	<meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
	<meta name="keywords" content="<?= ($ariacms->web_information->{$params->meta_keyword} != '') ? $ariacms->web_information->{$params->meta_keyword} : $ariacms->web_information->{$params->name}; ?>" />
	<meta property="og:title" content="<?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?>" />
	<meta property="og:description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
		<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l0xw9klt_f9lvt.css" media="all"/>
	<style id='rs-plugin-settings-inline-css'>#rs-demo-id{}</style>
	<style id='woocommerce-inline-inline-css'>.woocommerce form .form-row .required{visibility:visible;}</style>
	<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l9ajug3i_f9lvt.css" media="all"/>
	<style id='font-awesome-inline-css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important;}</style>
	<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/8uu5fujd_f9lxl.css" media="all"/>


</head>
<body class="archive tax-product_cat term-fruits term-33 theme-qualis mmm mega_main_menu-2-1-7 woocommerce woocommerce-page woocommerce-no-js tinvwl-theme-style wpb-js-composer js-comp-ver-6.4.1 vc_responsive">
<div id="preloader"></div>
<div >
	<?= $ariacms->getBlock("header"); ?>
<div class="page-heading">
	<div class="page-title"> 
		<h2><span><?php if( $category[$params->title]){ echo $category[$params->title];} else{echo _PRODUCT;} ?></span></h2>
	</div>
</div>	
<section class="main-container col2-left-layout"> 
	<div class="container">
		<div class="row">
			<div class="col-main col-sm-9 col-sm-push-3 product-grid">
				<div class="pro-coloumn">
					<?= $ariacms->getBlock("product_sale"); ?>
				</div>
			</div>
			<aside class="col-left sidebar shop-sidebar col-sm-3 col-xs-12 col-sm-pull-9">
			<!-- filter by price -->
				<?= $ariacms->getBlock("product_left"); ?>
			</aside>
		</div>
	</div>
</section>



<div class="loader-image" style="display:none;"></div>
<div class="ajaxphp-results"></div>
<?= $ariacms->getBlock("footer"); ?>
<script type="application/ld+json">{"@context":"https:\/\/schema.org\/","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"name":"Home","@id":"https:\/\/klbtheme.com\/qualis"}},{"@type":"ListItem","position":2,"item":{"name":"Shop","@id":"https:\/\/klbtheme.com\/qualis\/shop\/"}}]}</script>	
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
<script id='tinvwl-js-extra'>var tinvwl_add_to_wishlist={"text_create":"Create New","text_already_in":"Product already in Wishlist","simple_flow":"","hide_zero_counter":"","i18n_make_a_selection_text":"Please select some product options before adding this product to your wishlist.","tinvwl_break_submit":"No items or actions are selected.","tinvwl_clipboard":"Copied!","allow_parent_variable":"","block_ajax_wishlists_data":"","update_wishlists_data":"","hash_key":"ti_wishlist_data_b82fd1e602d3929a2e8e26009ed3c00d","nonce":"093888301d","rest_root":"https:\/\/klbtheme.com\/qualis\/wp-json\/","plugin_url":"https:\/\/klbtheme.com\/qualis\/wp-content\/plugins\/ti-woocommerce-wishlist\/"};</script>
<script id='qualis-quick-ajax-js-extra'>var MyAjax={"ajaxurl":"https:\/\/klbtheme.com\/qualis\/wp-admin\/admin-ajax.php","security":"4a27fc16a8","current_page":"1","per_page":"9"};</script>
<script id='qualis-slidetext-js-extra'>var slidetext={"speed":"3000"};</script>
<script id='wc-price-slider-js-extra'>var woocommerce_price_slider_params={"currency_format_num_decimals":"0","currency_format_symbol":"\u00a3","currency_format_decimal_sep":".","currency_format_thousand_sep":",","currency_format":"%s%v"};</script>
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
	<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/8xa34603_f9lxl.js'></script>

<script>document.addEventListener('DOMContentLoaded',function(){function wpfcgl(){var wgh=document.querySelector('noscript#wpfc-google-fonts').innerText, wgha=wgh.match(/<link[^\>]+>/gi);for(i=0;i<wgha.length;i++){var wrpr=document.createElement('div');wrpr.innerHTML=wgha[i];document.body.appendChild(wrpr.firstChild);}}wpfcgl();});</script>


</div></body>
</html>
