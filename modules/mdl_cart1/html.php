<?php
class View
{
    static function viewhome()
    {
        global $ariacms;
        global $params;
        global $database;
        global $web_home;

        if ($_SESSION['orderCart']) {
            foreach ($_SESSION['orderCart'] as $productID => $quantity) {
                $i += $quantity;
            }
            $id= array();
            foreach ($_SESSION['orderCart'] as $productID=>$value) {
                array_push($id,$productID); 
            }
        }

        $id=implode(",",$id);
        $query = "SELECT  a.*
                FROM e4_posts a
                WHERE  a.id in ({$id})";
        $database->setQuery($query);
        $products = $database->loadObjectList();
        ?>
<!doctype html>
<html class="no-js" lang="vi"> 
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- Basic page needs ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="og:locale" content="vi_VN">
    <link rel="alternate" hreflang="x-default" href="https://nxbkimdong.com.vn">
    <link rel="alternate" hreflang="vi" href="https://nxbkimdong.com.vn">
    <meta name="revisit" content="1 days">
    <meta name="robots" content="index,follow">
    
    <link rel="shortcut icon" href="/templates/webtruyen/logo.jpg" type="image/png" />
    
    <!-- Title and description ================================================== -->
    <title>GIỎ HÀNG</title>
    <!-- <link rel="shortcut icon" href="/templates/otochat/themes/91911/statics/imgs/logonho.jpg"> -->
    <meta name="description" content="Giỏ hàng của bạn - Nhà xuất bản Hội Nhà Văn">
    
    <!-- Helpers ================================================== -->
<meta property="og:type" content="website">
<meta property="og:title" content="Giỏ hàng của bạn - Nhà xuất bản Hội Nhà Văn">
<meta property="og:image" content="/templates/webtruyen/logo.jpg">
<meta property="og:image:secure_url" content="/templates/webtruyen/logo.jpg">
<meta property="og:url" content="https://nxbhoinhavan.vn//gio-hang/cart.html">
<meta property="og:site_name" content="Nhà xuất bản Hội Nhà Văn">
<meta name="twitter:site" content="@https://">
<meta name="twitter:card" content="summary">



    <link rel="canonical" href="https://nxbhoinhavan.vn//gio-hang/cart.html">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="theme-color" content="#d51c24">
    <!-- CSS ================================================== -->

<?= $ariacms->getBlock("site_container_nxb"); ?>

</head>

<body id="gio-hang-cua-ban-nha-xuat-ban-kim-dong" class="body-other customer-logged-in template-cart" >

<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '/templates/webtruyen/connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script> -->
    <!-- HRV LAST VIEW PRODUCT -->
<script>
var lastViewProducts = new LastViewProducts({
    max: 11
});
</script>

<!-- done -->
<?= $ariacms->getBlock("menuphai_dienthoai_nxb"); ?>

<div class="cart-overlay"></div>

<div id="CartDrawer" class="drawer drawer--left">
    <div class="drawer__header">
        <div class="drawer__title h3">cart.general.title</div>
        <div class="drawer__close js-drawer-close">
            <button type="button" class="icon-fallback-text">
                <span class="icon icon-x" aria-hidden="true"></span>
                <span class="fallback-text">"cart.general.close_cart"</span>
            </button>
        </div>
    </div>
    <div id="CartContainer"></div>
</div>

<!-- done -->
<?= $ariacms->getBlock("header_nxb"); ?>


<!-- done -->
<section id="breadcrumb-wrapper5" class="breadcrumb-w-img">
    <?= $ariacms->getBlock("menu_maytinh"); ?>
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-content">
        <div class="wrapper">
            <div class="inner text-left">
                <div class="breadcrumb-big">
                    
                    <h2>
                        Giỏ hàng của bạn - Nhà xuất bản Kim Đồng
                    </h2>
                    
                </div>
                <div class="breadcrumb-small">
                    <a href="/" title="Trang chủ">Trang chủ</a>

                    <span aria-hidden="true">/</span>
                    <span>Giỏ hàng của bạn - Nhà xuất bản Kim Đồng</span>

                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- </div> -->
<?= $ariacms->getBlock("script_slide_menu_nxb"); ?> 

<div id="PageContainer" class="">
        
        <main class="main-content" role="main">
            <div id="page-wrapper">
    <div class="wrapper">
        <div class="inner" id="carservicegh">
            <?php  if(!$products) {  ?>

                <h1>Giỏ hàng</h1>
                <p>Giỏ hàng trống</p>

            <?php } else { ?>

            <h1>Giỏ hàng</h1>
            <form action="" method="post" class=" form-desk cart table-wrap medium--hide small--hide">
                <table class="cart-table full table--responsive">
                    <thead class="cart__row cart__header-labels">
                        <th colspan="2" class="text-center">Sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Tổng giá</th>
                    </thead>
                    <tbody>
                         <?php 
                         // print_r($_SESSION);die; 
                         $total_price = 0;
                         foreach ($products as $key => $pro) {
                             if($pro->sale_percent == 0) {
                            $total_price += ($pro->product_sale * $_SESSION['orderCart'][$pro->id]);
                            } else {
                            $total_price += (($pro->product_sale * ( 100 - $pro->sale_percent) / 100) * $_SESSION['orderCart'][$pro->id]);
                            } ?>
                        <tr class="cart__row table__section">
                            <td data-label="Sản phẩm">
                                <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro->url_part . '.html'?>" class="cart__image">
                                    <img src="<?php echo $pro->image ?>" alt="<?php echo $pro->title_vi ?>">
                                </a>
                            </td>
                            <td>
                                <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro->url_part . '.html'?>" class="h4">
                                    <?php echo $pro->title_vi ?>
                                </a>
                               <!--  Khuyến mãi: 1017960497 - Giảm vô thời hạn 10% cho toàn bộ Sách Kim Đồng
                                <br> -->
                                <a href="" class="cart__remove" onclick="remove1(<?php echo $pro->id ?>)">
                                    <small>Xóa</small>
                                </a>
                            </td>
                            <td data-label="Đơn giá">
                                <?php if($pro->sale_percent == 0) { ?>
                                    <span class="h3">
                                       <?php echo number_format($pro->product_sale) ?>₫
                                    </span>
                                <?php } else { 
                                    $giasale = $pro->product_sale * ( 100 - $pro->sale_percent) / 100;?>
                                    <span class="h3">
                                        <?php echo number_format($giasale) ?>₫
                                    </span>
                                <?php } ?>
                            </td>
                            <td data-label="Số lượng">
                                <input type="text" style="width:80px;" name="quantity1" id="sl1<?=$pro->id ?>" value="<?php echo $_SESSION['orderCart'][$pro->id] ?>" onchange="soluong1(<?php echo $pro->id ?>,<?php echo $pro->product_sale ?>)">
                            </td>
                            <td data-label="Tổng tiền" class="text-right">
                                <span class="h3" id="tongtien1">
                                    <?php if($pro->sale_percent == 0) {
                                     echo number_format($pro->product_sale * $_SESSION['orderCart'][$pro->id]).'₫';} else { echo number_format(($pro->product_sale * ( 100 - $pro->sale_percent) / 100) * $_SESSION['orderCart'][$pro->id]).'₫';} ?>
                                </span>
                                
                            </td>
                        </tr>
                    <?php } ?>
                        
                    </tbody>
                </table>
                <div class="grid cart__row">
                    <div class="grid__item two-thirds small--one-whole">
                        <!-- <label for="CartSpecialInstructions">Ghi chú</label>
                        <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea> -->
                        <div class="form-vertical clearfix">
                          <label for="ContactFormName" class="hidden-label">name</label>
                          <input type="text"  class="input-full" name="txtName" placeholder="Họ và Tên" required>

                          <label for="ContactFormPhone" class="hidden-label">phone</label>
                          <input type="tel"  class="input-full" name="txtPhone" placeholder="Số điện thoại" required>

                          <label for="ContactFormEmail" class="hidden-label">email</label>
                          <input type="email"  class="input-full" name="txtEmail" placeholder="Email" required>

                          <label for="ContactFormMessage" class="hidden-label">Địa chỉ</label>
                          <textarea rows="5"  class="input-full" name="txtAddress" placeholder="Số nhà, đường phố, xã/phường, quận/huyện" required></textarea>

                         <!--  <button type="submit" name="btnSubmit" class="btn right btnContactSubmit" value="contact" > Gửi </button> -->
                        </div>
                    </div>
                    
                    <div class="grid__item text-right one-third small--one-whole">
                        <p>
                            <span class="cart__subtotal-title">Tạm tính</span>
                            <span class="h3 cart__subtotal"><?php echo number_format($total_price) ; ?> ₫</span>
                        </p>
                        <input type="hidden" name="total" id="sub_total" value="<?php echo $total_price ; ?>">
                        <!-- <button type="submit" name="update" class="btn update-cart">Cập nhật</button> -->
                        <button type="submit" value="sendOder" name="btnSubmit" class="btn">Đặt hàng</button>
                    </div>
                </div>
            </form>

            <form action="" method="post" class="form-mobile cart table-wrap large--hide">
                <table class="cart-table full">
                    <?php 
                         $total_price1 = 0;
                         foreach ($products as $key1 => $pro1) {
                             if($pro1->sale_percent == 0) {
                            $total_price1 += ($pro1->product_sale * $_SESSION['orderCart'][$pro1->id]);
                            } else {
                            $total_price1 += (($pro1->product_sale * ( 100 - $pro1->sale_percent) / 100) * $_SESSION['orderCart'][$pro1->id]);
                            } ?>
                    <div class="grid cart-item mg-left-0">
                        <div data-label="Đơn hàng" class="grid__item medium--one-third small--one-third pd-left0">
                            <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro1->url_part . '.html'?>" class="cart__image">
                                <img src="<?php echo $pro1->image ?>" alt="<?php echo $pro1->title_vi ?>">
                                
                            </a>
                        </div>
                        <div class="grid__item medium--two-thirds small--two-thirds pd-left15">
                            <a href="<?=$ariacms->actual_link . 'chi-tiet/' . $pro1->url_part . '.html'?>" class="h4">
                                <?php echo $pro1->title_vi ?>
                            </a>
                            <!-- Khuyến mãi: 1017960497 - Giảm vô thời hạn 10% cho toàn bộ Sách Kim Đồng
                            <br> -->
                            <div data-label="Số lượng">
                                <input type="text" name="quantity2" id="sl2<?=$pro1->id ?>" value="<?php echo $_SESSION['orderCart'][$pro1->id] ?>" onchange="soluong2(<?php echo $pro1->id ?>,<?php echo $pro1->product_sale ?>)">
                            </div>
                            <div data-label="Đơn giá" class="price">
                                 <?php if($pro1->sale_percent == 0) { ?>
                                    <span class="h3">
                                       <?php echo number_format($pro1->product_sale) ?>₫
                                    </span>
                                <?php } else { 
                                    $giasale = $pro1->product_sale * ( 100 - $pro1->sale_percent) / 100;?>
                                    <span class="h3">
                                        <?php echo number_format($giasale) ?>₫
                                    </span>
                                <?php } ?>
                            </div>
                            <a href="" onclick="remove2(<?php echo $pro1->id ?>)" class="cart__remove">
                                <small>Xóa</small>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </table>
                <div class="grid cart__row">
                    <div class="grid__item two-thirds small--one-whole">
                        <!-- <label for="CartSpecialInstructions">Ghi chú</label>
                        <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea> -->
                         <div class="form-vertical clearfix">
                          <label for="ContactFormName" class="hidden-label">name</label>
                          <input type="text"  class="input-full" name="txtName" placeholder="Họ và Tên" required>

                          <label for="ContactFormPhone" class="hidden-label">phone</label>
                          <input type="tel"  class="input-full" name="txtPhone" placeholder="Số điện thoại" required>

                          <label for="ContactFormEmail" class="hidden-label">email</label>
                          <input type="email"  class="input-full" name="txtEmail" placeholder="Email" required>

                          <label for="ContactFormMessage" class="hidden-label">Địa chỉ</label>
                          <textarea rows="5"  class="input-full" name="txtAddress" placeholder="Số nhà, đường phố, xã/phường, quận/huyện" required></textarea>

                         <!--  <button type="submit" name="btnSubmit" class="btn right btnContactSubmit" value="contact" > Gửi </button> -->
                        </div>
                    </div>
                    
                    <div class="grid__item text-right one-third small--one-whole">
                        <p>
                            <span class="cart__subtotal-title">Tạm tính</span>
                            <span class="h3 cart__subtotal"><?php echo number_format($total_price1) ; ?> ₫</span>
                        </p>
                        <!-- <button type="submit" name="update" class="btn update-cart">Cập nhật</button> -->
                        <button type="submit" value="sendOder" name="btnSubmit" class="btn">Đặt hàng</button>
                    </div>
                </div>
            </form>
            <?php } ?>

        </div>
    </div>
</div>
        <script>
    function tongtien(){
        alert("Cập nhật tổng giá thành công");
    }
    function remove1(id){
        var quantity = $("#quantity1").val();
        if (typeof quantity == "undefined") {
           quantity = 1;
        }
        var f = "pid=" + id + "&type=delete&quantity=" + quantity;
        var _url = "/ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#carservicegh").html(data);
                // $("#carservice_cart_icon-2").html(data);
            }
        });
    }
    function remove2(id){
        var quantity = $("#quantity2").val();
        if (typeof quantity == "undefined") {
           quantity = 1;
        }
        var f = "pid=" + id + "&type=delete&quantity=" + quantity;
        var _url = "/ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#carservicegh").html(data);
                // $("#carservice_cart_icon-2").html(data);
            }
        });
    }

        function soluong1(id,gia){
        // alert('aaa');
        var quantity = $("#sl1" + id).val();
        if (quantity * 1.0 < 1 ) {
            $("#sl1" + id).val(1);
            // alert(quantity);
            return;
        }
        
        if (typeof quantity == "undefined") {
           quantity = 1;
        }

        var tongtien = document.getElementById("tongtien1").innerHTML;
        // alert(tongtien);
        var f = "pid=" + id + "&type=edit&quantity=" + quantity;
        var _url = "/ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#carservicegh").html(data);
            }
        });
    }

    function soluong2(id,gia){
        // alert('aaa');
        var quantity = $("#sl2" + id).val();
        if (quantity * 1.0 < 1 ) {
            $("#sl2" + id).val(1);
            // alert(quantity);
            return;
        }
        
        if (typeof quantity == "undefined") {
           quantity = 1;
        }

        // var tongtien = document.getElementById("tongtien1").innerHTML;
        // alert(tongtien);
        var f = "pid=" + id + "&type=edit&quantity=" + quantity;
        var _url = "/ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#carservicegh").html(data);
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $("body").on("keyup",".form-desk input[type='number']",function(e){
            debugger
            e.preventDefault();
            var $datamax = $(this).parents('td').data('max'), $thisval = $(this).val();
            if($datamax > 0 && $thisval > $datamax){
                errormodal(`Bạn chỉ có thể mua tối đa ${$datamax} sản phẩm`)
                $(this).val($datamax)
            }
        })
        $("body").on("change",".form-desk input[type='number']",function(e){debugger
        e.preventDefault();
            var $datamax = $(this).parents('td').data('max'), $thisval = $(this).val();
            if($datamax > 0 && $thisval > $datamax){
                errormodal(`Bạn chỉ có thể mua tối đa ${$datamax} sản phẩm`)
                $(this).val($datamax)
            }
        })
    })
</script>
    </main>
</div>

<!-- done -->
    <?= $ariacms->getBlock("footer_nxb"); ?>    
    
    <?= $ariacms->getBlock("section_menubottomdt_nxb"); ?>  

    <?= $ariacms->getBlock("login_nxb"); ?> 
    
    <?= $ariacms->getBlock("script_footer_nxb"); ?>
    
</body>

</html>
<?php } } ?>