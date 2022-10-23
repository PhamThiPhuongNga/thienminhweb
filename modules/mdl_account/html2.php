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
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
			<title> <?= _ACCOUNT?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>
			<meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			<meta name="keywords" content="<?= ($ariacms->web_information->{$params->meta_keyword} != '') ? $ariacms->web_information->{$params->meta_keyword} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:title" content="<?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
					 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel='stylesheet' id='wp-block-library-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css1.css" type='text/css' media='all' />
	<link rel='stylesheet' id='wp-block-library-theme-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css2.css" type='text/css' media='all' />
	<link rel='stylesheet' id='wc-block-vendors-style-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css3.css" type='text/css' media='all' />
	<link rel='stylesheet' id='wc-block-style-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css4.css" media='all' />
	<link rel='stylesheet' id='contact-form-7-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css5.css" type='text/css' media='all' />
	<link rel='stylesheet' id='rs-plugin-settings-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css6.css" type='text/css' media='all' />
	<style id='rs-plugin-settings-inline-css' type='text/css'>
	#rs-demo-id {}
	</style>
	<link rel='stylesheet' id='select2-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css7.css" type='text/css' media='all' />
	<style id='woocommerce-inline-inline-css' type='text/css'>
	.woocommerce form .form-row .required { visibility: visible; }
	</style>
	<link rel='stylesheet' id='jquery-colorbox-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css8.css" type='text/css' media='all' />
	<link rel='stylesheet' id='tinvwl-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css9.css" type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css10.css" type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css11.css" type='text/css' media='all' />
	<style id='font-awesome-inline-css' type='text/css'>
	[data-font="FontAwesome"]:before {font-family: 'FontAwesome' !important;content: attr(data-icon) !important;speak: none !important;font-weight: normal !important;font-variant: normal !important;text-transform: none !important;line-height: 1 !important;font-style: normal !important;-webkit-font-smoothing: antialiased !important;-moz-osx-font-smoothing: grayscale !important;}
	</style>
	<link rel='stylesheet' id='owl-carousel-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css12.css" type='text/css' media='all' />
	<link rel='stylesheet' id='owl-theme-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css13.css" type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-bxslider-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css14.css" type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-mobile-menu-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css15.css" type='text/css' media='all' />
	<link rel='stylesheet' id='qualis-custom-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css16.css" type='text/css' media='all' />
	<link rel='stylesheet' id='qualis-responsive-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css17.css" type='text/css' media='all' />
	<link rel='stylesheet' id='qualis-font-css'  href='//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700|Oswald:300,400,500,600,700|Open+Sans:700,600,800,400|Rubik:400,400i,500,500i,700,700i,900&#038;subset=latin,latin-ext' type='text/css' media='all' />
	<link rel='stylesheet' id='qualis-style-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css18.css" type='text/css' media='all' />
	<link rel='stylesheet' id='mm_icomoon-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css19.css" type='text/css' media='all' />
	<link rel='stylesheet' id='mmm_mega_main_menu-css'  href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/css20.css" type='text/css' media='all' />
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.js?ver=1.12.4-wp' id='jquery-core-js'></script>
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/rbtools.min.js?ver=6.0' id='tp-tools-js'></script>
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/rs6.min.js?ver=6.2.1' id='revmin-js'></script>
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.blockUI.min.js?ver=2.70' id='jquery-blockui-js'></script>
	<script type='text/javascript' id='wc-add-to-cart-js-extra'>
	
	</script>
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/zxcvbn-async.min.js?ver=1.0' id='zxcvbn-async-js'></script>
	<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/woocommerce-add-to-cart.js?ver=6.4.2' id='vc_woocommerce-add-to-cart-js-js'></script>
<?= $ariacms->getBlock("head"); ?>

		</head>

		<body>
			<?= $ariacms->getBlock("header"); ?>
		

			<section style="padding-bottom:0px" class="shop-cart spad">
				
    	<div class="page-heading">
				<div class="page-title">
					<h2><?= _YOUR_PROFILE?></h2>
				</div>
			</div>
				
	
				  		 
	
	
					<section class="main-container col2-right-layout">
				<div class="main container">
					<div class="row">
													<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
<div class="account-login container register-enable">


<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">


		<h2><?= _LOGIN?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?= _USERNAME?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="" />			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?= _PASSWORD?>&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			
			<p class="form-row">
				<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="cbb561423c" /><input type="hidden" name="_wp_http_referer" value="/qualis/my-account/" />				
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in"><?= _LOGIN?></button>
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?= _REMEMBER_ME?></span>
				</label>

			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="https://klbtheme.com/qualis/my-account/lost-password/"><?= _LOST_PASS?></a>
			</p>

			
		</form>


	</div>

	<div class="u-column2 col-2">

		<h2><?= _REGISTER?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register"  >

			
			
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?= _USERNAME?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="" />				</p>

			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?= _EMAIL_ADDRESS?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="" />			</p>

			
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?= _PASSWORD?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			
			<div class="woocommerce-privacy-policy-text"><p><?= _Your_personal?></p>
</div>
			<p class="woocommerce-form-row form-row">
				<input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="b69d8acd90" /><input type="hidden" name="_wp_http_referer" value="/qualis/my-account/" />				
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register"><?= _REGISTER?></button>
			</p>

			
		</form>

	</div>

</div>
</div>
</div>
																		</div>
				</div>
			</section>
	   	<!--WPFC_FOOTER_START--> 
			<?= $ariacms->getBlock("footer"); ?>
			<script>(function() {function maybePrefixUrlField() {
	if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
		this.value = "http://" + this.value;
	}
}

var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
if (urlFields) {
	for (var j=0; j < urlFields.length; j++) {
		urlFields[j].addEventListener('blur', maybePrefixUrlField);
	}
}
})();</script>	<script type="text/javascript">
		(function () {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})()
	</script>

<script type='text/javascript' src="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/scripts.js?ver=5.3" id='contact-form-7-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/js.cookie.min.js?ver=2.1.4' id='js-cookie-js'></script>

<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/woocommerce.min.js?ver=4.7.1' id='woocommerce-js'></script>

<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/country-select.min.js?ver=4.7.1' id='wc-country-select-js'></script>

<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/address-i18n.min.js?ver=4.7.1' id='wc-address-i18n-js'></script>
<script type='text/javascript' id='wc-cart-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/cart.min.js?ver=4.7.1' id='wc-cart-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/selectWoo.full.min.js?ver=1.0.6' id='selectWoo-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/wp-polyfill.min.js?ver=7.4.4' id='wp-polyfill-js'></script>

<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/i18n.min.js?ver=bb7c3c45d012206bfcd73d6a31f84d9e' id='wp-i18n-js'></script>
<script type='text/javascript' id='password-strength-meter-js-extra'>

</script>
<script type='text/javascript' id='password-strength-meter-js-translations'>
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "default", { "locale_data": { "messages": { "": {} } } } );
</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/password-strength-meter.min.js?ver=5.5.3' id='password-strength-meter-js'></script>
<script type='text/javascript' id='wc-password-strength-meter-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/password-strength-meter.min.js?ver=4.7.1' id='wc-password-strength-meter-js'></script>
<script type='text/javascript' id='wc-cart-fragments-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/cart-fragments.min.js?ver=4.7.1' id='wc-cart-fragments-js'></script>
<script type='text/javascript' id='yith-woocompare-main-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/woocompare.min.js?ver=2.4.2' id='yith-woocompare-main-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.colorbox-min.js?ver=1.4.21' id='jquery-colorbox-js'></script>
<script type='text/javascript' id='tinvwl-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/public.min.js?ver=1.22.0' id='tinvwl-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/comment-reply.min.js?ver=5.5.3' id='comment-reply-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/bootstrap.min.js?ver=1.0' id='bootstrap-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/parallax.js?ver=1.0' id='parallax-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.bxslider.min.js?ver=1.0' id='jquery-bxslider-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/owl.carousel.min.js?ver=1.0' id='owl-carousel-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.mobile-menu.min.js?ver=1.0' id='jquery-mobile-menu-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/jquery.countdown.min.js?ver=1.0' id='jquery-countdown-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/common.js?ver=1.0' id='qualis-common-js'></script>
<script type='text/javascript' id='qualis-quick-ajax-js-extra'>

</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/quick_ajax.js?ver=1.0.0' id='qualis-quick-ajax-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/cloud-zoom.js?ver=1.0.0' id='cloud-zoom-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/frontend.js?ver=2.1.7' id='mmm_menu_functions-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/wp-embed.min.js?ver=5.5.3' id='wp-embed-js'></script>
<script type='text/javascript' id='qualis-slidetext-js-extra'>
/* <![CDATA[ */
var slidetext = {"speed":"3000"};
/* ]]> */
</script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/slidetext.js?ver=1.0' id='qualis-slidetext-js'></script>
<script type='text/javascript' src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/forms.min.js?ver=4.8.1' id='mc4wp-forms-api-js'></script>

		</body>

		</html>
<?php
	}
}
?>