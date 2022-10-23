<?php
class View
{
	static function viewhome()
	{
		global $ariacms;
		global $params;
		global $analytics_code;
		global $ariaConfig_template;
?>

		<!DOCTYPE html>
		<html lang="vi">
		<head>
			<link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
			<title><?= _ABOUT_US?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>
			<meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			<meta name="keywords" content="<?= ($ariacms->web_information->{$params->meta_keyword} != '') ? $ariacms->web_information->{$params->meta_keyword} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:title" content="<?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?>" />
			<meta property="og:description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
			
			<link rel='dns-prefetch' href='//fonts.googleapis.com'/>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l0xw9klt_f9lvt.css" media="all"/>
			<style id='rs-plugin-settings-inline-css'>#rs-demo-id{}</style>
			<style id='woocommerce-inline-inline-css'>.woocommerce form .form-row .required{visibility:visible;}</style>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/l9ajug3i_f9lvt.css" media="all"/>
			<style id='font-awesome-inline-css'>[data-font="FontAwesome"]:before{font-family:'FontAwesome' !important;content:attr(data-icon) !important;speak:none !important;font-weight:normal !important;font-variant:normal !important;text-transform:none !important;line-height:1 !important;font-style:normal !important;-webkit-font-smoothing:antialiased !important;-moz-osx-font-smoothing:grayscale !important;}</style>
			<link rel="stylesheet" type="text/css" href="<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/css/d75kedqc_f9lvt.css" media="all"/>

			<?= $ariacms->getBlock("head"); ?>
		</head>

		<body>
			<?= $ariacms->getBlock("header"); ?>
			<section class="contact spad">
				<!--Contact -->
				<div class="page-heading">
					<div class="page-title"> 
						<h2><?= _ABOUT_US ?></h2>
					</div>
				</div><!--END Contact-->
				<!-- MAP -->
				<div class="container">
						

					<div class="vc_row wpb_row vc_row-fluid form_background">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element">
										<div class="wpb_wrapper"> 
											<h2><b>VỀ CHÚNG TÔI</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Công ty TNHH MTV FABS HOLDINGS là công ty hàng đầu chuyên nhập khẩu thực phẩm từ CHLB Nga vào Việt Nam. Cam kết của chúng tôi trong việc tạo dựng và nuôi dưỡng các mối quan hệ khách hàng và nhà cung cấp bền chặt đã giúp công ty chúng tôi nổi tiếng là một trong những nhà nhập khẩu thực phẩm Nga hàng đầu tại Việt Nam.
												</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chúng tôi cam kết mang những hương vị tốt nhất từ Nga đến mọi khách hàng Việt Nam. Chúng tôi không ngừng nỗ lực để xác định các xu hướng thị trường và sản phẩm mới trên thị trường thực phẩm Nga để giới thiệu chúng vào thị trường Việt Nam. Chúng tôi thực hiện được điều này thông qua việc hợp tác mật thiết với cả những nhà sản xuất đã có tên tuổi cũng như những nhà sản xuất mới tham gia thị trường để mang đến những sản phẩm đột phá, tiên tiến. Cách tiếp cận tập trung vào con người này là lý do tại sao chúng tôi là nhà cung cấp được ưa chuộng cho nhiều chuỗi siêu thị và cửa hàng bán lẻ trên khắp Việt Nam.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>GIÁ TRỊ CỐT LÕI</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Công ty TNHH MTV FABS HOLDINGS là một doanh nghiệp tư nhân tập trung vào việc xây dựng mối quan hệ lâu dài với khách hàng và nhà cung cấp của chúng tôi. Những mối quan hệ chặt chẽ này thúc đẩy chúng tôi phân phối các loại thực phẩm nhập khẩu xuất sắc cả về chất lượng và chủng loại sản phẩm. Chúng tôi tin rằng cách tiếp cận bán hàng trực tiếp giữa người với người là rất quan trọng trong việc hiểu và đáp ứng nhu cầu của khách hàng cũng như thị trường. Với kinh nghiệm nhiều năm, cách tiếp cận này đã đưa chúng tôi trở thành một trong những nhà phân phối thực phẩm Nga lớn và có uy tín ở Việt Nam.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>SỨ MỆNH</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chúng tôi tận tâm xây dựng các mối quan hệ bền chặt cho phép chúng tôi mang những thực phẩm Nga hảo hạng nhất đến mọi khách hàng Việt Nam. Thông qua việc cung cấp dịch vụ được cá nhân hóa phù hợp với nhu cầu của khách hàng, chúng tôi sẽ tiếp tục đáp ứng và vượt hơn mọi mong đợi. Với thực phẩm Nga chất lượng cao và giao hàng đúng hẹn, chúng tôi luôn cung cấp các giải pháp tốt nhất để đáp ứng nhu cầu của thị trường và người tiêu dùng Việt Nam đối với các sản phẩm thực phẩm chất lượng cao từ Nga.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>HỆ THỐNG PHÂN PHỐI</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Với trụ sở chính tại Hà Nội và kho của chúng tôi đặt tại TP Hồ Chí Minh, chúng tôi đã mở rộng mạng lưới phân phối thực phẩm Nga của mình trải rộng khắp các tỉnh của Việt Nam. Mạng lưới rộng này cho phép chúng tôi tiếp cận nhiều thị trường độc lập hơn, cho phép người tiêu dùng tìm thấy sản phẩm của chúng tôi trên kệ của các cửa hàng yêu thích tại địa phương của họ trên khắp Việt Nam.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>MẠNG LƯỚI NHẬP KHẨU</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ban đầu nhập khẩu các sản phẩm độc quyền từ Nga, mạng lưới nhập khẩu hiện tại của chúng tôi đang mở rộng thêm để bao phủ các nước Châu Âu và Mỹ. Mỗi năm, mạng lưới nhập khẩu của chúng tôi sẽ phát triển nhiều quốc gia hơn, dựa trên những sản phẩm tốt nhất mà các khu vực này cung cấp và mối quan hệ mà chúng tôi đã vun đắp với các nhà sản xuất ở đó. 
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>DỊCH VỤ KHÁCH HÀNG</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chúng tôi tin tưởng vào việc đối xử với khách hàng như trong gia đình, đó là lý do tại sao chúng tôi duy trì các nguyên tắc cốt lõi trong mô hình kinh doanh hiện nay mà chúng tôi đã có khi thành lập. Mặc dù các công ty khác thực thi các tiêu chuẩn cứng nhắc mà khách hàng của họ phải tuân theo, nhưng chúng tôi biết rằng việc linh hoạt và mang lại dấu ấn cá nhân trong mỗi lần tương tác sẽ giúp đảm bảo sự hài lòng của khách hàng. Đây là cam kết đáp ứng nhu cầu của khách hàng bằng cách cung cấp đa dạng các sản phẩm thực phẩm chất lượng cao của Nga là nền tảng của hoạt động kinh doanh của chúng tôi. Sự hài lòng của khách hàng là rất quan trọng đối với chúng tôi, phương pháp tiếp cận trực tiếp và sự tận tâm của chúng tôi đối với khách hàng đã cho phép chúng tôi có được sự tin tưởng và sự trung thành của khách hàng và nhà cung cấp trên khắp Việt Nam.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>BÁN HÀNG</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lực lượng bán hàng phân phối toàn quốc của chúng tôi trải dài khắp Việt Nam với các đại diện bán hàng có thể phục vụ khách hàng ở tất cả các thành phố lớn. Với việc bán hàng trực tiếp và tiếp xúc trực tiếp, chúng tôi có thể phục vụ các cửa hàng bán lẻ và chuỗi siêu thị để đặt sản phẩm trong tất cả các phân khúc bán lẻ. Nhờ sử dụng hiệu quả công nghệ và báo cáo luôn cập nhật, chúng tôi có thể cung cấp thông tin chính xác và kịp thời để tạo thuận lợi cho quá trình đặt hàng và cho phép giao hàng nhanh chóng.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>TIẾP THỊ</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhận thức được nhu cầu của một thị trường luôn thay đổi và mở rộng, chúng tôi cam kết sử dụng các phương án tiếp thị tốt nhất hiện có. Thông qua những đổi mới không ngừng và các giải pháp sáng tạo, chúng tôi có thể nâng cao nhận diện thương hiệu trên thị trường, tạo điều kiện mở rộng và phát triển thương hiệu. Để đạt được mục tiêu này, chúng tôi thường xuyên tham gia vào các hội chợ, triển lãm bán lẻ và trình diễn sản phẩm, cũng như tận dụng hiệu quả phương tiện truyền thông xã hội, in quảng cáo, tặng phiếu giảm giá, chương trình khuyến mại thúc đẩy bán hàng.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>KHO BÃI / GIAO NHẬN</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chúng tôi giao những sản phẩm theo đúng cam kết. Hệ thống báo cáo tiên tiến, cơ sở vật chất hiện đại cho phép chúng tôi luôn giao hàng chính xác và đúng hạn. Mức độ chính xác và đáng tin cậy này cho phép chúng tôi phục vụ tốt hơn nhu cầu của khách hàng, dẫn đến doanh số bán hàng tăng cao. Chúng tôi đơn giản hóa quy trình giao nhận để cung cấp cho khách hàng các giải pháp chuỗi cung ứng tốt nhất.


											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>CÁC SẢN PHẨM</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chúng tôi cam kết mang những hương vị tốt nhất từ Nga đến từng người dân Việt Nam. Ngoài các sản phẩm thực phẩm nhập khẩu Nga vô cùng đa dạng, chúng tôi còn cung cấp các dòng sản phẩm thực phẩm nhãn hiệu riêng. Chúng tôi phân phối một loạt các sản phẩm ngày càng được ưa chuộng như dầu đậu nành thượng hạng không biến đổi gen Yanta, dầu hướng dương Organic cao cấp Mr. Ricco, bánh kẹo cao cấp, các loại sôt chấm, tương cà chua hảo hạng cũng như các loại đồ ăn dặm chất lượng cao. Nhiều thương hiệu và sản phẩm yêu thích được nhập khẩu độc quyền vào Việt Nam thông qua mạng lưới phân phối của chúng tôi.
											</p>
											
										</div>
										<div class="wpb_wrapper"> 
											<h2><b>TÌM MUA SẢN PHẨM</b></h2>
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhờ vào mối quan hệ chặt chẽ mà chúng tôi đã xây dựng với khách hàng và đối tác kinh doanh, sản phẩm của chúng tôi có thể được tìm thấy trong các chuỗi cửa hàng lớn và các cửa hàng bán lẻ ở mọi tỉnh thành của Việt Nam. Để tìm cửa hàng gần bạn nhất có bán các sản phẩm của chúng tôi, xin vui lòng liên hệ với chúng tôi tại: fabs.holdings@gmail.com
											</p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--End map-->
				
			</section>
			<?= $ariacms->getBlock("footer"); ?>
			<?= $ariacms->getBlock("footer_script"); ?>
						<script>
				setREVStartSize({c: 'rev_slider_1_1',rl:[1240,1024,778,480],el:[],gw:[1240,1024,778,480],gh:[750,600,500,400],type:'standard',justify:'',layout:'fullwidth',mh:"0"});
				var	revapi1,tpj;
				jQuery(function(){
				tpj=jQuery;
				if(tpj("#rev_slider_1_1").revolution==undefined){
					revslider_showDoubleJqueryError("#rev_slider_1_1");
				}else{
					revapi1=tpj("#rev_slider_1_1").show().revolution({
						jsFileLocation:"//klbtheme.com/qualis/wp-content/plugins/revslider/public/assets/js/",
						sliderLayout:"fullwidth",
						visibilityLevels:"1240,1024,778,480",
						gridwidth:"1240,1024,778,480",
						gridheight:"750,600,500,400",
						lazyType:"smart",
						responsiveLevels:"1240,1024,778,480",
					navigation: {
						mouseScrollNavigation:false,
					touch: {
						touchenabled:true,
						swipe_min_touches:50
					},
					arrows: {
						enable:true,
						style:"uranus",
						hide_onmobile:true,
						hide_under:600,
						hide_onleave:true,
						left: {
						h_offset:30
					},
					right: {
						h_offset:30
					}}
					},
					parallax: {
						levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
						type:"mouse",
						origo:"slidercenter",
						speed:2000
					},
					fallbacks: {
						allowHTML5AutoPlayOnAndroid:true
					},
					});
					}});
				</script>
				<script>
					var htmlDivCss=unescape("%23rev_slider_1_1_wrapper%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1_wrapper%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1_wrapper%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A");
					var htmlDiv=document.getElementById('rs-plugin-settings-inline-css');
					if(htmlDiv){
						htmlDiv.innerHTML=htmlDiv.innerHTML + htmlDivCss;
					}else{
						var htmlDiv=document.createElement('div');
						htmlDiv.innerHTML='<style>' + htmlDivCss + '</style>';
						document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
					}
				</script>
				<script>var htmlDivCss=unescape("%0A%0A");
				var htmlDiv=document.getElementById('rs-plugin-settings-inline-css');
				if(htmlDiv){
				htmlDiv.innerHTML=htmlDiv.innerHTML + htmlDivCss;
				}else{
				var htmlDiv=document.createElement('div');
				htmlDiv.innerHTML='<style>' + htmlDivCss + '</style>';
				document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
				}</script>
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
				<script>if(typeof revslider_showDoubleJqueryError==="undefined"){
				function revslider_showDoubleJqueryError(sliderID){
				var err="<div class='rs_error_message_box'>";
				err +="<div class='rs_error_message_oops'>Oops...</div>";
				err +="<div class='rs_error_message_content'>"; err +="You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>"; err +="To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on"; err +="<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it"; err +="</div>";
				err +="</div>";
				jQuery(sliderID).show().html(err);
}}</script>
			<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/f41ln7h0/2i2e4.js'></script>
			<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/o8l0w9j/2i2e4.js' id='tinvwl-js'></script>
			<script defer src='<?= $ariacms->actual_link ?>templates/<?= $ariaConfig_template ?>/js/q7v9bejg/2i2e4.js'></script>
			<script>document.addEventListener('DOMContentLoaded',function(){function wpfcgl(){var wgh=document.querySelector('noscript#wpfc-google-fonts').innerText, wgha=wgh.match(/<link[^\>]+>/gi);for(i=0;i<wgha.length;i++){var wrpr=document.createElement('div');wrpr.innerHTML=wgha[i];document.body.appendChild(wrpr.firstChild);}}wpfcgl();});</script>

		</body>

		</html>
<?php
	}
}
?>