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
   $.ajax({
     url: _url,
     data: f,
     cache: false,
     context: document.body,
     success: function(data) {
      alert("Thêm thành công vào giỏ hàng");
      $("#cart").html(data);
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
				alert("Xóa thành công ra giỏ hàng" );
				location.reload();
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

<header class="scroll-fix ">
  <div class="header-middle">	
   <div class="container">
    <div class="box-inner">
     <div class="box-inner-inner">
      <div class="col-logo">
       <style>
       #pt-menu-9311 .pt-menu-bar {
        background: #FFFFFF;
        color: #1D1D1D;
        padding: 0px 0px 0px 0px;
      }
      #pt-menu-9311.pt-menu-bar {
        background: #FFFFFF;
        color: #1D1D1D;
      }
      #pt-menu-9311 .ul-top-items .li-top-item .a-top-link {
        background: #FFFFFF;
        padding: 5px 0px 5px 0px;
        color: #1D1D1D;
        font-size: 1.5rem;
        text-transform: uppercase;
        font-weight: 600;
      }
      #pt-menu-9311 .ul-top-items .li-top-item:hover .a-top-link,#pt-menu-9311 .ul-top-items .li-top-item:hover .a-top-link i, #pt-menu-9311 .ul-top-items .li-top-item.active .a-top-link{
        color: #83BC2E;
        font-weight: 600;
        background: #FFFFFF;
      }
      #pt-menu-9311 .ul-top-items .li-top-item > a > span:after {background: #83BC2E;}
      #pt-menu-9311 .mega-menu-container {

        background: #FFFFFF;
        padding: 0px 0px 0px 0px;
      }
      #pt-menu-9311 .mega-menu-container .a-mega-second-link {
        color: #FFFFFF;
        font-size: 1.4rem;
        text-transform: none;
        font-weight: 300;
      }
      #pt-menu-9311 .mega-menu-container .a-mega-second-link:hover {
        color: #FFFFFF;
        font-weight: 300;
      }
      #pt-menu-9311 .mega-menu-container .a-mega-third-link {
        color: #FFFFFF;
        font-size: 1.4rem;
        text-transform: none;
        font-weight: 300;
      }
      #pt-menu-9311 .mega-menu-container .a-mega-third-link:hover {
        color: #FFFFFF;
        font-weight: 300;
      }
      #pt-menu-9311 .ul-second-items .li-second-items {
        background: #FFFFFF;
        color: #1D1D1D;
      }
      #pt-menu-9311 .ul-second-items .li-second-items:hover, #pt-menu-9311 .ul-second-items .li-second-items.active {
        background: #FFFFFF;
        color: #83BC2E;
      }
      #pt-menu-9311 .ul-second-items .li-second-items .a-second-link {
        color: #1D1D1D;
        font-size: 1.6rem;
        text-transform: capitalize;
        font-weight: 600;
      }
      #pt-menu-9311 .ul-second-items .li-second-items .a-second-link:hover,#pt-menu-9311 .ul-second-items .li-second-items:hover .a-second-link, #pt-menu-9311 .ul-second-items .li-second-items.active .a-second-link {
        color: #83BC2E;
        font-weight: 600;
      }
      #pt-menu-9311 .ul-third-items .li-third-items {
        background: #FFFFFF;
      }
      #pt-menu-9311 .ul-third-items .li-third-items:hover, #pt-menu-9311 .ul-third-items .li-third-items.active {
        background: #FFFFFF;
      }
      #pt-menu-9311 .ul-third-items .li-third-items .a-third-link {
        color: #888888;
        font-size: 1.4rem;
        text-transform: capitalize;
        font-weight: 400;
      }
      #pt-menu-9311 .ul-third-items .li-third-items .a-third-link:hover, #pt-menu-9311 .ul-third-items .li-third-items.active .a-third-link {
        color: #F33535;
        font-weight: 400;
      }
    </style>

    <!--menu dien thoai-->
    <div class="pt-menu mobile-menu hidden-lg  " id="pt-menu-9311">

      <input type="hidden" id="menu-effect-9311" class="menu-effect" value="none" />
      <div class="pt-menu-bar">
        <i class="ion-android-menu" aria-hidden="true"></i>
        <i class="ion-android-close" aria-hidden="true"></i>
      </div>
      <ul class="ul-top-items">

        <li class="menu-mobile-title"><h3>Mobile Menu</h3></li>
        <?php
        foreach ($web_menus as $key => $web_menu) {
          if ($web_menu->parent == 0)  {
           ?>
           <li class="li-top-item ">
            <a class="a-top-link a-item" href="<?= $ariacms->actual_link . $web_menu->url_html ?>">
              <span><?= $web_menu->{$params->title} ?></span>
            </a>
            <?php if($web_menu->submenu > 0) { ?>
              <span class="top-click-show a-click-show">
                <i class="ion-ios-arrow-down" aria-hidden="true"></i>
                <i class="ion-ios-arrow-up" aria-hidden="true"></i>
              </span> 
              <div class="sub-menu-container">
                <ul class="ul-second-items">
                 <?php foreach ($web_menus as $key1 => $sub_menu) {
                  if ($web_menu->id == $sub_menu->parent and $sub_menu->parent > 0) { ?> 
                    <li class="li-second-items">
                      <a href="<?= $ariacms->actual_link . $sub_menu->url_html?>" class="a-second-link a-item">
                       <span class="a-second-title"> <?= $sub_menu->{$params->title}?> </span>
                     </a>
                        <!-- <span class="second-click-show a-click-show">
                            <i class="ion-ios-arrow-down" aria-hidden="true"></i>
                            <i class="ion-ios-arrow-up" aria-hidden="true"></i>
                        </span>
                        <div class="flyout-third-items">
                            <ul class="ul-third-items">
                                <li class="li-third-items">
                                    <a href="indexa6ae.html?route=product/category&amp;path=59_63_71" class="a-third-link"><span class="a-third-title">Blouses &amp; Shirts</span></a>
                                </li>
                                <li class="li-third-items">
                                    <a href="indexb59f.html?route=product/category&amp;path=59_63_67" class="a-third-link"><span class="a-third-title">Dresses</span></a>
                                </li>
                                <li class="li-third-items">
                                    <a href="indexf39c.html?route=product/category&amp;path=59_63_68" class="a-third-link"><span class="a-third-title">Jackets &amp; Coats</span></a>
                                </li>
                                <li class="li-third-items">
                                    <a href="indexa8ee.html?route=product/category&amp;path=59_63_70" class="a-third-link"><span class="a-third-title">Jeans</span></a>
                                </li>
                                <li class="li-third-items">
                                    <a href="indexbf8e.html?route=product/category&amp;path=59_63_69" class="a-third-link"><span class="a-third-title">Sweaters</span></a>
                                </li>
                            </ul>
                          </div> -->
                        </li>
                      <?php } } ?>
                    </ul>
                  </div>
                <?php } ?>

              </li>
              <?php
            } }
            ?>
          </ul>
        </div>

        <!--logo-->
        <div id="logo">
         <a href="<?=$ariacms->actual_link?>"><img src="<?= $ariacms->web_information->{'image-logo'}?>" title="" alt="" class="img-responsive" /></a>							</div>
       </div>

       <div class="col-hoz">
         <style>
         #pt-menu-9461 .pt-menu-bar {
          background: #FFFFFF;
          color: #FFFFFF;
          padding: 0px 0px 0px 0px;
        }
        #pt-menu-9461.pt-menu-bar {
          background: #FFFFFF;
          color: #FFFFFF;
        }
        #pt-menu-9461 .ul-top-items .li-top-item .a-top-link {
          background: #FFFFFF;
          padding: 5px 17px 5px 17px;
          color: #1D1D1D;
          font-size: 1.4rem;
          text-transform: uppercase;
          font-weight: 600;
        }
        #pt-menu-9461 .ul-top-items .li-top-item:hover .a-top-link,#pt-menu-9461 .ul-top-items .li-top-item:hover .a-top-link i, #pt-menu-9461 .ul-top-items .li-top-item.active .a-top-link{
          color: #83BC2E;
          font-weight: 600;
          background: #FFFFFF;
        }
        #pt-menu-9461 .ul-top-items .li-top-item > a > span:after {background: #83BC2E;}
        #pt-menu-9461 .mega-menu-container {

          background: #FFFFFF;
          padding: 30px 30px 30px 30px;
        }
        #pt-menu-9461 .mega-menu-container .a-mega-second-link {
          color: #1D1D1D;
          font-size: 1.6rem;
          text-transform: uppercase;
          font-weight: 600;
        }
        #pt-menu-9461 .mega-menu-container .a-mega-second-link:hover {
          color: #83BC2E;
          font-weight: 600;
        }
        #pt-menu-9461 .mega-menu-container .a-mega-third-link {
          color: #626262;
          font-size: 1.4rem;
          text-transform: capitalize;
          font-weight: 400;
        }
        #pt-menu-9461 .mega-menu-container .a-mega-third-link:hover {
          color: #83BC2E;
          font-weight: 400;
        }
        #pt-menu-9461 .ul-second-items .li-second-items {
          background: #FFFFFF;
          color: #1D1D1D;
        }
        #pt-menu-9461 .ul-second-items .li-second-items:hover, #pt-menu-9461 .ul-second-items .li-second-items.active {
          background: #FFFFFF;
          color: #83BC2E;
        }
        #pt-menu-9461 .ul-second-items .li-second-items .a-second-link {
          color: #1D1D1D;
          font-size: 1.4rem;
          text-transform: capitalize;
          font-weight: 500;
        }
        #pt-menu-9461 .ul-second-items .li-second-items .a-second-link:hover,#pt-menu-9461 .ul-second-items .li-second-items:hover .a-second-link, #pt-menu-9461 .ul-second-items .li-second-items.active .a-second-link {
          color: #83BC2E;
          font-weight: 500;
        }
        #pt-menu-9461 .ul-third-items .li-third-items {
          background: #FFFFFF;
        }
        #pt-menu-9461 .ul-third-items .li-third-items:hover, #pt-menu-9461 .ul-third-items .li-third-items.active {
          background: #FFFFFF;
        }
        #pt-menu-9461 .ul-third-items .li-third-items .a-third-link {
          color: #626262;
          font-size: 1.4rem;
          text-transform: capitalize;
          font-weight: 400;
        }
        #pt-menu-9461 .ul-third-items .li-third-items .a-third-link:hover, #pt-menu-9461 .ul-third-items .li-third-items.active .a-third-link {
          color: #83BC2E;
          font-weight: 400;
        }
      </style>

      <!--menu may tinh-->
      <div class="pt-menu horizontal-menu pt-menu-bar visible-lg  " id="pt-menu-9461">

        <input type="hidden" id="menu-effect-9461" class="menu-effect" value="none" />
        <ul class="ul-top-items">
          <?php
          foreach ($web_menus as $key => $web_menu) {
            if ($web_menu->parent == 0)  {
              if($web_menu->submenu==0) {
                ?>
                <li class="li-top-item left " style="float: left">
                  <a class="a-top-link" href="<?= $ariacms->actual_link . $web_menu->url_html ?>">
                    <span> <?= $web_menu->{$params->title} ?></span>
                  </a> 
                <?php } else {
                  ?>
                  <li class="li-top-item left " style="float: left">
                    <a class="a-top-link" href="<?= $ariacms->actual_link . $web_menu->url_html ?>">
                      <span> <?= $web_menu->{$params->title} ?></span>
                      <i class="ion-ios-arrow-down" aria-hidden="true"></i>
                    </a> 
                  <?php } ?>  
                  <div class="flyout-menu-container sub-menu-container left">
                    <ul class="ul-second-items">
                      <?php
                      foreach ($web_menus as $key1 => $sub_menu) {
                        if ($web_menu->id == $sub_menu->parent) {
                                                        // thêm thẻ
                          if($sub_menu->url_html == $task){
                            ?>
                            <script>
                              document.getElementById("<?= $web_menu->id?>").classList.add('current-menu-item');
                            </script> 
                          <?php }?>
                          <li class="li-second-items">
                            <a href="<?= $ariacms->actual_link . $sub_menu->url_html?>" class="a-second-link a-item">
                              <span class="a-second-title"> <?= $sub_menu->{$params->title}?> </span>
                            </a>
                          </li>
                          <?php
                        }
                      }?>
                    </ul> 
                  </div>
                </li> 
                <?php 

              } ?> 

              <?php
            }
            ?>  
          </ul>

        </div>

      </div>
      <!--tim kiem -->
      <div class="col-cart">
       <div class="inner">
       
        <div id="search-by-category">
          <div class="dropdown-toggle search-button" data-toggle="dropdown"></div>
          <div class="dropdown-menu search-content" >
            <form class="navbar-form" role="search" method="POST" id="searchform" action="<?=$ariacms->actual_link?>/san-pham.html">
            <div class="search-container">
             <div class="categories-container">
              
                <!-- <div class="hover-cate">
                 <div class="text-selected">
                  <div class="cate-selected" data-value="0"><span>All Categories</span><i class="ion-ios-arrow-down"></i></div>
                </div>
                <ul class="cate-items">
                  <li class="item-cate" data-value="0">All Categories</li>
                  <li data-value="60" class="item-cate">Flour</li>
                  <li data-value="88" class="item-cate f1">Clothing</li>
                </ul>
              </div> -->
            
          </div>
          <input type="text" name="key" id="text-search" value="<?= $_POST["key"]?>" placeholder="<?=_SEARCH?>" class=""  />
          <div id="sp-btn-search" class="">
            <button type="submit" id="btn-search-category" class="btn btn-default btn-lg">
             <span class="hidden-xs"><?=_SEARCH?></span>
           </button>
           <input type="hidden" name="post_type" value="product" /> 
         </div>
         <div class="search-ajax">
          <div class="ajax-loader-container" style="display: none;">
           <img src="/templates/traid/timage/catalog/ajax-loader.gif" alt="search-ajax" class="ajax-load-img" width="30" height="30" />
         </div>
         <div class="ajax-result-container">
           <!-- Content of search results -->
         </div>
       </div>
       <input type="hidden" id="ajax-search-enable" value="1" />
     </div>
     </form>
   </div>
 
 </div>

 <script >
  $(document).ready(function () {
    var flag = false;
    var ajax_search_enable = $('#ajax-search-enable').val();

    var current_cate_value = $('ul.cate-items li.selected').data('value');
    var current_cate_text = $('ul.cate-items li.selected').html();

    $('.cate-selected').attr('data-value', current_cate_value);
    $('.cate-selected span').html(current_cate_text);

    $('.hover-cate .text-selected').click(function () {
      $( ".cate-items" ).toggle("slow");
    });

    $('.ajax-result-container').hover(
      function() {
        flag = true;
      },
      function() {
        flag = false;
      }
      );

    $('.hover-cate').hover(
      function() {
        flag = true;
      },
      function() {
        flag = false;
      }
      );

    $('#search-by-category').focusout(function() {
      if(flag == true) {
        $('.ajax-result-container').show();
      } else {
        $('.ajax-result-container').hide();
      }
    });

    $('#search-by-category').focusin(function() {
      $('.ajax-result-container').show();
    });

    $('#btn-search-category').click(function () {
      var url = 'index64b3.html?route=product/search';
      var text_search = $('#text-search').val();
      if(text_search) {
        url += '&search=' + encodeURIComponent(text_search);
      }

      var category_search = $('.cate-selected').attr("data-value");
      if(category_search) {
        url += '&category_id=' + encodeURIComponent(category_search);
      }

      location = url;
    });

    if(ajax_search_enable == '1') {
      $('#text-search').keyup(function(e) {
        var text_search = $(this).val();
        var cate_search = $('.cate-selected').attr("data-value");
        if(text_search != null && text_search != '') {
          ajaxSearch(text_search, cate_search);
        } else {
          $('.ajax-result-container').html('');
          $('.ajax-loader-container').hide();
        }
      });

      $('ul.cate-items li.item-cate').click(function() {
        var cate_search = $(this).data('value');
        var text_search = $('#text-search').val();
        $('.cate-selected').attr('data-value', cate_search);
        $('.cate-selected span').html($(this).html());
        if(text_search != null && text_search != '') {
          ajaxSearch(text_search, cate_search);
        } else {
          $('.ajax-result-container').html('');
          $('.ajax-loader-container').hide();
        }
        $( ".cate-items" ).hide();
        $('#text-search').focus();
      });
    }

    function ajaxSearch(text_search, cate_search) {
      $.ajax({
        url         : 'http://amino.demo2.towerthemes.com/index.php?route=extension/module/ptsearch/ajaxSearch',
        type        : 'post',
        data        : { text_search : text_search, cate_search : cate_search },
        beforeSend  : function () {
          $('.ajax-loader-container').show();
        },
        success     : function(json) {
          if(json['success'] == true) {
            $('.ajax-result-container').html(json['result_html']);
            $('.ajax-loader-container').hide();
          }
        }
      });
    }

  });
</script>
<a href="<?=$ariacms->actual_link?>yeu-thich.html" id="wishlist-total" ><span><span class="text-wishlist"><?= _WISHLIST?></span> <span class="txt-count"><?=$j?></span></span></a> 

<div id="cart" class="btn-group btn-block">
  <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle"><span id="cart-total"><span class="txt-count"><?=$i?></span><span class="text-item"> <?=_YOUR_CART?> </span><span class="text-cart"><?=$total?> VNĐ</span></span></button>
  <?php if($i ==0){?> 
   <ul class="dropdown-menu pull-right">
     <li>
      <span class="cart-dropdown-menu-close"><i class="ion-android-close"></i></span>
      <p class="text-center"><?=_YOUR_SHOPPING_CART_IS_EMPTY?></p>
    </li> 
  </ul> 
<?php }else { ?>
  <ul class="dropdown-menu pull-right">
    <li>
      <span class="cart-dropdown-menu-close"><i class="ion-android-close"></i></span>
      <?php foreach ($products as $product){?>
        <table class="table table-striped">
          <tr>
            <td class="text-center cart-image"> <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><img width="80" height="80" src="<?= $product->image?>" alt="Pellentesque sodales" title="Pellentesque sodales" class="img-thumbnail" /></a> </td>
            <td class="text-left cart-info">
              <a href="<?=$ariacms->actual_link?>chi-tiet/<?= $product->url_part?>.html"><?= $product->{$params->title}?></a>                  <p>
                <span class="cart-quantity"><?= $_SESSION['orderCart'][$product->id]?> ×</span>
                <span class="cart-product-price"><?= $product->product_sale?> VNĐ</span>
                <br />
                <strong>Eco Tax:</strong> <?=$product->Eco_tax?> VNĐ/<?=_PRODUCT?>
                <br />
                <strong>VAT(%):</strong> <?=$product->VAT?> %
              </p>
            </td>

            <td class="text-center"><button type="button" onclick="deleteCart(<?= $product->id?>)" title="Remove" class="btn btn-danger btn-xs button-cart-remove"><i class="ion-ios-close-outline"></i></button></td>
          </tr>
        </table>
      <?php }?>
      </li>
      <li>
        <div>
          <table class="table table-bordered">
          
           <!--  <tr>
              <td class="text-left"><strong>Eco Tax</strong></td>
              <td class="text-right"><?=$product->Eco_tax?> VNĐ</td>
            </tr>
            <tr>
              <td class="text-left"><strong>VAT</strong></td>
              <td class="text-right"><?=$product->VAT?>%</td>
            </tr>  -->
            <tr>
              <td class="text-left"><strong><?= _Cart_totals?></strong></td>
              <td class="text-right"><?=$total ?> VNĐ</td>
            </tr>
          </table>
          <p class="text-right"><a href="<?=$ariacms->actual_link?>gio-hang.html"><strong><i class="fa fa-shopping-cart"></i><?= _VIEW_CART?></strong></a><a href="<?=$ariacms->actual_link?>giao-hang.html"><strong><i class="fa fa-share"></i><?= _CHECKOUT?></strong></a></p>
        </div>
      </li>
    </ul>
  <?php }?>
</div>






<div class="box-inner">
 <div class="box-setting btn-group">
  <button class="dropdown-toggle" data-toggle="dropdown"></button>
  <ul class="dropdown-menu">
<!--    <li class="currency">
    <form action="http://amino.demo2.towerthemes.com/index.php?route=common/currency/currency" method="post" enctype="multipart/form-data" id="form-currency" class="header-dropdown">
      <div class="btn-group">
        <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">                               <span>$</span>        <span class="hidden-xs">Currency</span>&nbsp;<i class="icon-right ion-ios-arrow-down"></i></button>
        <ul class="dropdown-menu">
          <li>
            <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
          </li>
          <li>
            <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
          </li>
          <li>
            <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>
          </li>
        </ul>
      </div>
      <input type="hidden" name="code" value="" />
      <input type="hidden" name="redirect" value="http://amino.demo2.towerthemes.com/" />
    </form>

  </li> -->

  <li class="language">
   <form action="" method="post" enctype="multipart/form-data" id="form-language" class="header-dropdown">
    <div class="btn-group">
      <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">

        <!-- <img src="/templates/traid/catalog/language/en-gb/en-gb.png" alt="English" title="English"> -->
        <span class="hidden-xs"><?=_LANGUAGE?></span>&nbsp;<i class="icon-right ion-ios-arrow-down"></i></button>
        <ul class="dropdown-menu">
           <?php if($_SESSION['steam_lang'] == 'vi'){?>
          <li>
            <button class="btn btn-link btn-block language-select" type="submit" onclick="change_Lang('<?= $_SESSION['steam_lang']?>')" href="/" ><img src="/templates/traid/catalog/language/en-gb/en-gb.png" alt="English" title="English" /><?=_ENGLISH?></button>
          </li>
         <?php } else{?>
          <li>
            <button class="btn btn-link btn-block language-select" type="submit" onclick="change_Lang('<?= $_SESSION['steam_lang']?>')" href="/" ><img src="/templates/traid/catalog/language/vi/vietnam.jpg" alt="Vietnamese" title="Vietnamese" /><?=_VIETNAMESE?></button>
          </li>
          <?php }?>
        </ul>
      </div>
      <input type="hidden" name="code" value="" />
      <input type="hidden" name="redirect" value="" />
    </form>

  </li>

  <li id="top-links" class="nav header-dropdown">
   <ul class="list-inline">
    <li class="dropdown"><a href="<?=$ariacms->actual_link?>/account.html" title="My Account" data-toggle="dropdown"><i class="ion-android-person icons"></i> <span class="hidden-xs"><?=_ACCOUNT?></span></a>
      <ul class="pt-account">
        <?php if($_SESSION['member']) { ?>
              <li><a><?php echo $_SESSION['member']['fullname'] ?></a></li>
              <li><a href="<?php echo $ariacms->actual_link . 'register/logout.html'; ?>"><?=_SIGN_OUT?></a></li>
            <?php } else { ?>
        <li><a id="pt-register-link" href="<?=$ariacms->actual_link?>/account/register.html"><?=_REGISTER?></a></li>
        <li><a id="pt-login-link" href="<?=$ariacms->actual_link?>/account/login.html"><?=_SIGN_IN?></a></li>
     <?php } ?>   
        </ul>
    </li>
  </ul>
</li>
</ul>
</div>
</div>
</div>
</div>


</div>

</div>
</div>
</div>

</header>				