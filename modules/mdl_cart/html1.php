<?php
class View
{
	static function viewhome()
	{
		global $ariacms;
		global $params;
		global $database;
		global $ariaConfig_template;
		global $analytics_code;
		$i = 0;
		//print_r($_SESSION);
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
    $total=0;
    foreach ($products as $product){
     $total_bandau += ($_SESSION['orderCart'][$product->id] * $product->product_sale);
     $total += ($_SESSION['orderCart'][$product->id] * $product->product_sale)+(($_SESSION['orderCart'][$product->id] * $product->product_sale) * $product->VAT)/100+($_SESSION['orderCart'][$product->id] * $product->Eco_tax);
   }
   
		//print_r($_SESSION['orderWishlist']);die;
   $count = count($id);
   ?>
   <!DOCTYPE html>
   <html dir="ltr" lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= _VIEW_CART ?> - <?= ($ariacms->web_information->{$params->meta_title} != '') ? $ariacms->web_information->{$params->meta_title} : $ariacms->web_information->{$params->name}; ?></title>

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



   <div id="checkout-cart" class="container">
    <ul class="breadcrumb">
      <li><a href="<?=$ariacms->actual_link?>/trang-chu.html"><i class="fa fa-home"></i></a></li>
      <li><a href=""><?=_YOUR_CART?></a></li>
    </ul>
    <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> Success: You have modified your shopping cart!
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <div class="row">
      <div id="content" class="col-sm-12">
        <h1><?=_YOUR_CART?>
      </h1>

      <?php if($count ==0){?>
        <p class="cart-empty"> <?= _YOUR_CART." "._EMPTY?></p>
        <p class="return-to-shop">
          <a class="button wc-backward" href="<?= $ariacms->actual_link ?>"><?= _RETURN_TO_SHOP?></a>
        </p>
      <?php }else{?>
        
       


        <form action="" method="post" enctype="multipart/form-data">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td class="text-center"><?=_Image?></td>
                  <td class="text-center"><?=_PRODUCT_NAME?></td>
                  <!--  <td class="text-left">Model</td> -->
                  <td class="text-left"><?=_QUANTITY?></td>
                  <td class="text-center"><?=_UNIT_PRICE?></td>
                  <td class="text-center"><?=_TOTAL?></td>
                </tr>
              </thead>
              <tbody>
                <?php foreach($products as $product){?>
                  <tr>
                    <td class="text-center"> <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><img src="<?=$product->image_thumb?>" alt="<?=$product->{$params->title}?>" title="<?=$product->{$params->title}?>" class="img-thumbnail" /></a> </td>
                    <td class="text-center"><a href=""><?=$product->{$params->title}?></a>                                  <br />
               <!--  <small>Delivery Date: 2011-04-22</small>                                  <br />
                <small>Reward Points: 900</small>                 --> </td>
                <!--  <td class="text-left">Product 21</td> -->
                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                  <!-- <input type="text" name="quantity" value="<?=$_SESSION['orderCart'][$product->id]?>" size="1" class="form-control" /> -->
                  <input type="text" id="quantity_<?= $product->id?>" class="form-control" onchange="editCart(<?= $product->id?>);"
                  step="1"
                  min="0"
                  max=""
                  name="quantity"
                  value="<?= $_SESSION['orderCart'][$product->id]?>"
                  title="quantity"
                  size="4"
                  placeholder=""
                  inputmode="numeric" />
                  <span class="input-group-btn">
                    <!-- <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"  onclick="editCart(<?= $product->id?>);"><i class="fa fa-refresh"></i></button> -->
                    <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="deleteCart(<?= $product->id?>);"><i class="fa fa-times-circle"></i></button>
                  </span></div></td>
                  <td class="text-center"><?=number_format($product->product_sale+($product->product_sale*$product->VAT)/100+$product->Eco_tax)?> VNĐ <br />
                    <small><strong>Eco Tax:</strong> <?=$product->Eco_tax?> VNĐ/<?=_PRODUCT?></small>                                  <br />
                    <small><strong>VAT(%):</strong> <?=$product->VAT?> %</small> 
                  </td>
                  <td class="text-center"><?=number_format($_SESSION['orderCart'][$product->id]*($product->product_sale+($product->product_sale*$product->VAT)/100+$product->Eco_tax))?> VNĐ</td>
                </tr>
              <?php }?>
            </tbody>
            
          </table>
        </div>
      </form>
      
    <?php } ?>
    
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
          alert("Xóa thành công ra giỏ hàng");
          location.reload();
        }
      });
      }
    </script>
    <div class="row">
      <div class="col-sm-4 col-sm-offset-8">
        <table class="table table-bordered">
          <tr>
            <td class="text-right"><strong><?=_GIA_BAN?>:</strong></td>
            <td class="text-right"><?=number_format($total_bandau)?> VNĐ</td>
          </tr>
                     <!--    <tr>
              <td class="text-right"><strong>Eco Tax:</strong></td>
              <td class="text-right"><?=$product->Eco_tax?> VNĐ </td>
            </tr>
                        <tr>
              <td class="text-right"><strong>VAT (<?=$product->VAT?>%):</strong></td>
              <td class="text-right"><?=($total_bandau*$product->VAT)/100?> VNĐ</td>
            </tr> -->
            <tr>
              <td class="text-right"><strong><?=_TOTAL?></strong></td>
              <td class="text-right"><?=number_format($total)?> VNĐ</td>
            </tr>
          </table>
        </div>
      </div>
      <script>
       function editCart(id){
        var quantity = $("#quantity_"+id).val();
        if (typeof quantity == "undefined"||quantity < 1){
         alert("Số lượng sản phẩn không được bé hơn 1");
         quantity = 1;
       }
       else{
         var f = "pid=" + id + "&type=edit&quantity="+quantity;
         var _url = "<?= $ariacms->actual_link ?>ajax/ajax.cart.php?"+f;
         $.ajax({
          url: _url,
          data: f,
          cache: false,
          context: document.body,
          success: function(data) {
           location.reload();
         }
       });
       }
     }
   </script>
   <div class="buttons clearfix">
    <div class="pull-left"><a href="<?=$ariacms->actual_link?>/san-pham.html" class="btn btn-default">Continue Shopping</a></div>
    <div class="pull-right"><a href="<?=$ariacms->actual_link?>/giao-hang.html" class="btn btn-primary"><?=_PROCEED_TO_CHECKOUT?></a></div>
  </div>
</div>
</div>
</div>	
<?= $ariacms->getBlock("footer_traid"); ?>	

</div>
</body>

</html>
<?php
}
}
?>
