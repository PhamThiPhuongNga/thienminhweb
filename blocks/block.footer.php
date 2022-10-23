<?php
global $database;
global $ariacms;
global $params;
global $web_menus;
global $analytics_code;
?>


        <!-- main-footer -->
        <footer class="main-footer" style="background-image: url(/templates/assets/images/background/footer-bg-1.jpg);">
            <figure class="footer-logo"><img src="<?=$ariacms->web_information->{'image-logo'};?>" alt="" width="80px" height="100px"></figure>
            <div class="footer-top">
                <div class="auto-container">
                    <div class="widget-section">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget about-widget">
                                    <div class="widget-title">
                                        <h4>PCCC THIÊN MINH</h4>
                                    </div>
                                    <div class="text">
                                        <p>Công ty TNNN Phòng cháy chữa cháy Thiên Minh hoạt động trong lĩnh vực kinh doanh các mặt hàng Phòng cháy chữa cháy, chuyên cung cấp, xây lắp, tư vấn, thiết kế, bảo trì và bảo dưỡng các công trình hệ thống PCCC.</p>
                                    </div>
                                    <div class="support-box">
                                        <i class="flaticon-call"></i>
                                        <p>HOTLINE</p>
                                        <h4><a href="tel:<?=$ariacms->web_information->hotline?>"><?=$ariacms->web_information->hotline?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title">
                                        <h4>Chính sách</h4>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links-list clearfix">
                                            <li><a href="<?=$ariacms->actual_link?>chi-tiet/chinh-sach-mua-hang.html">Chính sách mua hàng</a></li>
                                            <li><a href="<?=$ariacms->actual_link?>chi-tiet/chinh-sach-doi-tra-va-hoan-tien.html">Chính sách đổi trả và hoàn tiền</a></li>
                                            <li><a href="<?=$ariacms->actual_link?>chi-tiet/chinh-sach-bao-hanh.html">Chính sách bảo hành</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title">
                                        <h4>Liên hệ</h4>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links-list clearfix">
                                            <li style="font-size: 16px;line-height: 26px;font-weight: 600;color:rgb(185 176 176);"><i class="fa fa-map-marker-alt"></i>&nbsp;&nbsp; <?=$ariacms->web_information->address_vi?></li>
                                            <li style="font-size: 16px;line-height: 26px;font-weight: 600;color:rgb(185 176 176);"><i class="fa fa-envelope"></i>&nbsp;&nbsp; Email: <?=$ariacms->web_information->admin_email?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget map-widget">
                                    <div class="widget-title">
                                        <h4>Bản đồ</h4>
                                    </div>
                                    <div class="map-inner">
                                        <div class="map-container">
                                                             <?php   if ($analytics_code) {
    foreach ($analytics_code as $code) {
        if ($code->title_vn == 'Map' && $code->position == 'footer')
            echo $code->code;
    }
}
?> 
                                       <!--      <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d29802.037976947133!2d105.73007710046387!3d20.98242311564052!3m2!1i1024!2i768!4f13.1!2m1!1zc-G7kSAyMCBjNDMga2h1IMSRw7QgdGjhu4sgbeG7m2kgaGFpIGLDqm4gxJHGsOG7nW5nIGzDqiB0cuG7jW5nIHThuqVuIHAgZMawxqFuZyBu4buZaSBxIGjDoCDEkcO0bmcgdHAgaMOgIG7hu5lp!5e0!3m2!1svi!2sus!4v1651157842748!5m2!1svi!2sus"
                                                width="100%" height="173px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container clearfix">
                    <div class="copyright pull-left">
                        <p>&copy;Copyright 2022 by <a href="<?=$ariacms->actual_link?>">PCCC THIÊN MINH</a></p>
                    </div>
                    <ul class="footer-social clearfix pull-right">
                        <li><a href="<?=$ariacms->web_information->facebook ?>"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->twitter ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->youtube ?>"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->instagram ?>"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
       
        

<div>
    <div class="ppocta-ft-fix" style="top: 300px; bottom: 500px;">
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet" href="tel:<?=$ariacms->web_information->hotline?>"><div id="calltrap-ico"></div><span><strong><?=$ariacms->web_information->hotline?></strong></span></a>
<a id="messengerButton" href="<?=$ariacms->web_information->facebook?>" target="_blank"><span>Nhắn tin qua Facebook</span></a>
<!-- <a id="zaloButton" href="#" target="_blank"><span>Skype: Phuong.Tran</span></a> -->
<a id="registerNowButton" href="mailto:<?=$ariacms->web_information->gmail?>" target="_blank"><span>Gửi email</span></a>
</div>
</div>

<link href="/templates/assets/css/button_help.css" rel="stylesheet" type="text/css"/>
        
        <!-- main-footer end -->