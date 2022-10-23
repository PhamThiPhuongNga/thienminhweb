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

<!DOCTYPE html>
<html lang="vi" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanh toán</title>
    <link rel="shortcut icon" href="/templates/otochat/themes/91911/statics/imgs/logonho.jpg"/>
    <base s_name="" idw="" href="/trang-chu/home.html" extention="" lang="vi" />
    <link href="/templates/otochat/modules/payment/themes/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="/templates/otochat/modules/payment/themes/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css"
        href="/templates/otochat/modules/payment/themes/css/toastr.css" />
    <link rel="stylesheet" type="text/css"
        href="/templates/otochat/modules/payment/themes/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css"
        href="/templates/otochat/modules/payment/themes/css/_all.css" />
    <link rel="stylesheet" type="text/css"
        href="/templates/otochat/modules/payment/themes/css/style.css">
    <style type="text/css">
        .help-block-error2 {
            display: block !important;
            margin-top: -12px !important;
            margin-bottom: 0px !important;
            font-size: 11px !important;
        }

        .focus {
            border: red solid 1px;
        }

        ul.bankList {
            clear: both;
            height: 202px;
            width: 636px;
        }

        ul.bankList li {
            list-style-position: outside;
            list-style-type: none;
            cursor: pointer;
            float: left;
            margin-right: 0;
            padding: 5px 2px;
            text-align: center;
            width: 90px;
        }

        ul.cardList li {
            cursor: pointer;
            float: left;
            margin-right: 0;
            padding: 0px;
            text-align: center;
            width: 82px;
            box-shadow: none !important;
            margin: 3px 3px;
            border: 1px solid #eee;
        }

        .bank-online-methods .iradio_minimal-blue {
            margin: 0 !important;
            display: none;
        }

        .bank-online-methods label {
            padding-left: 0 !important;
        }

        .bank-online-methods:hover {
            border: #0EB2EF solid 1px !important;
        }
    </style>
</head>
<!-- chat facebook -->
<style>
    .support-icon-right {
        position: fixed;
        left: 5px;
        bottom: 0;
        z-index: 999999;
        overflow: hidden;
        width: 250px;
        color: #fff !important;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .support-icon-right h4 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px !important;
        font-family: Arial;
        color: #fff !important;
        margin: 0 !important;
        background-color: #3a5795;
        cursor: pointer;
border-radius: 10px 10px 0px 0px;
        overflow: hidden;
    }

    .support-icon-right i {
        padding: 10px;
        font-size: 24px;
    }

    .online-support {
        display: none;
    }

    .tab-content img,
    .tab-content object,
    .tab-content embed,
    .tab-content table,
    .tab-content input[type='image'] {
        max-width: 100%;
    }
</style>
<!-- <script type='text/javascript'>
    $(document).ready(function () {
        $('.online-support').hide();
        $('.support-icon-right h4').click(function (e) {
            e.stopPropagation();
            $('.online-support').slideToggle();
        });
        $('.online-support').click(function (e) {
            e.stopPropagation();
        });
        $(document).click(function () {
            $('.online-support').slideUp();
        });
    });
</script>
<div class='support-icon-right'>
    <h4><i class='fa fa-comments'></i> Chat Facebook </h4>
    <div class='online-support'>
        <div class='fb-page' data-href='https://www.facebook.com/TuQuyAuto' data-small-header='true' data-height='300'
            data-width='250' data-tabs='messages' data-adapt-container-width='false' data-hide-cover='false'
            data-show-facepile='false' data-show-posts='false'>
        </div>
    </div>
</div> -->
<!-- End chat facebook -->

<body><input type="hidden" name="nxtinfo" data-info-order="BNC1626928568" data-info-web="SHOWROOM TỨ QUÝ AUTO"
        data-info-phone="0974.53.5555 - 085.961.3333" data-info-address="Số 95A Trần Thái Tông, Cầu Giấy, Hà Nội"><input
        type="hidden" name="link_home" id="link_home" value="https://tuquyauto.com.vn">

    <div class="wrapper">
        <div id="header">
            <div class="header-top">
                <div class="container">
                    <div class="row"></div>
                </div>
            </div>
            <!-- ảnh banner logo -->
             <?php foreach ($web_home as $key => $home) { 
                    if($home->position == 'logo'){?>
            <div class="cf-logo">
                <div class="container">
                    <a href="/trang-chu/home.html">
                        <img src="<?php echo $home->image ?>" width="1140" height="102" class="img-responsive fixLogo" alt="Logo" />
                    </a>
                </div>
            </div>
            <?php unset($web_home[$key]); } ?>
                  <?php } ?>
        </div>
        <div class="cf-main">
            <div class="container">
                <div class="row">
                    <form name="onePageSubmit" method="POST"
                        action="">
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <div class="cf-title address-list">
                                <div class="top">
                                    <span class="icon">1</span>Thông tin</div>
                                    <div class="cf-middle-content">
                                    <div class="form-group">
                                        <div class="input-icon right inner-addon right-addo">
                                            <i class="glyphicon ">
                                                
                                            </i>
                                            <span>Họ và tên<i style="color:red;">*</i></span>
                                            <input style="height:35px;" type="text" name="txtName" class="form-control" placeholder="Nhập họ tên..." required="1"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <i class="glyphicon ">
                                                
                                            </i>
                                            <span>Email<i style="color:red;">*</i></span>
                                            <input style="height:35px;" type="text" name="txtEmail" class="form-control" placeholder="Nhập email..." value="" required="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon right">
                                            <i class="glyphicon ">
                                                
                                            </i>
                                            <span>Số điện thoại<i style="color:red;">*</i></span>
                                            <input style="height:35px;" type="text" name="txtPhone" class="form-control" placeholder="Nhập số điện thoại..." value="" required="1">
                                        </div>
                                    </div>
                                    <div class="row BNC_address_genral">
                                        <!-- <div class="col-md-6 form-group ">
                                            <select id="cityId" name="cus[cityId]"
                                                class="form-control BNC_cityId">
                                                <option name="" value="">Tỉnh/thành phố</option>
                                                <option name="An Giang" value="89">An Giang</option>
                                                <option name="Bà Rịa - Vũng Tàu" value="77">Bà Rịa - Vũng Tàu</option>
                                                <option name="Bắc Giang" value="24">Bắc Giang</option>
                                                <option name="Bắc Kạn" value="06">Bắc Kạn</option>
                                                <option name="Bạc Liêu" value="95">Bạc Liêu</option>
                                                <option name="Bắc Ninh" value="27">Bắc Ninh</option>
                                                <option name="Bến Tre" value="83">Bến Tre</option>
                                                <option name="Bình Dương" value="74">Bình Dương</option>
                                                <option name="Bình Phước" value="70">Bình Phước</option>
                                                <option name="Bình Thuận" value="60">Bình Thuận</option>
                                                <option name="Bình Định" value="52">Bình Định</option>
                                                <option name="Cà Mau" value="96">Cà Mau</option>
                                                <option name="Cần Thơ" value="92">Cần Thơ</option>
                                                <option name="Cao Bằng" value="04">Cao Bằng</option>
                                                <option name="Gia Lai" value="64">Gia Lai</option>
                                                <option name="Hà Giang" value="02">Hà Giang</option>
                                                <option name="Hà Nam" value="35">Hà Nam</option>
                                                <option name="Hà Nội" value="01">Hà Nội</option>
                                                <option name="Hà Tĩnh" value="42">Hà Tĩnh</option>
                                                <option name="Hải Dương" value="30">Hải Dương</option>
                                                <option name="Hải Phòng" value="31">Hải Phòng</option>
                                                <option name="Hậu Giang" value="93">Hậu Giang</option>
                                                <option name="Hồ Chí Minh" value="79">Hồ Chí Minh</option>
                                                <option name="Hòa Bình" value="17">Hòa Bình</option>
                                                <option name="Hưng Yên" value="33">Hưng Yên</option>
                                                <option name="Khánh Hòa" value="56">Khánh Hòa</option>
                                                <option name="Kiên Giang" value="91">Kiên Giang</option>
                                                <option name="Kon Tum" value="62">Kon Tum</option>
                                                <option name="Lai Châu" value="12">Lai Châu</option>
                                                <option name="Lâm Đồng" value="68">Lâm Đồng</option>
                                                <option name="Lạng Sơn" value="20">Lạng Sơn</option>
                                                <option name="Lào Cai" value="10">Lào Cai</option>
                                                <option name="Long An" value="80">Long An</option>
                                                <option name="Nam Định" value="36">Nam Định</option>
                                                <option name="Nghệ An" value="40">Nghệ An</option>
                                                <option name="Ninh Bình" value="37">Ninh Bình</option>
                                                <option name="Ninh Thuận" value="58">Ninh Thuận</option>
                                                <option name="Phú Thọ" value="25">Phú Thọ</option>
                                                <option name="Phú Yên" value="54">Phú Yên</option>
                                                <option name="Quảng Bình" value="44">Quảng Bình</option>
                                                <option name="Quảng Nam" value="49">Quảng Nam</option>
                                                <option name="Quảng Ngãi" value="51">Quảng Ngãi</option>
                                                <option name="Quảng Ninh" value="22">Quảng Ninh</option>
                                                <option name="Quảng Trị" value="45">Quảng Trị</option>
                                                <option name="Sóc Trăng" value="94">Sóc Trăng</option>
                                                <option name="Sơn La" value="14">Sơn La</option>
                                                <option name="Tây Ninh" value="72">Tây Ninh</option>
                                                <option name="Thái Bình" value="34">Thái Bình</option>
                                                <option name="Thái Nguyên" value="19">Thái Nguyên</option>
                                                <option name="Thanh Hóa" value="38">Thanh Hóa</option>
                                                <option name="Thừa Thiên Huế" value="46">Thừa Thiên Huế</option>
                                                <option name="Tiền Giang" value="82">Tiền Giang</option>
                                                <option name="Trà Vinh" value="84">Trà Vinh</option>
                                                <option name="Tuyên Quang" value="08">Tuyên Quang</option>
                                                <option name="Vĩnh Long" value="86">Vĩnh Long</option>
                                                <option name="Vĩnh Phúc" value="26">Vĩnh Phúc</option>
                                                <option name="Yên Bái" value="15">Yên Bái</option>
                                                <option name="Đà Nẵng" value="48">Đà Nẵng</option>
                                                <option name="Đắk Lắk" value="66">Đắk Lắk</option>
                                                <option name="Đắk Nông" value="67">Đắk Nông</option>
                                                <option name="Điện Biên" value="11">Điện Biên</option>
                                                <option name="Đồng Nai" value="75">Đồng Nai</option>
                                                <option name="Đồng Tháp" value="87">Đồng Tháp</option>
                                            </select>
                                            <input type="hidden" value="" name="cus[cityname]" />
                                        </div> -->
                                        <!-- <div class="col-md-6 form-group">
                                            <select id="districtId" disabled name="cus[districtId]" class="form-control BNC_districtId">
                                                <option value="">Quận/Huyện</option>
                                            </select>
                                            <input type="hidden" value="" name="cus[districtname]" />
                                        </div> -->
                                        <div class="col-md-12 form-group">
                                            <span>Địa chỉ<i style="color:red;">*</i></span>
                                            <textarea class="form-control" name="txtAddress" placeholder="Số nhà, đường/phố, tòa nhà, xã/phường ,......." required="1"></textarea></div>
                                        <div class="col-md-12 form-group">
                                            <span style="color:red;">* Vui lòng nhập đầy đủ thông tin</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                           <!--  <div class="cf-ship address-list">
                                <div class="ship-title"><span><i class="fa fa-truck"></i> Dịch vụ giao hàng </span>
                                </div>
                                <style type="text/css">
                                    .ulCarrier li {
                                        list-style: none;
                                        border: #F5F6F7 solid 1px;
                                        padding: 10px;
                                        margin-left: -40px;
                                        padding-bottom: 0px;
                                        margin-bottom: 7px;
                                    }
                                </style>
                                <div id="methodShipping">
                                    <p class="text-danger">Vui Lòng chọn địa điểm cần giao hàng tới.</p>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="col-md-4 col-sm-4 col-xs-12 boderleft">
                            <div class="cf-title"><span class="icon">2</span>Phương thức thanh toán</div>
                            <div class="content"></div>
                        </div> -->
                         <div id="BNC_product_list" class="col-md-6 col-sm-4 col-xs-12 boderleft">
                            <?php  if(!$products) {  ?>
                           
                                <div class="cf-title">
                                <div class="top"><span class="icon">2</span>Sản phẩm</div>
                                </div>
                                <div class="content rowNoMargin" style="font-size:16px;">
                                    <span style="font-size:18px;">
                                        Giỏ hàng trống - <a href="/trang-chu/home.html" style="color:#f47820 !important;">Quay về trang chủ</a>
                                    </span>
                                </div>
                        <?php } else { ?>
                      
                            <div class="cf-title">
                                <div class="top"><span class="icon">2</span>Sản phẩm</div>
                                <!-- in hóa đơn -->
                                    <!-- <span class="print submitPrint">
                                        <img src="https://img.icons8.com/material-outlined/24/26e07f/print.png"/>
                                    </span> -->
                            </div>
                            <div class="content rowNoMargin" style="font-size:16px;">
                                <span style="font-size:18px;">
                                Danh sách sản phẩm
                                </span>
                                <?php $total_price = 0;
                                 foreach ($products as $key => $pro) {
                                 $total_price += ($pro->product_sale * $_SESSION['orderCart'][$pro->id]);?>
                                <div class="list-product row rowNoMargin">
                                    <div class="img col-md-3 col-sm-4 col-xs-3">
                                        <a href="<?='/chi-tiet/' . $pro->url_part . '.html'?>"target="_blank" tilte="<?php echo $pro->title_vi ?>">
                                            <img style="height: 45px !important;width:70px;" class="img-responsive" src="<?php echo $pro->image ?>" alt="<?php echo $pro->title_vi ?>" title="<?php echo $pro->title_vi ?>">
                                        </a>
                                    </div>
                                    <div class="product-info col-md-9 col-sm-8 col-xs-9">
                                        <div class="product-name">
                                            <a href="<?='/chi-tiet/' . $pro->url_part . '.html'?>"
                                                target="_blank" data-unit="" data-model=""
                                                data-name="<?php echo $pro->title_vi ?>">
                                                <?php echo $pro->title_vi ?>
                                            </a>
                                            <!-- <input type="hidden" name="namesp" id="namesp0"
                                                value="<?php echo $pro->title_vi ?>" /> -->
                                        </div>
                                        <div class="product_quantity">
                                            <span class="spanQuantitySelect quantity">
                                                <input type="number" style="width:50px;outline: none;" id="sl<?=$pro->id ?>" name="quantity" class="BNC_product_quantity" value="<?php echo $_SESSION['orderCart'][$pro->id] ?>" onchange="soluong(<?php echo $pro->id ?>,<?php echo $pro->product_sale ?>)">
                                                <!-- <input type="hidden" name="soluongsp"
                                                    id="soluongsp0" value="1" /> -->
                                            </span>
                                            <span class="spanQuantityPrice">
                                                &nbsp;x <?php echo number_format($pro->product_sale) ?> ₫</span>
                                                <!-- <input type="hidden" name="pricesp" id="pricesp0" value="695.000.000 đ" /> -->
                                            <span class="spanQuantityPrice" id="tong<?=$pro->id ?>" style="margin-left:3px;"> = <?php echo number_format($pro->product_sale * $_SESSION['orderCart'][$pro->id]) ?> ₫
                                            </span>
                                            <br />
                                            <span class="removeProduct">   
                                                <span class="" onclick="remove(<?php echo $pro->id ?>)"> x
                                                    <!-- <img src="https://img.icons8.com/fluent-systems-regular/20/fa314a/delete-trash--v3.png"/> -->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <input type="hidden" name="" id="idk" value="1">
                                    <div class="dola">
                                        <div class="dola1" >
                                            <span>
                                                Tổng tiền:
                                            </span>
                                            <span id="tongtien">
                                                <?php echo number_format($total_price) ; ?>₫
                                            </span>
                                        </div>
                                        <input type="hidden" name="total" id="sub_total" value="<?php echo $total_price; ?>">
                                        <div class="dola1">
                                            <span class="dola1_fee_ship">
                                                Phí ship:
                                            </span>
                                            <?php foreach ($web_home as $key => $home) { 
                                            if($home->position == 'phone'){ ?>
                                            <span class="feeShip dola1_fee_ship">
                                                Liên hệ: <?php echo $home->brief_vi ?>
                                            </span>
                                            <?php } ?>
                                              <?php }
                                                ?>
                                        </div>
                                        <div class="dola1 feeCodd">
                                            <span>
                                                Phí Cod ( thu hộ ):
                                            </span>
                                            <?php foreach ($web_home as $key => $home) { 
                                            if($home->position == 'phone'){ ?>
                                            <span class="feeCod">
                                                Liên hệ: <?php echo $home->brief_vi ?>
                                            </span>
                                            <?php unset($web_home[$key]); } ?>
                                              <?php }
                                                ?>
                                        </div>
                                    <input type="hidden" name="shippingFee" id="shippingFee" value="Liên hệ">
                                    <!-- <div class="dola1">
                                        <span>Mã giảm giá:</span>
                                        <span class="coupon">
                                            <input class="form-control" name="coupon" value="" placeholder="Mã giảm giá">
                                            <button type="button" class="btn btn-success btn-xs check_coupon">
                                                <i class="fa fa-check-circle-o">
                                                    
                                                </i> Kiểm tra
                                            </button>
                                        </span>
                                    </div> -->
                                    <div class="dola1 divCost_coupon" style="display:none;">
                                        <span class="text-success cost_coupon" style="text-align: right;">
                                            
                                        </span>
                                    </div>
                                    <div class="dola1 end-dola">
                                        <span>
                                            Tổng tiền đơn hàng: 
                                        </span>
                                        <span>
                                           <?php echo number_format($total_price) ; ?> ₫
                                        </span>
                                    </div>
                                    <!-- <input type="hidden" name="total_order" id="total_order"
                                        value="695.000.000 đ"> -->
                                        <textarea name="txtContent" class="form-control"
                                        placeholder="Ghi chú thêm"></textarea>
                                </div>
                            </div>
                            <div class="dathang">
                                <button type="button" class="backOrder" onclick="window.location.href='/'" style="background:#f47820 !important;">
                                    <a href="/san-pham/san-pham.html" style="color: white;">
                                        <i class="fa" aria-hidden="true">
                                            
                                        </i> Mua thêm
                                    </a>
                                </button>
                                <button type="submit" class="submitOrder" value="sendOder" name="btnSubmit" style="background:#317135 !important;">
                                    <i class="fa" aria-hidden="true">
                                    </i> Đặt hàng
                                </button>
                                <!-- <button type="button" style="display: none;" id="sendInstallment">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        
                                    </i> Trả Góp
                                </button> -->
                                <br>
                                <span id="alert"></span>
                            </div>
                       
                    <?php } ?> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="BNC_login_vg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Đăng nhập tài khoản Bảo Kim</h4>
                </div>
                <div class="modal-body" style="overflow:hidden">
                    <div class="form-group" id="BNC_login_error"></div>
                    <div class="form-group"><label class="col-md-3 control-label">Tên đăng nhập</label>
                        <div class="col-md-9"><input id="username" name="username" class="form-control"
                                placeholder="Tên đăng nhập" type="text"></div>
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group"><label class="col-md-3 control-label">Mật khẩu</label>
                        <div class="col-md-9"><input id="password" name="password" class="form-control"
                                placeholder="Mật khẩu" type="password"></div>
                    </div>
                </div>
                <div class="modal-footer"><button id="BNC_login_idvg" type="button" class="btn btn-primary">Đăng nhập</button></div>
            </div>
        </div>
    </div> -->
        <script>
    function tongtien(){
        alert("Cập nhật tổng giá thành công");
    }
    function remove(id){
        // if(!confirm("Bạn có muốn xóa không?")){
        //     return;
        // }
        var quantity = $("#quantity").val();
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
                $("#BNC_product_list").html(data);
                // $("#carservice_cart_icon-2").html(data);
            }
        });
    }

        function soluong(id,gia){

        var quantity = $("#sl" + id).val();
        if (quantity * 1.0 < 1 ) {
            $("#sl" + id).val(1);
            return;
        }
        // alert(quantity);
        if (typeof quantity == "undefined") {
           quantity = 1;
        }

        var tongtien = document.getElementById("tongtien").innerHTML;
        // alert(tongtien);
        var f = "pid=" + id + "&type=edit&quantity=" + quantity;
        var _url = "/ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#BNC_product_list").html(data);
                //alert(data);
                // alert("Vui lòng ấn CẬP NHẬT GIÁ để tính tổng số tiền phải trả!");
                // document.getElementById("tong" + id ).innerHTML= '= '+
                // new Intl.NumberFormat('vn-VN', { style: 'currency', currency: 'VND' }).format((gia*1)*(quantity*1));
                // $("#carservice_cart_icon-2").html(data);
            }
        });
    }
</script>
    <script>
        var lang_PleaseDelivery = "Vui Lòng chọn địa điểm cần giao hàng tới.";
    </script>
    <script src="/templates/otochat/modules/payment/themes/js/jquery.min.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/bootstrap.min.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/toastr.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/oncepage_dk.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/alepay.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/jquery.slimscroll.min.js"></script>
    <script src="/templates/otochat/modules/payment/themes/js/jquery.validate.js"></script>
    <script type="text/javascript"
        src="/templates/otochat/modules/payment/themes/js/loading-overlay.min.js"></script>
    <script type="text/javascript" src="/templates/otochat/modules/payment/themes/js/jquery.fancybox.js">
    </script>
    <script type="text/javascript"
        src="/templates/otochat/modules/payment/themes/js/icheck.min.js"></script>
    <script type="text/javascript">
        function BNCcallback(data) {
            console.log(data);
        }
        var url = document.URL;
        var idW = '8958';
        var uid = '';
        var title = document.title;
    </script>

</body>

</html>
<?php } 
} ?>