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
    <html dir="ltr" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?= _CONTACT?></title>
      <base  />
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
      <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">
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
    
    <body class="information-contact">
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

     
     <div id="information-contact" class="container">
      <ul class="breadcrumb">
        <li><a href="<?=$ariacms->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
        <li><a href=""><?= _CONTACT?></a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-12">
          <h1><?= _CONTACT?></h1>
          <h3><?=_OUR_LOCATION?></h3>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-3"><strong><?=_ADDRESS?></strong><br />
                  <address>
                    <?= $ariacms->web_information->{$params->address} ?>
                  </address>
                </div>
                <div class="col-sm-3"><strong><?=_PHONE?></strong><br>
                  <?= $ariacms->web_information->phone ?><br/>
                  <br />
                </div>
                <div class="col-sm-3"><strong><?=_HOTLINE?></strong><br>
                  <?= $ariacms->web_information->hotline ?><br/>
                  <br />
                </div>
                <div class="col-sm-3"><strong><?=_EMAIL?></strong><br>
                  <?= $ariacms->web_information->admin_email ?><br/>
                  <br />

                </div>
              </div>
            </div>
          </div>
          <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
              <legend>Contact Form</legend>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name"><?=_FULLNAME?></label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-email"><?=_EMAIL_ADDRESS?></label>
                <div class="col-sm-10">
                  <input type="text" name="email" value="" id="input-email" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-enquiry"><?=_CONTENT?></label>
                <div class="col-sm-10">
                  <textarea name="content" rows="10" id="input-enquiry" class="form-control"></textarea>
                </div>
              </div>

            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input class="btn btn-primary" type="submit" name="btnSubmit" value="Submit" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?= $ariacms->getBlock("footer_traid"); ?>

  </body>

  </html>
  <?php
}
}
?>




