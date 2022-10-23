<?php
global $ariacms;
global $params;
global $ariaConfig_template;
global $analytics_code;
$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_category' AND position = 'home' AND status = 'active' ORDER BY e4_term_taxonomy.order LIMIT 0,6 ";
$database->setQuery($query);
$danhmuc = $database->loadObjectList();

$query = "SELECT * FROM e4_web_home";
$database->setQuery($query);
$homes = $database->loadObjectList();



$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_group' AND position = 'home' AND status = 'active' AND id = 20 AND count > 0 ORDER BY e4_term_taxonomy.order LIMIT 0,1";
$database->setQuery($query);
$group = $database->loadObjectList();

$query = "SELECT c.category, a.*
FROM e4_posts a
JOIN (
SELECT t1.object_id
FROM e4_term_relationships t1 WHERE t1.term_taxonomy_id = (SELECT id from e4_term_taxonomy WHERE taxonomy = 'product_group' and position = 'home' AND id = 20 AND status = 'active' LIMIT 0,1)
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
                  <!--         <div class="pt-block static-top-store1">
                            <div class="row">
                                <div class="col col-1 col-sm-4 col-xs-12">
                                   <div class="image">
                                    <a href="#"><img src="/templates/traid/image/catalog/ptblock/img1-top-store1.jpg" alt="img1"></a>
                                </div>
                            </div>
                            <div class="col col-2 col-sm-4 col-xs-12">
                              <div class="image">
                                <a href="#"><img src="/templates/traid/image/catalog/ptblock/img2-top-store1.jpg" alt="img2"></a>
                            </div>
                        </div>
                        <div class="col col-3 col-sm-4 col-xs-12">
                          <div class="image">
                            <a href="#"><img src="/templates/traid/image/catalog/ptblock/img3-top-store1.jpg" alt="img3"></a>
                        </div>
                        </div>
                         </div>
                       </div> -->


                       <div class="special-categories-module">
                        <div class="block-title">
                          <p class="sub-title"><?=_PRODUCT_CATEGORY?></p>
                          <!-- <div class="title"><span>Featured Categories</span></div> -->
                        </div>

                        <div class="pt-content">
                          <div class="swiper-viewport">
                            <div class="featured-categories-content swiper-container">
                              <div class="swiper-wrapper">

                                <?php foreach ($danhmuc as $key => $dm) {
                                  ?>      
                                  <div class="swiper-slide product-thumb">

                                   <div class="category-content">
                                     <div class="image">
                                      <a href="<?=$ariacms->actual_link?>san-pham/<?= $dm->url_part?>.html"><img src="<?php echo $dm->image; ?>" alt="<?=$dm->{$params->title}?>" /></a>
                                    </div>
                                    <div class="caption">
                                     <h4 class="name"><a href="<?=$ariacms->actual_link?>san-pham/<?= $dm->url_part?>.html"><?=$dm->{$params->title}?></a></h4>
                                     <!-- <p class="total-items">18 products</p> -->
                                     <a href="<?=$ariacms->actual_link?>san-pham/<?= $dm->url_part?>.html" class="view-more">Shop Now</a>
                                   </div>

                                 </div>

                               </div>

                             <?php } ?>



                           </div>

                         </div>

                         <div class="swiper-pager">
                          <div class="swiper-button-next special-categories-button-next"></div>
                          <div class="swiper-button-prev special-categories-button-prev"></div>
                        </div>
                      </div>

                      <script>
                        $(document).ready(function() {
                          $(".featured-categories-content").swiper({
                            spaceBetween: 0,
                            nextButton: '.special-categories-button-next',
                            prevButton: '.special-categories-button-prev',
                            speed:  3000 ,
                            slidesPerView: 6,
                            slidesPerColumn: 1,
                            watchSlidesVisibility: true,
                            autoplay:  false ,
                            loop: true,
            // Responsive breakpoints
            breakpoints: {
              359: {
                slidesPerView: 1
              },
              639: {
                slidesPerView: 2
              },
              767: {
                slidesPerView: 3
              },
              991: {
                slidesPerView: 4

              },
              1199: {
                slidesPerView: 5

              },
              1499: {
                slidesPerView: 6

              }
            }
          });
                        });
                      </script>
                    </div>
                  </div>



                  <div class="policy-block">
                    <div class="inner">
                     <?php foreach($homes as $key => $home) 
                     { 
                      if($home->parent==53){ ?> 
                        <div class="col">
                          <div class="box">
                            <div class="inner">
                              <img src="<?=$home->image ?>" alt="policy1">
                              <div class="text">
                                <label><?=$home->{$params->title}?></label>
                                <p><?=$home->{$params->brief}?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } } ?>

                    </div>
                  </div>




                  <div class="products-container   ">

                    <div class="block-title">

                      <?php foreach ($group as $key => $gr) {
                       ?>
                       <p class="sub-title"><?=$gr->{$params->title} ?></p>

                     <?php } ?>

                   </div>
                   <div class="pt-content">

                    <div class="swiper-viewport">
                      <div class="swiper-container single-slides-346">
                        <div class="swiper-wrapper">

                         <?php foreach($products as $key => $product)
                         { ?> 


                          <div class="product-thumb transition swiper-slide">
                           <div class="grid-style">
                            <div class="product-item">  
                             <div class="image ">

                              <a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$product->url_part?>.html">
                                <img  data-src="<?=$product->image?>" width="370" height="370"  alt="<?=$product->{$params->title}?>" title="<?=$product->{$params->title}?>" class=" swiper-lazy  img-responsive img-mod-346-49" />
                              </a>
                              <div class="swiper-lazy-preloader"></div>




                              <div class="button-group">
                                <div class="inner">
                                <button type="button"  title="Add to Wish List" class="button-wishlist" onclick="addWish(<?=$product->id?>)"><span><?=_ADD_TO_WISHLIST?></span></button>
                                
                                 <button type="button" class="button-cart" onclick="addCart(<?=$product->id?>)" title="Add to Cart"><span><?=_ADD_TO_CART?></span></button>
                               </div>
                             </div>
                           </div>

                           <div class="caption">
                            <div class="inner">
                             <h4><a href="<?=$ariacms->actual_link?>/chi-tiet/<?=$product->url_part?>.html"><?=$product->{$params->title}?></a></h4>
                            
                             <!-- <div class="rating">
                              <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                              <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                              <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                              <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                              <span class="icon-ratings"><i class="icon-rating icon-rating-x"></i></span>
                            </div> -->
                            <div>
                             <p class="price">
                               <?=$product->product_sale?> VNĐ  
                             </p>
                             <!-- <div class="box-label">
                              <div><span class="pro-label new">New</span></div>
                            </div> -->
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>



                </div>
              <?php } ?>
              <!--end san pham-->


            </div>
          </div>

          <div class="swiper-pager">
            <div class="swiper-button-next swiper-button-next-346"></div>
            <div class="swiper-button-prev swiper-button-prev-346"></div>
          </div>
        </div>



        <script>
          var product_slides_346 = $(".single-slides-346").swiper({
            spaceBetween:0,
            nextButton: '.swiper-button-next-346',
            prevButton: '.swiper-button-prev-346',
            speed:  500 ,
            preloadImages: false,
            lazyLoading: true,
            watchSlidesVisibility: true,
            slidesPerView: 4,
            slidesPerColumn: 2,
            breakpoints: {
             1499: {
              slidesPerView: 4,
              slidesPerColumn: 2
            },
            1199: {
              slidesPerView: 3,
              slidesPerColumn: 2
            },
            991: {
              slidesPerView: 3,
              slidesPerColumn: 2
            },
            767: {
              slidesPerView: 2,
              slidesPerColumn: 2
            },
            567: {
              slidesPerView: 2,
              slidesPerColumn: 2
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