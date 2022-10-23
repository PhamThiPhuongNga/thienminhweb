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
  <title><?= _REGISTER ?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>

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
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="<?=$ariacms->actual_link?>/account.html"><?=_ACCOUNT?></a></li>
        <li><a href="<?=$ariacms->actual_link?>/account/login.html"><?=_REGISTER?></a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-9">
          <h1><?=_REGISTER_ACCOUNT?></h1>

          
          <form action="<?php echo $ariacms->actual_link . 'register/check-register.html'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset id="account">
              <legend><?=_YOUR_PERSONAL_DETAILS?></legend>
            <!--   <div class="form-group required" style="display:  none ;">
                <label class="col-sm-2 control-label">Customer Group</label>
                <div class="col-sm-10">                            <div class="radio">
                  <label>
                    <input type="radio" name="customer_group_id" value="1" checked="checked" />
                  Default</label>
                </div>
              </div>
            </div> -->
           <!--  <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
              <div class="col-sm-10">
                <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
              </div>
            </div> -->
            <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-lastname"><?=_FULLNAME?></label>
              <div class="col-sm-10">
                <input type="text" name="fullname"  placeholder="<?=_FULLNAME?>" id="fullname" class="form-control" />
              </div>
            </div>
            <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-email"><?=_EMAIL?></label>
              <div class="col-sm-10">
                <input type="email" name="username"  placeholder="<?=_EMAIL?>" id="username" class="form-control" />
              </div>
            </div>
            <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-telephone"><?=_PHONE?></label>
              <div class="col-sm-10">
                <input type="tel" name="phonenumber" placeholder="<?=_PHONE?>" id="phonenumber" class="form-control" />
              </div>
            </div>
          
            <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-password"><?=_PASSWORD?></label>
              <div class="col-sm-10">
                <input type="password" name="password"  placeholder="<?=_PASSWORD?>" id="Password" class="form-control" />
              </div>
            </div>
          </fieldset>  
            <!-- <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
              <div class="col-sm-10">
                <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" />
              </div>
            </div> -->
       
     <!--      <fieldset>
            <legend>Newsletter</legend>
            <div class="form-group">
              <label class="col-sm-2 control-label">Subscribe</label>
              <div class="col-sm-10">               <label class="radio-inline">
                <input type="radio" name="newsletter" value="1" />
              Yes</label>
              <label class="radio-inline">
                <input type="radio" name="newsletter" value="0" checked="checked" />
              No</label>
            </div>
          </div>
        </fieldset> -->
        
        <div class="buttons">
          <!-- <div class="pull-right">I have read and agree to the <a href="index11ee.html?route=information/information/agree&amp;information_id=3" class="agree"><b>Privacy Policy</b></a>
            <input type="checkbox" name="agree" value="1" /> -->
            &nbsp;
            <input type="submit" value="Sign up" class="btn btn-primary" />
          </div>
        </div>
      </form>
    </div>

  </div>
</div>


<?= $ariacms->getBlock("footer_traid"); ?>  

</div>
</body>

</html>