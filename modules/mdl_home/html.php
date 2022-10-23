<?php
class View
{
  static function viewhome($taxonomies, $home_configs, $home_config_details)
  {
    global $ariacms;
    global $ariaConfig_template;
    global $params;
    

    session_start();  
    ?>
   <!DOCTYPE html>
   <html lang="en">
   <?=$ariacms->getBlock("head"); ?>
   <body>

    <div class="boxed_wrapper"> 

      <?=$ariacms->getBlock("header");?>
      <?=$ariacms->getBlock("banner");?>
      <?=$ariacms->getBlock("about");?>
      <?=$ariacms->getBlock("service");?>
      <?=$ariacms->getBlock("product_home_tm");?>
      <?=$ariacms->getBlock("cta");?>
      <?=$ariacms->getBlock("testimonial");?>
      <?=$ariacms->getBlock("clients");?>
      <?=$ariacms->getBlock("news");?>
      <?=$ariacms->getBlock("letter");?>  
      <?=$ariacms->getBlock("footer");?>
     <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
        
    </div> 
     <?=$ariacms->getBlock("footer_script");?>
     </body>
<!-- End of .page_wrapper -->

</html>

<?php
}
}
?>