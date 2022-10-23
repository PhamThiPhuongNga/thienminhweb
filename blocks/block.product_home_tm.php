<?php
global $database;
global $ariacms;
global $params; 


$query = "SELECT * FROM e4_term_taxonomy WHERE taxonomy = 'product_category' AND position = 'home' AND status = 'active' AND count > 0 ORDER BY e4_term_taxonomy.order ";
$database->setQuery($query);
$group = $database->loadObjectList();



?>

<section class="service-section bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>SẢN PHẨM TIÊU BIỂU</h2>
        </div>
        <?php $i=1;
        foreach($group as $gr){
                    $query = "SELECT c.category, a.*
                    FROM e4_posts a
                    JOIN (
                    SELECT t1.object_id
                    FROM e4_term_relationships t1 WHERE t1.term_taxonomy_id = (SELECT id from e4_term_taxonomy WHERE taxonomy = 'product_category' and position = 'home' AND status = 'active' and id=" .$gr->id . ")
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
       
                <div>
                <div class="product ">
                    <p class="title-product" style="left:0;"><span class=""><?=$gr->title_vi?></span></p>
                    <p class="add-product"><a href="<?=$ariacms->actual_link?>san-pham/<?=$gr->url_part?>.html" class="">>> Xem thêm</a></p>
                </div>
                    <section class="team-page-section centred">

                        <div class="auto-container">

                               <div class="four-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">  
                  <?php 
                    foreach ($products as $key => $product) {
                        // code...
                    ?>
                    <div class="testimonial-block-one">
                        <div class="inner-box">

                            <figure class="image-box">
                                <a href="<?=$ariacms->actual_link?>san-pham/<?=$product->url_part?>.html" class="">
                                    <img src="<?=$product->image ?>" alt="" height="370" width="470">
                                </a>
                            </figure>
                            <div class="author-info">
                                <h4><?=$product->title_vi?></h4>
                                <span><a href="" class="designation">Giá: <?=number_format($product->product_sale) ?></a></span>
                                    <div class="figcaption" style=" height: 35px;
                                    background-color: red;">
                                    <a style="cursor:pointer;color: white;" onclick="addCart(<?= $product->id?>)" style="color:white;">Thêm vào giỏ hàng</a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
               
                </div>
               
        </div> 
    </section>
    

     
      
<?php 
$i++; 
} 
?>
</div>
</section>