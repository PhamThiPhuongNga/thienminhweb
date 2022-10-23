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
       <html lang="en">
       <?=$ariacms->getBlock("head"); ?>
       <body>

        <div class="boxed_wrapper"> 

          <?=$ariacms->getBlock("header");?>

          <section class="content-cart">
            <figure class="image-box"><img src="/templates/assets/images/service/service-9.jpg" alt=""></figure>
            <div class="text">
                <div class="shopping-cart">
                    <input id="reloadValue" type="hidden" name="reloadValue" value="" />
                    <input id="is_vietnam" type="hidden" value="true" />
                    <input id="is_vietnam_location" type="hidden" value="true" />
                    <div class="banner">
                        <div class="wrap">
                            <a href="/" class="logo">
                                <h1 class="logo-text">ĐẶT HÀNG</h1>
                            </a>
                        </div>
                    </div>

                    <form name="checkout" method="post"  action="#">
                      <div class="content">
                          <div class="wrap row">
                            <div class="main col-md-6">
                              <div class="main-header">
                                <a href="/" class="logo">
                                    <h1 class="logo-text">ĐẶT HÀNG</h1>       
                                </a>
                      <!--   <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/cart">Giao hàng</a>
                            </li>
                           
                        </ul> -->
                    </div>
                    <div class="main-content">

                        <script>
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        </script>
                        <div class="step">
                            <div class="step-sections " step="1">
                                <div class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Thông tin thanh toán</h2>
                                    </div>
                                    <div class="section-content section-customer-information no-mb">


                                        <div class="fieldset">

                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_full_name">Họ và tên</label>
                                                    <input placeholder="Họ và tên" autocapitalize="off"  class="field-input" size="30" type="text"  name="fullname" value=""  />
                                                </div>  
                                            </div>
                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_full_name">Địa chỉ</label>
                                                    <input placeholder="Địa chỉ"  class="field-input" size="30" type="text"  name="address" value=""  autocomplete="false"/>
                                                </div>  
                                            </div>
                                            <div class="field  field-two-thirds  ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="checkout_user_email">Email</label>
                                                    <input autocomplete="false" placeholder="Email" autocapitalize="off"  class="field-input" size="30" type="email" id="checkout_user_email" name="email" value="" />
                                                </div>
                                            </div>
                                            <div class="field field-required field-third  ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_phone">Điện thoại</label>
                                                    <input autocomplete="false" placeholder="Điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="15" type="tel"  name="phone" value="" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    
                                </div>  
                            </div>
                          <!--   <div class="step-footer">
                                <form id="form_next_step" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                    <button type="submit" class="step-footer-continue-btn btn">
                                        <span class="btn-content">Phương thức thanh toán</span>
                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                    </button>
                                </form>
                                <a class="step-footer-previous-link" href="/cart">
                                    Giỏ hàng
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-6">
                  <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                      <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                      <div class="order-summary-sections">
                        <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
                          <table class="product-table">
                   <!--  <thead>
                      <tr>
                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                      </tr>
                  </thead> -->
                  <tbody>

                   <?php foreach($products as $product){?>
                    <tr class="product" >
                        <td class="product-image">
                            <div class="product-thumbnail">
                                <div class="product-thumbnail-wrapper">
                                    <img class="product-thumbnail-image" alt="Tủ báo cháy CF1000VDS Range" src="<?=$product->image?>" />
                                </div>
                                <span class="product-thumbnail-quantity" aria-hidden="true"><?= $_SESSION['orderCart'][$product->id]?></span>
                            </div>
                        </td>
                        <td class="product-description">
                            <span class="product-description-name order-summary-emphasis"><?=$product->title_vi?></span>

                        </td>
                        <td class="product-quantity">
                          <!-- <input type="text" name="quantity" value="<?=$_SESSION['orderCart'][$product->id]?>" size="1" class="form-control" /> -->
                          <span>
                          <input type="text" id="quantity_<?= $product->id?>" class="form-control" onchange="editCart(<?=$product->id?>);"
                          name="quantity"
                          value="<?= $_SESSION['orderCart'][$product->id]?>"
                          title="quantity"
                          />
                         <!--  <span class="input-group-btn"> -->
                         </span>
                      
                        <!-- <button type="submit" title="Update" class="text-center"  onclick="editCart(<?= $product->id?>);"><i class="fa fa-refresh"></i></button> -->

                       
                        <!-- </span> -->
                    
                    </td>
                        
                        <td class="product-quantity visually-hidden"><?= $_SESSION['orderCart'][$product->id]?></td>
                        <td class="product-price">
                            <span class="order-summary-emphasis"><?= $_SESSION['orderCart'][$product->id]* $product->product_sale?> VNĐ</span>
                        </td>
                        <td  style="vertical-align: middle;" class="text-center" onclick="deleteCart(<?= $product->id?>)"><b title="Xóa khỏi giỏ hàng" style="color:red; cursor:pointer">X</b></td>

                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
      <table class="total-line-table">


        <tfoot class="total-line-table-footer">
          <tr class="total-line">
            <td class="total-line-name payment-due-label">
              <span class="payment-due-label-total">Tổng tiền</span>
          </td>
          <td class="total-line-name payment-due">
              <!-- <span class="payment-due-currency">VND</span> -->
              <span class="payment-due-price" data-checkout-payment-due-target="0">
                 <?=number_format($total)?> VNĐ
             </span>
             <span class="checkout_version" display:none data_checkout_version="4">
             </span>
         </td>
     </tr>

 </tfoot>

</table>
<div class="step-footer">

    <input name="utf8" type="hidden" value="✓">
    <button type="submit" class="step-footer-continue-btn btn" name="btnSubmit"  value="Place order" data-value="Place order">
        <span class="btn-content"> Thanh toán</span>
        <i class="btn-spinner icon icon-button-spinner"></i>
    </button>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>

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
