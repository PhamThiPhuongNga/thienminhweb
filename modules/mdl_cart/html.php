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
<figure class="image-box"><img src="./assets/images/service/service-9.jpg" alt=""></figure>
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
  <button class="order-summary-toggle order-summary-toggle-hide">
    <div class="wrap">
      <div class="order-summary-toggle-inner">
        <div class="order-summary-toggle-icon-wrapper">
          <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon"><path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path></svg>
        </div>
        <div class="order-summary-toggle-text order-summary-toggle-text-show">
          <span>Hiển thị thông tin đơn hàng</span>
          <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
        </div>
        <div class="order-summary-toggle-text order-summary-toggle-text-hide">
          <span>Ẩn thông tin đơn hàng</span>
          <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path></svg>
        </div>
        <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="0">
          <span class="total-recap-final-price">0₫</span>
        </div>
      </div>
    </div>
  </button>
  <div class="content content-second">
    <div class="wrap">
      <div class="sidebar sidebar-second">
        <div class="sidebar-content">
          <div class="order-summary">
            <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="" />
                                                </div>
                                                <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
      <div class="wrap row">
                <div class="main col-md-6">
          <div class="main-header">
            <a href="/" class="logo">
                            <h1 class="logo-text">ĐẶT HÀNG</h1>       
            </a>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/cart">Giao hàng</a>
                            </li>
                           
                        </ul>
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
                                                    <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_full_name" name="billing_address[full_name]" value=""  autocomplete="false"/>
                                                </div>  
                                            </div>
                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_full_name">Địa chỉ</label>
                                                    <input placeholder="Địa chỉ"  class="field-input" size="30" type="text"  name="billing_address[full_name]" value=""  autocomplete="false"/>
                                                </div>  
                                            </div>
                                                <div class="field  field-two-thirds  ">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label" for="checkout_user_email">Email</label>
                                                        <input autocomplete="false" placeholder="Email" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="email" id="checkout_user_email" name="checkout_user[email]" value="" />
                                                    </div>
                                                </div>
                                            <div class="field field-required field-third  ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_phone">Điện thoại</label>
                                                    <input autocomplete="false" placeholder="Điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="15" type="tel" id="billing_address_phone" name="billing_address[phone]" value="" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    
                                </div>  
                            </div>
                            <div class="step-footer">
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
                            </div>
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
                    <thead>
                      <tr>
                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                      </tr>
                    </thead>
                    <tbody>
                                            <tr class="product" data-product-id="1029064153" data-variant-id="1064534900">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image" alt="[Notifier - TỦ BÁO CHÁY ONYX] NFS-320" src="//product.hstatic.net/200000224277/product/nfs320_145px10_11_29_000000_0eeff616756b4a9ab9f72311ee19d620_b7451bc0120d4b3aacfe0cedc692890a_small.jpg" />
                                                        </div>
                                                        <span class="product-thumbnail-quantity" aria-hidden="true">1</span>
                                                    </div>
                                                </td>
                                                <td class="product-description">
                                                    <span class="product-description-name order-summary-emphasis">[Notifier - TỦ BÁO CHÁY ONYX] NFS-320</span>
                                                    
                                                </td>
                                                <td class="product-quantity visually-hidden">1</td>
                                                <td class="product-price">
                                                    <span class="order-summary-emphasis">0₫</span>
                                                </td>
                                            </tr>
                                        
                                            <tr class="product" data-product-id="1030686264" data-variant-id="1067244502">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image" alt="Tủ báo cháy CF1000VDS Range" src="//product.hstatic.net/200000224277/product/tu_bao_chay_cf1000vds_range_b10f26b553ce4cbeb50181c906284b05_03affb6ebeb6475b9166f28fdd141304_small.jpg" />
                                                        </div>
                                                        <span class="product-thumbnail-quantity" aria-hidden="true">3</span>
                                                    </div>
                                                </td>
                                                <td class="product-description">
                                                    <span class="product-description-name order-summary-emphasis">Tủ báo cháy CF1000VDS Range</span>
                                                    
                                                </td>
                                                <td class="product-quantity visually-hidden">3</td>
                                                <td class="product-price">
                                                    <span class="order-summary-emphasis">0₫</span>
                                                </td>
                                            </tr>
                    </tbody>
                  </table>
                </div>
                  <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
                    <form id="form_discount_add" accept-charset="UTF-8" method="post">
                    <input name="utf8" type="hidden" value="✓">
                      <div class="fieldset">
                        <div class="field  ">
                          <div class="field-input-btn-wrapper">
                            <div class="field-input-wrapper">
                              <label class="field-label" for="discount.code">Mã giảm giá</label>
                              <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false" autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code" name="discount.code" value="" />
                            </div>
                            <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                              <span class="btn-content">Sử dụng</span>
                              <i class="btn-spinner icon icon-button-spinner"></i>
                            </button>
                          </div>
                          
                        </div>
                      </div>
                    </form>
                  </div>
                <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                  <table class="total-line-table">
                    <thead>
                      <tr>
                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="total-line total-line-subtotal">
                        <td class="total-line-name">Tạm tính</td>
                        <td class="total-line-price">
                          <span class="order-summary-emphasis" data-checkout-subtotal-price-target="0">
                            0₫
                          </span>
                        </td>
                      </tr>
                      
                      
                      <tr class="total-line total-line-shipping">
                        <td class="total-line-name">Phí ship</td>
                        <td class="total-line-price">
                          <span class="order-summary-emphasis" data-checkout-total-shipping-target="0">
                            
                              —
                            
                          </span>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot class="total-line-table-footer">
                      <tr class="total-line">
                        <td class="total-line-name payment-due-label">
                          <span class="payment-due-label-total">Tổng tiền</span>
                        </td>
                        <td class="total-line-name payment-due">
                          <span class="payment-due-currency">VND</span>
                          <span class="payment-due-price" data-checkout-payment-due-target="0">
                            0₫
                          </span>
                          <span class="checkout_version" display:none data_checkout_version="4">
                          </span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
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
