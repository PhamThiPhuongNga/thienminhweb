 <?php
 global $database;
 global $ariacms;
 global $params;
 global $web_menus;
 global $web_information;
 $i = 0; $j=0;
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
   $url = "https://";   
else  
   $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];
;

//print_r($_SESSION['orderCart']); die; 
    // Append the requested resource location to the URL   
$task =  ltrim( $_SERVER['REQUEST_URI'],'/');
$_SESSION['url'] = $url.$_SERVER['REQUEST_URI'];
//print_r($_SESSION['orderCart']);die;
if ($_SESSION['orderCart']) {
    foreach ($_SESSION['orderCart'] as $productID => $quantity) {
        $i += $quantity;
    }
    $id= array();
    foreach ($_SESSION['orderCart'] as $productID=>$value) {
        array_push($id,$productID); 
    }
}
if ($_SESSION['orderWishlist']) {
  foreach ($_SESSION['orderWishlist'] as $productID1 => $quantity1) {
    $j += $quantity1;
}
$id2= array();
foreach ($_SESSION['orderWishlist'] as $productID1=>$value1) {
    array_push($id2,$productID1); 
}
}


$id=implode(",",$id);

$query = "SELECT  a.*
FROM e4_posts a
WHERE  a.id in ({$id})";
$database->setQuery($query);
$products = $database->loadObjectList();
$total=0;
foreach ($products as $product){
   $total += ($_SESSION['orderCart'][$product->id] * $product->product_sale)+(($_SESSION['orderCart'][$product->id] * $product->product_sale) * $product->VAT)/100+($_SESSION['orderCart'][$product->id] * $product->Eco_tax);
} 


//$ariacms->web_information->{'image-logo'};
?>
<script>
    function addCart(id){
        var quantity = $("#quantity").val();
        if (typeof quantity == "undefined") {
           quantity = 1;
       }
       var f = "pid=" + id + "&type=add&quantity=" + quantity;
       var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php?"+f;
	   //alert(_url);
       $.ajax({
           url: _url,
           data: f,
           cache: false,
           context: document.body,
           success: function(data) {
              //alert(data);
              $("#carthtml").html(data);
			  alert("Thêm thành công vào giỏ hàng");
          }
      });
   }
</script>

<script>
    function view(id){

        var f = "id=" + id;
        
        var _url = "<?= $ariacms->actual_link ?>ajax/ajax.view.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                $("#view").html(data);
            }
        });
    }
    function close_view(){
        document.getElementById("display_view").style.display = "none";
    }
</script>

<script>
  function addWish(id){
    if (typeof quantity1 == "undefined") {
     quantity1 = 1;
 }
 var f = "pid=" + id + "&type=add&quantity1=" + quantity1;
 var _url = "<?= $ariacms->actual_link?>ajax/ajax.wishlist.php?"+f;
 $.ajax({
  url: _url,
  data: f,
  cache: false,
  context: document.body,
  success: function(data) {
    alert("Thêm danh sách yêu thích thành công!");  
}
});
}
</script>
<script>
    function deleteCart(id){
        var f = "pid=" + id + "&type=delete";
        var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
               
                $("#carthtml").html(data);
				 alert("Xóa thành công ra giỏ hàng" );
            }
        });
    }
    function change_Lang(lang){
        var f = "lang=" + lang;
        var _url = "<?= $ariacms->actual_link ?>ajax/ajax.change_Lang.php?"+f;
        $.ajax({
            url: _url,
            data: f,
            cache: false,
            context: document.body,
            success: function(data) {
                window.location="<?= $_SESSION['url']?>";
            }
        });
    }
</script>

<!-- main header -->
<header class="main-header">
    <div class="header-top">
        <!-- header-top -->
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="text pull-left">
                    <p><?= $ariacms->web_information->{$params->slogan} ?></p>
                </div>
                <div class="top-right pull-right">
                    <ul class="social-links clearfix">
                        <li><a href="<?=$ariacms->web_information->facebook ?>"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->twitter ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->youtube ?>"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="<?=$ariacms->web_information->instagram ?>"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class=" pull-left" style="position: relative;margin-right: 90px;">
                    <figure class="logo">
                        <a href="<?=$ariacms->actual_link?>"><img src="<?=$ariacms->web_information->{'image-logo'};?>" alt="" width="70px" height="100px"></a>
                    </figure>
                </div>
                <div class="menu-area pull-left">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current "><a href="<?=$ariacms->actual_link?>"><i class="fa fa-house"></i></a></li>
                                <?php
                                foreach ($web_menus as $key => $web_menu) {
                                    if ($web_menu->parent == 0)  {
                                      if($web_menu->submenu==0) {
                                        ?>
                                        <li class=""><a href="<?= $ariacms->actual_link . $web_menu->url_html ?>"><?= $web_menu->{$params->title} ?></a>

                                        <?php } else { ?>   
                                            <li class="dropdown"><a href="<?= $ariacms->actual_link . $web_menu->url_html ?>"><?= $web_menu->{$params->title} ?></a>


                                                <ul>
                                                   <?php
                                                   foreach ($web_menus as $key1 => $sub_menu) {
                                                    if ($web_menu->id == $sub_menu->parent) {
                                                      ?>
                                                      <li><a href="<?= $ariacms->actual_link . $sub_menu->url_html?>"><?= $sub_menu->{$params->title}?></a></li>

                                                      <?php
                                                  }
                                              }?>
                                          </ul>
                                      </li>
                                      <?php
                                  } } }
                                  ?>




                                  <li class="dropdown" style="margin-left: 50px;margin-left: 20px;margin-top:2px"><i class="fa fa-search "></i>
                                    <ul>
                                        <li>
                                            <form class="search" method="POST" action="<?=$ariacms->actual_link?>/san-pham.html" style="">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Tìm kiếm..." name="key" value="<?= $_REQUESTE["key"]?>">
                                                    <div class="input-group-append">
                                                        <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                                                        <input type="hidden" name="btn" value="product" />
                                                    </div>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown" style="margin-top:2px;margin-left: 20px;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <ul id="carthtml">
                                        <?php if($i==0) { ?>
                                            <li> 
                                               <a style="color:red;"> Giỏ hàng của bạn rỗng !</a>
                                            </li>
                                        <?php } else {  ?>
                                            <li> 
                                                <li >
                                              <!-- <span class="cart-dropdown-menu-close"><i class="ion-android-close"></i></span> -->
                                              <?php foreach ($products as $product){?>
                                                <table class="table table-striped" style="background:white;">
                                                  <tr>
                                                    <td class="text-center cart-image" style="padding: 0.35rem"> <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><img width="80" height="80" src="<?= $product->image?>" alt="Pellentesque sodales" title="Pellentesque sodales" class="img-thumbnail" /></a> 
                                                    </td>
													<td class="text-left cart-info" style="vertical-align: middle;">
													  <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?= $product->{$params->title}?></a>                  <p>
														<span class="cart-quantity">Số lượng :<?= $_SESSION['orderCart'][$product->id]?> </span>
														<!-- <span class="cart-product-price"><?=number_format($product->product_sale) ?> VNĐ</span> -->
													   <!--  <br />
														<strong>VAT(%):</strong> <?=$product->VAT?> % -->
													</p>
													</td>

												   <td  style="vertical-align: middle;" class="text-center" onclick="deleteCart(<?= $product->id?>)"><b title="Xóa khỏi giỏ hàng" style="color:red; cursor:pointer">X</b></td>
												</tr>
                                        </table>
                                    <?php }?>
                                </li>
                                <li>
                                    <div>
                                      <table class="table table-bordered" style="background:white;">

                                        <tr>
                                          <td class="text-left" style="padding-left: 20px"><strong>Tổng :</strong></td>
                                          <td class="text-right"><?=number_format($total) ?> VNĐ</td>
                                      </tr>
                                  </table>
                                  <p class="text-right">
                                    <a href="<?=$ariacms->actual_link?>giao-hang.html"><strong><i class="fa fa-shopping-cart"></i>Thanh Toán</strong></a>
                                   <!--  <a href="<?=$ariacms->actual_link?>giao-hang.html"><strong><i class="fa fa-share"></i><?= _CHECKOUT?></strong></a> -->
                                </p>
                              </div>
                          </li>   
                      </li>
                  <?php } ?>


              </ul>
          </li>        




      </ul>

  </div>
</nav>
</div>
<div class="support-box pull-right">
    <i class="flaticon-call"></i>
    <p>HOTLINE</p>
    <h4><a href="tel:<?=$ariacms->web_information->hotline?>	"><?=$ariacms->web_information->hotline?></a></h4>
</div>
</div>
</div>
</div>

<!--sticky Header-->
<div class="sticky-header">
    <div class="auto-container">
        <div class="outer-box clearfix">
            <div class="pull-left" style="position: relative;margin-right: 90px;">
                <figure class="logo">
                    <a href="<?=$ariacms->actual_link?>"><img src="<?=$ariacms->web_information->{'image-logo'};?>" alt="" width="70px" height="100px"></a>
                </figure>
            </div>
            <div class="menu-area pull-left">
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
            </div>
            <div class="support-box pull-right">
                <i class="flaticon-call"></i>
                <p>HOTLINE</p>
                <h4><a href="tel:<?=$ariacms->web_information->hotline?>"><?=$ariacms->web_information->hotline?></a></h4>
            </div>
        </div>
    </div>
</div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo">
            <a href="<?=$ariacms->actual_link?>"><img src="<?=$ariacms->web_information->{'image-logo'};?>" alt="" title="" style="width: 200px;"></a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="contact-info">
            <h4>Liên hệ</h4>
            <ul>
                <li><?=$ariacms->web_information->{$params->address}?></li>
                <li><a href="tel:<?=$ariacms->web_information->hotline?>"><?=$ariacms->web_information->hotline?></a></li>
                <li><a href="mailto:<?=$ariacms->web_information->admin_email?>"><?=$ariacms->web_information->admin_email?></a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="<?=$ariacms->web_information->twitter ?>"><span class="fab fa-twitter"></span></a></li>
                <li><a href="<?=$ariacms->web_information->facebook ?>"><span class="fab fa-facebook-square"></span></a></li>
                <!--  <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li> -->
                <li><a href="<?=$ariacms->web_information->instagram ?>"><span class="fab fa-instagram"></span></a></li>
                <li><a href="<?=$ariacms->web_information->youtube ?>"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
        <!-- End Mobile Menu -->