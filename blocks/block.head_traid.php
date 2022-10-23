<?php
global $ariacms;
global $params;
global $ariaConfig_template;
global $analytics_code; 
?>

      <base  />
      <meta name="description" content="<?= ($ariacms->web_information->{$params->meta_description} != '') ? $ariacms->web_information->{$params->meta_description} : $ariacms->web_information->{$params->name}; ?>" />
      <link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
      <link href="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
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


  <!--     <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script> -->
      <script src="/templates/traid/catalog/view/javascript/jquery/jquery-3.1.1.min.js" ></script>

      <script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/plaza/ajaxlogin/ajaxlogin.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/plaza/slider/jquery.nivo.slider.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
      <script src="/templates/traid/catalog/view/javascript/common.js" ></script>
      <link href="image/catalog/cart.png" rel="icon" />
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
