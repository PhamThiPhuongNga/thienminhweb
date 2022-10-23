<?php
global $database;
global $ariacms;
global $params;
$query = "SELECT * FROM e4_web_home";
$database->setQuery($query);
$homes = $database->loadObjectList();
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 
  <ol class="carousel-indicators">
     <?php 
      $k=0;
     foreach($homes as $key1 => $home1 ){ 
     if($home1->parent == 34){ ?>
      <?php if($k == 0){ ?>    
    <li data-target="#myCarousel" data-slide-to="<?php echo $k;?>" class="active"> </li>
      <?php $k++; } else { ?>
     <li data-target="#myCarousel" data-slide-to="<?php echo $k;?>">
      </li> <?php $k++; } ?>
      <?php } }?>
  </ol>
   
  <!-- Wrapper for slides -->

 
  <div class="carousel-inner">
    <?php 
    $k=0;
    foreach($homes as $key => $home ){ 
     if($home->parent == 34){ 
       ?>
    <?php if($k == 0) { ?> 
    <div class="item active"> 
      <img src="<?=$home->image ?>" alt=""> 
     </div> 
  <?php $k++; } else { ?> 
     <div class="item"> 
      <img src="<?=$home->image ?>" alt=""> 
     </div> 
     <?php $k++; } ?>
       <?php  } }?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>