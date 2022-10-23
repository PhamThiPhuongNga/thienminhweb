<?php
global $database;
global $ariacms;
global $params;
global $web_menus;
?>

<footer>
  <div class="footer-links">  
       <div class="container">
          <div class="inner btn-group-vertical">  
           <div class="row">
            <div class="col col-newsletter col-md-5 col-sm-6 col-xs-12">
             <div class="btn-group">
              <div id="btnGroupVerticalDrop4" data-toggle="dropdown" class="dropdown-toggle title"><?= _NEWSLETTER?><i class="visible-xs ion-chevron-down"></i></div>
              <div class="dropdown-menu footer-content" aria-labelledby="btnGroupVerticalDrop4">
                  <div class="newsletter-container newsletter-block">

                      <div class="newsletter-title">
                          <h3></h3>
                          <p>Sign up for our e-mail to get latest news.</p>
                      </div>
                    <form action="/lien-he.html" class="mc4wp-form mc4wp-form-205" method="post" data-id="205" data-name="" >   
                      <div class="newsletter-content">

                        <div class="content">
                            <input type="email" class="newsletter_email" name="email" value="" placeholder="Please enter your email to subscribe" required/>

                            <button type="submit" name="btnSubmit" value="newsletter" class="btn btn-primary" ><?= _SUBSCRIBE?></button>
                           <!--  <button type="submit" name="btnSubmit" value="newsletter" class="button subscribe" onclick="ptnewsletter.saveMail($(this));"><span><?= _SUBSCRIBE?></span></button> -->
                        </div>
                        <p class="text-note">Don’t worry we don’t spam</p>
                        <div class="newsletter-notification"></div>

                    </div>
                      </form>
                </div>
                <script>
                    ptnewsletter.checkCookie();
                </script>


            </div>
        </div>
    </div>
    <div class="col col-md-2 col-sm-6 col-xs-12">
     <div class="btn-group">
      <div id="btnGroupVerticalDrop1" data-toggle="dropdown" class="dropdown-toggle title"><?=_ABOUT_US?><i class="visible-xs ion-chevron-down"></i></div>
      <div class="dropdown-menu footer-content" aria-labelledby="btnGroupVerticalDrop1">
          <div class="footer_about_us">
            <div class="desc_info">
                <!-- <p class="txt_info">M-F 9am-5pm EST</p> -->
                <div class="need_help">
                    <p><i class="las la-map-marker"></i><?=$ariacms->web_information->{$params->address}?></p>
                    <p class="phone"><i class="las la-phone-volume"></i><?=$ariacms->web_information->hotline?></p>
                    <p class="mail"><i class="las la-mail-bulk"></i><?=$ariacms->web_information->admin_email?></p>
                </div>
            </div>
        </div>


    </div>
</div>
</div>  

<div class="col col-md-2 col-sm-6 col-xs-12">
 <div class="btn-group">
  <div id="btnGroupVerticalDrop2" data-toggle="dropdown" class="dropdown-toggle title"><?=_INFORMATION?><i class="visible-xs ion-chevron-down"></i></div>
  <div class="dropdown-menu footer-content footer-information" aria-labelledby="btnGroupVerticalDrop2">
   <ul class="list-unstyled">
     <li><a href="<?=$ariacms->actual_link?>lien-he.html"><?=_CONTACT?></a></li>
 </ul>
</div>
</div>
</div>
<div class="col col-md-3 col-sm-6 col-xs-12">
 <div class="btn-group">
  <div id="btnGroupVerticalDrop3" data-toggle="dropdown" class="dropdown-toggle title"><?=_SERVICES_LIST?><i class="visible-xs ion-chevron-down"></i></div>
  <div class="dropdown-menu footer-content" aria-labelledby="btnGroupVerticalDrop3">
   <ul class="list-unstyled">
    <li><a href="<?=$ariacms->actual_link?>register.html"><?=_ACCOUNT?></a></li>
    <li><a href="<?=$ariacms->actual_link?>yeu-thich.html"><?=_WISHLIST?></a></li>
     <!--li><a href="http://amino.demo2.towerthemes.com/index.php?route=account/account">My Account</a></li-->
     <!--li><a href="http://amino.demo2.towerthemes.com/index.php?route=account/order">Order History</a></li-->
     <!-- <li><a href="indexe223.html?route=account/wishlist">Wish List</a></li>
     <li><a href="indexd773.html?route=product/manufacturer">Brands</a></li>
     <li><a href="index4dd2.html?route=account/voucher">Gift Certificates</a></li>
     <li><a href="index3d18.html?route=affiliate/login">Affiliate</a></li>
     <li><a href="indexf110.html?route=product/special">Specials</a></li> -->

 </ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer-copyright">
  <div class="container">
   <div class="inner">  
    <div class="row">
      <div class=" col-sm-4 col-xs-12">
       <div class="social">
          <ul>
            <li><a href="<?=$ariacms->web_information->facebook ?>" class="facebook" target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a></li>
            <li><a href="<?=$ariacms->web_information->twitter ?>" target="_blank" class="twitter" title="Twitter"><i class="lab la-twitter"></i></a></li>
            <li><a href="#" target="_blank" class="google" title="Google+"><i class="lab la-google-plus"></i></a></li>
            <li><a href="<?=$ariacms->web_information->youtube ?>" target="_blank" class="youtube" title="Youtube"><i class="lab la-youtube"></i></a></li>
            <li><a href="<?=$ariacms->web_information->instagram ?>" class="instagram" title="Instagram"><i class="lab la-instagram"></i></a></li>
           <!--  <li><a href="#" class="pinterest" title="Pinterest"><i class="lab la-pinterest"></i></a></li> -->
        </ul>
    </div>


</div>
<div class="copyright col-sm-8 col-xs-12">
  <p class="text-powered">© 2021 Newwaytech. All Rights Reserved.</p>
  <div class="payment">
      <img src="/templates/traid/image/catalog/ptblock/payment.png" alt="payment">
  </div>


</div>
</div>
</div>
</div>
</div>
</footer>