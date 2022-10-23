<?php
  global $database;
  global $ariacms;
  global $params; 
//   $query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_category' AND position = 'header' AND status = 'active' AND count > 0 ORDER BY e4_term_taxonomy.order ";
// $database->setQuery($query);
// $taxonomies = $database->loadObjectList();

$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_group' AND position = 'home' AND status = 'active' AND count > 0 ORDER BY e4_term_taxonomy.order LIMIT 0,1";
$database->setQuery($query);
$group = $database->loadObjectList();

$query = "SELECT c.category, a.*
    FROM e4_posts a
      JOIN (
        SELECT t1.object_id
        FROM e4_term_relationships t1 WHERE t1.term_taxonomy_id = (SELECT id from e4_term_taxonomy WHERE taxonomy = 'product_group' and position = 'home' AND status = 'active' LIMIT 0,1)
        ) d ON a.id = d.object_id
      JOIN (
        SELECT t1.object_id, GROUP_CONCAT(' ', t2.url_part) AS category
        FROM e4_term_relationships t1 
          JOIN e4_term_taxonomy t2 ON t1.term_taxonomy_id = t2.id AND t2.taxonomy = 'product_category' GROUP BY t1.object_id
        ) c ON a.id = c.object_id
    WHERE a.post_type = 'product'  AND a.post_status = 'active'
    order by a.id desc
    "; 
 // echo $query;die;  
$database->setQuery($query);
$products = $database->loadObjectList();

?>
<div class="main-row tab-full">

    <div class="container">
        <div class="row">
            <div class="main-col col-sm-12 col-md-12">
                <div class="row sub-row">
                    <div class="sub-col col-sm-12 col-md-12">

                        <div class="products-container  tabs-product ">

                          <div class="block-title">
                           <p class="sub-title"><?=_OUT_PRODUCTS?></p>
                           <?php foreach ($group as $key => $gr) {
                           ?>
                           <div class="title"><span><?=$gr->{$params->title} ?></span></div>
                            <?php } ?>
                       </div>


                <!--        <div class="tabs-style">
                        
                        <ul class="nav nav-tabs">
                          <?php foreach ($group as $key => $gr) {
                           ?>
                            <li>
                              <a href="javascript:void(0);" data-tab="#tab-product-350-0">
                                  <span><?=$gr->{$params->title}?></span>
                              </a>
                          </li>
                            <?php } ?> 
                      </ul>
                  
                  </div> -->


                  <div class="pt-content">

                    <div class="product-tabs-section">
                        <div class="tab-content product-tabs-content">
                            
                            <!--tab -->
                            <div class="tab-product" id="tab-product-350-0">
                                <div class="swiper-viewport">
                                    <div id="350-0-products-container" class="multi-slides-350-0 swiper-container">
                                        <div class="swiper-wrapper">

                                           <?php foreach($products as $key => $product)
                                             { ?> 

                                          <div class="product-thumb transition swiper-slide">
                                             <div class="grid-style">
                                              <div class="product-item">	
                                               <div class="image ">

                                                <a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$product->url_part?>.html">
                                                  <img  data-src="<?=$product->image?>" width="370" height="370"  alt="<?=$product->{$params->title}?>" title="<?=$product->{$params->title}?>" class=" swiper-lazy  img-responsive img-mod-350-0-28" />
                                              </a>
                                              <div class="swiper-lazy-preloader"></div>




                                              <div class="button-group">
                                                  <div class="inner">
                                                   <button type="button"  title="Add to Wish List" class="button-wishlist" onclick="addWish(<?=$product->id?>)"><span><?=_ADD_TO_WISHLIST?></span></button>
                                                  <!-- <button type="button"  title="Compare this Product" class="button-compare" onclick="compare.add('28');"><span>Compare this Product</span></button> -->
                                                <!--    <button type="button" title="Quick View" class="button-quickview" onclick="view(<?=$product->id?>)"><span>Quick View</span></button> -->
                                                   <button type="button" class="button-cart" onclick="addCart(<?=$product->id?>)" title="Add to Cart"><span><?=_ADD_TO_CART?></span></button>
                                              
                                               </div>
                                           </div>
                                       </div>
                                       <div class="caption">
                                        <div class="inner">
                                         <h4><a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$product->url_part?>.html"><?=$product->{$params->title}?></a></h4>
                                         <!-- <p class="manufacture-product">
                                           <a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$product->url_part?>.html">HTC</a>
                                       </p> -->
                                       <div>
                                           <p class="price">
                                               <?=$product->product_sale?> VNĐ
                                           </p>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>

                     </div>
                   <?php }?>
                      <!--end san pham-->
               </div>
           </div>

           <div class="swiper-pager">
            <div class="swiper-button-next swiper-button-next-350-0"></div>
            <div class="swiper-button-prev swiper-button-prev-350-0"></div>
        </div>
    </div>



    <script>
        $(".multi-slides-350-0").swiper({
            spaceBetween: 0,
            nextButton: '.swiper-button-next-350-0',
            prevButton: '.swiper-button-prev-350-0',
            speed:  500 ,
            preloadImages: false,
            lazyLoading: true,
            watchSlidesVisibility: true,
            slidesPerView: 5,
            slidesPerColumn: 1,
            breakpoints: {
                1499: {
                    slidesPerView: 5,
                    slidesPerColumn: 1
                },
                1199: {
                    slidesPerView: 3,
                    slidesPerColumn: 1
                },
                991: {
                    slidesPerView: 3,
                    slidesPerColumn: 1
                },
                767: {
                    slidesPerView: 2,
                    slidesPerColumn: 1
                },
                567: {
                    slidesPerView: 2,
                    slidesPerColumn: 1
                },
                359: {
                   slidesPerView: 1
               }
           },
           autoplay:  false ,
           loop: false
       });
   </script>
</div>


</div>
</div>
<script>
    $('.tabs-style .nav-tabs').each(function() {
        $(this).find('li').first().addClass('active');
    });


    $('.product-tabs-section .tab-content').each(function() {
        $(this).find('.tab-product').hide();
        $(this).find('.tab-product').first().show();
    }); 

    $('.tabs-style .nav-tabs a').on('click', function () {
        $(this).closest('ul').find('li').removeClass('active');
        $(this).closest('li').addClass('active');

        var tab = $(this).data('tab');
        $(tab).closest('.tab-content').find('.tab-product').hide();
        $(tab).show();
    });
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>