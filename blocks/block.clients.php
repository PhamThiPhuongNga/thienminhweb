<!-- clients-section -->
<?php
 global $database;
 global $ariacms;
 global $params;

$query = "SELECT * FROM e4_web_home WHERE parent=86 and status='active'" ;
$database->setQuery($query);
$homes = $database->loadObjectList();
 ?>
        <section class="clients-section bg-color-1">
            <div class="sec-title centred">
                <h2>ĐỐI TÁC CỦA CHÚNG TÔI</h2>
            </div>
            <div class="auto-container">
                <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                    <?php foreach ($homes as $key => $home) {
                        // code...
                    ?>
                    <figure style="" class="clients-logo-box">
                        <a href="index.html"><img src="<?=$home->image?>" alt="" height="80px" width="80px"></a>
                    </figure>
                <?php } ?>
                    
                </div>
            </div>
        </section>
        <!-- clients-section end -->