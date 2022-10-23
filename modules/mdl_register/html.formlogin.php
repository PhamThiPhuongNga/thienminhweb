<?php
global $ariacms;
global $params;
global $database;
global $ariaConfig_template;


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= _LOGIN ?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>

  <link href="/templates/traid/catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
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
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
  <script src="/templates/traid/catalog/view/javascript/jquery/jquery-3.1.1.min.js" ></script>

  <script src="/templates/traid/catalog/view/javascript/jquery/swiper/js/swiper.min.js" ></script>
  <script src="/templates/traid/catalog/view/javascript/plaza/ultimatemenu/menu.js" ></script>
  <script src="/templates/traid/catalog/view/javascript/plaza/newsletter/mail.js" ></script>
  <script src="/templates/traid/catalog/view/javascript/common.js" ></script>
  <link rel="icon" href="<?= $ariacms->web_information->{'image-icon'} ?>">
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
</head> 

<body class="checkout-cart">
  <div class="wrapper">
    <div id="back-top"><i class="ion-chevron-up"></i></div>
    <div id="header" class="header-absolute" >  
      <nav id="top" >
        <div class="container">
          <div class="static-nav"><?= $ariacms->web_information->{$params->slogan} ?></div>


        </div>
      </nav>
      <?= $ariacms->getBlock("header_traid"); ?>
    </div>

    
    <div id="account-login" class="container">
      <ul class="breadcrumb">
        <li><a href="<?=$params->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=$ariacms->actual_link?>/register.html"><?=_ACCOUNT?></a></li>
        <li><a href="<?=$ariacms->actual_link?>/register/login.html"><?=_LOGIN?></a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-9">
          <div class="row">
            <div class="col-sm-6">
              <div class="well">
                <h2><?=_NEW_MEMBER?></h2>
                <p><strong><?=_REGISTER_ACCOUNT?></strong></p>
                <p><?=_REVIEWS_REGISTER?></p>
                <a href="<?=$ariacms->actual_link?>register/register.html" class="btn btn-primary">Continue</a></div>
              </div>
              <div class="col-sm-6">
                <div class="well">
                  <h2><?=_SIGN_IN?></h2>
           <!--  <p><strong>I am a returning customer</strong></p>
           --> 
           <form action="<?php echo $ariacms->actual_link . 'register/check-login.html'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label" for="input-email"><?=_USERNAME?></label>
              <input type="text" name="username" value="" placeholder="Username" id="input-email" class="form-control" />
            </div>
            <div class="form-group">
              <label class="control-label" for="input-password"><?=_PASSWORD?></label>
              <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
              <a href="#"><?=_LOST_PASS?></a></div>
              <input type="submit" value="Login" class="btn btn-primary" />
              <!-- <input type="hidden" name="redirect" value="http://amino.demo2.towerthemes.com/index.php?route=account/wishlist" /> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>


<?= $ariacms->getBlock("footer_traid"); ?>  

</div>
</body>

</html>