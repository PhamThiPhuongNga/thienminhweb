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
   <html lang="en">
   <?=$ariacms->getBlock("head"); ?>
   <body>

    <div class="boxed_wrapper"> 

      <?=$ariacms->getBlock("header");?>
    
   <section class="page-title centred" style="background-image: url(/assets/images/background/page-title.jpg);">
            <div class="overlay-bg"></div>
            <div class="pattern-layer"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>LIÊN HỆ</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-section -->
        <section class="contact-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="content_block_6">
                            <div class="info-inner">
                                <h3 class="text-color">THIEN MINH COMPANY</h3>
                                <p>Liên hệ với chúng tôi để được tư vấn trực tiếp</p>
                                <ul class="info-list clearfix">
                                    <li>
                                        <i class="flaticon-telephone"></i>
                                        <p class="text-color">Hotline:<br /><a href="tel:0942874647"><?= $ariacms->web_information->hotline ?></a></p>
                                    </li>
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <p class="text-color">Email:<br /><a href="<?= $ariacms->web_information->admin_email ?>"><?= $ariacms->web_information->admin_email ?></a></p>
                                    </li>
                                    <li>
                                        <i class="flaticon-pin"></i>
                                        <p class="text-color">Địa chỉ:</p><p><?= $ariacms->web_information->address_vi ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="" id="contact-form" class="default-form"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Tên của bạn *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" required="" placeholder="Số điện thoại của bạn">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email *" required="">
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" required="" placeholder="Subject">
                                    </div> -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="content" placeholder="Viết bình luận"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn-one" type="submit" name="btnSubmit" value="Submit">Gửi liên hệ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- google-map-two -->
        <section class="google-map-two">
            <div class="map-inner">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d29802.037976947133!2d105.73007710046387!3d20.98242311564052!3m2!1i1024!2i768!4f13.1!2m1!1zc-G7kSAyMCBjNDMga2h1IMSRw7QgdGjhu4sgbeG7m2kgaGFpIGLDqm4gxJHGsOG7nW5nIGzDqiB0cuG7jW5nIHThuqVuIHAgZMawxqFuZyBu4buZaSBxIGjDoCDEkcO0bmcgdHAgaMOgIG7hu5lp!5e0!3m2!1svi!2sus!4v1651157842748!5m2!1svi!2sus"width="100%" height="550px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- <iframe src="https://snazzymaps.com/embed/69445" width="100%" height="550px"></iframe> -->
                </div>
            </div>
        </section>


<?=$ariacms->getBlock("letter");?>
      <?=$ariacms->getBlock("footer");?>
     <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
    </div> 
    <!-- <script src="/templates/assets/js/jquery.js"></script> -->
     <?=$ariacms->getBlock("footer_script");?>

     </body>
<!-- End of .page_wrapper -->

</html> 

          <?php
}
}
?>